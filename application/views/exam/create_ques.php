<?php $uri=  $this->uri->segment(3);?>
<script>
    switch(<?= $uri;?>)
    {
        case 1:
        alert("Question Submitted Successfully");
        break;
        case 2:
        alert("Question Not Submitted");
        break;
        case 3:
        alert("Question And Image Not Submitted");
        break;
        case 0:
        alert("please select answer");
        break;
    }
</script>
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
                                // echo $q_nmbr.$select_exam.$select_test.$select_subject;
                                $this->db->where('id',$select_exam);
                                $ex =  $this->db->get('exam_master');

                                $this->db->where('id',$select_test);
                                $tst = $this->db->get('exam_name');

                                $this->db->where('id',$select_subject);
                                $sub = $this->db->get('exam_subjects');
                                ?>
                                <div class="row" style="background-color:pink; margin:1%">
                                    <div class="col-md-3">
                                    <center>
                                      <?php  if($ex->num_rows()>0)
                                      {
                                          echo $ex->row()->name;
                                      }
                                      else
                                      {
                                          echo "N/A";
                                      }
                                      ?>
                                      </center>
                                    </div>
                                    <div class="col-md-3">
                                    <center>
                                    <?php  if($tst->num_rows()>0)
                                      {
                                          echo $tst->row()->exam_name;
                                      }
                                      else
                                      {
                                          echo "N/A";
                                      }
                                      ?></center>
                                    </div>
                                    <div class="col-md-3">
                                    <center><?php  if($sub->num_rows()>0)
                                      {
                                          echo $sub->row()->subject_name;
                                      }
                                      else
                                      {
                                          echo "N/A";
                                      }
                                      ?></center>
                                    </div>
                                    <div class="col-md-3"><?php echo $language->language; ?></div>
                                </div>
                                <div>
                                      <center><label>Select Question Type :</label><br>
                                      <label>Normal Question :</label><input type="radio" name="radio_q" id="radio_1" style="width:20px; height:18px;"/>
                                      <label>Image Question :</label><input type="radio" name="radio_q" id="radio_2" style="width:20px; height:18px;"/></center>
                                </div>
                                <div id="normal_ques">
                                    <div class="row">
                                        <div class="col-md-3"><label style="float:right"><b>Question :</b></label></div>
                                        <div class="col-md-9"><textarea id="ques" class="form-control" placeholder="Write Question here"></textarea></div>
                                        <label style="margin-left:45px;"><b>Question Options :<b></label><br>
                                    
                                    </div>
                                    <div class="row" style="margin-left:45px;">
                                        <div class="col-md-6">
                                            A:<input class="form-control" type="text" id="a1"/><br>
                                            B:<input class="form-control" type="text" id="b1"/><br>  
                                            C:<input class="form-control" type="text" id="c1"/><br>
                                        </div>
                                        <div class="col-md-6">                                                                                                         
                                            D:<input class="form-control" type="text" id="d1"/><br>
                                            E:<input class="form-control" type="text" id="e1"/><br>   
                                            Select Answer:<select class="form-control" id="sel_ct" style="width:150px">
                                                <option value="0">--Select--</option>
                                                <option value="1">A</option>
                                                <option value="2">B</option>
                                                <option value="3">C</option>
                                                <option value="4">D</option>
                                                <option value="5">E</option>
                                            </select>                                    
                                        </div>                                    
                                    </div>
                                    <center><input style="" type="button" value="Submit" id="submit_q" class="btn btn-primary"/></center>           
                                </div>
                                <div id="image_ques">
                                 <form method="post" action="<?= base_url();?>index.php/adminController/new_ques" enctype="multipart/form-data" >
                                    <div class="row">
                                        <input type="hidden" name="exam_master_id" value="<?= $select_exam;?>">
                                        <input type="hidden" name="exam_test_id" value="<?= $select_test;?>">
                                        <input type="hidden" name="exam_subject_id" value="<?= $select_subject;?>">
                                        <div class="col-md-3"><label style="float:right"><b>Question :</b></label></div>
                                        <div class="col-md-9">
                                            <textarea id="ques1" name="ques1" class="form-control"
                                                placeholder="Write Question here"></textarea>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input style="margin-top:15px;" type="file" id="qf1_id" name="qf1">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input  style="margin-top:15px;" type="file" id="qf2_id" name="qf2">
                                                        </div>
                                                    </div>         
                                                </div>
                                                <div class="col-md-6">                                                
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input style="margin-top:15px;" type="file" id="qf3_id" name="qf3">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input  style="margin-top:15px;" type="file" id="qf4_id" name="qf4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <label style="margin-left:45px;"><b>Question Options :<b></label><br>
                                    </div>
                                    <div class="row" style="margin-left:45px;">
                                        <div class="col-md-6">
                                            A:<input type="text" id="txt_af1_id" name="txt_af1" class="form-control" required><input type="file" id="af1_id" name="af1" class=""><br>
                                            B:<input type="text" id="txt_af2_id" name="txt_af2" class="form-control" required><input type="file" id="af2_id" name="af2" class="" ><br>
                                            C:<input type="text" id="txt_af3_id" name="txt_af3" class="form-control" required><input type="file" id="af3_id" name="af3" class="" ><br>
                                        </div>
                                        <div class="col-md-6">
                                            D:<input type="text" id="txt_af4_id" name="txt_af4" class="form-control" required><input type="file" id="af4_id" name="af4" class="" ><br>
                                            E:<input type="text" id="txt_af5_id" name="txt_af5" class="form-control" ><input type="file" id="af5_id" name="af5" class="" ><br>
                                            Select Answer:<select class="form-control" required name = "sel_ct" style="width:150px">
                                                <option value="0" disabled selected>--Select--</option>
                                                <option value="1">A</option>
                                                <option value="2">B</option>
                                                <option value="3">C</option>
                                                <option value="4">D</option>
                                                <option value="5">E</option>
                                            </select>
                                        </div>
                                        <center><input type="submit" value="Submit" id="submit_imgq" name="bt_qq" class="btn btn-primary" /></center>
                                    </div>
                                    </form>
                                </div>
                                                              
                                <!-- ///////// -->
                                <div id ="mydiv_q" class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> #</th>
                                                <th class="text-center">Exam Name</th>
                                                <th class="text-center">Language</th>
                                                <th class="text-center">Test Name</th>
                                                <th class="text-center">Subject</th>
                                                <th class="text-center">Question</th>
                                                <th class="text-center">Answer</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Delete</th>                     
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php $i=1;
                                                 if($dt_qt->num_rows()>0){
                                                foreach($dt_qt->result() as $data_q)
                                                { ?>
                                                <tr>
                                                    <td class="text-center"><?= $i;?></td>   
                                                    <td><?php  if($ex->num_rows()>0) { echo $ex->row()->name; } else { echo "N/A"; }?></td> 
                                                    <td><?php echo $language->language; ?></td>
                                                    <td><?php  if($tst->num_rows()>0) { echo $tst->row()->exam_name; } else { echo "N/A"; }?></td> 
                                                    <td><?php  if($sub->num_rows()>0) { echo $sub->row()->subject_name; } else { echo "N/A"; }?></td>                                                            
                                                    <td><textarea readonly><?php echo $data_q->question;?></textarea></td>
                                                    <?php 
                                                     $this->db->where('question_master_id',$data_q->id);
                                                     $dx_q = $this->db->get('right_ans'); ?>
                                                     <input type="hidden" id="questt_id<?= $i;?>" value="<?= $data_q->id;?>">
                                                    <td class="text-center"><?php if($dx_q->num_rows()>0){ ?><textarea readonly> <?php echo $dx_q->row()->right_answer; ?></textarea> <?php } else { ?> <textarea readonly> <?php echo "N/A"; }  ?></textarea></td>
                                                    <td class="text-center"><a target="_blank" href="<?= base_url();?>index.php/adminController/edit_q/<?= $data_q->id;?>" id="edit_ques<?= $i;?>" class="btn btn-warning">Edit</a></td>
                                                    <td class="text-center"><input type="button" value="Delete" id="dlt_ques<?= $i;?>" class="btn btn-danger"/></td>
                                                </tr>
                                                <script>
                                                    $("#dlt_ques<?= $i;?>").click(function(){
                                                        var ques_id = $("#questt_id<?= $i;?>").val();
                                                        //alert(ques_id);
                                                        $.post("<?= site_url();?>/adminController/delete_q",{ques_id : ques_id},function(data){
                                                            if(data==1)
                                                            {
                                                                alert("Question deleted successfully");
                                                                location.reload();

                                                            }
                                                            else if(data==0)
                                                            {
                                                                alert("Question not deleted");
                                                            }
                                                           
                                                        });
                                                    });
                                                </script>
                                            <?php $i++;  }
                                                }
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
<script>
/////////////create test///////////////
$("#image_ques").hide();
$("#normal_ques").hide();
$("#radio_1").click(function(){
    if($("#radio_1").is(":checked"))
    {
        $("#normal_ques").show();
        $("#image_ques").hide();
    }
    else
    {
        $("#image_ques").hide();
        $("#normal_ques").hide();
    }
});
$("#radio_2").click(function(){
    if($("#radio_2").is(":checked"))
    {
        $("#image_ques").show();
        $("#normal_ques").hide();
    }
    else
    {
        $("#image_ques").hide();
        $("#normal_ques").hide();
    }
});
// alert("3");
$("#submit_q").click(function(){
   
        var ques = $('#ques').val();
        var a = $('#a1').val();
        var b = $('#b1').val();
        var c = $('#c1').val();
        var d = $('#d1').val();
        var e = $('#e1').val();
        var sel = $('#sel_ct').val();
       
        var exam_master_id = <?= $select_exam;?>;
        var exam_name_id = <?= $select_test;?>;
        var exam_subject_id = <?= $select_subject;?>;
    if((ques.length>0) && (($('#a1').val()).length>0) && (($('#b1').val()).length>0) && (($('#c1').val()).length>0) && (($('#d1').val()).length>0) && (($('#e1').val()).length>0))
    {
        if(sel == "" || sel == 0)
        {
        alert("Please select anwser");   
        }
        else
        {
            if(sel == 1)
            {
            var ans = 'A';
            } 
            else if(sel == 2)
            {
                var ans = 'B';
            } 
            else if(sel == 3)
            {
                var ans = 'C';
            } 
            else if(sel == 4)
            {
                var ans = 'D';
            } 
            else if(sel == 5)
            {
                var ans = 'E';
            } 
    
            $.post("<?php echo site_url();?>/adminController/insert_question", {
                ques : ques,a:a,b:b,c:c,d:d,e:e,ans:ans,
                exam_master_id :exam_master_id,
                exam_name_id : exam_name_id,
                exam_subject_id : exam_subject_id
                }, function(data){
                // alert(data);
                if(data==1)
                {
                    alert("Question Created Successfully.");
                    // $("#table3_div").load(location.href + "#table3_div");
                    // $("#table4_div").load(location.href + " #table4_div");
                    // $("#m_div").load(location.href + " #m_div");
                    location.reload();
                }
                else if(data==0)
                {
                    alert("Question Not Created");
                }
                else if(data==3)
                {
                    alert("Question Already exists");
                }
            
            });
        }
    }
    else
    {
        alert("Fill All Feilds Correct. ");
    }
   
});
$("#qf1_id").change(function(){
            var ques1 = $("#ques1").val();
            var new1 = ques1+"<=1!>";
            $("#ques1").val(new1);
        });
        $("#qf2_id").change(function(){
            var ques2 = $("#ques1").val();
            var new2 = ques2+"<=2!>";
            $("#ques1").val(new2);
        });
        $("#qf3_id").change(function(){
            var ques3 = $("#ques1").val();
            var new3 = ques3+"<=3!>";
            $("#ques1").val(new3);
        });
        $("#qf4_id").change(function(){
            var ques4 = $("#ques1").val();
            var new4 = ques4+"<=4!>";
            $("#ques1").val(new4);
        });
        $("#af1_id").change(function(){
            var op1 = $("#txt_af1_id").val();
            var new_op1 = op1+"<=5!>";
            $("#txt_af1_id").val(new_op1);
        });
        $("#af2_id").change(function(){
            var op2 = $("#txt_af2_id").val();
            var new_op2 = op2+"<=6!>";
            $("#txt_af2_id").val(new_op2);
        });
        $("#af3_id").change(function(){
            var op3 = $("#txt_af3_id").val();
            var new_op3 = op3+"<=7!>";
            $("#txt_af3_id").val(new_op3);
        });
        $("#af4_id").change(function(){
            var op4 = $("#txt_af4_id").val();
            var new_op4 = op4+"<=8!>";
            $("#txt_af4_id").val(new_op4);
        });
        $("#af5_id").change(function(){
            var op5 = $("#txt_af5_id").val();
            var new_op5 = op5+"<=9!>";
            $("#txt_af5_id").val(new_op5);
        });
</script>