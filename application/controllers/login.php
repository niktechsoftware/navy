<?php
class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('adminmodel');
	}
	public function index()
	{
		$data['dt_exam'] = $this->adminmodel->exam_name();
		$data['dt_subject'] = $this->adminmodel->subject_name();
		$data['dt_test'] = $this->adminmodel->test_data();
		$data['pageTitle'] = 'Admin Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Dashboard';
		$data['subPage'] = 'dashboard';
		$data['title'] = 'Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'exam/dashboard';
		$this->load->view("includes/mainContent", $data);
	}
}