function Checkcreate(event){ 

    

    var elements = event.currentTarget;

     
    var a = elements[0].value;
   
    var result = true;    

    var message =/^.{1,1000}$/; 
  
    document.getElementById("mssg").innerHTML ="";
 
    if (a==null || a==""||!message.test(a))
        {	   
	   document.getElementById("mssg").innerHTML="Enter text between the range of 1-1000";
           result = false;
        }

		
    if(result == false )
        {    
            event.preventDefault();
	
        }

else 
	{
	var b="Success";
	alert(b);
	}

	
}




