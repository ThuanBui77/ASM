<?php
class checkout {
    
    
     public function __construct(){
        
    }
    
    // phương thức này dùng để kiểm tra với email này
    // đã có đăng ký hay chưa tức có trong bảng users hay chưa, nếu có trả về ID
    // để thêm ID này vào cột userID trong bảng orders
    function getIDbyEmail($email)
      {
          $db = new connect();
          $query = "SELECT ID from users where Email = '$email'";
          $result = $db->getCG($query);
          return $result;

      }
      
     // phương thức này dùng để thêm dữ liệu vào bảng orders, trong đó cột userID sẽ được thêm dữ liệu vào
     // còn cột kvlID thì không vì phương thức này chỉ dành cho những user đã đăng ký tài khoản bằng email
     // trong csdl
    function inserttoOrderinUsers($dateformated, $tongtien, $ID)
    {
        $db = new connect();
        // Thực hiện việc thêm dữ liệu vào bảng orders
        $query = "INSERT INTO orders (orderID,Ngaytao,Tongtien,userID) VALUES ('NULL','$dateformated','$tongtien','$ID')";
        $result = $db->exec($query);
        // Lọc ra orderID mới nhất, orderID này sẽ được dùng để thêm vào cột orderID trong bảng ct_order
        $query = "SELECT orderID from orders order by orderID DESC limit 1 ";
        $results = $db->getCG($query);
        // trả về orderID mới nhất
        return $results[0];
    }
    
     function inserttoctOrderinUsers($orderID,$cgID,$gia,$sl,$thanhtien,$ghichu)
    {
        $db = new connect();
        $query = "INSERT INTO ct_order VALUES ('$orderID','$cgID','$gia','$sl','$thanhtien','$ghichu')";
        $result = $db->exec($query);
        return $result;
        
    }
    
     function createKVL($ten,$dic,$sdt,$email)
    {
        $db = new connect();
        // Vì tài khoản của khách vãng lai không được tạo trướ
        // nên phải thêm các thông tin từ việc thu thập trong trang thanh toán 
        // rồi thêm vào trong bảng khachvanglai
        // sau đó lấy ID trong bảng khachvang lai của khách vãng lai chèn 
        // vào cột kvlID trong bảng orders
        $query = "INSERT INTO khachvanglai (kvlID,Ten,Diachi,SDT,Email) VALUES ('NULL','$ten','$dic','$sdt','$email')";
        $results = $db->exec($query);
        // Lấy ID của khách vãng lai vừa tạo mới nhất để chèn vào cột kvlID bảng orders
        $query = "SELECT kvlID from khachvanglai order by kvlID DESC limit 1 ";
        $results = $db->getCG($query);
        return $results;
        
    }
    
     // phương thức này dùng để thêm dữ liệu vào bảng orders, trong đó cột kvlID sẽ được thêm dữ liệu vào
     // còn cột userID thì không vì phương thức này chỉ dành cho những user chưa đăng ký tài khoản bằng email
     // trong csdl
    
    function inserttoOrderinKVL($dateformated, $tongtien, $ID)
    {
        $db = new connect();
        // Thực hiện việc thêm dữ liệu vào bảng orders
        $query = "INSERT INTO orders (orderID,Ngaytao,Tongtien,kvlID) VALUES ('NULL','$dateformated','$tongtien','$ID')";
        $result = $db->exec($query);
        // Lọc ra orderID mới nhất, orderID này sẽ được dùng để thêm vào cột orderID trong bảng ct_order
        $query = "SELECT orderID from orders order by orderID DESC limit 1 ";
        $results = $db->getCG($query);
        // trả về orderID mới nhất
        return $results[0];
    }
    
    function inserttoctOrderinKVL($orderID,$cgID,$gia,$sl,$thanhtien,$ghichu)
    {
        $db = new connect();
        $query = "INSERT INTO ct_order VALUES ('$orderID','$cgID','$gia','$sl','$thanhtien','$ghichu')";
        $result = $db->exec($query);
        return $result;
        
    }
   
}
?>
