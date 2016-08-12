<?php include '../view/header.php'; ?>
  <div class="main">
         	<div class="banner">
                    <h2 style="color:#FFF; text-align: center; padding-top: 20px; font-weight:bold">Chào mừng ADMIN </h2> 
		<div class="signing text-right">
                    
			<div class="container">
				<div class="sign-in">
					
				</div>
				<div class="sign-up1">
					
				</div>
				
			</div>
		</div>
                    <table width="500px" style="margin-left: 450px;">
                            
                        <tr style="font-size:26px;">
                                            
                                            <th>Sản phẩm</th>
                                            <th>Xuất xứ</th>
                                            <th>Giá</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                    </tr>
                            
                         
                                <?php 
                                    for ($count = 0; $count < $product->rowCount(); $count++) {
                                        $row = $product->fetch();
                                        echo "<tr>";
                                            
                                            echo "<td>" . $row['1'] . "</td>";
                                            echo "<td>" . $row['2'] . "</td>";
                                            echo "<td>" . $row['3'] . "</td>";
                                            /*echo "<td>";
                                                echo "<a href='?action=update&Product_ID=".$row['0']."&Product=".$row['1']."&Orgin=".$row['2']."&Dongia=".$row['3']."'> Sửa </a>";
                                            echo "</td>";*/
                                            echo "<td>";
                                                echo "<a href='?action=delete&Product_ID=".$row['0']."'> Xóa </a>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }                              
                                ?>
                            
                    </table>
                    <br><br><br><br><br><br><br><br><br>><br>
                    <form action="?action=add" method="post" style="margin-left: 450px;">
                        <h3> Tên sản phẩm</h3><input type="text" name="tensp" >
                        <h3> Xuất xứ </h3><input type="text" name="xuatxu" >
                        <h3> Đơn giá </h3><input type="text" name="dongia" >
                        

                        <input type="submit" value="Thêm" name="add_button">
                    </form>
                    
                 
                    
		<div class="banner-info text-center">
                    <h3 style="text-indent: -9999px;" class="pwelcome">Chào mừng ADMIN</h3>
                    
		</div>
             
	</div>
<?php include '../view/footer.php'; ?>

