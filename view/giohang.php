<?php 
    include '../view/header.php';
?>

<script src="../view/js/ValidateForm.js" type="text/javascript"></script>
  <div class="container-fluid rowgiohang">
      <div class="row ">
          <form action="?action=update_cart" method="post"> 
      <div class="col-lg-1">
          
      </div>
      
      <div class="col-lg-8">
          <div class="panel panel-info">

         <div class="panel-heading">
            <h3 class="panel-title">Giỏ hàng</h3>
          </div>



            <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên cây giống</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>

              </tr>
            </thead>
            <tbody>

             <?php
                
                // Sử dụng foreach để lấy từ biến $_SESSION ['cart'] các key và value
               if(isset($_SESSION['cart']))
                foreach ($_SESSION['cart'] as $Macg => $row)
                {
                        
                      $thanhtien  = $_SESSION['cart'][$Macg]['thanhtien'] = $row[2] * $row['sl'];

             ?>


              <tr>
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row[1] ?></td>
                <td><img src="../view/images/<?php echo$row[3] ?>"></td>
                <!-- input text dưới đây có phần name chứa key $Macg là ID của từng ID của các giống
                khi form này submit thì sẽ có một mảng là : ['Macgs'] = số lượng tức value của input text này
                
                -->
                <td><input class="form-control" type="text" style="width: 80px; height: 30px" value="<?php echo $row['sl'] ?>" name="Macgs[<?php echo $Macg ?>]">  </td>
                <td><?php echo number_format($thanhtien) . " ". "VND"  ?></td>
                <td><a href="?action=xoagiohang&Macg=<?php echo $Macg ?>" class="glyphicon glyphicon-remove nutxoa"></a> </td>

              </tr>
             <?php

                }
                
                else
                {
                    echo "<p>"; 
                    echo "Chưa có sản phẩm nào trong giỏ hàng"; 
                    echo "</p>";
                }
             ?>
            </tbody>
          </table>


          <table class="table">

          </table>
  </div>
          
  </div>
      <div class="col-lg-3">
         
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title"></h3>
          </div>
          <div class="panel-body">
            Tổng cộng : 
            <p style="font-weight:bold; font-size: 20px; margin-bottom: 0px;margin-top: 10px;">
             <?php
             
                 $tongtien = 0;
                 if(isset($_SESSION['cart']))
                  foreach ($_SESSION['cart'] as $row)
                  {
                      $tongtien += ($row['thanhtien']);

                  }

                  echo number_format($tongtien) . " VND";

             ?>
                </p>
            <br>
            <br>
            <input style="margin-left: 90px" type="submit" class="btn btn-info" value="Cập nhật" name="updatecart_button">
            </form>

          </div>

        </div>
            
      </div>
              
     <!-- Nifty Modal Window Effects  -->
     <div class="md-modal md-effect-1" id="modal-1">
			<div class="md-content">
				<h3>Chọn loại tài khoản thanh toán</h3>
				<div>
                                    <?php
                                    
                                      if(!isset($_SESSION['username']))
                                      {
                                    
                                    
                                    ?>
                                    <div class="leftap">
                                        <form action="?action=login_submit_cart" method="post"  >
                                        <p> Nếu bạn đã có tài khoản hãy đăng nhập </p>
                                        <br>
                                        <input class="form-control" type="text" name="email" placeholder="Nhập Email" >
                                        <br>
                                        <input class="form-control" type="password" name="password" placeholder="Nhập Password" >
                                        <br>
                                        <input type="submit" value="ĐĂNG NHẬP" name ="login_button" class="btn btn-info">
                                        
                                        </form>
                                    </div>
                                    
                                    <div class="rightap">
                                        <p style="margin-left: 30px"> Tiếp tục thanh toán không cần tài khoản </p>
                                        <br>
                                        <a  style="margin-left: 90px"href="?action=thanhtoan" class="btn btn-info" >Tiếp tục thanh toán</a>
                                    </div>
                                    
                                      <?php } ?>
                                    
                                      <?php
                                       if(isset($_SESSION['username']))
                                       {
                                      ?>     
                                    <div style="text-align:center;">
                                        <p style="margin-left: 30px;text-align:center;"> Tiếp tục thanh toán với email </p>
                                        <p style="font-weight:bold; font-size:22px;text-align:center;padding-left: 25px"> <?php echo $_SESSION['email'] ?> </p>
                                        <a  style="margin-left: 20px"href="?action=continue_checkout" class="btn btn-info" >Tiếp tục</a>
                                        </div>
                                       <?php } ?>
                                    <br>
					<button style="margin-left: 290px" class="md-close btn btn-info">Đóng</button>
				</div>
			</div>
    </div>
     <?php 
         
     ?>
    <button style="margin-left: 115px"  class="btn btn-info md-trigger" data-modal="modal-1">Thanh toán</button>
    <?php 
     ?>
  </div>
  </div>

 
    
<?php 
    include '../view/footer.php';
?>