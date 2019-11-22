<?php 
class cronjobc extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model("tree");
		$this->load->model('cmodel');
		$this->load->model("mpinmodel");
	}
	
    function directIncome($cid){
    	$lefttotal=0;
    	$righttotal=0;
    	echo $cid," = Record of <br>";
    	$table="silver_tree";
    	$posl="leftjoiner";
    	//$this->db->where("leftjoiner",$cid);
        //$directleft=	$this->db->get("silver_tree");
        	$directleft= $this->db->query("select * from silver_tree join customer_info where customer_info.status=1 and silver_tree.leftjoiner='$cid' AND customer_info.id=silver_tree.left");
	
    	$leftjoin = $directleft->num_rows();
    	$posr="rightjoiner";
    	echo $leftjoin."=left-";
    //	$this->db->where("rightjoiner",$cid);
    	$rightjoin= $this->db->query("select * from silver_tree join customer_info where customer_info.status=1 and silver_tree.rightjoiner='$cid' AND customer_info.id=silver_tree.right")->num_rows();
		
          
    //	$rightjoin = $this->db->get("silver_tree")->num_rows();
    	echo $rightjoin."right<br>";
    	
    	
    	$this->db->where("c_id",$cid);
    	$getdirect=$this->db->get("direct_income");
    	$tblnm="invoice_serial";
    	$maxid=$this->mpinmodel->pin_max($tblnm)+1;
    	$id1=1000+$maxid;
    	$invoice_number="ADLI".$id1;
    	
    	if($getdirect->num_rows()>0){
    		$olddirp = $getdirect->row()->pair;
    		$newp=($rightjoin+$leftjoin)-$olddirp;
    		if($newp > 0){
    		$datadd = array(
    				'c_id'=>$cid,
    				'pair'=>	($rightjoin+$leftjoin),
    				'amount'=>($rightjoin+$leftjoin)*100
    		);
    		$this->db->where("c_id",$cid);
    		$this->db->update("direct_income",$datadd);
    		$daybookdirect = array(
    				"invoice_no"    =>$invoice_number,
    				"paid_to"	        =>$cid,
    				"paid_from"     =>"ADLAdmin",
    				"transaction_type"=>7,
    				"date1"         =>date('Y-m-d H:i:s'),
    				"amount"           =>$newp*100
    		);
    		$this->db->insert("inner_daybook",$daybookdirect);
    		
    			$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"Direct Income",
			"invoice_date"=>date('Y-m-d H:i:s')
		);
		$this->db->insert("invoice_serial",$invoice);
    		}
    	}else{
    	    if(($rightjoin+$leftjoin) > 0){
    		$datadd = array(
    			'c_id'=>$cid,
    				'pair'=>	($rightjoin+$leftjoin),
    				'amount'=>($rightjoin+$leftjoin)*100
    		);
    		$this->db->insert("direct_income",$datadd);
    		$daybookdirect = array(
    				"invoice_no"    =>$invoice_number,
    				"paid_to"	        =>$cid,
    				"paid_from"     =>"ADL Admin",
    				"transaction_type"=>7,
    				"date1"         =>date('Y-m-d H:i:s'),
    				"amount"           =>($rightjoin+$leftjoin)*100
    		);
    		$this->db->insert("inner_daybook",$daybookdirect);
    			$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"Direct Income",
			"invoice_date"=>date('Y-m-d H:i:s')
		);
		$this->db->insert("invoice_serial",$invoice);
    	}
    	}
    	
    }
    function pairMachingIncome($cid){
        
         echo "<br>pair maching of ".$cid."<br>";
       
        $pair=0;

        $co=0;
        $count1=0;
        $cor=0;
       $lefttotal=0;
       $righttotal=0;
       $table="silver_tree";
       $posl="leftjoiner";
       //count left and right
      $this->db->where('c_id', $cid);
       $query2 = $this->db->get('silver_tree');
       if($query2->num_rows()>0){
            $query2=$query2->row();
            
            
       if($query2->left){
           $this->db->where("id",$query2->left);
           $data1 = $this->db->get("customer_info")->row();
           if($data1->status){
               $co=$co+1;

               //echo $query2->right;

           }
        $lefttotal =$this->tree->getLeftCountData($query2->left,$co,$table);
       }
       
      
       if($query2->right){
           $this->db->where("id",$query2->right);
           $data1 = $this->db->get("customer_info")->row();
           if($data1->status){
               $cor=$cor+1;
              // echo $query2->right;
           }
           
           $righttotal =$this->tree->getLeftCountData($query2->right,$cor,$table);
       }
       }
       echo "left=".$lefttotal."<br>";
       echo "right=".$righttotal."<br>";
      $leftjoin= $lefttotal;
      $rightjoin= $righttotal;
      //invoice code
      	$tblnm="invoice_serial";
		$maxid=$this->mpinmodel->pin_max($tblnm)+1;
		$id1=1000+$maxid;
		$invoice_number="ADLI".$id1;
		//end invoice code
		
        if($rightjoin==$leftjoin){
            $pair=$leftjoin;
          
        }else{
            if($rightjoin > $leftjoin){
             $pair=$leftjoin;
        }else{
            $pair=$rightjoin;
        }}
        echo "<br>pair =".$pair;
        $cps = 	$this->tree->getPair("pair_caping",$cid);
       $getoldPair =  $this->tree->getPair("silver_mbalance",$cid);
       if($getoldPair->num_rows()>0){
       	
       }else{
       	$silverentry=array(
       			"c_id"=>$cid,
       			"pair"=>0,
       			"amount"=>0
       	);
       	$this->tree->insert("silver_mbalance",$silverentry);
       	$getoldPair =  $this->tree->getPair("silver_mbalance",$cid);
       }
       if($cps->num_rows()>0){
       $rewardPair = ($pair-($getoldPair->row()->pair+$cps->row()->pair));
       }else{
       	
       	$rewardPair = ($pair-($getoldPair->row()->pair));
       }
        if($rewardPair > 0){
            if($rewardPair > 3){
              
            	$caping = $rewardPair-3;
            	//capping
            	if($caping>0){
            	$daybookCapping = array(
            			"invoice_no"    =>$invoice_number,
            			"paid_to"	        =>$cid,
            			"paid_from"     =>$cid,
            			"transaction_type"=>8,
            			"date1"         =>date('Y-m-d H:i:s'),
            			"amount"           =>((($caping*600)))
            	);
            	$this->db->insert("inner_daybook",$daybookCapping);
            	
            	            		$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"pair Capping",
			"invoice_date"=>date('Y-m-d H:i:s')
		);
		$this->db->insert("invoice_serial",$invoice);
		
		
            $cps = 	$this->tree->getPair("pair_caping",$cid);
            if($cps->num_rows()>0){
                 $bincapping=array(
                  "pair"=>$cps->row()->pair + $caping,
                  "amount"=>$cps->row()->amount+ ($caping*600)
                   );  
                  $this->tree->update("pair_caping",$bincapping,$cid);
                  
                  
            	
            }else{
                 $bincapping=array("c_id"=>$cid,
                   "pair"=> $caping,
                    "amount"=> ($caping*600)
                     );  
                 $this->tree->insert("pair_caping",$bincapping,$cid);
                 
                 

            }}
            //capping
            $rewardPair=3;
            }
            
            $totsilverpair =$getoldPair->row()->pair + $rewardPair;
            if($getoldPair->row()->pair > 42){
            	$addamount  = $rewardPair*600;
            }else{
            	$addamount  = ($rewardPair*600)/2;
            }
            //update silver
            $daybooksilver = array(
            		"invoice_no"    =>$invoice_number,
            		"paid_to"	        =>$cid,
            		"paid_from"     =>"ADLAdmin",
            		"transaction_type"=>1,
            		"date1"         =>date('Y-m-d H:i:s'),
            		"amount"           =>$addamount
            );
            $this->db->insert("inner_daybook",$daybooksilver);
            $invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"pair silver +upgrade",
			"invoice_date"=>date('Y-m-d H:i:s')
		);
		$this->db->insert("invoice_serial",$invoice);
		
            $daybookupgreade = array(
            		"invoice_no"    =>$invoice_number,
            		"paid_to"	        =>$cid,
            		"paid_from"     =>"ADLAdmin",
            		"transaction_type"=>5,
            		"date1"         =>date('Y-m-d H:i:s'),

            		"amount"           =>($addamount-($rewardPair*30))

            );
            $this->db->insert("inner_daybook",$daybookupgreade);
            
            $ramount = $getoldPair->row()->amount+ $addamount;
            $binaryincome=array(
            		"pair"=>$totsilverpair,
            		"amount"=>$ramount
            );
            $this->tree->update("silver_mbalance",$binaryincome,$cid);
            
            //update silver
           // for gold
           $getsilverPair =  $this->tree->getPair("silver_mbalance",$cid)->row();
           $this->db->where("c_id",$cid);
           $this->db->delete("gold_mbalance");
           $uppair =$getsilverPair->pair;
           if(($uppair > 14)&&($uppair < 43))
           {
           	$binaryincome=array(
           
           			"c_id"=>$cid,
           			"pair"=>14,
           			"amount"=>14*300
           	);
           	$this->tree->insert("gold_mbalance",$binaryincome,$cid);
           	$uppair=$uppair-14;
           	//update diamond
           	$this->db->where("c_id",$cid);
           	$this->db->delete("diamond_mbalance");
           	if($uppair > 14){
           		$binaryincome=array(
           				"c_id"=>$cid,
           				"pair"=>14,
           				"amount"=>14*300
           		);
           		$this->tree->insert("diamond_mbalance",$binaryincome,$cid);
           		$uppair=$uppair-14;
           		//for crown
           		$this->db->where("c_id",$cid);
           		$this->db->delete("crown_mbalance");
           		$binaryincome=array(
           				"c_id"=>$cid,
           				"pair"=>$uppair,
           				"amount"=>($uppair * 300)
           		);
           		$this->tree->insert("crown_mbalance",$binaryincome,$cid);
           		//for crown
           	}else{
           		$binaryincome=array(
           				"c_id"=>$cid,
           				"pair"=>$uppair,
           				"amount"=>($uppair * 300)
           		);
           		$this->tree->insert("diamond_mbalance",$binaryincome,$cid);
           	}
           	//update diamond
           }else{
           	$binaryincome=array(
           			"c_id"=>$cid,
           			"pair"=>$getsilverPair->pair,
           			"amount"=>($getsilverPair->pair * 300)
           	);
           	$this->tree->insert("gold_mbalance",$binaryincome,$cid);
           }
            
        }   
            
    }    
     public function poolIncome($cid){
    	  $pair=0;
			echo "poool for =".$cid."<br>";
        $co=0;
        $count1=0;
        $cor=0;
       $lefttotal=0;
       $righttotal=0;
       $table="silver_tree";
       $posl="leftjoiner";
       
       
       $this->db->where('c_id', $cid);
       $query2 = $this->db->get('silver_tree');
       if($query2->num_rows()>0){
            $query2=$query2->row();
            
            
       if($query2->left){
           $this->db->where("id",$query2->left);
           $data1 = $this->db->get("customer_info")->row();
           if($data1->status){
               $co=$co+1;

               //echo $query2->right;

           }
        $lefttotal =$this->tree->getLeftCountData($query2->left,$co,$table);
       }
       
      
       if($query2->right){
           $this->db->where("id",$query2->right);
           $data1 = $this->db->get("customer_info")->row();
           if($data1->status){
               $cor=$cor+1;
              // echo $query2->right;
           }
           
           $righttotal =$this->tree->getLeftCountData($query2->right,$cor,$table);
       }
       }
       echo "left=".$lefttotal."<br>";
       echo "right=".$righttotal."<br>";
      $leftjoin= $lefttotal;
      $rightjoin= $righttotal;
      
      
      //invoice code
      	$tblnm="invoice_serial";
		$maxid=$this->mpinmodel->pin_max($tblnm)+1;
		$id1=1000+$maxid;
		$invoice_number="ADLI".$id1;
		$leveln=0;
		
		if(($rightjoin>0)&&($leftjoin>0)){
		    echo $rightjoin+$leftjoin;
			$totperson = $rightjoin+$leftjoin;
			$aumaster = $this->db->get("auto_pool");
			foreach($aumaster->result() as $amp):
			if($amp->person_no > $totperson){
				$leveln =$amp->id;
				break;
			}
				
			endforeach;	
			echo "l-".$leveln;
				if($leveln>0){
				$this->db->where("id",$leveln-1);
				$getrate1=$this->db->get("auto_pool");
				
				//echo $leveln;
			$this->db->where("c_id",$cid);
		$old_details1 =$this->db->get("autopool_details");
		if($old_details1->num_rows()>0){
		    $pula=0;
			$getrate=$getrate1->row();
			$old_details =$old_details1->row();
				$this->db->where("id",$leveln-2);
				$getrate3=$this->db->get("auto_pool");
				if($getrate3->num_rows()>0){
				   $pula =  $getrate3->row()->pool_amount;
				}else{
				    $pula =0;
				}
				if(($leveln-1) > $old_details->level){
				//	echo $getrate->pool_amount;
					$datapool = array(
							
							'level'=>$leveln-1,
							'pool_income'=>$old_details->pool_income+$pula,
							'date'=>date('Y-m-d H:i:s')
							
					);
					$this->db->where("c_id",$cid);
					$this->db->update("autopool_details",$datapool);
					$daypoi = array(
							"invoice_no"    =>$invoice_number,
							"paid_to"	        =>$cid,
							"paid_from"     =>"Pool Admin",
							"transaction_type"=>2,
							"date1"         =>date('Y-m-d H:i:s'),
							"amount"           =>$pula 
					);
					$this->db->insert("inner_daybook",$daypoi);
					
					            		$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"Auto Pool",
			"invoice_date"=>date('Y-m-d H:i:s')
		);
		$this->db->insert("invoice_serial",$invoice);
				
			}
			
			
			
		}else{
			$pula=0;
			$getrate=$getrate1->row();
				$this->db->where("id",$leveln-2);
				$getrate3=$this->db->get("auto_pool");
				if($getrate3->num_rows()>0){
				   $pula =  $getrate3->row()->pool_amount;
				}else{
				    $pula =0;
				}
				
				$datapool = array(
					'c_id'=>$cid,
						'level'=>$leveln-1,
						'pool_income'=>$pula,
						'roi_income'=>0.00,
						'date'=>date('Y-m-d H:i:s')
				);
				$this->db->insert("autopool_details",$datapool);
				if($pula > 0){
				$daypoi = array(
						"invoice_no"    =>$invoice_number,
						"paid_to"	        =>$cid,
						"paid_from"     =>"Pool Admin",
						"transaction_type"=>2,
						"date1"         =>date('Y-m-d H:i:s'),
						"amount"           =>$pula
				);
				$this->db->insert("inner_daybook",$daypoi);
			$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"Auto Pool",
			"invoice_date"=>date('Y-m-d H:i:s')
		);
		$this->db->insert("invoice_serial",$invoice);
			
			}
		}
			}
			
		}
		
      
		
    }
    
      public function roiincome(){
          
          $date2  = date('Y-m-d');
          $date1  =date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date2) ) ));
		    	$getpoot=$this->db->get("auto_pool");
		    	foreach($getpoot->result() as $gpt):
		    	    $this->db->where("DATE(date)",$date1);
		    	    $this->db->where("level",$gpt->id);
		    	 $getlayak=   $this->db->get("autopool_details");
		    	 $j=0;
		    	 if($getlayak->num_rows()>0){
		    	     foreach($getlayak->result() as $gl):
		    	         $this->db->where("transaction_type",3);
		    	         $this->db->where("paid_from", $gl->c_id);
		    	       $inre =   $this->db->get("inner_daybook");
		    	       if($inre->num_rows()>0){
		    	           
		    	       }else{
		    	          $j=$j+1; 
		    	       }
		    	         
		    	         endforeach;
		    	 }
		    	
		    	$this->db->where("level >",$gpt->id);
		    	$numg1  =  $this->db->get("autopool_details");
		    	 $this->db->where("level >",$gpt->id);
		    	$numg  =  $this->db->get("autopool_details");
		    	if($numg->num_rows()>0){
		    	    $disamount = ($j*180)/$numg1->num_rows();
		    	    foreach($numg->result() as $numr):
		    	        	$tblnm="invoice_serial";
		$maxid=$this->mpinmodel->pin_max($tblnm)+1;
		$id1=1000+$maxid;
		$invoice_number="ADLI".$id1;
		
		
		    	        $this->db->where("c_id",$numr->c_id);
		    	      $indc =  $this->db->get("autopool_details");
		    	        if($indc->num_rows()>0){
		    	            	$dataroi = array(
							    'roi_income'=>$indc->row()->roi_income+$disamount
					);
					$this->db->where("c_id",$numr->c_id);
					$this->db->update("autopool_details",$dataroi);
					
					if($disamount>0){
					$daypoir = array(
							"invoice_no"    =>$invoice_number,
							"paid_to"	        =>$indc->row()->c_id,
							"paid_from"     =>"ROI",
							"transaction_type"=>3,
							"date1"         =>date('Y-m-d H:i:s'),
							"amount"           =>$disamount
					);
					$this->db->insert("inner_daybook",$daypoir);
					            		$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"Roi Income",
			"invoice_date"=>date('Y-m-d H:i:s')
		);
		$this->db->insert("invoice_serial",$invoice);
		    	        }}
		    	        endforeach;
		    	    
		    	}
		    	
		    	
		    	    
		    	    endforeach;
		}
    
    function generate_income(){
         date_default_timezone_set('Asia/Kolkata');
        $number ="8382829593";
        $msg ="Cron generated";
       sms($number,$msg);
       $this->db->where("status",1);
       $getCustomer = $this->db->get("customer_info");
       if($getCustomer->num_rows()>0){
        foreach($getCustomer->result() as $gc):
        $this->directIncome($gc->id);
        $this->pairMachingIncome($gc->id);
      $this->poolIncome($gc->id);
        
       
        
        endforeach;
           $this->roiincome($gc->id);
           
           
       }
    }
    
}