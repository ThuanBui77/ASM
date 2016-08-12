// JavaScript Document
function check()

{
	var email_login = document.forms['login'].email_login.value;
	var password_login = document.forms['login'].password_login.value;

		var mailformat = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;  
		if (email_login.match(mailformat))  
		{
			tatthongbao("emailp");
			}
		
		else
		{
			
			document.getElementById("emailp").innerHTML ="Vui lòng nhập Email hợp lệ !";
			document.getElementById("emailp").style.color="red";

			return false;
		}
                
                var passwordformat = /^[a-z0-9_-]{5,18}$/;  
		if (password_login.match(passwordformat))  
		{
			tatthongbao("passwordp");
			}
		
		else
		{
			
			document.getElementById("passwordp").innerHTML ="Password có độ dài từ 5-18 ký tự";
			document.getElementById("passwordp").style.color="red";

			return false;
			}


}

function tatthongbao(id){
	if
	(document.getElementById(id).style.display == "");
	 {document.getElementById(id).style.display = 'none'}
}