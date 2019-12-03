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
                                <h4>Create<code> Exam</code></h4>
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
                                            <div id ="table1_div" class="table-responsive">
                                                <table class="table table-striped" id="table-2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center"> #</th>
                                                            <th class="text-center">Exam Name</th>
                                                            <th class="text-center">Action</th>
                                                            <th class="text-center">Action</th>                     
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php $i=1;
                                                            foreach($gt_val->result() as $dadt)
                                                            { ?>
                                                            <tr>
                                                                <td class="text-center"><?= $i;?></td>
                                                                <input type="hidden" id="ex_id<?= $i;?>" value="<?= $dadt->id;?>">
                                                                <td id ="ex_id<?= $i;?>" class="text-center">
                                                                    <label id="sh_ex<?= $i;?>" ><?php echo $dadt->name;?></label>
                                                                    <input type="text" id="edit_ex_id<?= $i;?>" value="<?php echo $dadt->name;?>">
                                                                </td>
                                                                
                                                                <td class="text-center">
                                                                <input type="button" value="Edit" id="edt_exam<?= $i;?>" class="btn btn-warning"/>
                                                                <input type="button" value="Update" id="update_exm<?= $i;?>" class="btn btn-warning"/>
                                                                </td>
                                                                <td class="text-center"><input type="button" value="Delete" id="dlt_exam<?= $i;?>" class="btn btn-danger"/></td>
                                                            </tr>
                                                                <script>
                                                                    $("#edit_ex_id<?= $i;?>").hide();
                                                                    $("#update_exm<?= $i;?>").hide();
                                                                    $("#edt_exam<?= $i;?>").show();
                                                                    $("#sh_ex<?= $i;?>").show();
                                                                    $("#dlt_exam<?= $i;?>").click(function(){
                                                                        var exam_id = $("#ex_id<?= $i;?>").val();
                                                                        $.post("<?= site_url();?>/adminController/delete_exam",{exam_id : exam_id},function(data){
                                                                            if(data==1)
                                                                            {
                                                                                alert("Exam Deleted Successfully");
                                                                                $("#table1_div").load(location.href + " #table1_div");
                                                                            }
                                                                            else if(data==0)
                                                                            {
                                                                                alert("Exam Not Deleted");
                                                                            }
                                                                        });
                                                                    });
                                                                    $("#edt_exam<?= $i;?>").click(function(){
                                                                        // alert("3");
                                                                        $("#edit_ex_id<?= $i;?>").show();
                                                                        $("#update_exm<?= $i;?>").show();
                                                                        $("#edt_exam<?= $i;?>").hide();
                                                                        $("#sh_ex<?= $i;?>").hide();
                                                                            $("#update_exm<?= $i;?>").click(function(){
                                                                                // alert("3");
                                                                                var exam_n =  $("#edit_ex_id<?= $i;?>").val();
                                                                                var exam_id = $("#ex_id<?= $i;?>").val();
                                                                                // alert(exam_id);
                                                                                $.post("<?= site_url();?>/adminController/update_exam",{exam_n : exam_n,exam_id:exam_id},function(data){
                                                                                    if(data==1)
                                                                                    {
                                                                                        alert("Update Successfully");
                                                                                        location.reload();
                                                                                    }
                                                                                    else if(data==0)
                                                                                    {
                                                                                        alert("Not Updated");
                                                                                    }
                                                                                });
                                                                            });
                                                                    });
                                                                </script>
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
                                            <div id ="table2_div" class="table-responsive">
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
                                                                <input type="hidden" id="sub_id<?= $i;?>" value="<?= $dt_sub->id;?>">
                                                                <td class="text-center">
                                                                    <label id="sh_sub<?= $i;?>"><?= $dt_sub->subject_name;?></label>
                                                                    <input type="text" id="edit_sub_id<?= $i;?>" value="<?= $dt_sub->subject_name;?>">
                                                                </td>
                                                               
                                                                <td class="text-center">
                                                                    <input type="button" value="Edit" id="edt_sub<?= $i;?>" class="btn btn-warning"/>
                                                                    <input type="button" value="Update" id="update_sub<?= $i;?>" class="btn btn-warning"/>
                                                                </td>
                                                                <td class="text-center"><input type="button" value="Delete" id="dlt_sub<?= $i;?>" class="btn btn-danger"/></td>
                                                            </tr>
                                                            <script>
                                                                        $("#edit_sub_id<?= $i;?>").hide();
                                                                        $("#update_sub<?= $i;?>").hide();
                                                                        $("#edt_sub<?= $i;?>").show();
                                                                        $("#sh_sub<?= $i;?>").show();

                                                                    $("#dlt_sub<?= $i;?>").click(function(){
                                                                        var sub_id = $("#sub_id<?= $i;?>").val();
                                                                        $.post("<?= site_url();?>/adminController/delete_subject",{sub_id : sub_id},function(data){
                                                                            if(data==1)
                                                                            {
                                                                                alert("Subject Deleted Successfully");
                                                                                // location.reload();
                                                                                $("#table2_div").load(location.href + " #table2_div");
                                                                            }
                                                                            else if(data==0)
                                                                            {
                                                                                alert("Subject Not Deleted");
                                                                            }
                                                                        });
                                                                       
                                                                    });
                                                                        
                                                                    $("#edt_sub<?= $i;?>").click(function(){
                                                                        // alert("3");
                                                                        $("#edit_sub_id<?= $i;?>").show();
                                                                        $("#update_sub<?= $i;?>").show();
                                                                        $("#edt_sub<?= $i;?>").hide();
                                                                        $("#sh_sub<?= $i;?>").hide();
                                                                            $("#update_sub<?= $i;?>").click(function(){
                                                                                var sub_n =  $("#edit_sub_id<?= $i;?>").val();
                                                                                var sub_id = $("#sub_id<?= $i;?>").val();
                                                                                // alert(sub_id);
                                                                                // alert(sub_n);
                                                                                $.post("<?php echo site_url();?>/adminController/update_sub",{sub_n : sub_n,sub_id : sub_id},function(data){
                                                                                //    alert(data);
                                                                                    if(data==1)
                                                                                    {
                                                                                        alert("Update Successfully");
                                                                                        location.reload();
                                                                                    }
                                                                                    else if(data==0)
                                                                                    {
                                                                                        alert("Not Updated");
                                                                                    }
                                                                                });
                                                                            });
                                                                    });
                                                                </script>
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
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <b>Select Exam :</b><select style="width:250px;margin:3%;" class="form-control" id="select_exam">
                                                        <option>Select Exam</option>
                                                        <?php    
                                                        foreach($gt_val->result() as $dt_ex)
                                                        { ?>
                                                        <option value="<?= $dt_ex->id;?>"><?= $dt_ex->name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-7">
                                                    <label><b> Create Practice Set Name : </b></label><input type="text" id="tst_name" name="tst_name" required class="form-control" style="width:300px;"/>
                                                    <input type="submit" id="btn_tst" name = "btn_tst" value="Create Test" class="btn btn-primary" style="margin:2%"/>
                                                </div>
                                            </div>    
                                            <div id ="table3_div" class="table-responsive">
                                                <table class="table table-striped" id="table-2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center"> #</th>
                                                            <th class="text-center">Exam</th>
                                                            <th class="text-center">Test Name</th>
                                                            <th class="text-center">Action</th>                     
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php $i=1;
                                                            foreach($dt_test->result() as $data_test)
                                                            { ?>
                                                            <tr>
                                                                <td class="text-center"><?= $i;?></td>   
                                                                <input type="hidden" id="test_id<?= $i;?>" value="<?= $data_test->id;?>">                                                            
                                                                <?php $this->db->where('id',$data_test->exam_master_id);
                                                                $dx_exam = $this->db->get('exam_master'); ?>
                                                                <td class="text-center"><?php if($dx_exam->num_rows()>0){ echo $dx_exam->row()->name; } else { echo "N/A"; } ?></td>
                                                                <td class="text-center">
                                                                    <label id="sh_test<?= $i;?>"><?= $data_test->exam_name;?></label>
                                                                    <input type="text" id="edit_test_id<?= $i;?>" value="<?= $data_test->exam_name;?>">
                                                                </td>
                                                               
                                                                <td class="text-center">
                                                                    <input type="button" value="Edit" id="edt_test<?= $i;?>" class="btn btn-warning"/>
                                                                    <input type="button" value="Update" id="update_test<?= $i;?>" class="btn btn-warning"/>
                                                                </td>
                                                                <td class="text-center"><input type="button" value="Delete" id="dlt_test<?= $i;?>" class="btn btn-danger"/></td>
                                                            </tr>
                                                            <script>
                                                                        $("#edit_test_id<?= $i;?>").hide();
                                                                        $("#update_test<?= $i;?>").hide();
                                                                        $("#edt_test<?= $i;?>").show();
                                                                        $("#sh_test<?= $i;?>").show();
                                                                            $("#edt_test<?= $i;?>").click(function(){
                                                                            // alert("3");
                                                                                $("#edit_test_id<?= $i;?>").show();
                                                                                $("#update_test<?= $i;?>").show();
                                                                                $("#edt_test<?= $i;?>").hide();
                                                                                $("#sh_test<?= $i;?>").hide();
                                                                                $("#update_test<?= $i;?>").click(function(){
                                                                                    var test_n =  $("#edit_test_id<?= $i;?>").val();
                                                                                    var tesst_id = $("#test_id<?= $i;?>").val();
                                                                                    // alert(test_n);
                                                                                    // alert(tesst_id);
                                                                                    $.post("<?php echo site_url();?>/adminController/update_tst",{test_n : test_n ,tesst_id : tesst_id},function(data){
                                                                                        // alert(data);
                                                                                        if(data==1)
                                                                                        {
                                                                                            alert("Update Successfully");
                                                                                            location.reload();
                                                                                        }
                                                                                        else if(data==0)
                                                                                        {
                                                                                            alert("Not Updated");
                                                                                        }
                                                                                    });
                                                                                });
                                                                            });
                                                                    $("#dlt_test<?= $i;?>").click(function(){
                                                                        var test_id = $("#test_id<?= $i;?>").val();
                                                                        $.post("<?= site_url();?>/adminController/delete_test",{test_id : test_id},function(data){
                                                                            if(data==1)
                                                                            {
                                                                                alert("Test Deleted Successfully");
                                                                                // location.reload();
                                                                                $("#table3_div").load(location.href + " #table3_div");
                                                                            }
                                                                            else if(data==0)
                                                                            {
                                                                                alert("Test Not Deleted");
                                                                            }
                                                                        });
                                                                       
                                                                    });
                                                                </script>

                                                        <?php $i++;  }
                                                            ?>
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
            $("#table1_div").load(location.href + " #table1_div");
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
            // location.reload();
            $("#table2_div").load(location.href + " #table2_div");
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
$("#btn_tst").click(function(){
    var test_n = $("#tst_name").val();
    var exam_n = $('#select_exam').val();
    // var subject_n = $('#select_subject').val();
    $.post("<?= site_url();?>/adminController/create_test", {test_n : test_n, exam_n : exam_n}, function(data){
        if(data==1)
        {
            alert("Test Created Successfully.");
            $("#table3_div").load(location.href + " #table3_div");
        }
        else if(data==0)
        {
            alert("Test Not Created");
        }
        else if(data==3)
        {
            alert("Test Already exists");
        }
    });
});

</script>