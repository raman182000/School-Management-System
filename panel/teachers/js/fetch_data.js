function dashboarddata()
{
	$.ajax({
		url:"./php/dashboard.php",
		method:"post",
		datatype:'JSON',
		success:function(data)
		{
			alert(data);
			data1=data.split(" ");
			alert(data1[0]);
			
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


function fetch_data_schools() {
	// body...

$.ajax({
		url:"./php/fetch_data_schools.php",
		method:"post",
		success:function(dataschool)
		{
			alert(dataschool);
			if (dataschool=="empty") {
				swal("oops",dataschool,"error");
			} else {
				$("#schools_data").html(dataschool);
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
			alert(data);
			if (data=="empty") {
				swal("oops",data,"error");
			} else {
				$("#teachers_data").html(data);
			}
			
		}
	});
}

function fetch_notice_data(status)
{
	$.ajax({
		url:"./php/fetch_notice_data.php",
		method:"post",
		data:{status:status},
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