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
        $sql = "SELECT * FROM expense order by date DESC LIMIT 0,2";
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

}