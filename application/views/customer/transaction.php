


<div class="main-content">
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4><?php echo $smallTitle;?></h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                     
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Customer ID</th>
                           
                            <?php 
                          
                              if($gdetails->num_rows()>0){
                                 if (($gdetails->row()->transaction_type==1)){ ?>
                                     <th>Binary Income</th>
                                     <th>Upgade Income</th>
                                      <th>Total Income</th>
                          <?php       
                              }else{
                            ?>
                             <th>Amount</th>
                            <?php } }?>
                            <th>Type</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                           
                          </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                        if($gdetails->num_rows()>0){
                          $i=1;
                        foreach($gdetails->result() as $data):
                         $id= $data->paid_to;
                       
                      //  $sumamt= $this->cmodel->getsumamount($data->paid_to,$data->transaction_type);
                       // echo $sumamt;
                        //exit;
                        //  $one= $this->cmodel->getsumamount($data->paid_to,1);
                        //   $five= $this->cmodel->getsumamount($data->paid_to,5);
                        //   echo $one;
                        //   echo $five;
                        //   exit();
                    //   echo $sumamt->row()->amount;
                    //   exit;
                          $custnm= $this->cmodel->getCrecord($data->paid_to)->row();
                          $this->db->where("id",$data->transaction_type);
                         $ttype= $this->db->get("transaction_type");
                          
                        ?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td class="align-middle"><?php  echo $custnm->customer_name ."[".$custnm->username ."]"; ?></td>
                            
                            <td><?php echo $data->amount;
                            if($data->transaction_type==1){
                               
                                 
                                $this->db->where("invoice_no",$data->invoice_no);
                                $this->db->where("transaction_type",1);
                                $this->db->where("paid_to",$data->paid_to);
                                $bindt2=$this->db->get("inner_daybook");
                                if($bindt2->num_rows()>0){
                                 $onetype=  $bindt2->row()->amount; 
                               
                                 }
                                 else{ $onetype= "0.00"; 
                                       
                                 }
                                
                                 
                            
                            ?></td>
                            <td> <?php  $this->db->where("invoice_no",$data->invoice_no);
                                 $this->db->where("transaction_type",5);
                                $this->db->where("paid_to",$data->paid_to);
                                $bindt=$this->db->get("inner_daybook");
                                if($bindt->num_rows()>0){
                               
                               $fivetype=  $bindt->row()->amount; 
                               echo $fivetype;
                                    
                                }
                                 else{
                                 $fivetype="0.00";
                                  echo $fivetype; }
                                  ?></td>
                            <td> <?php 
                             $total=$onetype +$fivetype;
                                 echo $total;
                            ?> 
                           <?php } ?></td>
                            <td><?php if($ttype->num_rows()>0){echo $ttype->row()->name; } else{ echo "N/A"; }?></td>
                            <td><?php echo $data->invoice_no;?></td>
                            <td><?php echo $data->date1;?></td>
                           
                          </tr>
                          
                          <?php //} 
                          $i++; endforeach; ?>
                        </tbody>
                   
                        <?php 
                         } else{
                            echo "data not found";
                          }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </section>
            </div>
