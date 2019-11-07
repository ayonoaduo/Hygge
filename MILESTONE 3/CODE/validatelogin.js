function LoginForm(){
	
	var x=document.forms.Login.email.value;
	var y=document.forms.Login.pswrd.value;
	
	
	 var email_v = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
	 var pswd_v = /^(\S*)?\d+(\S*)?$/;
	 
	 if (x==null || x==""||!email_v.test(x))
        {	   
	   document.getElementById("email_msg").innerHTML="Email is empty or invalid";
           result = false;
        }
		
		if (y==null||y==""||pswd_v.test(y) == false) {
    document.getElementById("pswd_msg").innerHTML="Password is empty or invalid(8 characters long at least one non-letter)";
    result= false;
  } 
  
  else 
	{
	var b="Success";
	alert(b);
	}

}