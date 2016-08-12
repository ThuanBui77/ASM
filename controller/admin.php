<?php
session_start();
include '../model/connect.php';
include '../model/M_caygiong.php';
include '../model/M_users.php';
include '../model/M_checkout.php';
include '../model/M_order.php';
require_once 'Mail.php';

if(isset($_GET["action"]))
    $action = $_GET["action"];
elseif(isset($_POST["action"]))
    $action = $_POST["action"];
else {
    $action = 'admin';
}


 switch ($action){
     case "admin":
     {
         $obj = new order();
         $objcg = new caygiong();
         $objus= new users();
         $objkvl = new users();
         $orders = $obj->getallOrders();
         $caygiong = $objcg->getallcaygiongs();
         $users = $objus->showUserexceptPass();
         $khachvl = $objkvl->showkvl();
         include '../view/adminsites/dashboard.php';
         break;
   
     }
     
    
     
     case "edit_orders":
     {
         $id = $_GET['id'];
         $obj = new order();
         $result = $obj->getforOrder($id);
         // Lọc ra ngày tháng năm đưa vào mảng để đưa vào từng Select
         $arrayngay = explode("-", $result[1]);
         include '../view/adminsites/edit_orders.php';
         break;
     }
     
     case "edit_orders_submit":
     {
         
         if(isset($_POST['edit_button']))
         {
            $id = $_POST['edit_order_id'];
            $tongtien = $_POST['edit_order_tongtien'];
            $mk = $_POST['edit_order_mk'];
            $mkvl = $_POST['edit_order_mkvl'];
            $ngay = $_POST['select_ngay'];
            $thang = $_POST['select_thang'];
            $nam = $_POST['select_nam'];
            //Ghép các biến ngày tháng năm thành một chuỗi ngày tạo hóa đơn hoàn chỉnh
            $date = $nam . "-". $thang . "-". $ngay ;         

            
        //  Không cho nhập cùng lúc Mã khách hàng và Mã khách vãng lai
            if(($_POST['edit_order_mk'] !== "") and ($_POST['edit_order_mkvl']) !== "")
            {
                echo "Không thể nhập cùng lúc Mã khách và Mã khách vãng lai";
                
            }
//            Phải nhập hoặc Mã khách hoặc Mã khách vãng lai
            elseif(($_POST['edit_order_mk'] == "") and ($_POST['edit_order_mkvl']) == "")
            {
                echo "Phải nhập hoặc Mã khách hoặc Mã khách vãng lai";
                
            }
            
            else
            {
                $obj = new order();
                $result = $obj->editOrder($id, $date, $tongtien, $mk, $mkvl);
                
                if($result)
                {
                    echo "Cập nhật thành công";
                    header ("Location:../controller/admin.php");
                }
                
                else 
                {
                    echo "Cập nhật không thành công";
                    header ("Location:../controller/admin.php");
                }
                
            
            }
         }
         break;
     }
     
     
     
     
     
     case "delete_orders":
     {
         $id = $_GET['id'];
         $obj = new order();
         $result = $obj->xoadonhang($id);
         
         if($result)
         {
             header ("Location:../controller/admin.php");
         }
         else 
         {
             echo "Có lỗi xảy ra";
         }
         break;
     }
     
     case "edit_cg":
     {
         $id = $_GET['id'];
         $obj = new caygiong();
         $result = $obj->getallcaygiongsbyID($id);
         
         // Lấy ra tất cả màu sắc trong bảng mausac để đưa vào các dòng select
         $objms = new caygiong();
         $resultms = $objms->getMausac();
         
         // Lấy ra tất cả khí hậu trong bảng khihau để đưa vào các dòng select
         $objkh = new caygiong();
         $resultkh = $objkh->getKhihau();
         
         // Lấy ra tất cả Xuất xứ trong bảng xuatxu để đưa vào các dòng select
         $objxx = new caygiong();
         $resultxx = $objxx->getXuatxu();
         
         // Lấy ra tất cả loại trong bảng loai để đưa vào các dòng select
         $objl = new caygiong();
         $resultl = $objl->getLoai();
         
         // Lọc ra ngày tháng năm đưa vào mảng để đưa vào từng Select
         $arrayngay = explode("-", $result[2]);
         
         // Do màu sắc, khí hậu, xuất xứ, loại được lưu trong CSDL dưới dạng số nên 
        // dùng switch để chuyển sang dạng chữ thường
        $mausac = null;
        $khihau = null;
        $xuatxu = null;
        $loai = null;
        
        switch ($result[4])
        {
          case "1" :
          {
              $mausac = "Vàng";
              break;
          }
          
          case "2" :
          {
              $mausac = "Xanh lá";
              break;
          }
          
          case "3" :
          {
              $mausac = "Đỏ";
              break;
          }
          
          case "4" :
          {
              $mausac = "Trắng";
              break;
          }
          
          case "5" :
          {
              $mausac = "Xanh lam";
              break;
          }
          
          case "6" :
          {
              $mausac = "Tím";
              break;
          }
          break;
        }
        switch ($result[5])
        {
          case "1" :
          {
              $khihau = "Xứ Nóng";
              break;
          }
          
          case "2" :
          {
              $khihau = "Xứ Lạnh";
              break;
          }
            
          break;  
        }
        
         switch ($result[6])
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
        
        switch ($result[7])
        {
          case "1" :
          {
              $loai = "HOA";
              break;
          }
          
          case "2" :
          {
              $loai = "ĂN TRÁI";
              break;
          }
          
          case "3" :
          {
              $loai = "THÂN GỖ";
              break;
          }
          
          case "4" :
          {
              $loai = "TRÁI KIỂNG";
              break;
          }
          
          case "5" :
          {
              $loai = "ĐẬU";
              break;
          }
          
          case "6" :
          {
              $loai = "KIỂNG LÁ";
              break;
          }
          
          case "7" :
          {
              $loai = "RAU CẢI";
              break;
          }
          
          case "8" :
          {
              $loai = "GIA VỊ";
              break;
          }
          
          case "9" :
          {
              $loai = "CỦ";
              break;
          }
          
          case "10" :
          {
              $loai = "VẬT TƯ - PHÂN THUỐC";
              break;
          }
            
           break;
        }
         
         
     
     
         include '../view/adminsites/edit_cg.php';
         break;
     }
     
     case "edit_cg_submit":
     {
         
         if(isset($_POST['edit_button']))
         {
            $id = $_POST['edit_cg_id'];
            $tencg = $_POST['edit_cg_tencg'];
            $gia = $_POST['edit_cg_gia'];
            $mausac = $_POST['edit_cg_mausac'];
            $khihau = $_POST['edit_cg_khihau'];
            $xuatxu = $_POST['edit_cg_xuatxu'];
            $loai = $_POST['edit_cg_loai'];
            $ct = $_POST['edit_cg_ct'];
            $nd = $_POST['edit_cg_nd'];
            move_uploaded_file($_FILES['upload']['tmp_name'], '../view/images/'.$_FILES['upload']['name']);
            $hinh = $_FILES['upload']['name'];
            $rating = $_POST['edit_cg_rating'];
            $ngay = $_POST['select_ngay'];
            $thang = $_POST['select_thang'];
            $nam = $_POST['select_nam'];
            //Ghép các biến ngày tháng năm thành một chuỗi ngày tạo hóa đơn hoàn chỉnh
            $date = $nam . "-". $thang . "-". $ngay ;  
            
            
            
            switch ($mausac)
        {
          case "Vàng" :
          {
              $mausac = "1";
              break;
          }
          
          case "Xanh lá" :
          {
              $mausac = "2";
              break;
          }
          
          case "Đỏ" :
          {
              $mausac = "3";
              break;
          }
          
          case "Trắng" :
          {
              $mausac = "4";
              break;
          }
          
          case "Xanh lam" :
          {
              $mausac = "5";
              break;
          }
          
          case "Tím" :
          {
              $mausac = "6";
              break;
          }
          break;
        }
        switch ($khihau)
        {
          case "Xứ Nóng" :
          {
              $khihau = "1";
              break;
          }
          
          case "Xứ Lạnh" :
          {
              $khihau = "2";
              break;
          }
            
          break;  
        }
        
         switch ($xuatxu)
        {
          case "Việt Nam" :
          {
              $xuatxu = "1";
              break;
          }
          
          case "Mỹ" :
          {
              $xuatxu = "2";
              break;
          }
          
          case "Nhật Bản" :
          {
              $xuatxu = "3";
              break;
          }
          
          case "Nga" :
          {
              $xuatxu = "4";
              break;
          }
          
          case "Thái Lan" :
          {
              $xuatxu = "5";
              break;
          }
            
          break;  
        }
        
        switch ($loai)
        {
          case "HOA" :
          {
              $loai = "1";
              break;
          }
          
          case "ĂN TRÁI" :
          {
              $loai = "2";
              break;
          }
          
          case "THÂN GỖ" :
          {
              $loai = "3";
              break;
          }
          
          case "TRÁI KIỂNG" :
          {
              $loai = "4";
              break;
          }
          
          case "ĐẬU" :
          {
              $loai = "5";
              break;
          }
          
          case "KIỂNG LÁ" :
          {
              $loai = "6";
              break;
          }
          
          case "RAU CẢI" :
          {
              $loai = "7";
              break;
          }
          
          case "GIA VỊ" :
          {
              $loai = "8";
              break;
          }
          
          case "CỦ" :
          {
              $loai = "9";
              break;
          }
          
          case "VẬT TƯ" :
          {
              $loai = "10";
              break;
          }
            
            
                
            
          break;  
         }
        
        $obj = new caygiong();
        $result = $obj->editCg($id, $tencg, $date, $gia, $mausac, $khihau, $xuatxu, $loai, $ct, $nd, $hinh, $rating);

            if($result)
            {
                echo "Cập nhật thành công";
                header ("Location:../controller/admin.php");
            }

            else 
            {
                echo "Cập nhật không thành công";
            } 
     }
        
        break;
     }
     
     
     
     case "delete_cg":
     {
         $id = $_GET['id'];
         $obj = new caygiong();
         $result = $obj->xoacg($id);
         
         if($result)
         {
             header ("Location:../controller/admin.php");
         }
         else 
         {
             echo "Có lỗi xảy ra";
         }
         break;
     }
     
     case "delete_user":
     {
         $id = $_GET['id'];
         $obj = new users();
         $result = $obj->xoauser($id);
         
         if($result)
         {
             header ("Location:../controller/admin.php");
         }
         else 
         {
             echo "Có lỗi xảy ra";
         }
         break;
     }
     
     case "delete_kvl":
     {
         $id = $_GET['id'];
         $obj = new users();
         $result = $obj->xoakvl($id);
         
         if($result)
         {
             header ("Location:../controller/admin.php");
         }
         else 
         {
             echo "Có lỗi xảy ra";
         }
         break;
     }
     
     case "themcaygiong_link":
        
    {
         // Lấy ra tất cả màu sắc trong bảng mausac để đưa vào các dòng select
             $objms = new caygiong();
             $resultms = $objms->getMausac();

             // Lấy ra tất cả khí hậu trong bảng khihau để đưa vào các dòng select
             $objkh = new caygiong();
             $resultkh = $objkh->getKhihau();

             // Lấy ra tất cả Xuất xứ trong bảng xuatxu để đưa vào các dòng select
             $objxx = new caygiong();
             $resultxx = $objxx->getXuatxu();

             // Lấy ra tất cả loại trong bảng loai để đưa vào các dòng select
             $objl = new caygiong();
             $resultl = $objl->getLoai();
        include '../view/adminsites/add_cg.php';
        break;
    }
     
     case "add_cg_submit":
     {
          
         if(isset($_POST['add_button']))
         {
            $tencg = $_POST['add_cg_tencg'];
            $gia = $_POST['add_cg_gia'];
            $mausac = $_POST['add_cg_mausac'];
            $khihau = $_POST['add_cg_khihau'];
            $xuatxu = $_POST['add_cg_xuatxu'];
            $loai = $_POST['add_cg_loai'];
            $ct = $_POST['add_cg_ct'];
            $nd = $_POST['add_cg_nd'];
            move_uploaded_file($_FILES['upload']['tmp_name'], '../view/images/'.$_FILES['upload']['name']);
            $hinh = $_FILES['upload']['name'];
            $rating = $_POST['add_cg_rating'];
            $ngay = $_POST['select_ngay'];
            $thang = $_POST['select_thang'];
            $nam = $_POST['select_nam'];
            //Ghép các biến ngày tháng năm thành một chuỗi ngày tạo hóa đơn hoàn chỉnh
            $date = $nam . "-". $thang . "-". $ngay ;  
            
            
            
            
            switch ($mausac)
        {
          case "Vàng" :
          {
              $mausac = "1";
              break;
          }
          
          case "Xanh lá" :
          {
              $mausac = "2";
              break;
          }
          
          case "Đỏ" :
          {
              $mausac = "3";
              break;
          }
          
          case "Trắng" :
          {
              $mausac = "4";
              break;
          }
          
          case "Xanh lam" :
          {
              $mausac = "5";
              break;
          }
          
          case "Tím" :
          {
              $mausac = "6";
              break;
          }
          break;
        }
        
        switch ($khihau)
        {
          case "Xứ Nóng" :
          {
              $khihau = "1";
              break;
          }
          
          case "Xứ Lạnh" :
          {
              $khihau = "2";
              break;
          }
            
          break;  
        }
        
         switch ($xuatxu)
        {
          case "Việt Nam" :
          {
              $xuatxu = "1";
              break;
          }
          
          case "Mỹ" :
          {
              $xuatxu = "2";
              break;
          }
          
          case "Nhật Bản" :
          {
              $xuatxu = "3";
              break;
          }
          
          case "Nga" :
          {
              $xuatxu = "4";
              break;
          }
          
          case "Thái Lan" :
          {
              $xuatxu = "5";
              break;
          }
            
          break;  
        }
        
        switch ($loai)
        {
          case "HOA" :
          {
              $loai = "1";
              break;
          }
          
          case "ĂN TRÁI" :
          {
              $loai = "2";
              break;
          }
          
          case "THÂN GỖ" :
          {
              $loai = "3";
              break;
          }
          
          case "TRÁI KIỂNG" :
          {
              $loai = "4";
              break;
          }
          
          case "ĐẬU" :
          {
              $loai = "5";
              break;
          }
          
          case "KIỂNG LÁ" :
          {
              $loai = "6";
              break;
          }
          
          case "RAU CẢI" :
          {
              $loai = "7";
              break;
          }
          
          case "GIA VỊ" :
          {
              $loai = "8";
              break;
          }
          
          case "CỦ" :
          {
              $loai = "9";
              break;
          }
          
          case "VẬT TƯ" :
          {
              $loai = "10";
              break;
          }
            
            
                
            
          break;  
         }
        

         
        $obj = new caygiong();
        $result = $obj->insertCgs($tencg, $date, $gia, $mausac, $khihau, $xuatxu, $loai, $ct, $nd, $hinh, $rating);

            if($result)
            {
                echo "Thêm thành công";
                header ("Location:../controller/admin.php");
            }

            else 
            {
                echo "Thêm không thành công";
            } 
     }
        
        break;
         

     }
     
     
    case "themuser_link":
        
    {
         
        include '../view/adminsites/add_user.php';
        break;
    } 
     
    case "add_user_submit":
     {
          
         if(isset($_POST['add_button']))
         {
            $email = $_POST['add_email_user'];
            $ten = $_POST['add_ten_user'];
            $password = $_POST['add_password_user'];
            $diachi = $_POST['add_dc_user'];
            $sdt = $_POST['add_sdt_user'];
            $gt = $_POST['add_gt_user'];
            move_uploaded_file($_FILES['upload']['tmp_name'], '../view/images/'.$_FILES['upload']['name']);
            $hinh = $_FILES['upload']['name'];
            $ngay = $_POST['select_ngay'];
            $thang = $_POST['select_thang'];
            $nam = $_POST['select_nam'];
            //Ghép các biến ngày tháng năm thành một chuỗi ngày tạo hóa đơn hoàn chỉnh
            $date = $nam . "-". $thang . "-". $ngay ;  
            
         }
        

         
        $obj = new users();
        $result = $obj->insertUserforAdmin($email, $ten, $password, $date, $diachi, $sdt, $gt, $hinh);

            if($result)
            {
                echo "Thêm thành công";
                header ("Location:../controller/admin.php");
            }

            else 
            {
                echo "Thêm không thành công";
            } 
     
        
        break;
         

     }
     
     case "manager_admin_link":
        
    {
        $obj = new users();
        $result = $obj->showAdmin();
        $resultgt = null;
        
        // Lọc ra ngày tháng năm đưa vào mảng để đưa vào từng Select
         $arrayngay = explode("-", $result[4]);
        
        switch ($result[7])
        {
          case "1" :
          {
              $resultgt = "Nam";
              break;
          }
          
          case "2" :
          {
              $resultgt = "Nữ";
              break;
          }
        }
        include '../view/adminsites/edit_admin.php';
        break;
    } 
    
    
    case "manager_admin_submit":
     {
         
         if(isset($_POST['edit_button']))
         {
            $id = $_POST['mn_id_admin'];
            $email = $_POST['mn_email_admin'];
            $ten = $_POST['mn_ten_admin'];
            $password = sha1($_POST['mn_password_admin'].$email);
            $diachi = $_POST['mn_dc_admin'];
            $sdt = $_POST['mn_sdt_admin'];
            $gt = $_POST['mn_gt_admin'];
            move_uploaded_file($_FILES['upload']['tmp_name'], '../view/images/'.$_FILES['upload']['name']);
            $hinh = $_FILES['upload']['name'];
            $ngay = $_POST['select_ngay'];
            $thang = $_POST['select_thang'];
            $nam = $_POST['select_nam'];
            //Ghép các biến ngày tháng năm thành một chuỗi ngày tạo hóa đơn hoàn chỉnh
            $date = $nam . "-". $thang . "-". $ngay ;
            

            
         }
        
        $obj = new users();
        $result = $obj->editUser($id, $email, $ten, $password, $date, $diachi, $sdt, $gt, $hinh);

            if($result)
            {
                echo "Cập nhật thành công";
                header ("Location:../controller/admin.php");
            }

            else 
            {
                echo "Cập nhật không thành công";
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

