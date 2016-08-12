<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../view/adminsites/assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Assignment PHP2 - PS03304</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    
    <!-- Bootstrap core CSS     -->
    <link href="../view/adminsites/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../view/adminsites/assets/css/animate.min.css" rel="stylesheet"/>
    
    <!--  Light Bootstrap Table core CSS    -->
    <link href="../view/adminsites/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    
    
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../view/adminsites/assets/css/demo.css" rel="stylesheet" />
    
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../view/adminsites/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
</head>
<body> 

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">    
    
    <!--   
        
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" 
        Tip 2: you can also add an image using data-image tag
        
    -->
    
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="../controller/index.php" class="simple-text">
                    GREEN PLANET
                </a>
            </div>
                       
            <ul class="nav">
                <li class="active">
                    <a href="?action=admin">
                        <i class="pe-7s-graph"></i> 
                        <p>Dashboard</p>
                    </a>            
                </li>
                <li>
                    <a href="?action=ql_khachhang">
                        <i class="pe-7s-user"></i> 
                        <p>Quản lý tài khoản</p>
                    </a>
                </li> 
                <li>
                    <a href="#">
                        <i class="pe-7s-user"></i> 
                        <p>Thêm tài khoản</p>
                    </a>
                </li> 
                <li>
                    <a href="#">
                        <i class="pe-7s-note2"></i> 
                        <p> Thêm cây giống</p>
                    </a>        
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-news-paper"></i> 
                        <p>Thêm đơn hàng</p>
                    </a>        
                </li>
                

            </ul> 
    	</div>
    </div>
    
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">    
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">       
                   
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <?php 
                                if(isset($_SESSION['username']))
                                 {
                                     echo $_SESSION['username'];

                                 }
                               
                               else
                                
                                   echo "";
                                       
                                  ?>
                            </a>
                        </li>

                        <li>
                            <a href="?action=logout">
                                Thoát
                            </a>
                        </li> 
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thông tin khách hàng</h4>
                                <p class="category"></p>
                            </div>
                            
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Mã khách hàng</th>
                                    	<th>Email</th>
                                    	<th>Tên</th>
                                    	<th>Password</th>
                                    	<th>Ngày sinh</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Giới tính </th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                       foreach ($khach as $row)
                                        {
                                        ?>
                                          <tr>
                                        	<td> <?php echo $row[0] ?> </td>
                                                <td> <?php echo $row[1] ?> </td>
                                                <td> <?php echo $row[2] ?> </td>
                                                <td> <?php echo $row[3] ?> </td>
                                                <td> <?php echo $row[4] ?></td>
                                                <td> <?php echo $row[5] ?></td>
                                                <td> <?php echo $row[6] ?></td>
                                                <td> 
                                                <?php 
                                                if ($row[7] == 1)
                                                {
                                                    $gt = "Nam";
                                                }
                                                else
                                                    $gt = "Nữ";
                                                
                                                echo $gt;
                                                        
                                                ?></td>
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
                                        <th>Email</th
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
                                           </tr>
                                           
                                        <?php } ?>
                                                
                                       
                                        
                                        
                                    </tbody>
                                </table>
                                   
                            </div>
                        </div>
                    </div>
        
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 by PS03304
                </p>
            </div>
        </footer>
        
    </div>   
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
	
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>
	
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	
	<script type="text/javascript">
    	$(document).ready(function(){
        	
        	demo.initChartist();
        	
        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."
            	
            },{
                type: 'info',
                timer: 4000
            });
            
    	});
	</script>
    
</html>

