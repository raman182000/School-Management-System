    var username =window.localStorage.getItem('email');
    var userid=window.localStorage.getItem('userid');
      if (username!=null&& userid!=null) {
        window.sessionStorage.setItem('userid',userid);
        $("#loged-out").hide();
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