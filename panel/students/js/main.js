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

//index search page system
function fetch_course(page)
{
    var urlsearch=window.location.search.slice(1);
    urlsearch=urlsearch.replace("=",'":"');
    urlsearch='{"'+urlsearch+'"}';
    var usersearch=JSON.parse(urlsearch);
    var search = usersearch.Search_Text;   
    $.post("php/search.php", {search:search,page:page}, function(response){ 
        if (response!="not found") 
            {
                $("#content-block").html(response);
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

function fetch_option_subjects()
{

	$.ajax({
		url:"./php/fetch_option_subjects.php",
		method:"post",
		data:{ userid:userid },
		success:function(data)
		{
			if (data=="empty") {
                
            }			
            else
            {
				document.getElementById("user_id").value = userid;
                $("#teacher_id_Name").html(data); 
            }
		}
	});
}


function fetch_doubts()
{
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




function fetch_class()
{
   
	$.ajax({
		url:"./php/fetch_class.php",
        method:"post",
        data:{id:userid},
		success:function(data)
		{
			data=data.split("~~~~~");

			if ((data[0]=="empty") ||(data[1]=="empty") ) {
                $("#class_details").html(data[0]);
				$("#class_details_past").html(data[1]);
            }			
            else
            {

				$("#class_details").html(data[0]);
				$("#class_details_past").html(data[1]);
            }
		}
	});
}

	$("#teacher_id_Name").change(function(){
		var value = $("#teacher_id_Name").val();
		$.ajax({
			url:"./php/fetch_class_option.php",
			method:"post",
			data:{ teacher_id:value, userid:userid },
			success:function(response)
			{
				if (response!="empty")
				{
					$("#class_id").html(response);
				}
			}
		})
	});




$("#doubtform").on('submit',(function(e) {
	
	$.ajax({
		url: "./php/add_doubt.php",
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

function review_post(class_id) {
	var review= document.getElementById("review_details").value;
	var ele = document.getElementsByName('rate');             
            for(i = 0; i < ele.length; i++) { 
                if(ele[i].checked) 
                var rate=ele[i].value;
			} 
			$.ajax({
				url: "./php/add_review.php",
				method: "POST",
				data: { user_id:userid, class_id:class_id, rating:rate, review:review },
				success:function(data)
					{
						if (data=="Already Added") {
							swal("oops",data,"warning");
						} else if (data=="error") {
							swal("oops",data,"error");
						}
						else{
							swal("successfully",data,"success");
						}
					   
					}        
				   });	
}

//index search page system
function fetch_course(page)
{
    var urlsearch=window.location.search.slice(1);
    urlsearch=urlsearch.replace("=",'":"');
    urlsearch='{"'+urlsearch+'"}';
    var usersearch=JSON.parse(urlsearch);
    var search = usersearch.Search_Text;   
    $.post("php/search.php", {search:search,page:page}, function(response){ 
        if (response!="not found") 
            {
                $("#content-block").html(response);
            } 
      	
});
}
//pagination code
$(document).on("click","#pagination a",function(e)
{
    e.preventDefault();
    var Page_Id=$(this).attr("id");
    Fetch_Course(Page_Id);
}) 
//fetch full details course
//fetch courses full details
function fetch_details(){
    var urlsearch=window.location.search.slice(1);
    urlsearch=urlsearch.replace("=",'":"');
    urlsearch='{"'+urlsearch+'"}';
    var usersearch=JSON.parse(urlsearch);
    var search_id = usersearch.id;

    $.post("php/courses.php", {search_idstr:search_id}, function(response){ 
        alert();
        if (response!="not found") 
            {
                $("#content-block").html(response);
            } 
            
    }); 
}