<?php 

/**
 * Home Page Controller
 * @category  Controller
 */
class FinanceController extends SecureController{
	/**
     * Index Action
     * @return View
     */
	function index(){
		
		$this->render_view("home/finance.php" , null , "main_layout.php");

	}
}
