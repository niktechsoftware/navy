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

	}
    
    ?>