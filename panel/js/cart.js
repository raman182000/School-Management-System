var userid= window.sessionStorage.getItem("userid");
if (userid!=null)  
	{
        $("#loged-out").hide();
        $("#loged-in").show();
		$.post("php/fetchcart.php", {user: userid}, function(result){
			$(".cart-fetch").html(result);

		});
	} 
else
	{
 
	}

