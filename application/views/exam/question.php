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
                                <a href="<?= base_url();?>index.php/adminController/img_questions">img_questions</a>
                            </div>                            
                            <form method="post" action="<?= base_url();?>index.php/adminController/new_ques" enctype="multipart/form-data" >
                            <div class="card-body">
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
                                                        <input class="form-control" type="file" id="qf1_id" name="qf1">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input  class="form-control" type="file" id="qf2_id" name="qf2">
                                                    </div>
                                                </div>         
                                            </div>
                                            <div class="col-md-6">                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input class="form-control" type="file" id="qf3_id" name="qf3">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input  class="form-control" type="file" id="qf4_id" name="qf4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                       
                                    </div>
                                    <label style="margin-left:45px;"><b>Question Options :<b></label><br>
                                </div>
                                <div class="row" style="margin-left:45px;">
                                    <div class="col-md-6">
                                        A:<input type="text" id="txt_af1_id" name="txt_af1" class="form-control" required><input type="file" id="af1_id" name="af1" class="form-control"><br>
                                        B:<input type="text" id="txt_af2_id" name="txt_af2" class="form-control" required><input type="file" id="af2_id" name="af2" class="form-control" ><br>
                                        C:<input type="text" id="txt_af3_id" name="txt_af3" class="form-control" required><input type="file" id="af3_id" name="af3" class="form-control" ><br>
                                    </div>
                                    <div class="col-md-6">
                                        D:<input type="text" id="txt_af4_id" name="txt_af4" class="form-control" required><input type="file" id="af4_id" name="af4" class="form-control" ><br>
                                        E:<input type="text" id="txt_af5_id" name="txt_af5" class="form-control" ><input type="file" id="af5_id" name="af5" class="form-control" ><br>
                                        Select Answer:<select class="form-control" required name = "sel_ct" style="width:150px">
                                            <option value="0" disabled selected>--Select--</option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                            <option value="3">C</option>
                                            <option value="4">D</option>
                                            <option value="5">E</option>
                                        </select>
                                    </div>
                                    <center><input type="submit" value="Submit" id="submit_q" name="bt_qq" class="btn btn-primary" /></center>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ///////// -->
    <script>
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