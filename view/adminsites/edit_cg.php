<?php
    include ('../view/adminsites/header.php')
?>

    

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa thông tin cây giống</h4>
                            </div>
<!--                            Đoạn jquery dùng cho việc bám vào hình để chọn hình khác-->
                            <script type="text/javascript">
                                function Browse()
                                {
                                    document.getElementById('upload').click();
                                }
                            </script>
                            
                            <div class="content">
                                <form action="?action=edit_cg_submit" method="post" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mã cây giống</label>   
                                                <input type="text" class="form-control" name="edit_cg_id" readonly="" value="<?php echo $result[0] ?>" >
                                            </div>        
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên cây giống</label>
                                                <input type="text" class="form-control" name="edit_cg_tencg" value="<?php echo $result[1] ?>" >
                                            </div>        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá</label>
                                                <input type="text"  class="form-control" name="edit_cg_gia" value="<?php echo $result[3] ?>">
                                            </div>        
                                        </div>
                                        
                                        <div style="margin-top:30px;" class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Màu sắc</label>
                                                <select name="edit_cg_mausac">
                                                    <option class="form-control" selected="" value="<?php echo $mausac ?>"> -- <?php echo $mausac ?> -- </option>
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
                                                <select name="edit_cg_khihau">
                                                    <option class="form-control" selected="" value="<?php echo $khihau ?>"> -- <?php echo $khihau ?> -- </option>
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
                                                <select name="edit_cg_xuatxu">
                                                    <option class="form-control" selected="" value="<?php echo $xuatxu ?>"> -- <?php echo $xuatxu ?> -- </option>
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
                                                 <select name="edit_cg_loai">
                                                    <option class="form-control" selected="" value="<?php echo $loai ?>"> -- <?php echo $loai ?> -- </option>
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
                                        
                                            <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Rating</label>
                                                <select name="edit_cg_rating">
                                                    <option class="form-control" selected="" value="<?php echo $result[11] ?>"> -- <?php echo $result[11] ?> -- </option>
          
                                                    
                                                    
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
                                                <label for="exampleInputEmail1">Chú thích</label>
                                                <textarea class="form-control" rows="4" cols="50" name="edit_cg_ct" > <?php echo $result[8] ?></textarea>
                                            </div>        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nội dung</label>
                        
                                                <textarea class="form-control" rows="4" cols="50" name="edit_cg_nd" > <?php echo $result[9] ?></textarea>
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
                                    
                                    
       
                                    <button type="submit" class="btn btn-info btn-fill pull-right" name="edit_button">Sửa thông tin</button>
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