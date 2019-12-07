<div class="main-content">
    <div class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Configuration Question</h4>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Create<code> Question</code></h4>
                            </div>
                            <div class="card-body">
                                <div id="mydiv_q" class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> #</th>
                                                <th class="text-center">Question</th>
                                                <th class="text-center">A</th>
                                                <th class="text-center">B</th>
                                                <th class="text-center">C</th>
                                                <th class="text-center">D</th>
                                                <th class="text-center">E</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $qimg = $this->db->get('question_images')->result();
                                                $i=1;
                                                foreach($qimg as $data) { ?>
                                            <tr>
                                                <td><?= $i;?></td>
                                                
                                                <?php  
                                                $fil_n1 = base_url('assets/images/question_img')."/".$data->q_img1;
                                                $c1= '&nbsp;<img width="30px" height="30px" src="'.$fil_n1.'">&nbsp;';
                                                $str1 = str_replace('<=1!>', $c1 ,$data->question);
                                                
                                                $fil_n2 = base_url('assets/images/question_img')."/".$data->q_img2;
                                                $c2= '&nbsp;<img width="30px" height="30px" src="'.$fil_n2.'">&nbsp;';
                                                $str2 = str_replace('<=2!>', $c2 ,$str1);
                                                
                                                $fil_n3 = base_url('assets/images/question_img')."/".$data->q_img3;
                                                $c3= '&nbsp;<img width="30px" height="30px" src="'.$fil_n3.'">&nbsp;';
                                                $str3 = str_replace('<=3!>', $c3 ,$str2);
                                                
                                                $fil_n4 = base_url('assets/images/question_img')."/".$data->q_img4;
                                                $c4= '&nbsp;<img width="30px" height="30px" src="'.$fil_n4.'">&nbsp;';
                                                $str_final = str_replace('<=4!>', $c4 ,$str3);
                                                ?>
                                                
                                                
                                                <td><?=  $str_final;?></td>
                                                <td><img src="<?php echo base_url();?>assets/images/question_img/<?= $data->q_ans_img1;?>" width="60px" height="60px"></td>
                                                <td><img src="<?php echo base_url();?>assets/images/question_img/<?= $data->q_ans_img2;?>" width="60px" height="60px"></td>
                                                <td><img src="<?php echo base_url();?>assets/images/question_img/<?= $data->q_ans_img3;?>" width="60px" height="60px"></td>
                                                <td><img src="<?php echo base_url();?>assets/images/question_img/<?= $data->q_ans_img4;?>" width="60px" height="60px"></td>
                                                <td><img src="<?php echo base_url();?>assets/images/question_img/<?= $data->q_ans_img5;?>" width="60px" height="60px"></td>
                                            </tr>
                                            <?php $i++; } ?>
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