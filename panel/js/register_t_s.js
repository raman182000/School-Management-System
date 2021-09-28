$(document).ready(function(){
  $('#teacher_reg').click(function(e) {
  	// body...
  	$.post( $("#formregister_T").attr("action"),
        $("#formregister_T :input").serializeArray(),
 		function(info) {
 			if (info=="email_present") {
 				swal("oops!", info, "info");
 			}
 			else if (info=="mobile No_present") {
 				swal("oops!", info, "info");
 			}else
 			{	
 			window.location.href = "http://localhost/web/panel/admin/admin_dashboard.html";
			$('#formregister_T')[0].reset();
 				
 							}
 	});


  	e.preventDefault();
  })

//school registration
$('#school_reg').click(function(e) {
  	// body...
  	$.post( $("#formregister_school").attr("action"),
        $("#formregister_school :input").serializeArray(),
 		function(info) {
 			if (info=="email_present") {
 				swal("oops!", info, "info");
 			}
 			else if (info=="mobile No_present") {
 				swal("oops!", info, "info");
 			}else
 			{	
 				 			window.location.href = "http://localhost/web/panel/admin/admin_dashboard.html";

 				$('#formregister_school')[0].reset();
 				
 							}
 	});


  	e.preventDefault();
  })
});