<?php
/**
* Class Settings
*
*
* Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
* This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
*
*/
class Settings extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
		$expensesCategories = (array)$this->model->getExpensesCategories();
		$latestExpenses = (array)$this->model->getLatestExpenses();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/settings/index.php';

    }
	
	/**
     * ACTION: addCategory
     * This method handles what happens when you move to /dashboard/addExpense
     */
    public function addCategory()
    {
        if (isset($_POST)) {
            $this->model->addCategory('expense_category', $_POST);
        }
        header('location: ' . URL . 'settings/index');
    }
}