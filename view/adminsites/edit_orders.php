<?php
    include ('../view/adminsites/header.php')
?>

<script type="text/javascript" src="../view/adminsites/assets/js/ValidateFormforEditorder.js"></script>    

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa thông tin đơn đặt hàng</h4>
                            </div>
                            
                            <div class="content">
                                <form action="?action=edit_orders_submit" method="post" name="editorder" onsubmit="return check()">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mã đơn đặt hàng</label>   
                                                <input type="text" class="form-control" name="edit_order_id" readonly="" value="<?php echo $result[0] ?>" >
                                            </div>        
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tổng tiền</label>
                                                <input type="text" class="form-control" name="edit_order_tongtien" value="<?php echo $result[2] ?>" >
                                                <p id="ttp">  </p>
                                            </div>        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mã khách</label>
                                                <input type="text"  class="form-control" name="edit_order_mk" value="<?php echo $result[3] ?>">
                                            </div>        
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mã khách vãng lai</label>
                                                <input  type="text" class="form-control" name="edit_order_mkvl" value="<?php echo $result[4]?>">
                                            </div>        
                                        </div>
                                        <p style="font-style: italic; font-size:12px;margin-left:20px;"> Chú ý : Mã khách và Mã khách vãng lai không được nhập cùng lúc, chỉ nhập một trong 2 ô đó </p>
                                    </div>
                                    
                                    <div class="row">
                                        
                                       <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Ngày tạo</label>
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
                                    
                                    <!-- jquery dùng để disbale một input khi input khác đã có value-->
       
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