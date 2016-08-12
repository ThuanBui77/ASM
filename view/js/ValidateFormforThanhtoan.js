// JavaScript Document
function check()

{
	var ten = document.forms['thanhtoan'].ten.value;
        var dic = document.forms['thanhtoan'].dic.value;
	var sdt = document.forms['thanhtoan'].sdt.value;
        var email = document.forms['thanhtoan'].email.value;
		
                var nameformat = /[\w]{3,16}/;  
		if (ten.match(nameformat))  
		{
			tatthongbao("namep");
			}
		
                
                
		else
		{
			
			document.getElementById("namep").innerHTML ="Tên có độ dài từ 3-16 ký tự";
			document.getElementById("namep").style.color="red";

			return false;
		}
                
                
                var dcformat = /[\w]{10,120}/;  
		if (dic.match(dcformat))  
		{
			tatthongbao("namep");
			}
		
                
                
		else
		{
			
			document.getElementById("dcp").innerHTML ="Địa chỉ có độ dài từ 10-120 ký tự";
			document.getElementById("dcp").style.color="red";

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
                
                
                 var mailformat = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;  
		if (email.match(mailformat))  
		{
			tatthongbao("emailp");
			}
		
		else
		{
			
			document.getElementById("emailp").innerHTML ="Vui lòng nhập Email hợp lệ !";
			document.getElementById("emailp").style.color="red";

			return false;
		}

}

function tatthongbao(id){
	if
	(document.getElementById(id).style.display == "");
	 {document.getElementById(id).style.display = 'none'}
}