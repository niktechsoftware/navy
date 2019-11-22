
     
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Silver Income</h4>
                    <span><?php 
                 $total=0;
                    $this->db->select_sum("amount");
                    $this->db->where("c_id",$this->session->userdata("customer_id"));
                   $sbal= $this->db->get("silver_mbalance");
                    if($sbal->row()->amount>0){
                        echo $sbal->row()->amount;
                    }
                    else{
                        echo "0.00";
                    }
                   
                    ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Gold Income</h4>
                    <span><?php 
                
                    $this->db->select_sum("amount");
                    $this->db->where("c_id",$this->session->userdata("customer_id"));
                   $sbal= $this->db->get("gold_mbalance");
                    if($sbal->row()->amount>0){
                        echo $sbal->row()->amount;
                    }
                    else{
                        echo "0.00";
                    }
                    ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Diamond Income</h4>
                    <span><?php 
                
                    $this->db->select_sum("amount");
                    $this->db->where("c_id",$this->session->userdata("customer_id"));
                   $sbal= $this->db->get("diamond_mbalance");
                    if($sbal->row()->amount>0){
                        echo $sbal->row()->amount;
                    }
                    else{
                        echo "0.00";
                    }
                    ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Crown Income</h4>
                    <span><?php 
                
                    $this->db->select_sum("amount");
                    $this->db->where("c_id",$this->session->userdata("customer_id"));
                   $sbal= $this->db->get("crown_mbalance");
                    if($sbal->row()->amount>0){
                        echo $sbal->row()->amount;
                    }
                    else{
                        echo "0.00";
                    }
                    ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
             <div class="row ">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> Direct Income</h4>
                    <span>
                        <?php 
                        $this->db->select_sum("amount");
                         $this->db->where("paid_to",$this->session->userdata("customer_id"));
                  
                        $this->db->where("transaction_type",7);
                       $dt= $this->db->get("inner_daybook");
                   if($dt->row()->amount>0){
                   $dm = $dt->row()->amount;  echo   $dt->row()->amount;
                       }
                       else{ echo "0.00"; $dm =0; }
                       $total=$total+ $dm;
                        ?>
                    </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> Matching Bonus </h4>
                    <span>   <?php 
                        $this->db->select_sum("amount");
                         $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",1);
                       $dt= $this->db->get("inner_daybook");
                    if($dt->row()->amount>0){
                    $mb =  $dt->row()->amount; echo   $dt->row()->amount;
                       }
                       else{ echo "0.00"; $mb =0; }    
                       $total=$total+$mb;?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> Auto Pool Income </h4>
                    <span>   <?php 
                        $this->db->select_sum("amount");
                          $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",2);
                       $dt= $this->db->get("inner_daybook");
                    if($dt->row()->amount>0){
                     echo   $dt->row()->amount;
                      $total=$total+$dt->row()->amount;
                       }
                       else{ echo "0.00"; }
                        ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> ROI Income  </h4>
                    <span>   <?php 
                        $this->db->select_sum("amount");
                          $this->db->where("paid_to",$this->session->userdata("customer_id"));
                        $this->db->where("transaction_type",3);
                       $dt= $this->db->get("inner_daybook");
                     if($dt->row()->amount>0){
                     echo   $dt->row()->amount;
                     $total=$total+$dt->row()->amount;
                       }
                       else{ echo "0.00"; }
                        ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="row ">
           
                <div class="col-xl-3 col-lg-6">
                 <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Total Wallet</h4>
                    <span><?php 
                

                  echo $this->pay_details->totwallet($this->session->userdata("customer_id"));

                    ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>
                      <span class="text-nowrap">Pair</span>
                    </p>
                  </div>
                </div>
              </div>
                
              </div>
               <div class="col-xl-3 col-lg-6">
             <!-- <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> Pair Capping </h4>
                    <span>   <?php 
                        $this->db->select_sum("amount");
                        $this->db->where("transaction_type",8);
                          $this->db->where("paid_to",$this->session->userdata("customer_id"));
                       $dt= $this->db->get("inner_daybook");
                    if($dt->row()->amount>0){
                           
                     echo   $dt->row()->amount;
                     $pca=$dt->row()->amount;
                       }
                       else{ echo "0.00"; }
                        ?></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap"> Pair</span>
                    </p>
                  </div>
                </div>
              </div>-->
              </div>
            </div>
           
            
           
             
            
            <!-- 
            
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Revenue</h4>
                </div>
                <div class="card-body">
                  <div id="echart_graph_line" class="chartsh"></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Revenue</h4>
                </div>
                <div class="card-body">
                  <div class="summary">
                    <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                      <div id="echart_area_line" class="chartsh"></div>
                    </div>
                    <div data-tab-group="summary-tab" id="summary-text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h4>Quick Draft</h4>
                </div>
                <div class="card-body pb-0">
                  <div class="card-body sales-growth-chart">
                    <div id="echart_bar" class="chartsh"></div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="chart-title mb-1 text-center">
                    <h6>Total monthly Sales.</h6>
                  </div>
                  <div class="chart-stats text-center">
                    <a href="#"><i data-feather="arrow-up-circle" class="col-green"></i></a>
                    <span class="text-muted">20% high since the last year.</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
          <div class="card">
                <div class="card-body">
                  <div class="chart-title">
                    <p class="mb-3 text-muted pull-left text-sm">
                      <span class="text-success mr-2 font-20"><i class="fa fa-arrow-up"></i>
                        10%</span> <span class="text-nowrap">Since
                        last month</span>
                    </p>
                  </div>
                  <canvas id="chart-1"></canvas>
                  <div class="row text-center">
                    <div class="col-4 m-t-15">
                      <h5>91%</h5>
                      <p class="text-muted m-b-0">Online</p>
                    </div>
                    <div class="col-4 m-t-15">
                      <h5>8%</h5>
                      <p class="text-muted m-b-0">Offline</p>
                    </div>
                    <div class="col-4 m-t-15">
                      <h5>1%</h5>
                      <p class="text-muted m-b-0">NA</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          -->
        