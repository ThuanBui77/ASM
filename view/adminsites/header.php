<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
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
    
    <link href="assets/css/hideinputfile.css" rel="stylesheet" type="text/css"/>
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../view/adminsites/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="../view/adminsites/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    
    
    <link href="../view/adminsites/assets/css/hideinputfile.css" rel="stylesheet" type="text/css"/>

</head>
<body> 

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">    
    
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
                    <a href="?action=themuser_link">
                        <i class="pe-7s-user"></i> 
                        <p>Thêm tài khoản</p>
                    </a>
                </li> 
                <li>
                    <a href="?action=themcaygiong_link">
                        <i class="pe-7s-note2"></i> 
                        <p> Thêm cây giống</p>
                    </a>        
                </li>
                
                <li>
                    <a href="?action=manager_admin_link">
                        <i class="pe-7s-note2"></i> 
                        <p>Quản lý Admin</p>
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

