// JavaScript Document
function checkRegister()

{
        var name = document.forms['register'].name.value;
	var email = document.forms['register'].email.value;
	var password = document.forms['register'].password.value;
	var sdt = document.forms['register'].sdt.value;

	

			
		var nameformat = /[\w]{3,16}/;  
		if (name.match(nameformat))  
		{
			tatthongbao("namep");
			}
		
                
                
		else
		{
			
			document.getElementById("namep").innerHTML ="Tên có độ dài từ 3-16 ký tự";
			document.getElementById("namep").style.color="red";

			return false;
		}
                
                
                var mailformat = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;  
		if (email.match(mailformat))  
		{
			tatthongbao("emailp_regis");
			}
		
		else
		{
			
			document.getElementById("emailp_regis").innerHTML ="Vui lòng nhập Email hợp lệ !";
			document.getElementById("emailp_regis").style.color="red";

			return false;
		}
                
                
                
                
                var passwordformat = /^[a-z0-9_-]{5,18}$/;  
		if (password.match(passwordformat))  
		{
			tatthongbao("passwordp_regis");
			}
		
		else
		{
			
			document.getElementById("passwordp_regis").innerHTML ="Password có độ dài từ 5-18 ký tự";
			document.getElementById("passwordp_regis").style.color="red";

			return false;
			}
                        
                var sdtformat = /[\d]{9,12}/;  
		if (sdt.match(sdtformat))  
		{
			tatthongbao("sdtp");
			}
		
                
		else
		{
			
			document.getElementById("sdtp").innerHTML ="Vui lòng nhập số điện thoại hợp lệ !";
			document.getElementById("sdtp").style.color="red";

			return false;
		}         

}

function tatthongbao(id){
	if
	(document.getElementById(id).style.display == "");
	 {document.getElementById(id).style.display = 'none'}
}