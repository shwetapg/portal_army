<?php
session_start();
if(!$_SESSION['username'])
{
  header('location:index.php');
}
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="images/infantry_logo.png">
    <link rel="shortcut icon" href="images/infantry_logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

     <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <style>
      .right-panel .menutoggle {
            padding-top: 7px;
            margin-left: -60px;
       }
     .right-panel .navbar-brand img {
        max-width: 75px;
        margin-left: 2%;
        margin-top: -2%;
     }
    @media only screen and (max-device-width: 480px) {
        .right-panel .menutoggle {
            float: left;
        }
        .right-panel .top-left, .right-panel .top-right {
            width: 100%;
            float: none;
            background: #696d6d;
        }
        .respmob{
            margin-top: -13%;
        }
        .respdesk{
            display: none;
        }
        .right-panel header.header {
            position: absolute;
        }
        .cntnt{
            margin-top: 15%;
        }
        .right-panel header.header .top-left {
            border-bottom: 0px solid #dcdcdc;
        }
    }
    @media only screen and (min-width: 1200px) {
        .right-panel .navbar-header .respmob {
            display: none;
        }
        .cntnt{
            margin-top: 9%;
        }
    }

    </style>
</head>

<body style="background-color:#e6e5e5;">
    
    <?php
    $url2 = 'https://api.neptune.bitjiniapps.com/add_commando/';
    $options = array(
            'http' => array(
              'header'  => array(
                      'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b', 
                    ),
              'method'  => 'GET',
              'content' => json_encode( $data ),
            ),
          );
    $context2 = stream_context_create($options);
    $output2 = file_get_contents($url2, false,$context2);
    $arr1 = json_decode($output2,true);
?> 
<?php
    $url2 = 'https://api.neptune.bitjiniapps.com/check_live_training_exists/';
    $data = array(
                    't_status'=>"live",
                   );
    $options = array(
            'http' => array(
              'header'  => array(
                      'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b', 
                    ),
              'method'  => 'GET',
              'content' => json_encode( $data ),
            ),
          );
    $context2 = stream_context_create($options);
    $output2 = file_get_contents($url2, false,$context2);
    $arr2 = json_decode($output2,true);
    // print_r($arr2);
?> 


    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>

                    <li>
                        <a href="commando_db.php"> <i class="menu-icon fa fa-users"></i>Commandos</a>
                    </li>

                   <!--  <li>
                        <a href="completed_training_db.php"> <i class="menu-icon fa fa-users"></i>Completed Training</a>
                    </li>  -->

                    <li>
                        <a href="training_db.php"> <i class="menu-icon fa fa-users"></i>Training List</a>
                    </li>

                    <li>
                        <a href="live_training_db.php"> <i class="menu-icon fa fa-users"></i>Live Training</a>
                    </li>

                   
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                           <li><i class="fa fa-tasks"></i><a href="exersice_db.php">Exersice</a></li>
                           <li><i class="fa fa-list-alt"></i><a href="app_user_db.php">App User</a></li>       
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header" style="background-color: #728370;">
            <div class="top-left">
              <div class="navbar-header" style="background-color: #728370;">
                <a id="menuToggle" class="menutoggle" style="margin-left: -8%;font-size: 140%;"><i class="fa fa-bars" style="color: #fff;"></i></a>
                <a class="navbar-brand" href="./dashboard.php" style="color: #fff;"><img src="images/infantry_logo.svg" alt="Logo" style="width: 15%;"></a>
              </div>
            </div>
            <div class="respdesk" style="text-align: right;color: white;margin-top: 1%;">
             <a href="./logout.php" style="color:white;">LOGOUT</a></div>
        </header>
        <!-- /#header -->

        <!-- Content -->
        <div class="content cntnt">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo count($arr2['status']); ?></span></div>
                                            <div class="stat-heading">Active Training</div>
                                            <div style="width: 130%;text-align: end;"><a href="live_training_db.php">VIEW</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo count($arr1); ?></span></div>
                                            <div class="stat-heading">Commandos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        
                    </div>

                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo count($arr4); ?></span></div>
                                            <div class="stat-heading">Posts</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
        </div>
        <!-- /.content -->
        
        <div class="clearfix"></div>
      
    </div>
    <!-- /#right-panel -->

</body>
</html>
