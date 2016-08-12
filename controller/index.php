<?php
session_start();
include '../model/connect.php';
include '../model/M_caygiong.php';
include '../model/M_users.php';
include '../model/M_checkout.php';
include '../model/M_showhinh.php';
require_once 'Mail.php';

if(isset($_GET['action']))
    $action = $_GET['action'];

elseif(isset($_POST['action']))
    $action = $_POST['action'];
        
else 
        $action = "home";
    

switch($action)

{
    case "home":
        
        $show = new caygiong();
        // show cây giống mới nhất
        $result = $show->showCGbyDate();
        // show cây giống bán chạy nhất
        $results = $show->showCGsbyRating();
        include '../view/home.php';
        break;
    
    
    case "caygiong":
       
        $show = new caygiong();
        // show cây giống thuộc loại Hoa, trong trang cây giống mặc định sẽ show ra loại này
        $result = $show->showCGsbyHoa();
        // Sử dụng phương thức countLoai để đếm số lượng Loại, việc lặp lại phương thức này
        // ở các case dưới là để hiển thị số lượng loại ở tất cả các trang cây giống khác nhau
        $count = $show->countLoai();
        $resultforc = $show->showCGsbyHoa();
        include '../view/caygiong.php';
        break;
    
    case "antrai":
        
        $show = new caygiong();
        $result = $show->showCGsbyAntrai();
        $count = $show->countLoai();
        include '../view/caygiong.php';
        break;
    
    case "thango":
        
        $show = new caygiong();
        $result = $show->showCGsbyThango();
        $count = $show->countLoai();
        include '../view/caygiong.php';
        break;
    
    case "traikieng":
        
        $show = new caygiong();
        $result = $show->showCGsbyTraikieng();
        $count = $show->countLoai();
        include '../view/caygiong.php';
        break;
    
    case "dau":
        
        $show = new caygiong();
        $result = $show->showCGsbyDau();
        $count = $show->countLoai();
        include '../view/caygiong.php';
        break;
    
    case "kiengla":
        
        $show = new caygiong();
        $result = $show->showCGsbyKiengla();
        $count = $show->countLoai();
        include '../view/caygiong.php';
        break;
    
    case "raucai":
        
        $show = new caygiong();
        $result = $show->showCGsbyRaucai();
        $count = $show->countLoai();
        include '../view/caygiong.php';
        break;
    
    case "giavi":
        
        $show = new caygiong();
        $result = $show->showCGsbyGiavi();
        $count = $show->countLoai();
        include '../view/caygiong.php';
        break;
    
    case "cu":
        
        $show = new caygiong();
        $result = $show->showCGsbyCu();
        $count = $show->countLoai();
        include '../view/caygiong.php';
        break;
    
    case "vattu":
        
        $show = new caygiong();       
        $result = $show->showCGsbyVattu();
        $count = $show->countLoai();
        include '../view/caygiong.php';
        break;
    
    case "datmua" :
        // nút Đặt mua đã đính kèm ID trong phần tử Macg của từng cây giống
        // gán cho biến $Macg bằng phần tử được đính kèm
        $Macg = $_GET['Macg'];
        $show = new caygiong(); 
        // sử dụng phương thức giohang để gán cho mảng result các thuộc tính của cây giống
        // có ID = vs ID của cây giống
        $result = $show->giohang($Macg);
           
        // Nếu mảng $_SESSION['cart'] chưa được set
        // thì $_SESSION$_SESSION['cart']['kèm theo ID để phân biệt từng cây giống']
        // mảng này sẽ được gán các thuộc tính trong mảng $result lấy từ phương thức giohang
        // đồng thời gán cho $_SESSION['cart'][$Macg]['sl'] = 1 tức số lượng = 1
        if(!isset($_SESSION['cart'])) 
        {
          $_SESSION['cart'][$Macg] = $result;
          $_SESSION['cart'][$Macg]['sl'] = 1;
          include '../view/giohang.php';
          break;
        } 
        
        // Trường hợp phát hiện key đã có sẵn nhờ phương thúc array_key_exist
        // key ở đây là $Macg,thì phần tử ['sl'] được cộng dồn = 1
        elseif (array_key_exists($Macg, $_SESSION['cart'])) 
            {  
                $_SESSION['cart'][$Macg]['sl'] += 1;      
                include '../view/giohang.php';
                break;
            }

        else
            
        {
             $_SESSION['cart'][$Macg] = $result;
             $_SESSION['cart'][$Macg]['sl'] = 1;
              include '../view/giohang.php';
              break;
        }
       
       
        break;
    case "link_cart":
           {
            include '../view/giohang.php';
            break;
           }
    case "update_cart":
            
            $Macgs = $_POST['Macgs'];
           
            if(isset($Macgs))
            {
            foreach ($Macgs as $Macg => $sl)
            {
              if(!(is_numeric($sl)))
            {
                echo '<script language="javascript">';
                echo 'alert("Vui lòng nhập đúng định dạng số")';
                echo '</script>';
            }
                else{
                   $_SESSION['cart'][$Macg]['sl'] = $sl; 
                }
               

            }
            
            }
            
            elseif(!isset($Macgs))
            {
                echo '<script language="javascript">';
                echo 'alert("Cần có sản phẩm mới có thể cập nhật số lượng")';
                echo '</script>';
                include  '../view/giohang.php';
            }
        include '../view/giohang.php';
        break;
    
    case "xoagiohang":

        $Macg = $_GET['Macg'];
        unset($_SESSION['cart'][$Macg]);
        include '../view/giohang.php';
        break;
    
    case "thanhtoan":

        include '../view/thanhtoan.php';
        break;
    
     
    
    case "chitiet":
    {
        $ID = $_GET['Macg'];
        $obj = new caygiong();
        $result = $obj->getChitietcg($ID);
        // Do xuất xứ và khí hậu được lưu trong CSDL dưới dạng số nên 
        // dùng switch để chuyển sang dạng chữ thường
        $khihau = null;
        $xuatxu = null;
        switch ($result[2])
        {
          case "1" :
          {
              $khihau = "Xứ nóng";
              break;
          }
          
          case "2" :
          {
              $khihau = "Xứ lạnh";
              break;
          }
            
          break;  
        }
        
         switch ($result[3])
        {
          case "1" :
          {
              $xuatxu = "Việt Nam";
              break;
          }
          
          case "2" :
          {
              $xuatxu = "Mỹ";
              break;
          }
          
          case "3" :
          {
              $xuatxu = "Nhật Bản";
              break;
          }
          
          case "4" :
          {
              $xuatxu = "Nga";
              break;
          }
          
          case "5" :
          {
              $xuatxu = "Thái Lan";
              break;
          }
            
          break;  
        }
        
        
     
        
        
        
        include '../view/chitiet.php';
        break;
    }
        
        
    case "login_link":
        
    {
        include '../view/login_register.php';
        break;
    }
    
    case "login_submit":
    {
        if(isset($_POST['login_button']))
        {
         $email = $_POST['email_login'];
         $pass = sha1($_POST['password_login'].$email);
         $obj = new users();
         $resultname = $obj->getName($email);
         $resultpass = $obj->getPassword($email);
         $resultrole = $obj->getRole($email);
         $resultID = $obj->getID($email);
         
         // Lấy dữ liệu từ cột Avatar để truyền vào biến $_SESSION['$avatar']
         $resultAvatar = $obj->showAvatar($email);
         $resultfullname = $obj->getFullthanhtoan($email);
         // Mảng $_SESSION['infoforcart'][$resultfullname[0]] lưu lại kết quả từ
         // phương thức getFullthanhtoan
         // Sau đó lấy các giá trị trong mảng kết quả truyền sang 
         // trang thanh toán, key ở đây là $resultfullname[0] tức ID
        
         $_SESSION['infoforcart'][$resultfullname[0]] = $resultfullname;
         
        if($email == null || $pass == null)
         {
             echo '<script language="javascript">';
             echo 'alert("Email và Password không được để trống")';
             echo '</script>';
             include  '../view/login_register.php';
             break;
         }

         elseif ($pass !== $resultpass[0]) 
         {
             echo '<script language="javascript">';
             echo 'alert("Email hoặc Password không đúng")';
             echo '</script>';
             include  '../view/login_register.php';
             break;
         }
         
         elseif($pass == $resultpass  || $resultrole[0] == 1)     
         {
               $_SESSION['@dmin'] = $resultname[0];
               
               
               // Dùng biến $_SESSION['$avatar'] để lưu lại tên file ảnh trong cột 
               // Avatar bảng users để lấy ảnh đó ra div trên cùng tất cả các trang
               $_SESSION['avatar'] = $resultAvatar[0];
               // Biến $_SESSION['email'] dùng để đưa vào case continue_checkout
               // Trong trường hợp người dùng đã đăng nhập
               // Case continue_checkout sẽ dựa vào biến $_SESSION['email']
               // để xác định các thông tin thuộc về 1 email
               // sau đó các thông tin này vào các input trong trang thanhtoan
               $_SESSION['email'] = $email;
               header ("Location:../controller/admin.php");

            
         }   
        
         elseif($pass == $resultpass  || $resultrole[0] == 0) 
             {
                 // Dùng biến $_SESSION['idus'] để lưu lại ID, sau đó dùng ID này
                 // để lấy ra tất cả các thông tin của User đó nạp vào phần thông tin
                 // ở trang cá nhân. Đối với user ADMIN, việc quản lý thông tin cá nhân
                 // sẽ có ở một trang riêng trong Dashboard
                 $_SESSION['idus'] = $resultID[0];
                 $_SESSION['username'] = $resultname[0];
                 
                 // Dùng biến $_SESSION['$avatar'] để lưu lại tên file ảnh trong cột 
                 // Avatar bảng users để lấy ảnh đó ra div trên cùng tất cả các trang
                 $_SESSION['avatar'] = $resultAvatar[0];
                 $_SESSION['email'] = $email;
                 header ("Location:../controller/index.php");

             }
         
         else
         {
             echo "có lỗi";

         }
         
         
         }
 
        break;
    }
    
    
    case "login_submit_cart":
    {
        if(isset($_POST['login_button']))
        {
         $email = $_POST['email'];
         $pass = sha1($_POST['password'].$email);
         $obj = new users();
         $resultname = $obj->getName($email);
         $resultpass = $obj->getPassword($email);
         $resultrole = $obj->getRole($email);
         
         // Lấy dữ liệu từ cột Avatar để truyền vào biến $_SESSION['$avatar']
         $resultAvatar = $obj->showAvatar($email);
         
         $resultfullname = $obj->getFullthanhtoan($email);
         // Mảng $_SESSION['infoforcart'][$resultfullname[0]] lưu lại kết quả từ
         // phương thức getFullthanhtoan
         // Sau đó lấy các giá trị trong mảng kết quả truyền sang 
         // trang thanh toán, key ở đây là $resultfullname[0] tức ID
        
         $_SESSION['infoforcart'][$resultfullname[0]] = $resultfullname;

         if($email == null || $pass == null)
         {
            echo '<script language="javascript">';
            echo 'alert("Email và Password không được để trống")';
            echo '</script>';
            include  '../view/giohang.php';
            
         }

         elseif ($pass !== $resultpass[0]) 
         {
            echo '<script language="javascript">';
            echo 'alert("Email hoặc Password không đúng")';
            echo '</script>';
            include  '../view/giohang.php';
         }
         
         elseif($pass == $resultpass  || $resultrole[0] == 1)     
         {
               $_SESSION['username'] = $resultname[0];
               // Biến $_SESSION['email'] dùng để đưa vào case continue_checkout
               // Trong trường hợp người dùng đã đăng nhập
               // Case continue_checkout sẽ dựa vào biến $_SESSION['email']
               // để xác định các thông tin thuộc về 1 email
               // sau đó các thông tin này vào các input trong trang thanhtoan
               $_SESSION['email'] = $email;
               include  '../view/thanhtoan.php';

            
         }   
        
         elseif($pass == $resultpass  || $resultrole[0] == 0) 
         {
                 
                 
                 $_SESSION['avatar'] = $resultAvatar[0];
                 $_SESSION['username'] = $resultname[0];
                 $_SESSION['email'] = $email;
                 include  '../view/thanhtoan.php';
         }
         
             
             
         }
 
        break;
    }
    
    
    
    case "continue_checkout":
    {
        $obj = new users();  
        $resultfullname = $obj->getFullthanhtoan($_SESSION['email']);
         // Mảng $_SESSION['infoforcart'][$resultfullname[0]] lưu lại kết quả từ
         // phương thức getFullthanhtoan
         // Sau đó lấy các giá trị trong mảng kết quả truyền sang 
         // trang thanh toán, key ở đây là $resultfullname[0] tức ID
        
        $_SESSION['infoforcart'][$resultfullname[0]] = $resultfullname;
        include  '../view/thanhtoan.php';
        break;
    }
    
    
    
    
    case "xacnhan":
      {

        if(isset($_POST['confirm_button']))
          
        $obj = new checkout();
        // biến KVL dùng để lưu ID mặc định vào trong trường hợp khách vãng lai chọn
        // 
        $KVL = 10;
        
        $ten = $_POST['ten'];
        $dic = $_POST['dic'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $ghichu = $_POST['ghichu'];
        
        // phương thức này dùng để kiểm tra với email này
        // đã có đăng ký hay chưa tức có trong bảng users hay chưa, nếu có trả về ID
        // để thêm ID này vào cột userID trong bảng orders
        $resultgetIDbyEmail = $obj->getIDbyEmail($email);
        
        // lấy ngày tháng hiện tại
        $date = time();
        // định dạng ngày tháng
        $dateformated = date("Y-m-d",$date);
        
        // biến $tongtien được gán giá trị bằng biến $_SESSION['tongtien']
        // biến này đã được gán giá trị từ trang thanhtoan
        $tongtien =  $_SESSION['tongtien'];
        
         
       // Nếu có ID lấy từ kết quả so với Email
       // thì thực hiện lệnh sau
         if($resultgetIDbyEmail[0] !== null)
        {
             // Sử dụng phương thức inserttoOrderinUsers để đưa dữ liệu vào bảng orders
             $resultgetorderID = $obj->inserttoOrderinUsers($dateformated, $tongtien, $resultgetIDbyEmail[0]);
             // Trong biến $resultgetorderID đã có chứa sẵn orderID mới nhất
             // được lấy ra từ phương thức inserttoOrderinKVL
             // Sử dụng foreach để lấy các value và key trong $_SESSION['cart'] sau đó
             // thêm vào các cột trong bảng orders
             foreach ($_SESSION['cart'] as $Macg => $row)
             {
              $resultinserttoctOrder = $obj->inserttoctOrderinUsers($resultgetorderID, $row[0], $row[2], $row['sl'],  $row['thanhtien'],$ghichu);
             }
        }

        else     
        {
            // Sử dụng phương thức createKVL để tạo các thông tin cho khách vãng lai
            // đặc biệt trong đó có ID để đưa vào cột kvlID trong bảng orders
            $resultcreateKVL = $obj->createKVL($ten, $dic, $sdt, $email);
            // Sử dụng phương thức inserttoOrderinKVL để thêm các thông tin vào các cột
            // trong đó có $resultcreateKVL[0] là ID lấy từ phương thức createKVL
            $resultgetorderID = $obj->inserttoOrderinKVL($dateformated, $tongtien, $resultcreateKVL[0]);
            // Trong biến $resultgetorderID đã có chứa sẵn orderID mới nhất
             // được lấy ra từ phương thức inserttoOrderinKVL
             // Sử dụng foreach để lấy các value và key trong $_SESSION['cart'] sau đó
             // thêm vào các cột trong bảng orders
             foreach ($_SESSION['cart'] as $Macg => $row)
             {
              $inserttoctOrderinKVL = $obj->inserttoctOrderinKVL($resultgetorderID, $row[0], $row[2], $row['sl'],  $row['thanhtien'],$ghichu);
             }
        }
        
        $noidung = "Cảm ơn bạn đã mua hàng tại GREEN PLANET. Sau đây là thông tin đơn đặt hàng của bạn :";
        $noidung .= '<table>
                    <thead>
                      <tr>
                        <th>Tên cây giống</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                      </tr>
                    </thead>
                    <tbody>
                    ';
                     
        foreach ($_SESSION['cart'] as $Macg => $row)
        {
             echo "<tr>";
             echo "<td>";
              $thanhtien  = $_SESSION['cart'][$Macg]['thanhtien'] = $row[2] * $row['sl'];
       
     
              
         
      $noidung .=  $row[1]. " - " . $row['sl']. " - " .number_format($thanhtien) . " ". "VND". " ";
             echo "</td>";
             echo "</tr>";
        }
      $noidung .= '
       </tbody> <table>';
      $noidung .= $tongtien = 0;
                              foreach ($_SESSION['cart'] as $row)
                              {
                                  
                                  $tongtien += ($row['thanhtien']);

                              }
                              // Kết quả biến $tongtien được lưu vào biến $_SESSION['tongtien']
                              // được dùng để đưa vào cột Tongtien trong bảng order 
                              $_SESSION['tongtien'] = $tongtien;
                               number_format($_SESSION['tongtien']) . " VND";
      
      $noidung .= '<table>
                    <thead>
                      <tr>
                        <th>Họ và Tên :</th>
                        <th>Địa chỉ :</th>
                        <th>Số điện thoại :</th>
                        <th>Email : </th>
                      </tr>
                    </thead>
                    <tbody>';
      $noidung .=  '<tr>';
      $noidung .=  "<td>" . $ten . "</td>";
      $noidung .=  "<td>" . $dic . "</td>";
      $noidung .=  "<td>" . $sdt . "</td>";
      $noidung .=  "<td>" . $email . "</td>";
      $noidung .=  '</tr> </tbody> </table>';      
                        
                      
                    
                  
      
        $name = $_POST['ten'];
        $from = $_POST['email'];
        $ghichu = $_POST['ghichu'];

        
        $emails = array();
        $emails['host'] = 'ssl://smtp.gmail.com';
        $emails['port'] = 465;
        $emails['auth'] = true;
        $emails['username'] = 'lab7ps03304@gmail.com';
        $emails['password'] = 'abc123@#';
        
        $mailobbj = Mail::factory('smtp',$emails);
        
        $headers = array();
        $headers['Content-type'] = 'text/html';
        $headers['From'] = $from;
        $headers['To'] = "thuanbnps03304@fpt.edu.vn";
        $headers['Subject'] = "ASM 2";
        
        $danhsach = "thuanbnps03304@fpt.edu.vn";
        
        $result = $mailobbj->send($danhsach, $headers, $noidung);
        
        if (PEAR::isError($result)){
            echo "Lỗi gửi mail";
        }
        
         else {
             echo "";
         }
        

        include '../view/xacnhan.php';
        break;
        }
     
     case "register_link":
        
    {
        include '../view/login_register.php';
        break;
    }  
    
    case "register_submit":
    {   
        if(isset($_POST['register_button']))
            $Ten = $_POST['name'];
            $Email = $_POST['email'];  
            $Password = sha1($_POST['password'].$Email);
            $Diachi = $_POST['diachi'];
            $SDT = $_POST['sdt'];
            //Tìm email xem đã tồn tại chưa
            $objcheckemail = new users();
            $checkmail = $objcheckemail->getEmail($Email);
            $checkmails = $checkmail[0];
           
            if(empty($Ten) || empty($Email) || empty($Password))
            {
                echo '<script language="javascript">';
                echo 'alert("Tên, Email và Password không được để trống !")';
                echo '</script>';
                include '../view/login_register.php';
                break;
            }
            
            else 
                {
                 if($Email == $checkmails)
                 {
                   echo '<script language="javascript">';
                   echo 'alert("Email đã được đăng ký, vui lòng chọn Email khác!")';
                   echo '</script>';
                   include '../view/login_register.php';
                   break;
                 }
                 
                 else
                 {
                     $objregis = new users();
                     $result = $objregis->insertUser($Email, $Ten, $Password, $Diachi, $SDT);
                     if ($result < 1)
                     {
                         echo '<script language="javascript">';
                         echo 'alert("Đăng ký không thành công!")';
                         echo '</script>';
                         include '../view/login_register.php';
                         break;
                     }
                     else
                     {
                         echo '<script language="javascript">';
                         echo 'alert("Đăng ký thành công!")';
                         echo '</script>';
                         include '../view/login_register.php';
                         break;
                     }
                 }
            }

            break;
    }       
    
    case "trangcn":
    {
       header("Location:../controller/user.php");
       break;
    }
    
    case "admin_link":
    {
      header ("Location:../controller/admin.php");
      break;
    }
    case "logout":
    {
        $_SESSION = array();
        session_destroy();
        header ("Location:./index.php");
        break;
    }
}


