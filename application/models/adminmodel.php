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
			//$this->db->where("school_code",$this->session->userdata("school_code"));
			if($this->db->update("general_settings",$data)){
				return true;
			}
			else{
				return false;
			}
		}
	
		function insert_exam($e_name)
		{
			return $this->db->insert('exam_master',$e_name);    
		}
   

	}
    
    ?>