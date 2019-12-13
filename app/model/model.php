<?php
class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	/**
     * Get latest expenses
     */
    public function getLatestExpenses()
    {
        $sql = "SELECT *, sum(amount) as total_amount FROM `expense` as e inner join expense_category as c ON c.id = e.category_id group by c.id order by e.date DESC LIMIT 0,3";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get expenses categories
     */
    public function getExpensesCategories()
    {
        $sql = "SELECT * FROM expense_category";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
	
	/**
     * Get all expenses
     */
    public function getExpenses($month, $year, $start, $end)
    {
        $sql = "SELECT * FROM expense as e inner join expense_category as c ON c.id = e.category_id ";
		
		if( $year != '' ){
			$sql.="WHERE YEAR(date) = '$year' ";
		}
		
		if( $month != '' ){
			$sql.="and MONTH(date) = '$month' ";
		}
		$sql.= "ORDER BY date DESC ";  
		
		if( ( $start != -1 ) && ($end != 0) ){	
			$sql.= "LIMIT $start, $end";
		}
			
		$query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
	
	/**
     * Record new expense on database
     */
    public function addExpense($table, $data)
    {

        if (isset($data)) {
            $result=$this->dynamicInsert($table, $data);
        }
    }
	
	private function dynamicInsert($table, $data){
		$fields = implode(", ", array_keys($data));
		//$values = "'".implode("','", mysqli_real_escape_string($GLOBALS['conn'], array_values($data)) )."'";
		$comma = " ";
		$sql = "INSERT INTO $table ($fields ) VALUES (";
		
		foreach($data as $key => $val) {
				$sql .= $comma . "'" . trim($val) . "'";
				$comma = ", ";
		}
		
		$sql .= ');';	
		
		$query = $this->db->prepare($sql);
		
		$result = $query->execute();

		if ($result == 1){
			return array('result' => 1, 'id' => $result_id);
		}else{
			return array('result' => 0);
		}
	}

}