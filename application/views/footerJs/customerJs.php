  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>


<script>
  //alert("rahul");
 //$('#regForm').hide();
  $('#parent_id').keyup(function(){
    var parent_id= $('#parent_id').val();
    $.post("<?php echo site_url("clogin/checkID") ?>",{parent_id : parent_id}, function(data){
    	var d = jQuery.parseJSON(data);
		$("#custoStatus").html(d.msg);
 if(d.checkv==true){
	 $('#regForm').show();
 }else{
	 $('#regForm').show();
 }
   
  
  
	});
  });
	$("#textArea4").keyup(function() {
    var totalc = $("#textArea4").val();

    $.post("<?php echo base_url();?>index.php/sms/countChar4", {
      totalc: totalc
    }, function(data) {
      $("#totalCharacter4").val(data);
    });
  });
</script>