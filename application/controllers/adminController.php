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
		$this->load->model('adminmodel');
		$data['gt_val'] = $this->adminmodel->exam_name();
		$data['dt_subject'] = $this->adminmodel->subject_name();
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

	public function insert_exam()
	{
		$e_name = $this->input->post('e_name');
		$this->db->where('name',$e_name);
		$chk = $this->db->get('exam_master');
		if($chk->num_rows()>0)
		{
			echo "3";
		}
		else
		{
			$in = $this->adminmodel->insert_exam($e_name);
			if($in)
			{
				echo " 1";
			}
			else
			{
				echo "0";
			}
		}		
	}
	public function insert_subject()
	{
		$sub_ject = $this->input->post('sub_ject');
		$this->db->where('subject_name',$sub_ject);
		$chk = $this->db->get('exam_subjects');
		if($chk->num_rows()>0)
		{
			echo "3";
		}
		else
		{
			$in_sub = $this->adminmodel->insert_subject($sub_ject);
			if($in_sub)
			{
				echo " 1";
			}
			else
			{
				echo "0";
			}
		}
	}
}
?>