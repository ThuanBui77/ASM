<?php
    include ('../view/adminsites/header.php')
?>

    

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm cây giống</h4>
                            </div>
<!--                            Đoạn jquery dùng cho việc bám vào hình để chọn hình khác-->
                            <script type="text/javascript">
                                function Browse()
                                {
                                    document.getElementById('upload').click();
                                }
                            </script>
                            
                            <div class="content">
                                <form action="?action=add_cg_submit" method="post" enctype="multipart/form-data" >
                                    <div class="row">
                                
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên cây giống</label>
                                                <input type="text" class="form-control" name="add_cg_tencg" value="" required="">
                                            </div>        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá</label>
                                                <input type="text"  class="form-control" name="add_cg_gia" value="" required="">
                                            </div>        
                                        </div>
                                        
                                        <div style="margin-top:30px;" class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Màu sắc</label>
                                                <select name="add_cg_mausac">
                                                    
                                                    <?php 
                                                        foreach ($resultms as $row)
                                                        {
                                                    
                                                    ?>
                                                    
                                                    
                                                    <option class="form-control" value="<?php echo $row[0] ?>"> <?php echo $row[0] ?> </option>
                                                    
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </div> 
                                             
                                             
                                        </div>
                                        
                                   
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                       
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Khí hậu</label>
                                                <select name="add_cg_khihau">
                                                    
                                                    <?php 
                                                        foreach ($resultkh as $row)
                                                        {
                                                    
                                                    ?>
                                                    
                                                    
                                                    <option class="form-control" value="<?php echo $row[0] ?>"> <?php echo $row[0] ?> </option>
                                                    
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                                
                                            </div>        
                                        </div>
                                        
                                         <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Xuất xứ</label>
                                                <select name="add_cg_xuatxu">
                                                   
                                                    <?php 
                                                        foreach ($resultxx as $row)
                                                        {
                                                    
                                                    ?>
                                                    
                                                    
                                                    <option class="form-control" value="<?php echo $row[0] ?>"> <?php echo $row[0] ?> </option>
                                                    
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                                
                                            </div>        
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Loại</label>
                                                 <select name="add_cg_loai">
                                                   
                                                    <?php 
                                                        foreach ($resultl as $row)
                                                        {
                                                    
                                                    ?>
                                                    
                                                    
                                                    <option class="form-control" value="<?php echo $row[0] ?>"> <?php echo $row[0] ?> </option>
                                                    
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                          
                                            </div>        
                                        </div>
                                        
                                            <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Rating</label>
                                                <select name="add_cg_rating">
                        
                                                    <option class="form-control" value="1"> 1 </option>
                                                    <option class="form-control" value="2"> 2 </option>
                                                    <option class="form-control" value="3"> 3 </option>
                                                    <option class="form-control" value="4"> 4 </option>
                                                    <option class="form-control" value="5"> 5 </option>
                                                    
                                                   
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
                                                <label for="exampleInputEmail1">Chú thích</label>
                                                <textarea class="form-control" rows="4" cols="50" name="add_cg_ct" > </textarea>
                                            </div>        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nội dung</label>
                        
                                                <textarea class="form-control" rows="4" cols="50" name="add_cg_nd" > </textarea>
                                            </div>        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="row">
                                        
                                       <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Hình cây giống</label>
                                                <input class="fileinput" type="file" onchange="document.getElementById('forimages').src = window.URL.createObjectURL(this.files[0])" name="upload" hidden="" id="upload"/>
                                                <br>
                                                <img id="forimages" src="<?php 
                                                
                                                    if(isset($result[10])) 
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
                                    
                                    
       
                                    <button type="submit" class="btn btn-info btn-fill pull-right" name="add_button">Thêm cây giống</button>
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