<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<title>Assignment PHP2 - PS03304</title>
<!-- Bootstrap  -->
<link href="../view/css/bootstrap.css" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" type="text/css" href="../view/css/style.css"/>

<!-- Effect Button  -->
<link rel="stylesheet" type="text/css" href="../view/css/buttons.css">

<!-- Switch View Mode  -->
<link rel="stylesheet" type="text/css" href="../view/css/component.css">

<!-- Nifty Modal Window Effects  -->
<link rel="stylesheet" type="text/css" href="../view/css/nmw.css" />
<script src="../view/js/modernizr.custom.js"></script>

<script type="text/javascript" src="./view/js/ValidateForm.js"></script>

<!-- A Pen by Captain Anonymous  -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>		
<script>
  $(document).ready(function () {
  
  $(".dropdown-menu :checkbox").click(function(){
    $("#product-list li").hide();
    var search = '',
        genres = [];
    $(".dropdown-menu :checkbox:checked").each(function(){
      genres.push("." + $(this).val());
    });
    search = genres.join(', ');
    $(search).fadeIn();
    if ($('.dropdown-menu :checkbox').filter(':checked').length == 0 ) {
      $("#product-list li").fadeIn();
    }
  });


  
  /// reset filters ///
  $('#reset').on('click',function(){
    $('.dropdown-menu :checkbox').prop('checked', false);
    $("#product-list li").fadeIn();
  });
  
    /// Collapsable filters ///
  
  $('.col').on('click', function () {
    $('#genre-filters').slideToggle(200, function(){
      if ($(this).is(':visible')) {
        $('.col').attr('src', 'http://www.asus.com/media/images/close_round.png');
      } else {
        $('.col').attr('src', 'http://www.asus.com/media/images/open_round.png');
      }
    });
  })
  
    /// Collapsable filters ///
  
  $('.col1').on('click', function () {
    $('#brand-filters').slideToggle(200, function(){
      if ($(this).is(':visible')) {
        $('.col1').attr('src', 'http://www.asus.com/media/images/close_round.png');
      } else {
        $('.col1').attr('src', 'http://www.asus.com/media/images/open_round.png');
      }
    });
  })
  
});
</script>
   
</head>
 
<body>
 <header>
 	<div class="container-fluid">
    	<div class="row header1">
        	
            
            <div class="col-lg-6">
                <a href="?action=link_cart" style="height:100px;">
                    <p style="font-weight: bold; line-height: 45px;font-size: 18px;float:left;margin-left:120px">  <span class="glyphicon glyphicon-shopping-cart"></span>  Giỏ hàng </p> 
                </a>
            </div>
            
            <div class="col-lg-6 hc1">
                    <p style="font-weight: bold;float:right;">
                    <?php 
                            
                            
                            if( !isset($_SESSION['username']) and !isset($_SESSION['@dmin']))
                            
                            {
                                echo "<a href='?action=login_link'>";
                                echo "Đăng nhập";
                                echo "</a>"; 
                                echo "<span style='margin-left:10px'>";
                                echo "<a href='?action=register_link'>";
                                echo " ";
                                echo "Đăng ký";
                                echo "</a>";
                              
                            } 
                            
                            elseif(isset($_SESSION['username']))
                            {
                                $avatar = null;
                                if($_SESSION['avatar'] !== "")
                                {

                                $avatar = $_SESSION['avatar'];
                                }

                                else
                                {
                                    $avatar = "default.jpg";
                                }
                                echo "<img style='margin-top:5px' class='img-thumbnail' width='45' height='45' src='../view/images/$avatar'>";
                                echo " ";
                                echo $_SESSION['username'];
                                echo " ";
                                echo " ";
                                echo " ";
                                echo "<span style='margin-left:10px'>";
                                echo "<a href='?action=trangcn'>";
                                echo "Trang cá nhân";
                                echo "</a>";
                                echo "<span style='margin-left:10px'>";
                                echo "<a href='?action=logout'>";
                                echo " ";
                                echo " ";
                                echo "Thoát";
                                echo "</a>";
                                echo "</span>";
                            }
                            
                            elseif(isset($_SESSION['@dmin']))
                            {
                                $avatar = null;
                                if($_SESSION['avatar'] !== "")
                                {

                                $avatar = $_SESSION['avatar'];
                                }

                                else
                                {
                                    $avatar = "default.jpg";
                                }
                                echo "<img style='margin-top:5px' class='img-thumbnail' width='45' height='45' src='../view/images/$avatar'>";
                                echo " ";        
                                echo $_SESSION['@dmin'];
                                echo "<span style='margin-left:10px'>";
                                echo "<a href='?action=admin_link'>";
                                echo " ";
                                echo " ";
                                echo "Trang Admin";
                                echo "</a>";
                                echo "</span>";
                                echo "<span style='margin-left:10px'>";
                                echo "<a href='?action=logout'>";
                                echo " ";
                                echo " ";
                                echo "Thoát";
                                echo "</a>";
                                echo "</span>";
                            }
                          ?>      
                          
                    </p>
                    
            </div>
        </div>
        
        
        <div class="row header2">
        	
                <div class="col-lg-6 hd2c1 ">
                    <a href="?action=home"><img src="../view/images/icon.png"></a>
        	<p> Green Planet </p>
                </div>
               
            <div class="col-lg-6 hd2c2 ">
        	<ul> 
            	<li><a href="?action=home"> Trang chủ </a></li>
            	<li><a href="?action=caygiong">Cây giống </a></li>
            	<li><a href="#">Giới thiệu</a></li>
            	<li><a href="#"> Liên hệ</a></li>
            </ul>
            </div>
        </div> 



