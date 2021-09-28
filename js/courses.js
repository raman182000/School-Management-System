var userid=window.localStorage.getItem('userid');
      if (userid!=null) {
      	alert(userid);
        window.sessionStorage.setItem('userid',userid);
        $("#loged-out").css("display", "none");
        $("#loged-in").show();
      }
      else
      {
        if (window.sessionStorage.getItem('userid')!=null)
         {
            $("#loged-out").hide();
            $("#loged-in").show();
         } else 
         {
            $("#loged-in").hide();
         }
                
      }

var urlsearch=window.location.search.slice(1);
urlsearch=urlsearch.replace("=",'":"');
urlsearch='{"'+urlsearch+'"}';
var usersearch=JSON.parse(urlsearch);
var search_id = usersearch.id;

$.post("http://localhost/web/php/courses.php", {search_idstr:search_id}, function(response){ 
      if (response!="not found") 
      	{
      		$(".course-details").html(response);
      	} 
      	
});


function addtocart(id)
                  {

                    
                    if(window.sessionStorage.getItem("userid")!=null)
                    {
                    
                      userid= window.sessionStorage.getItem("userid");
                      $.post("./php/addtocart.php", {cid: id,user: userid}, function(result){
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
                            Sub_Id:id
                          });
                                swal("Added","To Cart","success");

                        window.localStorage.setItem("tmp_cart",JSON.stringify(old_cart));
                      }
                      else
                      {
                        var old_cart = JSON.parse(localStorage.getItem("tmp_cart") || "[]");
                        for(var i=0;i<old_cart.length;i++)
                          {
                          
                              if (old_cart[i].Sub_Id==id) 
                              {
                                swal("error","Already exist","error");
                              }
                              else
                              {   
                                swal("Added","To Cart","success");
                                old_cart.push({
                                Sub_Id:id
                                });
                                window.localStorage.setItem("tmp_cart",JSON.stringify(old_cart));
                              }
                          }
                        
                        
                      }
                      
                    }
                  
                  }