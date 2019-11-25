<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Configuration Exam</h4>
						</div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Create<code> Exan</code></h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills" id="myTab3" role="tablist" style="border-bottom: 3px solid pink;">
                                <li class="nav-item" style="padding-left:35px;padding-right:35px;">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Create Exam</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Create Subject</a>
                                </li>
                                <li class="nav-item" style="padding-left:35px;padding-right:35px;">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Create practice</a>
                                </li>
                                </ul>
                                
                                <div class="tab-content" id="myTabContent2">
                                <!-- ////////////////create exam////////////////// -->
                                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                        <div style="margin:3%;">
                                            <label><b>Enter Exam Name : </b></label><input type="text" id="e_name" name="e_name" required class="form-control" style="width:300px;"/>
                                            <input type="submit" id="b_e" name = "btn_e" value="Create Exam" class="btn btn-primary" style="margin:2%"/>
                                        </div>
                                        <div>
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table-2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center"> #</th>
                                                            <th class="text-center">Exam Name</th>
                                                            <th class="text-center">Action</th>                     
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php $i=1;
                                                            foreach($gt_val->result() as $dadt)
                                                            { ?>
                                                            <tr>
                                                                <td class="text-center"><?= $i;?></td>
                                                                <td class="text-center"><?= $dadt->name;?></td>
                                                                <td class="text-center"><input type="button" value="Delete" id="dlt<?= $i;?>" class="btn btn-danger"/></td>
                                                            </tr>

                                                        <?php $i++;  }
                                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ///////////////////create subject/////////////////// -->
                                    <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                        <div style="margin:3%;">
                                            <label><b>Enter Subject Name : </b></label><input type="text" id="s_name" name="s_name" required class="form-control" style="width:300px;"/>
                                            <input type="submit" id="btn_sub" name = "btn_s" value="Create Subject" class="btn btn-primary" style="margin:2%"/>
                                        </div>
                                        <div>
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table-2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center"> #</th>
                                                            <th class="text-center">Subject Name</th>
                                                            <th class="text-center">Action</th>                     
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php $i=1;
                                                            foreach($dt_subject->result() as $dt_sub)
                                                            { ?>
                                                            <tr>
                                                                <td class="text-center"><?= $i;?></td>
                                                                <td class="text-center"><?= $dt_sub->subject_name;?></td>
                                                                <td class="text-center"><input type="button" value="Delete" id="dlt_sub<?= $i;?>" class="btn btn-danger"/></td>
                                                            </tr>

                                                        <?php $i++;  }
                                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- //////////////////create test//////////////////////// -->
                                    <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                        <div style="margin:3%;">
                                            <label>Select Exam :</label><select style="width:250px;margin:3%;" class="form-control" id="select_exam">
                                                <option>Select Exam</option>
                                                <?php    
                                                foreach($gt_val->result() as $dt_ex)
                                                { ?>
                                                <option value="<?= $dt_ex->id;?>"><?= $dt_ex->name;?></option>
                                                <?php } ?>
                                            </select>
                                            Select Subject :<select style="width:250px;margin:3%;" class="form-control" id="select_subject">
                                                <option>Select Subject</option>
                                                <?php    
                                                foreach($dt_subject->result() as $dt_sb)
                                                { ?>
                                                <option value="<?= $dt_sb->id;?>"><?= $dt_sb->subject_name;?></option>
                                                <?php } ?>
                                            </select>
                                            <label><b>Enter Subject Name : </b></label><input type="text" id="s_name" name="s_name" required class="form-control" style="width:300px;"/>
                                            <input type="submit" id="btn_tst" name = "btn_tst" value="Create Test" class="btn btn-primary" style="margin:2%"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$("#b_e").click(function(){
    var e_name = $("#e_name").val();
    
    $.post("<?= site_url();?>/adminController/insert_exam", {e_name : e_name}, function(data){
        // alert(e_name);
        if(data==1)
        {
            alert("Exam Name Created Successfully.");
        }
        else if(data==0)
        {
            alert("Exam Name Not Created");
        }
        else if(data==3)
        {
            alert("Exam Name Already exists");
        }
    });
});
// ///////create subject/////////
$("#btn_sub").click(function(){
    var sub_ject = $("#s_name").val();
    $.post("<?= site_url();?>/adminController/insert_subject", {sub_ject : sub_ject}, function(data){
        if(data==1)
        {
            alert("Subject Name Created Successfully.");
        }
        else if(data==0)
        {
            alert("Subject Name Not Created");
        }
        else if(data==3)
        {
            alert("Subject Name Already exists");
        }
    });
});
/////////////create test///////////////
</script>