<?php
    include ('../view/usersites/header.php')
?>
        
         <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thông tin tài khoản</h4>
                                <p class="category"></p>
                            </div>
                            
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    	<th>Email</th>
                                    	<th>Tên</th>
                                    	<th>Ngày sinh</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Giới tính </th>
                                        <th>Avatar </th>
                                        <th>Sửa</th>
                                    </thead>
                                    <tbody>
                                        
                                          <tr>
                                                <td> <?php echo $result[1] ?> </td>
                                                <td> <?php echo $result[2]  ?> </td>
                                                <td> <?php echo $result[4] ?> </td>  
                                                <td> <?php echo $result[5] ?> </td>
                                                <td> <?php echo $result[6] ?> </td> 
                                                <td> <?php 
                                                 
                                                if ($result[7] == 1)
                                                {
                                                    $gt = "Nam";
                                                }
                                                elseif ($result[7] == 0)
                                                    $gt = "Nữ";
                                                
                                                echo $gt;
                                                        
                                                ?> </td>
  
                                                <td> <?php 
                                                
                                                if($result[9] !== "")
                                                {
                                                    echo "<img width='200' src='../view/images/$result[9]'>"; 
                                               
                                                
                                                } 
                                                
                                                else{
                                                    echo "<img width='200' src='../view/images/default.jpg'>"; 
                                                } ?> </td>
                                                <td> <a href="?action=edit_user_link&id=<?php echo $result[0]?>"> <span class="glyphicon glyphicon-edit"></span></a></td>
                                           </tr>
                                           
                                        
                                                
                                       
                                        
                                        
                                    </tbody>
                                </table>
                                   
                            </div>
                        </div>
                    </div>

        
  <?php
    include ('../view/usersites/footer.php')
?>      