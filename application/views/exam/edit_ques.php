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
                                <?php if($q_dt->num_rows()>0)
                                {
                                    $q_dt2 = $q_dt->row();
                                    if($q_op->num_rows()>0)
                                    {
                                        $q_op2 = $q_op->row(); ?>
                                        <div class="row">
                                        <input type="hidden" id="q_id" value="<?= $q_dt2->id;?>">
                                    <div class="col-md-3"><label style="float:right"><b>Question :</b></label></div>
                                    <div class="col-md-9"><textarea id="ques_up" class="form-control"><?= $q_dt2->question;?></textarea></div>
                                    <label style="margin-left:45px;"><b>Question Options :<b></label><br>
                                   
                                </div>

                                <div class="row" style="margin-left:45px;">
                                    <div class="col-md-6">
                                        A:<input class="form-control" type="text" value=<?= $q_op2->A;?> id="a1_up"/><br>
                                        B:<input class="form-control" type="text" value=<?= $q_op2->B;?> id="b1_up"/><br>  
                                        C:<input class="form-control" type="text" value=<?= $q_op2->C;?> id="c1_up"/><br>
                                    </div>
                                    <div class="col-md-6">                                                                                                         
                                        D:<input class="form-control" type="text" value=<?= $q_op2->D;?> id="d1_up"/><br>
                                        E:<input class="form-control" type="text" value=<?= $q_op2->E;?> id="e1_up"/><br>   
                                        Select Answer:<select class="form-control" id="sel_ct_up" style="width:150px">
                                            <option value="0">--Select--<option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                            <option value="3">C</option>
                                            <option value="4">D</option>
                                            <option value="5">E</option>
                                        </select>                                    
                                    </div>
                                   
                                </div>
                                <center><input type="button" value="Update Question" id="update_ques" class="btn btn-success"/></center>
                                   <?php }
                                    else
                                    {
                                        echo "Data Not Available.";
                                    }
                                }
                                else
                                {
                                    echo "Data Not Available.";
                                }

                                ?>
                              
                                                                         
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
// alert("3");
// alert("3");
$("#update_ques").click(function(){
        var ques = $('#ques_up').val();
        var a = $('#a1_up').val();
        var b = $('#b1_up').val();
        var c = $('#c1_up').val();
        var d = $('#d1_up').val();
        var e = $('#e1_up').val();
        var sel = $('#sel_ct_up').val();
        var q_id = $("#q_id").val();
        // alert(ques+" "+a+" "+b+" "+c+" "+d+" "+e+" "+sel+" "+q_id);
    if((ques.length>0) && (a.length>0) && (b.length>0) && (c.length>0) && (d.length>0) && (e.length>0))
    {
        if(sel == "" || sel == 0)
        {
        alert("Please select anwser");   
        }
        else
        {
            if(sel == 1)
        {
        var ans = $('#a1_up').val();;  
        } 
        else if(sel == 2)
        {
            var ans = $('#b1_up').val();
        } 
        else if(sel == 3)
        {
            var ans = $('#c1_up').val();
        } 
        else if(sel == 4)
        {
            var ans = $('#d1_up').val();
        } 
        else if(sel == 5)
        {
            var ans = $('#e1_up').val();
        } 
        
        $.post("<?php echo site_url();?>/adminController/update_question", {
            ques : ques,a:a,b:b,c:c,d:d,e:e,ans:ans,q_id:q_id
            }, function(data){
            // alert(data);
            if(data==1)
            {
                alert("Question Update Successfully.");
                location.reload();
            }
            else if(data==0)
            {
                alert("Question Not Updated");
            }
        
        });
        }
       
    }
    else
    {
        alert("Fill All Feilds Correct. ");
    }
   
});
</script>