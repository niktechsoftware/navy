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
	}
    
    ?>