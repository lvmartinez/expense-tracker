<?php
/**
 * Class Dashboard
 *
 *
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Dashboard extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/expense/index.php';

    }
	/**
     * PAGE: expense List page
     */
    public function newExpense()
    {
		
		$expensesCategories = (array)$this->model->getExpensesCategories();
		$latestExpenses = (array)$this->model->getLatestExpenses();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/expense/expenses.php';
    }
	
	
	
	
	/**
     * ACTION: addExpense
     * This method handles what happens when you move to /dashboard/addExpense
     */
    public function addExpense()
    {
        if (isset($_POST)) {
            $this->model->addExpense('expense', $_POST);
        }
        header('location: ' . URL . 'dashboard/newExpense');
    }
    

}