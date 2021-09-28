var urlsearch=window.location.search.slice(1);
urlsearch=urlsearch.replace("=",'":"');
urlsearch='{"'+urlsearch+'"}';
var usersearch=JSON.parse(urlsearch);
var search_text = usersearch.search_txt;

$.post("http://localhost/web/php/search.php", {search_txtstr:search_text}, function(response){ 
      if (response!="not found") 
      	{
      		$("#products").html(response);
      	} 
      	
});

$('.teacher').popover({
	title:fetchdata,
	html:true,
	placement:'right'
});

function fetchdata(){
	var fetch_data='';
	var element=$(this);

	var id=element.attr('id');
	$.ajax({
		url:"../fetchdata.php",
		method:"post",
		async:false,
		data:{id:id},
		success:function(data)
		{
			fetch_data=data;
		}
	});
	return fetch_data;
}



                  function addtocart()
                  {
                    alert("done");
                    
                    if(window.sessionStorage.getItem("userid")!=null)
                    {
                    userid= window.sessionStorage.getItem("userid");
                      $.post("php/addtocart.php", {cid: id,user: userid}, function(result){
                      if(result=="Inserted")
                      {
                        swal("Added","To Cart","success");
                      }
                      else
                      {
                        swal("error","Already exist","error");
                      }
                      });
                    }
                    else
                    {
                      
                      if(window.localStorage.getItem("tmp_cart")==null)
                      {
                        old_cart=[];
                        old_cart.push({
                            id:id
                          });

                        window.localStorage.setItem("tmp_cart",JSON.stringify(old_cart));
                      }
                      else
                      {
                        var old_cart = JSON.parse(localStorage.getItem("tmp_cart") || "[]");
                        old_cart.push({
                            id:id
                          });

                        window.localStorage.setItem("tmp_cart",JSON.stringify(old_cart));
                      }
                      swal("Added","To Cart","success");
                    }
                  
                  }
          