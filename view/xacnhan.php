<?php 
    include '../view/header.php';
?>

<div class="container-fluid">
    
    <div class="row">
        
        <div class="col-md-2">
        </div>
        
        <div class="col-md-8">
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
                      <p style="font-weight:bold; font-size: 16px; float:right;margin-top:25px"> Tổng tiền : 
                      
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
        
        <div class="col-md-2">
        </div>
        
    </div>
    
    <div class="row">
        
        <div class="col-md-2">
        </div>
        
        <div class="col-md-8">
           <div class="panel panel-info">
  
                  <div class="panel-heading">
                    <h3 class="panel-title">Thông tin liên lạc</h3>
                  </div>
                   <table class="table">
                    <thead>
                      <tr>
                        <th>Họ và Tên :</th>
                        <th>Địa chỉ :</th>
                        <th>Số điện thoại :</th>
                        <th>Email : </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo $ten ?></td>
                        <td><?php echo $dic ?></td>
                        <td><?php echo $sdt  ?></td>
                        <td><?php echo $email ?></td>
                        
                      </tr>
                    </tbody>
                  </table>
                      
                  </div>
        </div>
        
        <div class="col-md-2">
        </div>
        
        
    </div>
    
</div>
        



        <h3 class="title"> Đơn đặt hàng đã được gửi tới bạn qua email : </h3>
        <br>
        <h3 class="titles">  <?php echo $email ?> </h3>
       
        

<?php 
    include '../view/footer.php';
?>