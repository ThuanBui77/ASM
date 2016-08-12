<?php 
    include '../view/header.php';
?>
<script src="../view/js/ValidateFormforThanhtoan.js" type="text/javascript"></script>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container-fluid">
         <div class="row">
              <div class="col-lg-1">
          
              </div>
             <?php
                 
                 $rowinfo = array ();
                 $rowinfo = null;

                 if(isset($_SESSION['infoforcart']))
                 {
                     $rowinfo = $_SESSION['infoforcart'][$resultfullname[0]];
                 }
                 
                 else
                 {
                     $resultfullname = null;
                 }
             ?>
              
              <div class="col-lg-5">
                  <div class="panel panel-info">
  
                  <div class="panel-heading">
                    <h3 class="panel-title">Thông tin liên lạc khi giao hàng</h3>
                  </div>
                      <br>
                          <form action="?action=xacnhan" method="post" name="thanhtoan" onsubmit="return check()">
                  <div class="form-group fg" style="">
                  <label > Họ và Tên :</label>
                  <input type="text" class="form-control fgi" name="ten" value="<?php echo $rowinfo[1] ?>" >
                  <p style="margin-left:100px;" id="namep"> </p>
                  </div>
                  <div class="form-group fg">
                  <label >Địa chỉ :</label>
                  <input type="text" class="form-control fgi" name="dic" value="<?php echo $rowinfo[2] ?>" >
                  <p style="margin-left:100px;" id="dcp">  </p>
                  </div>
                  <div class="form-group fg" style="">
                  <label > Số điện thoại :</label>
                  <input type="text" class="form-control fgi" name="sdt" value="<?php echo $rowinfo [3]?>" >
                  <p style="margin-left:100px;" id="sdtp">  </p>
                  </div>
                  <div class="form-group fg" style="">
                  <label > Email :</label>
                  <input type="text" class="form-control fgi" name="email" value="<?php echo $rowinfo[4] ?>" >
                  <p style="margin-left:100px;" id="emailp">  </p>
                  </div>
                  <div class="form-group fg" style="">
                  <label > Ghi chú :</label>
                  <textarea class="form-control fgi" name="ghichu" rows="4" cols="15">
                
                  </textarea>
                  </div>
                  <div class="form-group fg" style="">
                   <input type="submit" class="btn btn-info confirm" value="Xác nhận đơn hàng" name="confirm_button">
                  </div>
                    
                  </form>
                  </div>
              </div>
             
             <div class="col-lg-5">
                  <div class="panel panel-info">
  
                  <div class="panel-heading">
                    <h3 class="panel-title">Giỏ hàng</h3>
                  </div>
                   <table class="table">
                    <thead>
                      <tr>
                        <th>Tên cây giống</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
        foreach ($_SESSION['cart'] as $Macg => $row)
        {
             
              $thanhtien  = $_SESSION['cart'][$Macg]['thanhtien'] = $row[2] * $row['sl'];
       
     ?>
        
         
      <tr>
        <td><?php echo $row[1] ?></td>
        <td><?php echo $row['sl']?></td>
        <td><?php echo number_format($thanhtien) . " ". "VND"  ?></td>
        
      </tr>
      
       
     <?php
         
        }
     ?>

        
                  </tbody>
                  </table>
                      <p style="font-weight:bold; font-size: 16px; margin-left: 250px;margin-top:25px"> Tổng tiền : 
                      
                          <?php
                           
                             $tongtien = 0;
                              foreach ($_SESSION['cart'] as $row)
                              {
                                  
                                  $tongtien += ($row['thanhtien']);

                              }
                              // Kết quả biến $tongtien được lưu vào biến $_SESSION['tongtien']
                              // được dùng để đưa vào cột Tongtien trong bảng order 
                              $_SESSION['tongtien'] = $tongtien;
                              echo number_format($_SESSION['tongtien']) . " VND";

                         ?>
                      
                      
                      
                      
                      </p>
                  </div> 
             </div>
             
             <div class="col-lg-1">
          
             </div>
         </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
<?php 
    include '../view/footer.php';
?>