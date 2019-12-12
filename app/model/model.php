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
     * Get all expenses
     */
    public function getExpenses()
    {
        $sql = "SELECT * FROM expenses";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
	
	/**
     * Get latest expenses
     */
    public function getLatestExpenses()
    {
        $sql = "SSELECT *, sum(amount) FROM `expense` group by category_id order by date DESC LIMIT 0,3";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get all expenses
     */
    public function getExpensesCategories()
    {
        $sql = "SELECT * FROM expense_category";
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