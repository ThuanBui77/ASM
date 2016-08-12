<?php
    include ('../view/adminsites/header.php')
?>
        
        <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thông tin đơn hàng</h4>
                                <p class="category"></p>
                            </div>
                            
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Mã đơn hàng</th>
                                    	<th>Ngày tạo</th>
                                    	<th>Tổng tiền</th>
                                    	<th>Mã khách</th>
                                    	<th>Mã khách vãng lai</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                       foreach ($orders as $row)
                                        {
                                        ?>
                                          <tr>
                                        	<td> <?php echo $row[0] ?> </td>
                                                <td> <?php echo $row[1] ?> </td>
                                                <td> <?php echo number_format($row[2]) . " ". "VNĐ" ?> </td>
                                                <td> <?php echo $row[3] ?> </td>
                                                <td> <?php echo $row[4] ?></td>
                                                <td> <a href="?action=edit_orders&id=<?php echo $row[0]?>"> <span class="glyphicon glyphicon-edit"></span></a></td>
                                                <td> <a href="?action=delete_orders&id=<?php echo $row[0]?>"> <span class="glyphicon glyphicon-remove"></span></a> </td>
                                                
                                           </tr>
                                           
                                        <?php } ?>
                                                
                                       
                                        
                                        
                                    </tbody>
                                </table>
                                   
                            </div>
                        </div>
                    </div>
        
        <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thông tin cây giống</h4>
                                <p class="category"></p>
                            </div>
                            
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Mã cây giống</th>
                                    	<th>Tên cây giống</th>
                                    	<th>Ngày thêm</th>
                                    	<th>Giá</th>
                                        <th>URL hình</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                       foreach ($caygiong as $row)
                                        {
                                        ?>
                                          <tr>
                                        	<td> <?php echo $row[0] ?> </td>
                                                <td> <?php echo $row[1] ?> </td>
                                                <td> <?php echo $row[2]  ?> </td>
                                                <td> <?php echo number_format($row[3]). " ". "VNĐ" ?> </td>  
                                                <td> <img width="200" src="../view/images/<?php echo "$row[8]"?>"> </td>
                                                <td> <a href="?action=edit_cg&id=<?php echo $row[0]?>"> <span class="glyphicon glyphicon-edit"></span></a></td>
                                                <td> <a href="?action=delete_cg&id=<?php echo $row[0]?>"> <span class="glyphicon glyphicon-remove"></span></a> </td>
                                           </tr>
                                           
                                        <?php } ?>
                                                
                                       
                                        
                                        
                                    </tbody>
                                </table>
                                   
                            </div>
                        </div>
                    </div>
        

         <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thông tin các tài khoản</h4>
                                <p class="category"></p>
                            </div>
                            
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Mã tài khoản</th>
                                    	<th>Email</th>
                                    	<th>Tên</th>
                                    	<th>Ngày sinh</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Giới tính </th>
                                        <th>Avatar </th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                       foreach ($users as $row)
                                        {
                                        ?>
                                          <tr>
                                        	<td> <?php echo $row[0] ?> </td>
                                                <td> <?php echo $row[1] ?> </td>
                                                <td> <?php echo $row[2]  ?> </td>
                                                <td> <?php echo $row[3] ?> </td>  
                                                <td> <?php echo $row[4] ?> </td>
                                                <td> <?php echo $row[5] ?> </td> 
                                                <td> <?php 
                                                 
                                                if ($row[6] == 1)
                                                {
                                                    $gt = "Nam";
                                                }
                                                else
                                                    $gt = "Nữ";
                                                
                                                echo $gt;
                                                        
                                                ?> </td>
  
                                                <td> <?php 
                                                
                                                if($row[7] !== "")
                                                {
                                                    echo "<img width='200' src='../view/images/$row[7]'>"; 
                                               
                                                
                                                } 
                                                
                                                else{
                                                    echo "Chưa có Avatar";
                                                } ?> </td>
                                                <td> <a href="?action=delete_user&id=<?php echo $row[0]?>"> <span class="glyphicon glyphicon-remove"></span></a> </td>
                                           </tr>
                                           
                                        <?php } ?>
                                                
                                       
                                        
                                        
                                    </tbody>
                                </table>
                                   
                            </div>
                        </div>
                    </div>

        <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thông tin khách hàng vãng lai</h4>
                                <p class="category"></p>
                            </div>
                            
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Mã khách hàng</th>
                                    	<th>Tên</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                       foreach ($khachvl as $row)
                                        {
                                        ?>
                                          <tr>
                                        	<td> <?php echo $row[0] ?> </td>
                                                <td> <?php echo $row[1] ?> </td>
                                                <td> <?php echo $row[2] ?> </td>
                                                <td> <?php echo $row[3] ?> </td>
                                                <td> <?php echo $row[4] ?></td>
                                                <td> <a href="?action=delete_kvl&id=<?php echo $row[0]?>"> <span class="glyphicon glyphicon-remove"></span></a> </td>
                                           </tr>
                                           
                                        <?php } ?>
                                                
                                       
                                        
                                        
                                    </tbody>
                                </table>
                                   
                            </div>
                        </div>
                    </div>            


        
  <?php
    include ('../view/adminsites/footer.php')
?>      