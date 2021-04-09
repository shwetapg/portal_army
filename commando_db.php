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
    function compareByName($a, $b) {
  // return strcmp($a['name'][0], $b['name'][0]);
   // return $a['name'] > $b['name'];
  return strnatcasecmp($a['full_name'], $b['full_name']);
}
usort($arr1, 'compareByName');
?> 
 <?php  
    if(isset($_POST['submit_commando_edit']))
    { 
      $_SESSION['pk']=$_POST['pk'];
      $_SESSION['name']=$_POST['name'];
       $_SESSION['reg_no']=$_POST['reg_no'];
      $_SESSION['reg_date']=$_POST['reg_date'];
       $_SESSION['img']=$_POST['img'];
      echo "<script>location='edit_commando.php'</script>"; 
    }
  ?>   

  <?php  
    if(isset($_POST['submit_commando_dtl']))
    { 
      $_SESSION['pk']=$_POST['pk'];
      $_SESSION['name']=$_POST['name'];
      $_SESSION['reg_no']=$_POST['reg_no'];
      $_SESSION['reg_date']=$_POST['reg_date'];
      $_SESSION['img']=$_POST['img'];
      echo "<script>location='commando_dtl.php'</script>"; 
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
                        <a href="live_training_db.php"> <i class="menu-icon fa fa-users"></i>Live Trainig</a>
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
       <div class="top_hd" style="text-align:center;margin-top:2%;"><h3>Commandos List</h3></div>
      <div class="top_hd" style="text-align:center;margin-top:1%;"><h4><?php echo count($arr1);?> Commandos</h4></div><br/>

        <div class="row fltr_opt" >
          <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1"></div>
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="">
           <input class="form-control srch" placeholder="Search" id="myInput" type="text" style="border-radius: 7px 6px;">
          </div>
         
          <div style="color:black;" class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>

          <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>

          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <button type="button" class="form-control" id="add_video" onclick="window.location.href='./add_commando.php'" style="cursor: pointer;background-color:#728370;color:#fff;border-radius: 7px 6px;height: 44px;">Add Commando</button>
          </div>
        </div><!--row--><br/>

        <div class="breadcrumbs">
            <div class="ss">
            
          <table class="table table-bordered table-striped" style="box-shadow:0 0px 0px rgba(0,0,0,0.16), 0 1px 1px rgba(0,0,0,0.23);background-color:white;margin-left:3%;overflow:auto;">
            <thead>
              <tr style="color:black;">
                <th style="width:1%;">Sl.No</th>  
                <th style="width:3%;">Photo</th>
                <th style="width:3%;">FullName</th>
                <th style="width:3%;">Reg Date</th>   
                <th style="width:3%;">Reg No</th>
                <th style="width:3%;">Edit</th>          
               <!--  <th style="width:5%;">Generate</th>
                <th style="width:3%;">QR Code</th> -->
                <th style="width:3%;">Details</th>
                <!-- <th style="width:3%;">Delete</th> -->
              </tr>
            </thead>
            <tbody id="myTable" >
           
              <?php $count=0; foreach ($arr1 as $jsonArray) {
                $dateTime = new DateTime($jsonArray['watch_list']['created']);
                if(empty($jsonArray)){ $count;} else {$count++;}
              ?>
               
              <tr style="color:black;" class="content1">
              
                <td><?php echo $count; ?></td>
                <td> <img style="max-width:35%;" src="<?php echo $jsonArray['profile_pic']; ?>"></img></td>
                <td><?php echo $jsonArray['full_name']; ?></td>
                <td style=""><?php echo $jsonArray['reg_date'] ?></td>
                <td style=""><?php echo $jsonArray['reg_no'] ?></td>
                <td><form method="post"><input type="hidden" class="qrtext" name="pk" value="<?php echo $jsonArray['pk']; ?>"><input type="hidden" class="qrtext1" name="name" value="<?php echo $jsonArray['full_name']; ?>"><input type="hidden" name="reg_no" value="<?php echo $jsonArray['reg_no']; ?>"><input type="hidden" name="reg_date" value="<?php echo $jsonArray['reg_date']; ?>"><input type="hidden" name="img" value="<?php echo $jsonArray['profile_pic']; ?>"><button type="submit" name="submit_commando_edit" class="btn" style="background-color:#728370;color:#fff;"><i class="fa fa-edit"></i></button></form></td>
                 <td><form method="post"><input type="hidden" class="qrtext" name="pk" value="<?php echo $jsonArray['pk']; ?>"><input type="hidden" class="qrtext1" name="name" value="<?php echo $jsonArray['full_name']; ?>"><input type="hidden" name="reg_no" value="<?php echo $jsonArray['reg_no']; ?>"><input type="hidden" name="reg_date" value="<?php echo $jsonArray['reg_date']; ?>"><input type="hidden" name="img" value="<?php echo $jsonArray['profile_pic']; ?>"><button type="submit" name="submit_commando_dtl" class="btn" style="background-color:#728370;color:#fff;"><i class="fa fa-eye"></i></button></form></td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>

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
