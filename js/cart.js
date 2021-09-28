var userid=window.localStorage.getItem('userid');
      if (userid!=null) {
        window.sessionStorage.setItem('userid',userid);
        $("#loged-out").css("display", "none");
        $("#loged-in").show();
        $.post("php/fetchcart.php", {user: userid}, function(result){

			$(".cart-fetch").html(result);

		});
      }
      else
      {
        if (window.sessionStorage.getItem('userid')!=null)
         {
            $("#loged-out").hide();
            $("#loged-in").show();
            $.post("php/fetchcart.php", {user: userid}, function(result){

			$(".cart-fetch").html(result);

		});

         } else 
         {
            $("#loged-in").hide();
         }
                
      }


