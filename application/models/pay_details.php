<?php 
    class pay_details extends CI_Model{
        function checkStatus($cid){
           $this->db->where("c_id",$cid);
			$maxid=$this->db->get("pay_details");
			if($maxid->num_rows()>0){
				return $maxid;
			}else{
				return false; 
			}
        }
        
        function totwallet($cid){
             $silver= $this->cmodel->getSilver($cid);
                                                if($silver->num_rows()>0){
												 $silver1 =  $silver->row()->amount;
											   }else{
												   $silver1=0;
											   }
                                               $direct= $this->cmodel->getDirect($cid);
                                               if($direct->num_rows()>0){
												 $direct1 =  $direct->row()->amount;
											   }else{
												   $direct1=0;
											   }
                                               $auto_pool= $this->cmodel->getAutoPool($cid);
                                              if($auto_pool->num_rows()>0){
												 $auto_pool1 =  $auto_pool->row()->pool_income;
											   }else{
												   $auto_pool1=0;
											   }
                                                $auto_roi= $this->cmodel->getAutoPool($cid);
                                              if($auto_roi->num_rows()>0){
												 $auto_roi1 =  $auto_roi->row()->roi_income;
											   }else{
												   $auto_roi1=0;
											   }
											   
											   
											    $this->db->select_sum("amount");
											   $this->db->where("paid_from",$cid);
											   $this->db->where("debit_credit",0);
                                               $outeramount = $this->db->get("outer_daybook"); 
                                               
                                                $this->db->select_sum("amount");
											   $this->db->where("paid_to",$cid);
											   $this->db->where("debit_credit",1);
											    $this->db->where("reason","admintax");
                                               $taxt = $this->db->get("outer_daybook"); 
                                               
                                               
                                              if($outeramount->num_rows()>0){
												 $outamt =  $outeramount->row()->amount;
											
												 $out=$outamt*10;
												$outamt1=$out/100;
											
										    	$outeramount1=	$outamt+$taxt->row()->amount;
										    	
										    	
											   }else{
												   $outeramount1=0;
											   }
                                          
											 $totmbal=  $silver1 + $direct1 +$auto_pool1 +$auto_roi1;
											 $totmb = $totmbal-$outeramount1;
											 
											 return $totmb;
        }
        
    }
?>