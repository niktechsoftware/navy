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
                                                <?php $str11 = str_replace('<=1!>',$data->q_ans_img1,$data->question);?>
                                                <td><?=  $str11;?></td>
                                                <td><?= $data->q_ans_img1;?></td>
                                                <td><?= $data->q_ans_img2;?></td>
                                                <td><?= $data->q_ans_img3;?></td>
                                                <td><?= $data->q_ans_img4;?></td>
                                                <td><?= $data->q_ans_img5;?></td>
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