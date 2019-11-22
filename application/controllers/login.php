<?php
class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$data['pageTitle'] = 'Admin Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Dashboard';
		$data['subPage'] = 'dashboard';

		$data['title'] = 'Dashboard';

		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'exam/create_exam';
		$this->load->view("includes/mainContent", $data);
	}
}