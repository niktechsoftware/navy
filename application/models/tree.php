<?php 
    class tree extends CI_Model{
        
        
    	public function selectlegleft($data1){
    	
    		$this->db->where("c_id", $data1);
    		$rowdata = $this->db->get("silver_tree")->row();
    		if ($rowdata) {
    	
    			if ($rowdata->left) {
    				$returndata= $this->selectlegleft($rowdata->left);
    			} else {
    				$returndata= $rowdata->c_id;
    	
    			}
    
    			return $returndata;
    	
    		}
    	
    	}
    	
    	public function getPair($table,$cid){
    		$this->db->where("c_id",$cid);
    		$pair = $this->db->get($table);
    		return $pair;
    		
    	}
    	
    	public function update($table,$data,$cid){
    		$this->db->where("c_id",$cid);
    		$this->db->update($table,$data);
    		return true;
    	}
    	public function insert($table,$data){
    		$this->db->insert($table,$data);
    		return true;
    	}
    	
    	public function selectlegright($data1){
    		// $returndata = array();
    	
    		$this->db->where("c_id", $data1);
    		$rowdata = $this->db->get("silver_tree")->row();
    		if ($rowdata) {
    			if ($rowdata->right) {
    				$returndata= $this->selectlegright($rowdata->right);
    			} else {
    				$returndata = $rowdata->c_id;
    			}
    			return $returndata;
    		}
    	}
    	
    	public function position($data, $id ,$po)
    	{
    			$this->db->where("c_id", $id);
    			$fty =$this->db->get("silver_tree")->row();
     		$dt2=	$data[$po];
    	
    
    			if(!$fty->$po){
    			  
    				$this->db->where("c_id", $id);
    				$this->db->update("silver_tree", $data);
    			$datainsert = array(
    					"c_id"=>$data[$po]
    			);
    			$this->db->insert("silver_tree",$datainsert);
    			$this->db->insert("silver_mbalance",$datainsert);
    			}
    			return true;
    	}
    	
    	
    function mydownline($id,$pos,$table,$tabv){
    	if($tabv==1){
    $this->db->where($pos, $id);
    $dt= $this->db->get($table);
    return $dt;
    	}
    }
   
    
   public function getLeftCountData($cid,$count,$tablename){
       
        $this->db->where('c_id', $cid);
        $leftjoiner = $this->db->get($tablename);
        if($leftjoiner->num_rows()>0){
           
            $query2=$leftjoiner->row();
                
                if($query2->left){
                    $this->db->where("id", $query2->left);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1->status){
                        $count=$count+1;

                        //echo $query2->root_left."<br>";
                    }
                    $left=$query2->left;
                   

                    $count = $this->getLeftCountData($left,$count,$tablename);
                    
                    //$this->db->where("id", $right);
                    //$cid = $this->db->get("customer_info")->row();
                    
                }
                if($query2->right){

                    $this->db->where("id", $query2->right);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1->status){
                        $count=$count+1;

                        //echo $query2->root_right."<br>";

                    }
                    
                    $right=$query2->right;
                   
                    //$count=$count+1;
                    $count = $this->getLeftCountData($right,$count,$tablename);
                    
                }
            
            //if($rightjoiner->num_rows()>0){
            //foreach ($rightjoiner->result() as $query2)
            //{
            // $right=$query2->root;
            //$this->getRightData($right);
            //$this->db->where("id", $right);
            //$cid = $this->db->get("customer_info")->row();
            
        }
        return $count;
    }
    
    public function getRightData($cid,$count){
       
        $this->db->where('c_id', $cid);
        $leftjoiner = $this->db->get('silver_tree');
         $this->db->where("id", $cid);
                    $dataorg = $this->db->get("customer_info")->row();
        
        if($leftjoiner->num_rows()>0){
            foreach ($leftjoiner->result() as $query2)
            {
               
                if($query2->right){
                   
                    $this->db->where("id", $query2->right);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1){
                          if($data1->status==1){ $status= "Active";}else{$status="Inactive";}
                       /* echo $data1->username."[".$data1->customer_name."]<br>";
						echo $data1->joining_date."[".$data1->mobilenumber."]<br>";
						echo $data1->amount."[".$data1->position."]<br>";*/
						echo 	"<tr >
						
								 <td>". $data1->customer_name. "[".$data1->username."]"."</td>
								 <td>". $dataorg->customer_name. "[".$dataorg->username."]"."</td>
								  <td>".$count."</td>
								  <td>". $status."</td>
								   <td>". $data1->active_date."</td>
								
							</tr>
							";
                    }
                    $right=$query2->right;
                    $this->getRightData($right,$count);
                    
                }
                 if($query2->left){
                    
                    $this->db->where("id", $query2->left);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1){
                        if($data1->status==1){ $status= "Active";}else{$status="Inactive";}
						echo 	"<tr>
						
								 <td>". $data1->customer_name. "[".$data1->username."]"."</td>
								 <td>". $dataorg->customer_name. "[".$dataorg->username."]"."</td>
								  <td>".$count."</td>
								  <td>". $status."</td>
								   <td>". $data1->active_date."</td>
								
							</tr>
							";
                    }
                    $right=$query2->left;
                   $this->getLeftData($right,$count);
                 }
            }
        }
          
        
    }
    
    public function getLeftData($cid,$count){
       
        $this->db->where('c_id', $cid);
        $leftjoiner = $this->db->get('silver_tree');
         $this->db->where("id", $cid);
                    $dataorg = $this->db->get("customer_info")->row();
        
        
        if($leftjoiner->num_rows()>0){
            foreach ($leftjoiner->result() as $query2)
            {
                
                if($query2->left){
                  
                    $this->db->where("id", $query2->left);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1){
                        if($data1->status==1){ $status= "Active";}else{$status="Inactive";}
						echo 	"<tr>
						
								 <td>". $data1->customer_name. "[".$data1->username."]"."</td>
								 <td>". $dataorg->customer_name. "[".$dataorg->username."]"."</td>
								  <td>".$count."</td>
								  <td>". $status."</td>
								   <td>". $data1->active_date."</td>
								
							</tr>
							";
                    }
                    $right=$query2->left;
                   $this->getLeftData($right,$count);
                  
                    
                }
                 if($query2->right){
                    
                    $this->db->where("id", $query2->right);
                    $data1 = $this->db->get("customer_info")->row();
                    if($data1){
                        if($data1->status==1){ $status= "Active";}else{$status="Inactive";}
                        
                       /* echo $data1->username."[".$data1->customer_name."]<br>";
						echo $data1->joining_date."[".$data1->mobilenumber."]<br>";
						echo $data1->amount."[".$data1->position."]<br>";*/
					
							echo 	"<tr>
						
								 <td>". $data1->customer_name. "[".$data1->username."]"."</td>
								 <td>". $dataorg->customer_name. "[".$dataorg->username."]"."</td>
								  <td>".$count."</td>
								  <td>". $status."</td>
								 <td>". $data1->active_date."</td>
							</tr>";
                    }
                    $right=$query2->right;
                    $this->getRightData($right,$count);
                    
                }
            }
          
            
        }
    }

    
    
    }
?>