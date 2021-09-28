if(window.sessionStorage.getItem("userid")!=null)
{
	var userid=window.sessionStorage.getItem("userid");
}
else
{
	var userid=window.localStorage.getItem("userid");
}

function dashboarddata_navbar()
{
    
    
	$.ajax({
		url:"./php/dashboard.php",
        method:"post",
        data:{T_Id:userid},
		success:function(data)
		{
            $("#T_Name").html(data);
			$("#T_Name2").html(data);
		}
	});
}

function fetch_data_students() {
	// body...
$.ajax({
		url:"./php/fetch_data_students.php",
		method:"post",
		success:function(data)
		{
			if (data=="empty") {
				swal("oops",data,"error");
			} else {
				$("#students_data").html(data);
			}
			
		}
	});

}


$("#classform").on('submit',(function(e) {
	e.preventDefault();
	$.ajax({
		url: "./php/zoom.php",
		type: "POST",
		data:  $('#classform').serialize(),
		success:function(data)
			{
		   	if(data=='invalid' || data=='error')
		   		{
			
		   		}
		   else
		   {
			swal("successfully", "added", "success");
			window.location.reload();
		   }
			}        
		   });
		   

}));
/*function submitclass() {
	$.ajax({
		url: "./php/zoom.php",
		type: "POST",
		data:  $('#classform').serialize(),
		success:function(data)
			{
		   	if(data=='invalid')
		   		{
			
		   		}
		   else
		   {
			 alert(data);
		   }
			}        
		   });
}*/




function fetch_class()
{
   
	$.ajax({
		url:"./php/fetch_class.php",
        method:"post",
        data:{id:userid},
		success:function(data)
		{
			data_re=data.split("~~~~~");
				$("#class_details").html(data_re[0]);
				$("#class_details_past").html(data_re[1]);
            
		}
	});
}


$("#add_notice").click( function() {
	var notice=document.getElementById("notice_details").value;
	var send_to=document.getElementById("send_to").value;
	$.post( $("#noticeform").attr("action"),
   { notice_details:notice, send_to:send_to },
	function(infoss) {	
        if (infoss=='error')
        {
			swal("oops!", "error", "error");
		} else if(infoss=='added') {
            alert("added");
            document.getElementById("noticeform").reset();
            swal("successfully", "added", "success");
			window.location.reload();			
		}
		else
		{
			swal("oops!", "error in adding", "error");
		}
});

	  return false;
});


function fetch_doubts(){
	$.ajax({
		url:"./php/fetch_doubts.php",
        method:"post",
        data:{id:userid},
		success:function(data)
		{
			if (data=="empty") {
                
            }			
            else
            {

                data=data.split("~~~~~")
                $("#doubts_list").html(data[0]);
				$("#solution_model").html(data[1]);

            }
		}
	});
}

$("#solutionform").on('submit',(function(e) {
	$.ajax({
		url: "./php/add_solution.php",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data)
			{
		   	if(data=='invalid')
		   		{
			
		   		}
		   else
		   {
			 alert(data);
		   }
			}        
		   });
e.preventDefault();
		   
}));


function add_doubtid(doubtid) {
	document.getElementById("doubt_id").value=doubtid;
}




$("#paperform").on('submit',(function(e) {
	$.ajax({
		url: "./php/add_paper.php",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data)
			{
		   	if(data=='invalid' || data=="error")
		   		{
					swal("oops!",data,"error");
					$('#paperform').reset;
					$('#paperModal').modal('hide');
		   		}
		   else
		   {
			 swal("Successfully",data,"success");
			 $('#paperform').reset;
			 $('#paperModal').modal('hide');
		   }
			}        
		   });

		   e.preventDefault();
}));
