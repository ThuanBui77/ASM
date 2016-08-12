<?php include '../view/header.php'; ?>
<script type="text/javascript" src="../view/js/ValidateFormforLogin.js"></script>
<script type="text/javascript" src="../view/js/ValidateFormforRegister.js"></script>
<div class="login-signup-form">
				<div class="col-md-5 login text-center">
					<h4>ĐĂNG NHẬP</h4>
					<div class="how_to">
                                            <a href="#"><div class="reg_fb"><img src="../view/images/facebook.png" alt=""><i>Facebook</i><div class="clearfix"></div></div></a>
						<a href="#"><div class="reg_gp"><img src="../view/images/gp.png" alt=""><i>GOOGLE</i><div class="clearfix"></div></div></a>
						<p><img src="../view/images/locked.png" alt="" /></p>
					</div>
					<h5>hoặc</h5>
                                        <form action="?action=login_submit" onSubmit="return check()" method="post"  name="login" >
					<div class="cus_info_wrap">
						<label class="labelTop">
						Email :
						<span class="require">*</span>
						</label>
						<input class="form-control" type="text" name="email_login" value="" >
                                                <p style="margin-left:100px;" id="emailp">  </p>
                                                
					</div>
                                            
					<div class="clearfix"></div>
					<div class="cus_info_wrap">
						<label class="labelTop">
						Mật khẩu:
						<span class="require">*</span>
						</label>
						<input class="form-control" type="password" name ="password_login" value="">
                                                <p style="margin-left:100px;" id="passwordp">  </p>
					</div>
                                                
					<div class="sky-form span_99">
					<!-- <label class="checkbox"><input type="checkbox" name="checkbox" >Ghi nhớ </label> -->
				</div>
				<div class="botton1">
                                    <input type="submit" value="ĐĂNG NHẬP" name ="login_button" class="btn btn-info btnlogin">
				</div>
                                        </form>
				
				</div>
				<div class="col-md-5 sign-up text-center">
					<h4>ĐĂNG KÝ</h4>
                                        <form action="?action=register_submit" method="post" onSubmit="return checkRegister()" name="register">
					<div class="cus_info_wrap">
						<label class="labelTop">
						Tên :
						<span class="require">*</span>
						</label>
                                                
						<input class="form-control" type="text" name="name"  >
                                                <p style="margin-left:100px;" id="namep"> </p>
					</div>
					<div class="clearfix"></div>
				    <div class="cus_info_wrap">
						<label class="labelTop">
						Email  :
						<span class="require">*</span>
						</label>
                                        <input class="form-control" type="text" name="email" >
                                        <p style="margin-left:100px;" id="emailp_regis">  </p>
                                        
					</div>
					<div class="clearfix"></div>
                                        
                                        <div class="cus_info_wrap">
						<label class="labelTop confirmpass">
						Mật khẩu :
						<span class="require">*</span>
						</label>
						<input class="form-control" type="password" name="password">
                                                <p style="margin-left:100px;" id="passwordp_regis">  </p>
					</div>
                                        
                                      
                                        <div class="cus_info_wrap">
						<label class="labelTop confirmpass">
						Địa chỉ :
						
						</label>
						<input class="form-control" type="text" name="diachi">
					</div>
                                        
                                        <div class="cus_info_wrap">
						<label class="labelTop confirmpass">
						Số điện thoại :
						<span class="require">*</span>
						</label>
						<input class="form-control" type="text" name="sdt">
                                                <p style="margin-left:100px;" id="sdtp">  </p>
					</div>
                                        
					<div class="botton1">
					<input type="submit" value="ĐĂNG KÝ" name="register_button" class="btn btn-info btnregis">
                                        <br> <br>
<!--                                        <p style="color:red"> </p>-->
                                        
                                        </form>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
<script type="text/javascript" src="../view/js/ValidateForm.js"></script> 
<?php include '../view/footer.php'; ?>