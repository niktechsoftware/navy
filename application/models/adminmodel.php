<?php 
	class Adminmodel extends CI_Model
	{
		function getrecord()
		{
        	$record = $this->db->get("general_settings");
        	return $record;
	    }
	     	
		 function updateAdminPassword($data)
		 {
			if($this->db->update("general_settings",$data)){
				return true;
			}
			else{
				return false;
			}
		}
	
		public function insert_exam($e_name)
		{
			$val = array('name'=>$e_name);
			return $in_sert = $this->db->insert('exam_master',$val);    
		}
		public function exam_name()
		{
			 $gt = $this->db->get('exam_master');
			 return $gt;
		}
		public function insert_subject($sub_ject)
		{
			$val = array('subject_name'=>$sub_ject);
			return $in_sub = $this->db->insert('exam_subjects',$val);    
		}
		public function subject_name()
		{
			 $gt_sub = $this->db->get('exam_subjects');
			 return $gt_sub;
		}
		public function create_test($test_name,$exam_id)
		{
			$val = array('exam_master_id'=>$exam_id,
						'exam_name'=>$test_name);
			$cr_test = $this->db->insert('exam_name',$val);
			return $cr_test;
		}
		public function test_data()
		{
			 $gt_ex_nm = $this->db->get('exam_name');
			 return $gt_ex_nm;
		}
		public function question_data($select_exam,$select_test,$select_subject)
		{
			$this->db->where('exam_subject_id',$select_subject);
			$this->db->where('exam_name_id',$select_test);
			$this->db->where('exam_master_id',$select_exam);
			$dx_q = $this->db->get('question_master');
			return $dx_q;
		}
		public function select_exam_data($exam_id)
		{
			$this->db->where('exam_master_id',$exam_id);
			$this->db->group_by('exam_name');
			$st_dt = $this->db->get('exam_name');
			return $st_dt;
		}
		public function insert_ques($ques,$exam_name_id,$exam_subject_id,$exam_master_id,$ans,$a,$b,$c,$d,$e)
		{
			$val1 = array(
				'question'=>$ques,
				'exam_name_id'=>$exam_name_id,
				'exam_subject_id'=>$exam_subject_id,
				'exam_master_id'=>$exam_master_id );
			$in_q1 = $this->db->insert('question_master',$val1);
			if($in_q1)
			{
				$tt=$this->db->insert_id();
				$val2 = array(
					'question_master_id'=>$tt,
					'A'=>$a,
					'B'=>$b,
					'C'=>$c,
					'D'=>$d,
					'E'=>$e);
				$in_q2 = $this->db->insert('question_ans',$val2);
				if($in_q2)
				{
					$val3 = array(
						'question_master_id'=>$tt,
						'right_answer'=>$ans,
						);
					$in_q3 = $this->db->insert('right_ans',$val3);
					return $in_q3;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 0;
			}
		}
		function delete_q($q_id)
		{
			$this->db->where('id',$q_id);
			$dlt = $this->db->delete('question_master');
			return $dlt;
		}
		function edit_q($q_id)
		{
			$this->db->where('id',$q_id);
			return $q = $this->db->get('question_master');
		}
		function ques_op($q_id)
		{
			$this->db->where('question_master_id',$q_id);
			return $op = $this->db->get('question_ans');
		}
		function delete_exam($exam_id)
		{
			$this->db->where('id',$exam_id);
			return $dlt = $this->db->delete('exam_master');
		}
		function delete_subject($sub_id)
		{
			$this->db->where('id',$sub_id);
			return $dlt = $this->db->delete('exam_subjects');
		}
		function delete_test($test_id)
		{
			$this->db->where('id',$test_id);
			return $dlt = $this->db->delete('exam_name');
		}
		function update_exam($exam_id,$exam_n)
		{
			$val = array('name'=>$exam_n);
			$this->db->where('id',$exam_id);
			return $updt = $this->db->update('exam_master',$val); 
		}
		function update_sub($sub_id,$sub_n)
		{
			$val = array('subject_name'=>$sub_n);
			$this->db->where('id',$sub_id);
			return $updt = $this->db->update('exam_subjects',$val); 
		}
		function update_test($test_id,$test_n)
		{
			$val = array('exam_name'=>$test_n);
			$this->db->where('id',$test_id);
			return $updt = $this->db->update('exam_name',$val); 
		}
		function update_ques($ques,$q_id,$ans,$a,$b,$c,$d,$e)
		{
			$val1 = array('question'=>$ques);
			$this->db->where('id',$q_id);
			$up_q1 = $this->db->update('question_master',$val1);
			if($up_q1)
			{
				$val2 = array(
					'A'=>$a,
					'B'=>$b,
					'C'=>$c,
					'D'=>$d,
					'E'=>$e);
				$this->db->where('question_master_id',$q_id);
				$up_q2 = $this->db->update('question_ans',$val2);
				if($up_q2)
				{
					$val3 = array('right_answer'=>$ans);
					$this->db->where('question_master_id',$q_id);
					$up_q3 = $this->db->update('right_ans',$val3);
					return $up_q3;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 0;
			}
		}
		function insert_img_question($ques,$qf1,$qf2,$qf3,$qf4,$af1,$af2,$af3,$af4,$af5,$ans)
		{
			$val = array('question'=>$ques,
						'q_img1'=>$qf1,
						'q_img2'=>$qf2,
						'q_img3'=>$qf3,
						'q_img4'=>$qf4,
						'q_ans_img1'=>$af1,
						'q_ans_img2'=>$af2,
						'q_ans_img3'=>$af3,
						'q_ans_img4'=>$af4,
						'q_ans_img5'=>$af5,
						'right_answer'=>$ans
						);
			return $in_q = $this->db->insert('question_images',$val);
		}
	}
    
    ?>