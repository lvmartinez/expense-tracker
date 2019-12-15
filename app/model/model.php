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
        $sql = "SELECT *, (amount+tax) as total_amount FROM `expense` as e inner join expense_category as c ON c.id = e.category_id group by c.id,date order by e.date DESC LIMIT 0,5";   
		$query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Get expenses categories
     */
    public function getExpensesCategories($id = '')
    {
        $sql = "SELECT * FROM expense_category ";
		if ($id != ''){
			$sql .= "	where id=$id ";
		}
		$sql .= 'order by name ASC';
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
     * Get a sum of monthly expenses
     */
    public function getExpensesSum($month, $year, $start, $end, $order, $group)
    {
        $sql = "SELECT sum(amount+tax) as total, (c.budget*12) as budget, DATE_FORMAT(date, '%b') as month, c.name FROM expense as e inner join expense_category as c ON c.id = e.category_id ";
		
		if( $year != '' ){
			$sql.="WHERE YEAR(date) = '$year' ";
		}
		
		if( $month != '' ){
			$sql.="and MONTH(date) = '$month' ";
		}
		
		if( $group != '' ){
			$sql.= "GROUP BY $group ";
		}
		
		if( $order != '' ){
			$sql.= "ORDER BY $order ";
		}  
		
		if( ( $start != -1 ) && ($end != 0) ){	
			$sql.= "LIMIT $start, $end ";
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
	/**
     * Record new category on database
     */
	public function addCategory($table, $data)
    {

        if (isset($data)) {
            $result=$this->dynamicInsert($table, $data);
        }
    }
	
	/**
     * Update category values on database
     */
	public function updateCategory($table, $data, $where)
    {

        if (isset($data)) {
            $result=$this->dynamicUpdate($table, $data, $where);
        }
    }
	
	private function dynamicInsert($table, $data){
		$fields = implode(", ", array_keys($data));
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
	
	private function dynamicUpdate($table, $data, $where){
		$sql = "UPDATE $table SET";
		$comma = " ";

		foreach($data as $key => $val) {
			$sql .= $comma . $key . " = '" . trim($val) . "'";
			$comma = ", ";
		}
		$sql .= $where;

		$query = $this->db->prepare($sql);
		
		$result = $query->execute();
	
		if ($result == 1){
			return array('result' => 1);
		}else{
			return array('result' => 0);
		}
	}

}