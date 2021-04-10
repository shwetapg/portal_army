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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
       table{
           overflow-y:scroll;
           display:block;
           overflow:auto;
       }
      .right-panel {
           background: #f1f2f7;
           margin-left: 210px;
           margin-top: 55px;
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
            margin-top: -12%;
        }
        .respdesk{
            display: none;
        }
        .right-panel header.header {
            position: absolute;
        }

        .right-panel header.header .top-left {
            border-bottom: 0px solid #dcdcdc;
        }
        .ss{
            width:40%;
            height:450px;
            overflow-x:hidden;
            margin-left: -5%;
        }
         html, body {
            position: fixed;
        }
        .top_hd{
           width: 36%;
        }
        .srch{
            width: 30%;
        }
        .filter1{
            width: 30%;
        }
        #add_video{
            width: 30%; 
        }
    }
    @media (max-width: 575px) {
        .right-panel .menutoggle {
            width: 55px;
        }
    }
    @media only screen and (min-width: 1200px) {
        .right-panel .navbar-header .respmob{
            display: none;
        }
        /*.filter1{
            width:160px;
        }
        .filter2{
            width:160px;
        }*/
        .right-panel .navbar-header .menutoggle {
            margin-left: -8%;
        }
    }
    </style>
</head>

<body style="background-color:#e6e5e5;">
    <?php
    $url2 = 'https://api.neptune.bitjiniapps.com/add_live_training/';
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
    if(isset($_POST['submit_more_route']))
    { 
      $_SESSION['pk']=$_POST['pk'];
      echo "<script>location='add_trn_route.php'</script>"; 
    }
  ?>   
<?php  
    if(isset($_POST['submit_tr_dtl']))
    { 
      $_SESSION['pk']=$_POST['pk'];
      echo "<script>location='training_dtl.php'</script>"; 
    }
  ?> 
  <?php  
    if(isset($_POST['submit_tr_result']))
    { 
      $_SESSION['pk']=$_POST['pk'];
      echo "<script>location='training_result.php'</script>"; 
    }
  ?>   
  <?php
    if(isset($_POST["delete"]))
    {
      $s=$_POST['pk'];
     $url1 = 'https://api.neptune.bitjiniapps.com/add_live_training/'.$s.'/';
            $options1 = array(
              'http' => array(
              'header'  => array(
                        'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                        ),
                'method'  => 'DELETE',
              ),
            );
            $context1 = stream_context_create($options1);
            $output1 = file_get_contents($url1, false,$context1);
            $arr4 = json_decode($output1,true);
            
            echo '<script>alert("Deleted Training Successfully");</script>';
            echo "<script>location='training_db.php'</script>";
      }
    ?>
  <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
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
                           <li><i class="fa fa-tasks"></i><a href="exersice_db.php">Exercise</a></li>
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

    <div class="content">
    <div class="animated fadeIn">
       <div class="top_hd" style="text-align:center;margin-top:2%;"><h3>Training List</h3></div>
      <div class="top_hd" style="text-align:center;margin-top:1%;"><h4><?php echo count($arr1);?> Training</h4></div><br/>

        <div class="row fltr_opt" >
          <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1"></div>
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="">
           <input class="form-control srch" placeholder="Search" id="myInput" type="text" style="border-radius: 7px 6px;">
          </div>
         
          <div style="color:black;" class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>

          <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>

          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <button type="button" class="form-control" id="add_video" onclick="window.location.href='./add_training.php'" style="cursor: pointer;background-color:#728370;color:#fff;border-radius: 7px 6px;height: 44px;">Add Training</button>
          </div>
        </div><!--row--><br/>

        <div class="breadcrumbs">
            <div class="ss">
          <table class="table table-bordered table-striped" style="box-shadow:0 0px 0px rgba(0,0,0,0.16), 0 1px 1px rgba(0,0,0,0.23);background-color:white;margin-left:3%;overflow:auto;">
            <thead>
              <tr style="color:black;">
               <!--  <th style="width:3%;">Sl.No</th>  
                <th style="width:3%;">Date</th>          
                <th style="width:3%;">RouteName</th>
                <th style="width:3%;">Routes</th>
                <th style="width:3%;">Commandos</th>
                <th style="width:3%;">Result</th>
                <th style="width:3%;">Route</th> -->
                 <th style="width:3%;">Sl.No</th>  
                <th style="width:3%;">Type</th>          
                <th style="width:3%;">Incharge</th>
                <th style="width:3%;">No of Route</th>
                <th style="width:3%;">Status</th>
                <th style="width:3%;">Add Route</th>
                <th style="width:3%;">Details</th>
                <th style="width:3%;">Result</th>
                <th style="width:3%;">Delete</th>
              </tr>
            </thead>
            <tbody id="myTable" >
            
          <?php $count=0; foreach ($arr1 as $jsonArray) {
                // $dateTime = new DateTime($jsonArray['watch_list']['created']);
                if(empty($jsonArray)){ $count;} else {$count++;}
              ?>
              <tr style="color:black;" class="content1">
                <td><?php echo $count; ?></td>
                <td><?php echo $jsonArray['l_type']; ?></td>
                <td><?php echo $jsonArray['office_incharge']; ?></td>
                <td><?php echo count ($jsonArray['route_id']);?></td>
                <td><?php echo $jsonArray['t_status']; ?></td>
                <td><form method="post"><input type="hidden" name="pk" value="<?php echo $jsonArray['pk']; ?>"><button type="submit" name="submit_more_route" class="btn" style="background-color: #728370;color: #fff;">Add More Route</button></form></td>
                <td><form method="post"><input type="hidden" name="pk" value="<?php echo $jsonArray['pk']; ?>"><button type="submit" name="submit_tr_dtl" class="btn" style="background-color: #728370;color: #fff;"><i class="fa fa-eye"></i></button></form></td>
                <td><form method="post"><input type="hidden" name="pk" value="<?php echo $jsonArray['pk']; ?>"><button type="submit" name="submit_tr_result" class="btn" style="background-color: #728370;color: #fff;">View</button></form></td>
                <td><form method="post"><input type="hidden" name="pk" value="<?php echo $jsonArray['pk']; ?>"><button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Delete Training?')"><i class="fa fa-trash"></i></button></form></td>
              </tr>
              
             <?php } ?> 
            </tbody>
         
          </table>
        </div><!--ss-->

        </div>
        </div>

       </div> 
 
    </div>
    <!-- /#right-panel --> 

      <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
        });
    </script>


</body>
</html>
