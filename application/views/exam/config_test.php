<?php $uri = $this->uri->segment(3);
if($uri == 0)
{ ?>
    <script> alert("Please Select Test And Subject.");</script>
<?php }
?>
<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Configuration Test</h4>
						</div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Create<code> Test</code></h4>
                            </div>
                            <div class="card-body">                                
                                    <!-- //////////////////create test//////////////////////// -->
                                    <form method="post" action="<?php echo base_url();?>index.php/adminController/create_ques">
                                        <div style="margin:3%;">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <b>Select Exam :</b><select style="width:200px;margin:3%;" class="form-control" name="select_exam" id="select_exam">
                                                        <option disabled selected>Select Exam</option>
                                                        <?php    
                                                        foreach($gt_val->result() as $dt_ex)
                                                        { ?>
                                                        <option value="<?= $dt_ex->id;?>"><?= $dt_ex->name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <b>Select Language :</b><select style="width:200px;margin:3%;" class="form-control" name="select_lang" id="select_lang">
                                                        <option disabled selected>Select Language</option>
                                                        <?php    
                                                        foreach($dt_lang->result() as $dt_lg)
                                                        { ?>
                                                        <option value="<?= $dt_lg->id;?>"><?= $dt_lg->language;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                <b>Select Test :</b><select style="width:200px;margin:3%;" class="form-control"  name="select_test" id="select_test">
                                                        <option disabled selected>Select Test</option>
                                    
                                                    </select>  
                                                </div>
                                                <div class="col-md-3">
                                                <b>Select Subject :</b><select style="width:200px;margin:3%;" class="form-control"  name="select_subject" id="select_subject">
                                                        <option disabled selected>Select Subject</option>
                                                        <?php    
                                                        foreach($dt_subject->result() as $dt_sb)
                                                        { ?>
                                                        <option value="<?= $dt_sb->id;?>"><?= $dt_sb->subject_name;?></option>
                                                        <?php } ?>
                                                    </select>  
                                                    <input type="submit" id="config_tst" name = "config_tst" value="Create Test" class="btn btn-primary" style="margin:2%"/>
                                                </div>
                                                <!-- <div class="col-md-3">
                                                    <b> Number Of Questions : </b><input type="number" id="q_nmbr" name="q_nmbr" required class="form-control" style="width:200px;"/>
                                                    <input type="submit" id="config_tst" name = "config_tst" value="Create Test" class="btn btn-primary" style="margin:2%"/>
                                                </div> -->
                                            </div>                                                            
                                        </div>
                                    </form>
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
$("#select_lang").change(function(){
    var exam_n = $('#select_exam').val();
    var lang_n = $('#select_lang').val();
    if(exam_n == null)
    {
        alert("Please Select Exam");
    }
    else
    {
        // alert("yes");
        $.post("<?= site_url();?>/adminController/select_exam", {exam_n : exam_n,lang_n : lang_n}, function(data){
         $("#select_test").html(data);
        });
    }
});
</script>