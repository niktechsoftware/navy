<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Update Question</h4>
						</div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Update<code> Question</code></h4>
                            </div>
                            <div class="card-body">                                
                                <!-- //////////////////create test//////////////////////// -->
                                <??>
                              
                                <div class="row">
                                    <div class="col-md-3"><label style="float:right"><b>Question :</b></label></div>
                                    <div class="col-md-9"><textarea id="ques" class="form-control"><?= $q_dt->question;?></textarea></div>
                                    <label style="margin-left:45px;"><b>Question Options :<b></label><br>
                                   
                                </div>

                                <div class="row" style="margin-left:45px;">
                                    <div class="col-md-6">
                                        A:<input class="form-control" type="text" value=<?= set_values($q_op->A);?> id="a1"/><br>
                                        B:<input class="form-control" type="text" value=<?= set_values($q_op->B);?> id="b1"/><br>  
                                        C:<input class="form-control" type="text" value=<?= set_values($q_op->C);?> id="c1"/><br>
                                    </div>
                                    <div class="col-md-6">                                                                                                         
                                        D:<input class="form-control" type="text" value=<?= set_value($q_op->D);?> id="d1"/><br>
                                        E:<input class="form-control" type="text" value=<?= set_value($q_op->E);?> id="e1"/><br>   
                                        Select Answer:<select class="form-control" id="sel_ct" style="width:150px">
                                            <option value="0">--Select--<option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                            <option value="3">C</option>
                                            <option value="4">D</option>
                                            <option value="5">E</option>
                                        </select>                                    
                                    </div>
                                   
                                </div>
                                <center><input style="" type="button" value="Edit Question" id="edit_q" class="btn btn-info"/></center>                                         
                                <!-- ///////// -->
                               
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
// alert("3");
$("#edit_q").click(function(){
   
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
        if(sel == "")
        {
        alert("Please select anwser");   
        }
        else if(sel == 0)
        {
        alert("Please select anwser");   
        }
        else if(sel == 1)
        {
        var ans = $('#a1').val();;  
        } 
        else if(sel == 2)
        {
            var ans = $('#b1').val();
        } 
        else if(sel == 3)
        {
            var ans = $('#c1').val();
        } 
        else if(sel == 4)
        {
            var ans = $('#d1').val();
        } 
        else if(sel == 5)
        {
            var ans = $('#e1').val();
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
    else
    {
        alert("Fill All Feilds Correct. ");
    }
   
});
</script>