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
                                <!-- //////////////////create test//////////////////////// -->
                                <?php
                                echo $q_nmbr.$select_exam.$select_test.$select_subject;
                                $this->db->where('id',$select_exam);
                                $ex =  $this->db->get('exam_master');
                                $this->db->where('id',$select_test);
                                $tst = $this->db->get('exam_name');
                                $this->db->where('id',$select_subject);
                                $sub = $this->db->get('exam_subjects');
                                ?>
                                <div id ="table3_div" class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> #</th>
                                                <!-- <th class="text-center">Exam</th> -->
                                                <th class="text-center">Question</th>
                                                <th class="text-center">Action</th>                     
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php 
                                                    for($i=1;$i<=$q_nmbr;$i++)
                                                { ?>
                                                <tr>
                                                    <td class="text-center"><?= $i;?></td>                                                                                             
                                                    <td class="text-center"><textarea id="txta<?= $i;?>"></textarea></td>
                                                    <td class="text-center"><input type="button" value="Delete" id="dlt_test<?= $i;?>" class="btn btn-danger"/></td>
                                                </tr>

                                            <?php  }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /////////                                     -->
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
/////////////create test///////////////
$("#select_exam").change(function(){
    var exam_n = $('#select_exam').val();
    $.post("<?= site_url();?>/adminController/select_exam", {exam_n : exam_n}, function(data){
         $("#select_test").html(data);
    });
});

</script>