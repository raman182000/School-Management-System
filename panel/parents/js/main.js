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
			data=data.split("~~~~~");
			if (data[0]=="completed") {
				$("#T_Name").html(data[1]);
				$("#T_Name2").html(data[1]);
			}
			else
			{
				$("#proBanner").html(data[0]);
				$("#T_Name").html(data[1]);
				$("#T_Name2").html(data[1]);
			}
		}
	});
}



function fetch_class()
{
   
	$.ajax({
		url:"./php/fetch_class.php",
        method:"post",
        data:{id:userid},
		success:function(data)
		{

				$("#class_details").html(data);
				
		}
	});
}


function fetch_results()
{
   
	$.ajax({
		url:"./php/fetch_result.php",
        method:"post",
        data:{id:userid},
		success:function(data)
		{

				$("#result_details").html(data);
				
		}
	});
}

