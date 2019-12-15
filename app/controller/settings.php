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
		$id=''; $category = array(); $name=''; $description=''; $budget=0;
		
		if(isset($_GET['cat'])){
			
			$id = $_GET['cat'];
			$category = (array)$this->model->getExpensesCategories($id);
			$name = $category[0]->name; 
			$description = $category[0]->description;
			$budget = $category[0]->budget;
			$budget = round((float)$budget, 2);
		}
		
		$expensesCategories = (array)$this->model->getExpensesCategories();
		$latestExpenses = (array)$this->model->getLatestExpenses();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/settings/index.php';

    }
	
	/**
     * ACTION: processCategory
     * 
     */
	public function processCategory(){
		
        if (isset($_POST)) {
			if ( isset($_POST['id']) && ( $_POST['id'] != '') ) {
				
				$this->updateCategory($_POST);
			
			}else{
				unset($_POST['id']);
				$this->addCategory($_POST);
			}
        }
        header('location: ' . URL . 'settings/index');
    }
	
	/**
     * ACTION: addCategory
     * 
     */
    private function addCategory($data)
    {
        if (isset($_POST)) {
            $this->model->addCategory('expense_category', $data);
        }
    }
	
	/**
     * ACTION: updateCategory
     * 
     */
	private function updateCategory($data)
    {
        if (isset($_POST)) {
			$id = $data['id'];
			$where = " where id = $id";
			$result = $this->model->updateCategory('expense_category', $data, $where);
		}
	}
}