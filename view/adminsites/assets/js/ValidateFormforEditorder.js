// JavaScript Document
function check()

{
        var edit_order_tongtien = document.forms['editorder'].edit_order_tongtien.value;

              
                        
                var ttformat = /[\d]{5,12}/;  
		if (edit_order_tongtien.match(ttformat))  
		{
			tatthongbao("ttp");
			}
		
                
		else
		{
			
			document.getElementById("ttp").innerHTML ="Vui lòng nhập số tiền hợp lệ !";
			document.getElementById("ttp").style.color="red";

			return false;
		}         

}

function tatthongbao(id){
	if
	(document.getElementById(id).style.display == "");
	 {document.getElementById(id).style.display = 'none'}
}