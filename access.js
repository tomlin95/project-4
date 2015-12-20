


function check()
{
	var username = $("username").value;
	var password = $("password").value;
	console.log("Got the values");
    	var regex =/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,})/ ;
	if(!(regex.test(password)))
  {
        alert("Password not valid");
        return false;
}

window.onload = function()
{

}
	
	
  var response;
	var request = "login.php?username="+username+"&password="+password;
	var get = new XMLHttpRequest();

	get.onreadystatechange = function()
  {
        if(get.readyState==4 && get.status==200 )
        {
           response = get.responseText;
           console.log(response);
           if (response=="fail") 
           {
               document.getElementById("status").innerHTML= "<div class='loginstat'><em> Fail </em></div>";
                
            }
            else if(response=="pass")
            {
                document.getElementById("status").innerHTML= "<div class='loginstat'><em> Success </em></div>";
                window.location.href="page.html";
                
            }
        }
	};
	get.open("get",request ,true);
  get.send();
    
    
    
};
