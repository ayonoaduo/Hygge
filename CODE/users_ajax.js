document.getElementById("username").addEventListener("keyup", getUsernameList);


function getUsernameList(event) {

	var xhr=new XMLHttpRequest();

	xhr.onreadystatechange=function() {
  		if (xhr.readyState==4 && xhr.status==200) {
    		//document.getElementById("usernames").innerHTML=xhr.responseText;
    		var responseObj = JSON.parse(xhr.responseText);
    		document.getElementById("usernames").innerHTML = "";
    		for (var i = 0; i < responseObj.users.length; i++) {
    			var ptag = document.createElement("p");
    			ptag.innerHTML = responseObj.users[i].email;
    			ptag.className="user";
    			ptag.addEventListener("click", clickSuggestion);
    			document.getElementById("usernames").appendChild(ptag);
			}
    	}
  	}
	xhr.open("GET","users_ajax.php?email=" + encodeURIComponent(event.currentTarget.value),true);
	xhr.send();
}


function clickSuggestion(event) {
	document.getElementById("username").value = event.currentTarget.innerHTML;
	document.getElementById("usernames").innerHTML = "";
}