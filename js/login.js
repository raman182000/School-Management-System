$("#login").click( function() {
    $.post( $("#loginform").attr("action"),
   $("#loginform").serializeArray(),
    function(infoss) {	
        if (infoss=="wrong credential") {
            swal("oops",infoss,"error");
         }
        else
        {            
            if ($("#Remember-me").prop("checked")) {
                window.localStorage.setItem("userid",infoss);                                     
            }
            if($("#teacher").prop("checked"))
            {
                window.location.href = "http://localhost/web/panel/teachers/dashboard.html";
            }
            else
            {
                window.location.href = "http://localhost/web/panel/students/dashboard.html";
            }
            window.sessionStorage.setItem("userid",infoss);
            
        }
       $("loginform").reset();
});

      return false;
});