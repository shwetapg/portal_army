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

    <!-- <link rel="apple-touch-icon" href="images/Shereal-Logo.png">
    <link rel="shortcut icon" href="images/Shereal-Logo.png"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  
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
    hr {
        margin-top: 0rem;
        margin-bottom: 2rem;
        border: 0;
        border-top: 2px solid rgba(0,0,0,.1);
    }
    .right-panel header.header .top-left {
      position: absolute;
    }
    .image-upload>input {
      display: none;
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
      .respmob {
          margin-top: -12%;
      }
      .respdesk {
          display: none;
      }
      .right-panel header.header {
          position: absolute;
      }
      .right-panel header.header .top-left {
          border-bottom: 0px solid #dcdcdc;
      }
      .cntnt {
        margin-top: 10%;
       }
    }
    @media only screen and (min-width: 1200px) {
      .right-panel .navbar-header .respmob {
            display: none;
      }
      .cntnt {
        margin-top:6%;
      }
    }
</style>
</head>

<body style="background-color:#e6e5e5;">

 <?php  
        if(isset($_POST['submit1'])){
        $url = 'https://api.neptune.bitjiniapps.com/add_area/';
        $data = array(
                    'name'=>$_POST['name'],
                   );

           $options = array(
            'http' => array(
              'header'  => array(
                      'Content-Type:application/json',
                      'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b', 
                    ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1= json_decode($result,true);
          // print_r($arr1);
        echo '<script>alert("Added Exersice Successfully");</script>';
        echo "<script>location='exersice_db.php'</script>";
        }
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

                     <!-- <li>
                        <a href="completed_training_db.php"> <i class="menu-icon fa fa-users"></i>Completed Training</a>
                    </li> -->

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

        <div class="content cntnt">
            <div class="animated fadeIn">
                <div class="row" style="margin-top: 8%;">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Exersice Info</strong>
                            </div>
                            <div class="card-body card-block">

                        <form enctype="multipart/form-data" method="post" id="upload_form1" name="myform1">     
                            <div class="row">
                        
                        <div class="col-xs-2 col-sm-2"></div>       
                        <div class="col-xs-8 col-sm-8">
                            <div class="row form-group">
                               <div class="col col-md-4" style="text-align: end;"><label for="route">Exersice:</label></div>
                               <div class="col-12 col-md-8"><input type="text" id="route" name="name" class="form-control" required></div>
                            </div>

                                                  
                 
                        </div>
                        <div class="col-xs-2 col-sm-2"></div> 

                        </div>
                        
                         <button type="submit" name="submit1" style="width: 12%;" class="btn btn-primary btn-sm">Submit</button>&nbsp;&nbsp;&nbsp;
                         <button type="button" style="width: 12%;" class="btn btn-danger btn-sm" onclick="window.location.href='./exersice_db.php'">Cancel</button>

                         </form>      
                            </div>
                        </div>
                    </div>
                    </div>
       
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>

    </div><!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

  </body>
  </html>
