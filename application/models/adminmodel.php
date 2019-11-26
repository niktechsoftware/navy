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
	}
    
    ?>