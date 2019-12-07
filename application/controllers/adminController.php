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
		$data['dt_lang'] = $this->adminmodel->language();
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
		$lang_id = $this->input->post('lang_n');
		$test_name = $this->input->post('test_n');
		$wh_val = array('exam_master_id'=>$exam_id,
						'test_language_id'=>$lang_id,
						'exam_name'=>$test_name);
		$this->db->where($wh_val);
		$chk = $this->db->get('exam_name');
		if($chk->num_rows()>0)
		{
			echo "3";
		}
		else
		{
			$in_test = $this->adminmodel->create_test($test_name,$exam_id,$lang_id);
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
		$data['dt_lang'] = $this->adminmodel->language();
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
		$lang_id = $this->input->post('lang_n');
		$da = $this->adminmodel->select_exam_data($exam_id,$lang_id);
		if($da->num_rows()>0)
		{
			foreach($da->result() as $dx)
			{ ?>
				<option value="<?= $dx->id;?>"><?= $dx->exam_name;?></option>
			<?php }
		}
		else
		{
			?>
			<option><b style="font-color:red;">Test Not Found</b></option>
		<?php
		}
	}
	function create_ques()
	{
		$lang_id = $this->input->post('select_lang');
		$select_exam = $this->input->post('select_exam');
		$select_test = $this->input->post('select_test');
		$select_subject = $this->input->post('select_subject');
				$data['dt_qt'] = $this->adminmodel->question_data($select_exam,$select_test,$select_subject);

				$data['language'] = $this->adminmodel->select_language($lang_id);
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
	function update_tst()
	{
		$test_id = $this->input->post('tesst_id');
		$test_n = $this->input->post('test_n');
		$chk = $this->adminmodel->update_test($test_id,$test_n);
		if($chk)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	function update_question()
	{
		$ques = $this->input->post("ques");
		$a = $this->input->post("a");
		$b = $this->input->post("b");
		$c = $this->input->post("c");
		$d = $this->input->post("d");
		$e = $this->input->post("e");
		$ans = $this->input->post("ans");
		$q_id = $this->input->post("q_id");
		$chk = $this->adminmodel->update_ques($ques,$q_id,$ans,$a,$b,$c,$d,$e);
		if($chk)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	function question()
	{
		$data['pageTitle'] = 'Configuration Test';
		$data['smallTitle'] = 'Configuration Test';
		$data['mainPage'] = 'Configuration Test';
		$data['subPage'] = 'Configuration Test';
		$data['title'] = 'Configuration Test Page';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'exam/question';
		$this->load->view("includes/mainContent", $data);	
	}
	function new_ques()
	{
		$sel_ct = $this->input->post("sel_ct");
		$exam_subject_id = $this->input->post('exam_subject_id');
		$exam_name_id = $this->input->post('exam_test_id');
		$exam_master_id = $this->input->post('exam_master_id');
		if($sel_ct != 0)
		{
			$ques = $this->input->post("ques1");
			$op_txt1 = $this->input->post("txt_af1");
			$op_txt2 = $this->input->post("txt_af2");
			$op_txt3 = $this->input->post("txt_af3");
			$op_txt4 = $this->input->post("txt_af4");
			$op_txt5 = $this->input->post("txt_af5");
			$qf1 = $_FILES['qf1']['name'];
			$qf2 = $_FILES['qf2']['name'];
			$qf3 = $_FILES['qf3']['name'];
			$qf4 = $_FILES['qf4']['name'];
			$af1 = $_FILES['af1']['name'];
			$af2 = $_FILES['af2']['name'];
			$af3 = $_FILES['af3']['name'];
			$af4 = $_FILES['af4']['name'];
			$af5 = $_FILES['af5']['name'];
			
			switch($sel_ct)
			{
				case 1:
				$ans = 'A';
				break;
				case 2:
				$ans = 'B';
				break;
				case 3:
				$ans = 'C';
				break;
				case 4:
				$ans = 'D';
				break;
				case 5:
				$ans = 'E';
				break;
			}
			
			for($i=1;$i<=4;$i++)
			{
				$image_path = realpath(APPPATH . '../assets/images/question_img');
				$photo_name = str_replace(' ','',$_FILES['qf'.$i]['name']);
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['file_name'] = $photo_name;
				
				if (!empty($_FILES['qf'.$i]['name']))
				{
					$this->upload->initialize($config);
					if($this->upload->do_upload('qf'.$i)) 
					{
						// echo "Image Uploaded Successfully";
					}
					else
					{
						redirect('adminController/create_ques/3');
					}				
				}
			}
			for($i=1;$i<=5;$i++)
			{
				$image_path = realpath(APPPATH . '../assets/images/question_img');
				$photo_name = str_replace(' ','',$_FILES['af'.$i]['name']);
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['file_name'] = $photo_name;
				
				if (!empty($_FILES['af'.$i]['name']))
				{
					$this->upload->initialize($config);
					if($this->upload->do_upload('af'.$i)) 
					{
						// echo "Image Uploaded Successfully";
					}
					else
					{
						redirect('adminController/create_ques/3');
					}				
				}
			}
			$chk = $this->adminmodel->insert_img_question($ques,$exam_name_id,$exam_subject_id,$exam_master_id,$qf1,$qf2,$qf3,$qf4,$af1,$af2,$af3,$af4,$af5,$ans,$op_txt1,$op_txt2,$op_txt3,$op_txt4,$op_txt5);
			if($chk)
			{
				redirect('adminController/create_ques/1');
			}
			else 
			{
				redirect('adminController/create_ques/2');
			}
		}
		else
		{
			redirect('adminController/create_ques/0');
		}
		
	}
	function img_questions()
	{
		$data['pageTitle'] = 'Configuration Test';
		$data['smallTitle'] = 'Configuration Test';
		$data['mainPage'] = 'Configuration Test';
		$data['subPage'] = 'Configuration Test';
		$data['title'] = 'Configuration Test Page';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'exam/img_questions';
		$this->load->view("includes/mainContent", $data);	
	}
}
?>