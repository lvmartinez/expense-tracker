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
     * Get all expenses
     */
    public function getExpensesCategories()
    {
        $sql = "SELECT * FROM expenses_categories";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

}