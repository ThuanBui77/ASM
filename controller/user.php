<?php


session_start();
include '../model/connect.php';
include '../model/M_users.php';
require_once 'Mail.php';

if(isset($_GET['action']))
    $action = $_GET['action'];
elseif(isset($_POST['action']))
    $action = $_POST['action'];
else
{
    $action = "home";
}
        
switch($action)
{
    case "home" :
    {
        $id = $_SESSION['idus'];
        $obj = new users();
        $result = $obj->showUserbyID($id);
        include '../view/usersites/trangcanhan.php';
        break;
    }
    
    case "edit_user_link":
    {
        $id = $_GET['id'];
        $obj = new users();
        $result = $obj->showUserbyID($id);
        // Lọc ra ngày tháng năm đưa vào mảng để đưa vào từng Select
        $arrayngay = explode("-", $result[4]);
        
        $resultgt = null;
        switch ($result[7])
        {
          case "1" :
          {
              $resultgt = "Nam";
              break;
          }
          
          case "0" :
          {
              $resultgt = "Nữ";
              break;
          }
        }
        include '../view/usersites/edit_user.php';
        break;
    }
    
     case "edit_user_submit":
     {
         
         if(isset($_POST['edit_button']))
         {
            $id = $_POST['edit_id_user'];
            $ten = $_POST['edit_ten_user'];
            $diachi = $_POST['edit_dc_user'];
            $sdt = $_POST['edit_sdt_user'];
            $gt = $_POST['edit_gt_user'];
            move_uploaded_file($_FILES['upload']['tmp_name'], '../view/images/'.$_FILES['upload']['name']);
            $hinh = $_FILES['upload']['name'];
            $ngay = $_POST['select_ngay'];
            $thang = $_POST['select_thang'];
            $nam = $_POST['select_nam'];
            //Ghép các biến ngày tháng năm thành một chuỗi ngày tạo hóa đơn hoàn chỉnh
            $date = $nam . "-". $thang . "-". $ngay ;
            

            
         }
        
        $obj = new users();
        $result = $obj->editUserforUser($id, $ten, $date, $diachi, $sdt, $gt, $hinh);

            if($result)
            {
                 echo '<script language="javascript">'; 
                 echo 'alert("Cập nhật thành công")';
                 echo '</script>';
                 include '../view/usersites/trangcanhan.php';
                 break;
            }

            else 
            {
                echo '<script language="javascript">'; 
                echo 'alert("Cập nhật không thành công")';
                echo '</script>';
                header("Location:../controller/index.php?action=home");
                break;
            } 
     
        
        break;
     }
     
       case "resetpassword":
    {
       include '../view/usersites/resetpassword.php';
       break;
       
    }
    
        case "resetpassword_submit":
    {
       //Sử dụng phương thức getPassword dựa vào biến $_SESSION['email'], biến này
       //đã được nạp sẵn trong quá trình login
       $obj = new users();
       $result = $obj->getPassword($_SESSION['email']);
       $resultpass = $result[0];
       $passmoi = null;
       if(isset($_POST['confirm_button']))
       {
         if($_POST['mkc'] == null || $_POST['mkm'] == null)
         {
             echo '<script language="javascript">';
             echo 'alert("Mật khẩu mới và cũ không được để trống")';
             echo '</script>';
             include '../view/usersites/resetpassword.php';
             break;
         }
         
         else{
        //Gán vào biến $resultpassconfirm giá trị đã được mã hóa từ email ghép với password
        //người dùng nhập vào
        $resultpassconfirm = sha1($_POST['mkc'].$_SESSION['email']);
        
            
            if($resultpass == $resultpassconfirm)
            {
                //Nếu như kiểm tra password cũ người dùng nhập vào đúng với
                // password cũ trong CSDL thì tiếp tục nhận mã hóa password mới người dùng nhập
                // với email thì sẽ được giá trị mã hóa mới, giá trị này gán vào biến $passmoi
                $passmoi = sha1($_POST['mkm'].$_SESSION['email']);
                
                $resultpm = $obj->editPass($passmoi, $_SESSION['email']);
            
                if($resultpm)
                {
                    echo '<script language="javascript">';
                    echo 'alert("Thay đổi mật khẩu thành công")';
                    echo '</script>';
                    include '../view/usersites/resetpassword.php';
                    break; 
                }
            }
            
            else
            {
                
                echo '<script language="javascript">';
                echo 'alert("Mật khẩu cũ không đúng")';
                echo '</script>';
                include '../view/usersites/resetpassword.php';
                break; 
            }
            
            
       }   
       }
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


?>

