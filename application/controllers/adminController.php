<?php
Class AdminController extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model('adminmodel');
	
	}
	function is_login()
	{
		if($this->session->userdata('login_type')!=1)
		{  
			 // if user not validate the credential ....
			 redirect("welcome/index/authFalse");
		}
	}
	function create_exam()
	{
	    $data['pageTitle'] = 'Configuration Exam';
		$data['smallTitle'] = 'Configuration Exam';
		$data['mainPage'] = 'Configuration Exam';
		$data['subPage'] = 'Configuration Exam';
		$data['title'] = 'Configuration Exam Page';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'exam/create_exam';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function insert_exam()
	{
		echo $e_name = $this->input->post('e_name');
		// $in = $this->exam_m->insert_exam($e_name);
		// if($in)
		// {
		// 	echo "yes";
		// }
		// else
		// {
		// 	echo "no";
		// }
	}
}
?>