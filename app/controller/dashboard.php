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
		$year= date('Y'); $totalExpense = 0; $expenseCat = array(); $totalOver=0;
		$months= ['Jan'=>0, 'Feb'=>0, 'Mar'=>0, 'Apr'=>0, 'May'=>0, 'Jun'=>0, 'Jul'=>0, 'Aug'=>0, 'Sep'=>0, 'Oct'=>0, 'Nov'=>0, 'Dec'=>0];
		
		if ( isset($_GET) && ($_GET !='') ){
			$year= isset($_GET['year']) ? $_GET['year'] : $year;
		}
		
		$monthlyExpensesSum = (array)$this->model->getExpensesSum('', $year, -1, 0, 'date ASC', 'month, name');
		$latestExpenses = $this->getLatestExpense();
		
		foreach ($monthlyExpensesSum as $value){ 
			$months[$value->month] += (float)$value->total;
			$totalExpense += (float)$value->total;
			if ( !isset($expenseCat[$value->name][$value->budget])){
				$expenseCat[$value->name][$value->budget] = (float)$value->total;
			}else{
				$expenseCat[$value->name][$value->budget] += (float)$value->total;
			}
		
		}
		
		$xaxis = "['".implode("','",array_keys($months))."']";
		$data = "[".implode(",",array_values($months))."]";
        	
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
		$latestExpenses = $this->getLatestExpense();
		
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
		$latestExpenses = $this->getLatestExpense();
		
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
	
	/**
     * ACTION: getLatestExpense
     *      */
    public function getLatestExpense()
    {	
		return (array)$this->model->getLatestExpenses();
    }
    

}