function dashboarddata_navbar()
{
	$.ajax({
		url:"./php/dashboard.php",
		method:"post",
		datatype:'JSON',
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


function fetch_data_subjects() {
	// body...

$.ajax({
		url:"./php/fetch_data_subjects.php",
		method:"post",
		success:function(datasubject)
		{
			if (datasubject=="empty") {
				swal("oops",datasubject,"error");
			} else {
				$("#subjects_data").html(datasubject);
			}
			
		}
	});
}
function fetch_data_teachers(status) {
	// body...

$.ajax({
		url:"./php/fetch_data_teachers.php",
		method:"post",
		data:{status:status},
		success:function(data)
		{
			if (data=="empty") {
				swal("oops",data,"error");
			} else {
				$("#teachers_data").html(data);
			}
			
		}
	});
}


$("#add_subject").click( function() {
	var cls=document.getElementById("class_list").value;
	var name=document.getElementById("subject_name").value;
	var price=document.getElementById("price").value;
	var short_description=document.getElementById("short_description").value;
	var long_description=document.getElementById("long_description").value;
	$.post( $("#subjectform").attr("action"),
   { class:cls, Name:name, Price:price, short_description:short_description, long_description:long_description },
	function(infoss) {	
		if (infoss=='error') {
			swal("oops!", "error", "error");
		} else if(infoss=='added') {
			swal("successfully", "added", "success");
			location.reload();			
		}
		else
		{
			swal("oops!", "Already Exist", "error");
		}
});

	  return false;
});

$.ajax({
	url:"./php/fetch_data_subjects.php",
	method:"post",
	success:function(data)
	{
		if (data=="empty") {
			swal("oops",data,"error");
		} else {
			$("#subjects_data").html(data);
		}
		
	}
});


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


function fetch_data_orders() {
	// body...

$.ajax({
		url:"./php/orders.php",
		method:"post",
		success:function(data)
		{
			if (data=="empty") {
				swal("oops",data,"error");
			} else {
				$("#orders_data").html(data);
			}
			
		}
	});
}


function fetch_notice_data()
{
	$.ajax({
		url:"./php/fetch_notice_data.php",
		method:"post",
		success:function(data)
		{
			data=data.split("~~~~~")
			if (data[0]=="empty") {
				swal("oops",data[0],"error");
			} else {
				$("#notice_data").html(data[0]);
				$("#modelcontain").html(data[1]);
			}
			
		}
	});
}


function block(userid,type,action) {
	$.ajax({
		url:"./php/block.php",
		method:"post",
		data:{userid:userid, type:type,action:action },
		success:function(data)
		{

			if (data=="Blocked") {
				swal("Successfully",data,"success");
				location.reload();
			}else if(data=="Approved"){
				swal("Successfully",data,"success");
			} 
			else {
				swal("oops",data,"error");
			}
			location.reload();
		}
	});
}


$("#ptmform").on('submit',(function(e) {
	e.preventDefault();
	$.ajax({
		url: "./php/zoom.php",
		type: "POST",
		data:  $('#ptmform').serialize(),
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


function fetch_ptm()
{
   
	$.ajax({
		url:"./php/fetch_ptm.php",
        method:"post",
		success:function(data)
		{
			data_re=data.split("~~~~~");
				$("#ptm_details").html(data_re[0]);
				$("#ptm_details_past").html(data_re[1]);
            
		}
	});
}