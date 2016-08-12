<?php
    include ('../view/usersites/header.php')
?>

    

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thay đổi mật khẩu</h4>
                            </div>

                          
                            
                            <div class="content">
                                <form action="?action=resetpassword_submit" method="post" >
                                    <div class="row">
                                
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mật khẩu cũ</label>
                                                <input type="text" class="form-control" name="mkc" value="" >
                                            </div>        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mật khẩu mới</label>
                                                <input type="text"  class="form-control" name="mkm" value="">
                                            </div>        
                                        </div>

                                    </div>
                                    
                                   

                                    <button type="submit" class="btn btn-info btn-fill pull-right" name="confirm_button">Thay đổi</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
               
                </div>                    
            </div>
        </div>
      
      

   
        
<?php
    include ('../view/usersites/footer.php')
?>        