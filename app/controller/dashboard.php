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
		$year= date('Y');
		$series = '';
		
		if ( isset($_GET) && ($_GET !='') ){
			$year= isset($_GET['year']) ? $_GET['year'] : $year;
		}
		
		$monthlyExpenses = (array)$this->model->getExpenses('', $year, -1, 0);
		foreach ($monthlyExpenses as $expense){
			
		}
		
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
     * PAGE: expense List page
     */
    public function expenses()
    {	
		$month= date('m');
		$year= date('Y');
		$pageIndex = 1;
		
		if ( isset($_GET) && ($_GET !='') ){
			$month= isset($_GET['month']) ? $_GET['month'] : $month;
			$year= isset($_GET['year']) ? $_GET['year'] : $year;
			$pageIndex = isset($_GET['page']) ? $_GET['page'] : $pageIndex;
		}
	
		$rowPerPage = 3;
		$monthlyExpenses = (array)$this->model->getExpenses($month, $year, ($pageIndex-1)*$rowPerPage, $rowPerPage);
		$totalMonthlyExpenses = (array)$this->model->getExpenses($month, $year, -1, 0);
		$countExpenses = count($totalMonthlyExpenses);
		$pages = ceil($countExpenses / $rowPerPage);
		
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/expense/expenses-list.php';
    }
    /**
     * ACTION: expense List Navigation
     */
	public function expensesNav()
    {
		$currentMonth=date('m');
		$currentYear=date('Y');
		$rowPerPage = 3;
		$monthlyExpenses = (array)$this->model->getExpenses($currentMonth, $currentYear,0,$rowPerPage);
		$countExpenses = count($monthlyExpenses);
		$pages = ceil($countExpenses / $rowPerPage) + 1;
		
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/expense/expenses-list.php';
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