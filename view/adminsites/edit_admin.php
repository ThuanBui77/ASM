<?php
    include ('../view/adminsites/header.php')
?>

    

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa tài khoản Admin</h4>
                            </div>
<!--                            Đoạn jquery dùng cho việc bám vào hình để chọn hình khác-->
                            <script type="text/javascript">
                                function Browse()
                                {
                                    document.getElementById('upload').click();
                                }
                            </script>
                            
                            <div class="content">
                                <form action="?action=manager_admin_submit" method="post" enctype="multipart/form-data" >
                                    <div class="row">
                                
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="hidden" class="form-control" name="mn_id_admin" value="<?php echo $result[0] ?>" >
                                                <input type="text" class="form-control" name="mn_email_admin" value="<?php echo $result[1] ?>" >
                                            </div>        
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên</label>
                                                <input type="text" class="form-control" name="mn_ten_admin" value="<?php echo $result[2] ?>" >
                                            </div>        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="row">
                                
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="text" class="form-control" name="mn_password_admin" value="<?php echo $result[3] ?>" >
                                            </div>        
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Địa chỉ</label>
                                                <input type="text" class="form-control" name="mn_dc_admin" value="<?php echo $result[5] ?>" >
                                            </div>        
                                        </div>
                                        
                                        
                                    </div>
                                   
                                     
                                    
                                    <div class="row">
                                
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Số điện thoại</label>
                                                <input type="text" class="form-control" name="mn_sdt_admin" value="<?php echo $result[6] ?>" >
                                            </div>        
                                        </div>
                                        
                                        <div style="margin-top: 10px;" class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giới tính</label>
                                                <select name="mn_gt_admin">
                                                    
                                                    
                                                    <option class="form-control" selected="" value="<?php echo $resultgt ?>"> -- <?php echo $resultgt ?> -- </option>
                                                    
                                                    
                                                    <option class="form-control" value="1"> Nam </option>
                                                    <option class="form-control" value="0"> Nữ </option>
                                                    
                         
  
                                                    
                                                </select>
                                                
                                            </div>        
                                        </div>
                                        
                                         
                                        
                                    </div>
                                    
                                    <div class="row">
                                        
                                       
                                        
                                       
                                        
                                    </div>
                                    
                                     <div class="row">
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Ngày thêm</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p> Ngày </p>
                                                <select name="select_ngay">
                                                    <option selected="" value="<?php echo $arrayngay[2]?>"> <?php echo $arrayngay[2]?></option>
                                                    <?php 
                                                        for ($i=1;$i<31;$i++)
                                                        {
                                                    ?>
                                                    
                                                    <option value="<?php echo $i?>"> <?php echo $i?> </option>

                                                    <?php 
                                                        }
                                                    ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p> Tháng </p>
                                                <select name="select_thang">
                                                    <option selected="" value="<?php echo $arrayngay[1]?>"> <?php echo $arrayngay[1]?></option>
                                                    <?php 
                                                        for ($i=1;$i<13;$i++)
                                                        {
                                                    ?>
                                                    
                                                    <option value="<?php echo $i?>"> <?php echo $i?> </option>

                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p> Năm </p>
                                                <select name="select_nam">
                                                    <option selected="" value="<?php echo $arrayngay[0]?>"> <?php echo $arrayngay[0]?></option>
                                                    <?php 
                                                        for ($i=1950;$i<2012;$i++)
                                                        {
                                                    ?>
                                                    
                                                    <option value="<?php echo $i?>"> <?php echo $i?> </option>

                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                                 
                                    </div>
                                    
                                    
                                   
                                    
                                    
                                    
                                    
                                    <div class="row">
                                        
                                       <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Avatar</label>
                                                <input class="fileinput" type="file" onchange="document.getElementById('forimages').src = window.URL.createObjectURL(this.files[0])" name="upload" hidden="" id="upload"/>
                                                <br>
                                                <img id="forimages" src="<?php 
                                                
                                                    if(($result[10])) 
                                                    {
                                                    echo "../view/images/". $result[10];
                                                    }
                                                    
                                                    else 
                                                    {
                                                        echo " Chưa có hình nào được chọn";
                                                    }
                                                ?>" 
                                                
                                                alt="" width="200"  onclick="Browse()"/>
                                                
                                                <br>
                                                <br>
                                                <p style="font-style: italic; font-size:12px;float:left;"> Click vào hình để chọn một hình khác thay thế</p>
                                            </div>        
                                        </div>
                                        
                                    </div>
                                    
                                    
       
                                    <button type="submit" class="btn btn-info btn-fill pull-right" name="edit_button">Sửa tài khoản</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
               
                </div>                    
            </div>
        </div>
      
      

   
        
<?php
    include ('../view/adminsites/footer.php')
?>        