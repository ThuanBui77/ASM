// JavaScript Document
function check()

{
        var edit_ten_user = document.forms['edituser'].edit_ten_user.value;
	var edit_sdt_user = document.forms['edituser'].edit_sdt_user.value;

	

			
		var nameformat = /[\w]{3,16}/;  
		if (edit_ten_user.match(nameformat))  
		{
			tatthongbao("namep");
			}
		
                
                
		else
		{
			
			document.getElementById("namep").innerHTML ="Tên có độ dài từ 3-16 ký tự";
			document.getElementById("namep").style.color="red";

			return false;
		}
              
                        
                var sdtformat = /[\d]{9,12}/;  
		if (edit_sdt_user.match(sdtformat))  
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