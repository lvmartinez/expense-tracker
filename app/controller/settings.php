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
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/settings/index.php';

    }
	
	/**
     * ACTION: getLatestExpense
     *      */
    public function getLatestExpense()
    {	
		return (array)$this->model->getLatestExpenses();
    }
}