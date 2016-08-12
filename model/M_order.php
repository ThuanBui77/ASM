<?php

class order 
{
    public function __construct(){
        
    }
    function getallOrders ()
    {
        $db = new connect();
        $query = "SELECT * from orders";
        $result = $db->getCGs($query);
        return $result;
    }
    
    function getforOrder ($id)
    {
        $db = new connect();
        $query = "SELECT * from orders WHERE orderID = '$id'";
        $result = $db->getCG($query);
        return $result;
    }
    
    function editOrder($id,$Ngaytao,$Tongtien,$userID,$kvlID)
    {
        $db = new connect();
        $query = "UPDATE orders SET Ngaytao = '$Ngaytao' ,Tongtien = '$Tongtien',userID = '$userID',kvlID = '$kvlID' WHERE orderID = '$id' ";
        $result = $db->exec($query);
        return $result;
    }
    
    function xoadonhang($id)
    {
        $db = new connect();
        $query = "DELETE FROM orders where orderID = '$id'";
        $result = $db->exec($query);
        return $result;
    }
}


?>

