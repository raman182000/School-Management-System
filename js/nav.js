var userid=window.localStorage.getItem('userid');
      if (userid!=null) {
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