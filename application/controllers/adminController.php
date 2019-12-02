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
		$data['gt_val'] = $this->adminmodel->exam_name();
		$data['dt_subject'] = $this->adminmodel->subject_name();
		$data['dt_test'] = $this->adminmodel->test_data();
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
	public function delete_exam()
	{
		$exam_id = $this->input->post('exam_id');
		$chk = $this->adminmodel->delete_exam($exam_id);
		if($chk)
		{
			echo "1";
		}
		else
		{
			echo "0";
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
	public function delete_subject()
	{
		$sub_id = $this->input->post('sub_id');
		$chk = $this->adminmodel->delete_subject($sub_id);
		if($chk)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function create_test()
	{
		$exam_id = $this->input->post('exam_n');
		$test_name = $this->input->post('test_n');
		$wh_val = array('exam_master_id'=>$exam_id,
						'exam_name'=>$test_name);
		$this->db->where($wh_val);
		$chk = $this->db->get('exam_name');
		if($chk->num_rows()>0)
		{
			echo "3";
		}
		else
		{
			$in_test = $this->adminmodel->create_test($test_name,$exam_id);
			if($in_test)
			{
				echo " 1";
			}
			else
			{
				echo "0";
			}
		}
	}
	public function delete_test()
	{
		$test_id = $this->input->post('test_id');
		$chk = $this->adminmodel->delete_test($test_id);
		if($chk)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	function config_test()
	{
		$data['gt_val'] = $this->adminmodel->exam_name();
		$data['dt_subject'] = $this->adminmodel->subject_name();
		$data['dt_test'] = $this->adminmodel->test_data();
	    $data['pageTitle'] = 'Configuration Test';
		$data['smallTitle'] = 'Configuration Test';
		$data['mainPage'] = 'Configuration Test';
		$data['subPage'] = 'Configuration Test';
		$data['title'] = 'Configuration Test Page';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'exam/config_test';
		$this->load->view("includes/mainContent", $data);
	    
	}
	public function select_exam()
	{
		$exam_id = $this->input->post('exam_n');
		$da = $this->adminmodel->select_exam_data($exam_id);
		foreach($da->result() as $dx)
		{ ?>
			<option value="<?= $dx->id;?>"><?= $dx->exam_name;?></option>
		<?php }
	}
	function create_ques()
	{
		$select_exam = $this->input->post('select_exam');
		$select_test = $this->input->post('select_test');
		$select_subject = $this->input->post('select_subject');

		$data['dt_qt'] = $this->adminmodel->question_data($select_exam,$select_test,$select_subject);

		$data['q_nmbr'] = $this->input->post('q_nmbr');
		$data['select_exam'] = $select_exam;
		$data['select_test'] = $select_test;
		$data['select_subject'] = $select_subject;
	    $data['pageTitle'] = 'Configuration Test';
		$data['smallTitle'] = 'Configuration Test';
		$data['mainPage'] = 'Configuration Test';
		$data['subPage'] = 'Configuration Test';
		$data['title'] = 'Configuration Test Page';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'exam/create_ques';
		$this->load->view("includes/mainContent", $data);	    
	}
	function insert_question()
	{

		 $ques = $this->input->post('ques');
		 $ans = $this->input->post('ans');
		 $a = $this->input->post('a');
		 $b = $this->input->post('b');
		 $c = $this->input->post('c');
		 $d = $this->input->post('d');
		 $e = $this->input->post('e');
		 $exam_subject_id = $this->input->post('exam_subject_id');
		 $exam_name_id = $this->input->post('exam_name_id');
		 $exam_master_id = $this->input->post('exam_master_id');
		 $wh_val = array(
			'question'=>$ques,
			'exam_name_id'=>$exam_name_id,
			'exam_subject_id'=>$exam_subject_id,
			'exam_master_id'=>$exam_master_id);
			$this->db->where($wh_val);
			$chk = $this->db->get('question_master');
			if($chk->num_rows()>0)
			{
				echo "3";
			}
			else
			{
				$da = $this->adminmodel->insert_ques($ques,$exam_name_id,$exam_subject_id,$exam_master_id,$ans,$a,$b,$c,$d,$e);
				if($da)
				{
					echo "1";
				}
				else
				{
					echo "0";
				}
			}
		
	}
	function delete_q()
	{
		$q_id = $this->input->post('ques_id');
		$chk = $this->adminmodel->delete_q($q_id);
		if($chk)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	function edit_q()
	{
		$q_id = $this->uri->segment(3);

		$data['q_dt'] = $this->adminmodel->edit_q($q_id);
		$data['q_op'] = $this->adminmodel->ques_op($q_id);
		// $data['select_exam'] = $select_exam;
		// $data['select_test'] = $select_test;
		// $data['select_subject'] = $select_subject;
	    $data['pageTitle'] = 'Configuration Test';
		$data['smallTitle'] = 'Configuration Test';
		$data['mainPage'] = 'Configuration Test';
		$data['subPage'] = 'Configuration Test';
		$data['title'] = 'Configuration Test Page';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'exam/edit_ques';
		$this->load->view("includes/mainContent", $data);	

	}
	function update_exam()
	{
		$exam_id = $this->input->post('exam_id');
		$exam_n = $this->input->post('exam_n');
		$chk = $this->adminmodel->update_exam($exam_id,$exam_n);
		if($chk)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	function update_sub()
	{
		$sub_id = $this->input->post('sub_id');
		$sub_n = $this->input->post('sub_n');
		$chk = $this->adminmodel->update_sub($sub_id,$sub_n);
		if($chk)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
}
?>