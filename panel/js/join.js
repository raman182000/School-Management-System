

 $("#regdiv").hide();

$("#crtacnt").on('click', function() {

            $("#logindiv").hide();
            $("#regdiv").show();
        });



        //login function toggle

        $("#logid").on('click', function() {

            $("#logindiv").show();
            $("#regdiv").hide();

        });

		//login form
$("#login").click( function() {
 		$.post( $("#loginform").attr("action"),
        $("#loginform :input").serializeArray(),
 		function(infoss) {	
 			if (infoss=="wrong_credential") {
 				swal("oops",infoss,"error");
  			}
 			else
 			{
 				if ($("#Remember-me").prop("checked")) {
 					var emailst =document.getElementById('emaillog').value;
	 				var pass =document.getElementById('passwordlog').value;
	 				window.localStorage.setItem("email",emailst);
	 				window.localStorage.setItem("userid",infoss);	 				
 				}
 				window.sessionStorage.setItem("userid",infoss);
 				window.location.href = "http://localhost/web/index.html";
 			}
			clear();
 	});
 
   		return false;
});


//register form
$("#regsubmit").click( function() {
 		$.post( $("#formregister").attr("action"),
        $("#formregister :input").serializeArray(),
 		function(info) {
 			if (info=="email_present") {
 				swal("oops!", info, "info");
 			}
 			else if (info=="mobile No_present") {
 				swal("oops!", info, "info");
 			}else
 			{	
 				var emailst =document.getElementById('email').value;
 				var pass =document.getElementById('password').value;
 				window.localStorage.setItem("email",emailst);
 				window.localStorage.setItem("password",pass);
 				swal("Welcome","To Cpi","success");
 				window.location.href = "http://localhost/web/index.html";

 			}
 			
			clear();
 	});
 

 	
   		return false;
	
});

 
function clear() {
 
$("#formregister :input").each( function() {
      $(this).val("");
});
 
}





document.getElementById('email').addEventListener('keyup',emailvalidate);
document.getElementById('mobileno').addEventListener('keyup',mobilevalidate);
document.getElementById('password').addEventListener('keyup',passvalidate);
document.getElementById('conpass').addEventListener('keyup',cpassvalidate);

function namevalidate() {
	// body...
	var nameval=document.getElementById('username').value;
	if (nameval=="") {
			document.getElementById('username').style.borderColor="red";
			document.getElementById("nameerror").style.visibility = "visible";
			document.getElementById("nameerror").innerText = "cannot be empty";
			
	}else if (nameval.length<3) {
			document.getElementById('username').style.borderColor="red";
			document.getElementById("nameerror").style.visibility = "visible";
			document.getElementById("nameerror").innerText = "cannot be less than 3";
			
	}
	else
	{
			document.getElementById('username').style.borderColor="green";
			document.getElementById("nameerror").style.visibility = "hidden";
			
	}
}
function emailvalidate() 
{
		var emailval =document.getElementById('email').value;
		var atsymbol=emailval.indexOf('@');
		var dot=emailval.lastIndexOf('.');
		if (emailval==="") {
			document.getElementById('email').style.borderColor="red";
			document.getElementById("emailerror").style.visibility = "visible";
			document.getElementById("emailerror").innerText = "cannot be empty";
			
		}
		else if (atsymbol<=0) {
			document.getElementById('email').style.borderColor="red";
			document.getElementById("emailerror").style.visibility = "visible";
			
		}
		else if(dot<=atsymbol+2) {
			document.getElementById('email').style.borderColor="red";
			document.getElementById("emailerror").style.visibility = "visible";
					

		}
		else if(dot==emailval.length-1)
		{
			document.getElementById('email').style.borderColor="red";
			document.getElementById("emailerror").style.visibility = "visible";
					

		}
		else
		{
		document.getElementById('email').style.borderColor="#2ecc71";
		document.getElementById("emailerror").style.visibility = "hidden";
		
		}
	}

function mobilevalidate() 
{
		// body...
		var mobilenoval = document.getElementById('mobileno').value;
		if (mobileerror=="") {
			document.getElementById('mobileno').style.borderColor="red";
			document.getElementById("mobileerror").innerText = "cannot be empty";
			
		}
		else if (mobilenoval.length!=10) {
			document.getElementById('mobileno').style.borderColor="red";
			document.getElementById("mobileerror").style.visibility = "visible";
			document.getElementById("mobileerror").innerText = "length should be 10";
					

		}
		else
		{
			document.getElementById('mobileno').style.borderColor="#2ecc71";
			document.getElementById("mobileerror").style.visibility = "hidden";	
			
		}
	}
function passvalidate() 
{
		// body...
		var passval =document.getElementById('password').value;
		
		if (passval=="") {
			document.getElementById('password').style.borderColor="red";
			document.getElementById("passerror").innerText = "cannot be empty";
			
		}
		else if(passval.length<8)
		{
			document.getElementById('password').style.borderColor="red";
			document.getElementById("passerror").style.visibility = "visible";
			document.getElementById("passerror").innerText = "length should greater than 8";	
				

		}
		else
		{
			document.getElementById('password').style.borderColor="#2ecc71";
			document.getElementById("passerror").style.visibility = "hidden";
					

		}
	}

function cpassvalidate() {
		// body...
		var passval =document.getElementById('password').value;
		var cpassval =document.getElementById('conpass').value;
		if (cpassval=="") {
			document.getElementById('conpass').style.borderColor="red";
			document.getElementById("cpasserror").innerText = "cannot be empty";
			
		}
		if (passval!=cpassval) {
			document.getElementById('conpass').style.borderColor="red";
			document.getElementById("cpasserror").style.visibility = "visible";
			document.getElementById("cpasserror").innerText = "password not match";
					

		}
		else
		{
			document.getElementById('conpass').style.borderColor="#2ecc71";
			document.getElementById("cpasserror").style.visibility = "hidden";
					
		}
	}






	