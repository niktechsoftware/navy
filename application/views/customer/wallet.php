<div class="main-content">
    <div class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo $smallTitle;?></h4>
                        </div>

                        <div class="card-body">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                           <div class="card-content table-full-width">
                                <h4 class="leftdownline">Downline List (In-Direct) Right</h4>
                               <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Wallet</th>
                                        <th>Pair</th>
                                        <th>Rupess/-</th>
                                       
                                    </tr>
                                </thead>
                                    <tbody>
                                          <tr>
                                     <td>Direct Income</td>
                                     <?php if($dirw->num_rows()>0){?>
                                      <td><?php echo $dirw->row()->pair; ?></td> 
                                       <td><?php echo $dirw->row()->amount; ?></td> 
                                       <?php }else{?>
                                      <td>0</td> 
                                       <td>0</td> 
                                       <?php }?>
                                        
                                    </tr>
                                    <tr>
                                     <td>Silver Wallet</td>
                                     <?php if($sw->num_rows()>0){?>
                                      <td><?php echo $sw->row()->pair; ?></td> 
                                       <td><?php echo $sw->row()->amount; ?></td> 
                                       <?php }else{?>
                                      <td>0</td> 
                                       <td>0</td> 
                                       <?php }?>
                                        
                                    </tr>
                                    <tr>
                                     <td>Gold Wallet</td>
                                      <?php if($gw->num_rows()>0){?>
                                      <td><?php echo $gw->row()->pair; ?></td> 
                                       <td><?php echo $gw->row()->amount; ?></td> 
                                       <?php }else{?>
                                      <td>0</td> 
                                       <td>0</td> 
                                       <?php }?>
                                        
                                    </tr>
                                     <tr>
                                      <td>Diamond Wallet</td>
                                      <?php if($dw->num_rows()>0){?>
                                      <td><?php echo $dw->row()->pair; ?></td> 
                                       <td><?php echo $dw->row()->amount; ?></td> 
                                       <?php }else{?>
                                      <td>0</td> 
                                       <td>0</td> 
                                       <?php }?>
                                        
                                    </tr>
                                    
                                    <tr>
                                      <td>Crown Wallet</td>
                                      <?php if($cw->num_rows()>0){?>
                                      <td><?php echo $cw->row()->pair; ?></td> 
                                       <td><?php echo $cw->row()->amount; ?></td> 
                                       <?php }else{?>
                                      <td>0</td> 
                                       <td>0</td> 
                                       <?php }?>
                                        
                                    </tr>
                                     <tr>
                                      <td>Auto Pool Income</td>
                                      <?php if($auto->num_rows()>0){?>
                                      <td><?php echo $auto->row()->level."[level]"; ?></td> 
                                       <td><?php echo $auto->row()->pool_income; ?></td> 
                                       <?php }else{?>
                                      <td>0</td> 
                                       <td>0</td> 
                                       <?php }?>
                                        
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>