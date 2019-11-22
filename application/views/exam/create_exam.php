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
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Create practice</a>
                                </li>
                                </ul>
                                
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                        <div style="margin:3%;">
                                            <label><b>Enter Exam Name : </b></label><input type="text" id="e_name" name="e_name" required class="form-control" style="width:300px;"/>
                                            <input type="submit" id="b_e" name = "btn_e" value="Create Exam" class="btn btn-primary" style="margin:2%"/>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                        <div style="margin:3%;">
                                            <select class="form-control">
                                                <option></option>
                                            </select>
                                            <label><b>Enter Subject Name : </b></label><input type="text" id="s_name" name="s_name" required class="form-control" style="width:300px;"/>
                                            <input type="submit" id="btn_s" name = "btn_s" value="Create Subject" class="btn btn-primary" style="margin:2%"/>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                        <div style="margin:3%;">
                                            <select class="form-control">
                                                <option>Select Exam</option>
                                            </select>
                                            <select class="form-control">
                                                <option>Select Subject</option>
                                            </select>
                                            <label><b>Enter Subject Name : </b></label><input type="text" id="s_name" name="s_name" required class="form-control" style="width:300px;"/>
                                            <input type="submit" id="btn_s" name = "btn_s" value="Create Subject" class="btn btn-primary" style="margin:2%"/>
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
    
    $.post("adminController/insert_exam", {e_name : e_name}, function(data){
        // alert(e_name);
        alert(data);
    });
});
// alert("4");
</script>