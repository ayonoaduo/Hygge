function SignUpForm() {

  var warn = "";

  var rt = true;




  var x = document.forms.SignUp.email.value;

  if (x == null || x == "") {

    warn += "Email is empty. \n";
    rt = false;

  } else if (x.length > 60) {
    warn += "Max length for email is 60 characters.\n";
    rt = false;
  } 


  var y = document.forms.SignUp.uname.value;

  if (y == null || y == "") {
    warn += "Username cannot be empty.\n";
    rt = false;
  } 

  var z = document.forms.SignUp.psw.value;

  if (z.length != 8) {
    warn += "Password must be exactly of 8 characters.\n";
    rt = false;
  } 


  var c = document.forms.SignUp.psw_repeat.value;
  if (z != c) {
    warn += "Password confirmation failed!\n";
    rt = false;
  } 
}
