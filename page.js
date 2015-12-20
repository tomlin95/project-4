


window.onload=function()
{
    document.getElementById("Person").onclick= vuser;
    document.getElementById("logout").onclick = logout;
	document.getElementById("Compose").onclick= compose_message;
	document.getElementById("Inbox").onclick= vmess;
}


function compose_message()
{
	console.log("Click works");
	var panel=
    [
		'<div id ="window">',
		'<div id="new">',
		'<div id="header"><em> New Message </em></div>',
		'</div>',
		'<form>',
		'<fieldset>',
		'<em>To</em><br> <input type="text" id ="recipient" name="recipient" class="textfield"> <br>',
		'<em>Subject</em><br> <input type="text" id="subject" name="subject" class="textfield"> <br><br>',
		'<em>Message</em><br> <textarea  id = "messcont" name="messcont" cols="40" rows="5"></textarea> <br>',
		'<button id="Send"> <em> Send </em> </button>',
		'</fieldset>',
		'</form>',
		'</div>',
		'<div id="Response"></div>',
		
	].join('');
	document.getElementById("page").innerHTML= panel;
	document.getElementById("Send").onclick= insert_data;
	
}





function insert_data()
{
    var recip = document.getElementById("recipient").value;
    var subj = document.getElementById("subject").value;
    var body = document.getElementById("messcont").value;
    var request = "recipient="+recip+"&subject="+subj+"&body="+body;
    var xmlreq = new XMLHttpRequest();
    xmlreq.open("POST","message.php",true);
    xmlreq.onreadystatechange = function(){
        if(xmlreq.readyState==4 && xmlreq.status==200){
            var response = xmlreq.responseText;
            alert(response);
            vmess();
        }
    };
    xmlreq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlreq.setRequestHeader("Content-length", request.length);
    xmlreq.setRequestHeader("Connection", "close");
    
    
    xmlreq.send(request);
}






function vmess(){
    console.log("the message list");
    var xmlreq = new XMLHttpRequest();
    xmlreq.onreadystatechange = function(){
        if(xmlreq.readyState==4 && xmlreq.status==200){
            var response = xmlreq.responseText;
            document.getElementById("page").innerHTML= response;
        }
    };
    xmlreq.open("POST","message_list.php",true);
    xmlreq.send();

}









function vuser()
{
    console.log("User Listing");
    var xmlreq = new XMLHttpRequest();
    xmlreq.onreadystatechange = function()
    {
        if(xmlreq.readyState==4 && xmlreq.status==200)
        {
            var response = xmlreq.responseText;
            document.getElementById("page").innerHTML= response;
             
        }
    };
    xmlreq.open("GET","vuser.php",true);
    xmlreq.send();   
}







function logout()
{
    console.log("logging out");
    var xmlreq = new XMLHttpRequest();
    xmlreq.onreadystatechange = function()
    {
        if(xmlreq.readyState==4 && xmlreq.status==200)
        {
            var response = xmlreq.responseText;
            alert(response);
             window.location.href="login.html";
        }
    };
    xmlreq.open("GET","logout.php",true);
    xmlreq.send();
    
}





function read()
{
    console.log("reading");
    var xmlreq = new XMLHttpRequest();
    xmlreq.onreadystatechange = function()
    {
        if(xmlreq.readyState==4 && xmlreq.status==200)
        {
            var response = xmlreq.responseText;
        }
    };

    xmlreq.open("GET","read.php",true);
    xmlreq.send();
    
}
