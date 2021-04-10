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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

    #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width:40%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  /*top: 15px;*/
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>

<body style="background-color:#e6e5e5;">

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
    $arr = json_decode($output2,true);
    // print_r($arr2);
?> 
<?php
 if(isset($_POST['tb_ls'])){
    $url2 = 'https://api.neptune.bitjiniapps.com/training_list_based_on_route/';
    $data = array(
                    'route_id'=>$_POST['rt'],
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
    $arr3 = json_decode($output2,true);
  }
?> 

<?php
    $url2 = 'https://api.neptune.bitjiniapps.com/live_training_list/';
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
  $url2 = 'https://api.neptune.bitjiniapps.com/training_list_based_on_hold_status/';
    $data = array(
                    'h_status'=>"hold",
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

    // $counter =0;
    // foreach ($arr2 as $jsonArray1) {  
    //  foreach ($jsonArray1['training'] as $jsonArray2) {
    //     for($i=0;$i<count($jsonArray2);$i++){
    //     // echo "string";
    //     // echo $jsonArray2[$i]['start_time'];

    //   }
   
    //     }  
    //  }

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

        <div class="content cntnt">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Training Info</strong>
                            </div>
                            <div class="card-body card-block">

                           

                        <form enctype="multipart/form-data" id="upload_form1" name="myform1" method="post">     
                            <div class="row">
                        
                        <!-- <div class="col-xs-1 col-sm-1"></div>      -->  
                        <div class="col-xs-11 col-sm-11">
                            
                            <div class="row form-group">
                               <div class="col col-md-1" style=""><label for="ref.no">Ref.No:</label></div>
                               <div class="col-md-2" style=""><input type="text" id="ref.no" name="ref_no" class="form-control" value="<?php echo $arr['livetraining_detail']['ref_no']; ?>" readonly></div>
                               <div class="col-md-5"></div>
                               <div class="col-md-1"><label for="date">Date:</label></div>
                               <div class="col-md-3" style=""><input type="date" id="date" name="date"  class="form-control" style="width: 115%;" value="<?php echo date('Y-m-d');?>" readonly></div>
                            </div>

                             <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="type">Type:</label></div>
                               <div class="col-12 col-md-6">
                               <select  name="l_type" class="form-control" readonly>
                                <option value="<?php echo $arr['livetraining_detail']['l_type']; ?>"><?php echo $arr['livetraining_detail']['l_type']; ?></option>
                               <!--  <option value="Day Navigation">Day Navigation</option> -->
                               </select> 
                               </div>
                            </div>

                            <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="area">Exercise:</label></div>
                               <div class="col-12 col-md-6">
                               <select  name="area" class="form-control" readonly>
                               <option value="<?php echo $arr['livetraining_detail']['area_id']; ?>"><?php echo $arr['area_name']; ?></option>
                                <!-- <option value="">Select Area</option>
                                 <?php  foreach ($arr as $jsonArray) { ?>
                                  <option value="<?php echo $jsonArray['pk'];?>""><?php  echo $jsonArray['name'];?></option>
                                 <?php } ?> -->
                               </select> 
                               </div>
                            </div>
                            
                            <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="incharge">Office Incharge:</label></div>
                               <div class="col-12 col-md-6"><input type="text" id="incharge" name="incharge" class="form-control" value="<?php echo $arr['livetraining_detail']['office_incharge']; ?>" readonly></div>
                            </div>

                            <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="duration">Total Duration:</label></div>
                               <div class="col-md-3"><input type="text" id="duration" name="total_duration" class="form-control" value="<?php echo $arr['livetraining_detail']['total_duration']; ?>" readonly></div>
                            </div>   
                            
                            <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="marks">Total Marks:</label></div>
                               <div class="col-md-3"><input type="text" id="marks" name="total_marks" class="form-control" value="<?php echo $arr['livetraining_detail']['total_marks']; ?>" readonly></div>
                            </div>

                            <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="marks">Status:</label></div>
                               <div class="col-md-3"><input type="text" id="marks" name="t_status" class="form-control" value="<?php echo $arr['livetraining_detail']['t_status']; ?>" readonly></div>
                            </div>

                        </div>
                        <div class="col-xs-1 col-sm-1"></div> 

                        </div><hr>

                       <div class="row">
                        <div style="margin-left: 2%;margin-bottom:3%;">Timings:</div><br/>
                        <div class="card" style="margin-left: 2%;margin-right: 2%;box-shadow: 0 4px 8px 5px rgba(0,0,0,0.2);width: 96%;overflow-y: hidden;">
                         <div class="col-xs-12 col-sm-12" style="margin-top: 5%;">
                                                
                     
                        <div style="margin-left:-20%;">
                          
                           <form enctype="multipart/form-data" id="upload_form1" name="myform1" method="post">
                          <div class="row form-group" style="text-align: center;">
                               <div class="col col-md-3" style="text-align: end;"><label for="marks">Route:</label></div>
                               <div class="col-md-3">
                              <select  name="rt" class="form-control" readonly>
                                <option value="">Select Route</option>
                               <?php  foreach ($arr['route'] as $jsonArray1) {
                               ?>  
                               <option value="<?php echo $jsonArray1['routes']['pk']; ?>"><?php echo $jsonArray1['routes']['route_name']; ?></option>
                               <?php } ?> 
                               </select>
                               </div>
                               <button type="submit" name="tb_ls" class="btn" style="background-color: #728370;color: #fff;">Refresh</button>
                            </div>
                          </form>
                          </div><br/>
                          
                       
                       <div class="row fltr_opt" >
                          <!-- <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1"></div> -->
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                           <input class="form-control srch" placeholder="Search" id="myInput" type="text" style="border-radius: 7px 6px;">
                          </div>
                         
                          <div style="color:black;" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <select name="class" id="filterText1" onchange="filtert1();" class="filter1 form-control">
                                <option value="">Select Commando</option>
                                 <?php  foreach ($arr3 as $jsonArray1) {
                                 ?>  
                                 <?php  foreach ($jsonArray1 as $jsonArray2) {
                                 ?>  
                                <option value="<?php echo $jsonArray2['name']; ?>"><?php echo $jsonArray2['name']; ?></option>
                                 <?php } ?> 
                                 <?php } ?>  
                                 <option value="all">All</option>
                               </select>
                          </div>

                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                             <select name="class" id="filterText2" onchange="filtert2();" class="filter2 form-control">
                                <option value="">Select check point</option>
                                 <?php for($i=0;$i<count($arr3);$i++){
                            $a = 0 ;
                         ?>
                          <?php for($j=0;$j<count($arr3[$i]);$j++){
                         ?>
                          <?php for($p=0;$p<count($arr3[$i][$j]);$p++){
                            
                         ?>
                         <option value="<?php echo $arr3[$i][1]['check_point'][$p]['check_point_name']; ?>"><?php echo $arr3[$i][1]['check_point'][$p]['check_point_name']; ?></option>
                                 <?php } ?> 
                                 <?php } ?> 
                                 <?php } ?> 
                                 <option value="all">All</option>
                               </select>
                          </div>
                          <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1"></div>
                          <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                           <div>TIME</div>
                           <div style="color: red;"><?php echo date("H:i:s"); ?></div>
                          </div>
                         </div><!--row--><br/>   
                           
                      <div style="font-weight: bold;"><?php echo $arr3[0][0]['route_name']; ?></div><br/>     <div class="card" style="box-shadow: 0 4px 8px 5px rgba(0,0,0,0.2);width:100%;"> 
                         <table class="table table-bordered table-striped" id="myTable" style="box-shadow:0 0px 0px rgba(0,0,0,0.16), 0 1px 1px rgba(0,0,0,0.23);background-color:white;">
                          <thead>
                            <tr style="color:black;">
                              <th>Name</th>         
                              <th>Check Point Name</th>
                              <th>Check In Time</th>
                              <th>Check Out Time</th>
                              <th>Image</th>
                             <th>Duration</th> 
                             <th>Points</th> 
                            </tr>
                            
                          </thead>
                         
                          <tbody>
                          
                          <?php for($i=0;$i<count($arr3);$i++){
                            $a = 0 ;
                         ?>
                          <?php for($j=0;$j<count($arr3[$i]);$j++){
                         ?>
                          <?php for($p=0;$p<count($arr3[$i][$j]);$p++){
                            
                         ?>
                           <tr class="content1">
                              <?php if ($a == 0){
                                 $a = $arr3[$i][$j]['check_point_name']; ?>
                            <td><?php echo $arr3[$i][$j]['name']; ?></td>
                            <td><?php echo $arr3[$i][$j]['check_point_name']; ?></td>
                            <td><?php echo $arr3[$i][$j]['start_time']; ?></td>
                            <td><?php echo $arr3[$i][$j]['stop_time']; ?></td>
                            <td><img id="myImg" style="max-width:50%;" onclick="onClick(this)" src="<?php echo $arr3[$i][1]['checkpt_url']; ?>" class="w3-hover-opacity"></td>
                            <td><?php $s2=$arr3[$i-1][$j]['stop_time']; $s1=$arr3[$i][$j]['start_time']; $sss=( strtotime($s1) - strtotime($s2) ) / 60; if($s1=="" || $s2==""){ echo "0";} else{ echo $sss." Mins";} ?></td>
                         
                      <td><?php $s2=$arr3[$i-1][$j]['stop_time']; $s1=$arr3[$i][$j]['start_time'];  $sss=( strtotime($s1) - strtotime($s2) ) / 60; $m1=$arr3[$i][1]['check_point'][$p]['min1']; $m2=$arr3[$i][1]['check_point'][$p]['min2']; $m3=$arr3[$i][1]['check_point'][$p]['min3']; $m4=$arr3[$i][1]['check_point'][$p]['min4']; $m5=$arr3[$i][1]['check_point'][$p]['min5']; $m6=$arr3[$i][1]['check_point'][$p]['min6']; if($sss<=$m1){ echo $arr3[$i][1]['check_point'][$p]['point1'];} elseif($sss<=$m2){ echo $arr3[$i][1]['check_point'][$p]['point2'];} elseif($sss<=$m3){ echo $arr3[$i][1]['check_point'][$p]['point3'];} elseif($sss<=$m4){ echo $arr3[$i][1]['check_point'][$p]['point4'];} elseif($sss<=$m5){ echo $arr3[$i][1]['check_point'][$p]['point5'];} elseif($sss>=$m6){ echo $arr3[$i][1]['check_point'][$p]['point6'];} ?> </td> 
                           <?php $a = 1; }?>
                           </tr>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                          </tbody>  

                         </table>
                         </div>

                        </div> 

                         </div>
                        <!--   <div class="col-xs-1 col-sm-1"></div>  -->
                        </div>


                        <div class="card" style="box-shadow: 0 4px 8px 5px rgba(0,0,0,0.2);width:100%;">
                         <div class="col-xs-12 col-sm-12" style="margin-top: 5%;">

                          <div class="row fltr_opt" >
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"  style="font-weight: bold;">Hold Ups</div>
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                           <input class="form-control srch" placeholder="Search" id="myInput1" type="text" style="border-radius: 7px 6px;">
                          </div>
                         
                          <!-- <div style="color:black;" class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div> -->

                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></div>
                          <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1"></div>
                          <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                           <!-- <div>TIME</div>
                           <div style="color: red;"><?php echo date("H:i:s"); ?></div> -->
                          </div>
                         </div><!--row--><br/>

                        <div class="card" style="box-shadow: 0 4px 8px 5px rgba(0,0,0,0.2);width:100%;overflow-y: scroll;height:350px;">
                         <table class="table table-bordered table-striped" style="box-shadow:0 0px 0px rgba(0,0,0,0.16), 0 1px 1px rgba(0,0,0,0.23);background-color:white;">
                          <thead>
                            <tr style="color:black;">
                              <th>Name</th>         
                              <th>Check Point</th>
                              <th>In</th>
                              <th>Out</th>
                              <th>Duration</th>
                              <th>Reason</th>
                             <!--  <th>Finish Time</th> -->
                            </tr>
                            
                          </thead>
                          <tbody id="myTable1" >
                     
                         
                         <?php  foreach ($arr2 as $jsonArray1) {
                       ?>  
                         <?php  foreach ($jsonArray1['training'] as $jsonArray2) {
                       ?>  
                       <?php  foreach ($jsonArray2 as $jsonArray3) {
                       ?>
                           <tr class="content2">
                            <td><?php echo $jsonArray3['name']; ?></td>
                            <td><?php echo $jsonArray3['check_point_name']; ?></td> 
                            <td><?php echo $jsonArray3['start_time']; ?></td> 
                            <td><?php echo $jsonArray3['stop_time']; ?></td> 
                            <td></td> 
                            <td><?php echo  $jsonArray3['reason']; ?></td> 
                           </tr>
                           <?php } ?> 
                        <?php } ?>  
                          <?php } ?>  
                          </tbody>  
                         </table>
                         </div>  

                        </div> 

                         </div>

                         </div>
                      </div>  
                      
                       
                         </form>      
                            </div>
                        </div>
                    </div>
                    </div>
       
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>

<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

    </div><!-- /#right-panel -->


<script>
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>

<!-- <script type="text/javascript">
  var mylist = $('#myTable');
var listitems = mylist.find('tr');
listitems.sort(function(a, b) {
   return $(a).text().toUpperCase().localeCompare($(b).text().toUpperCase());
})
$.each(listitems, function(idx, itm) { mylist.append(itm); });
</script> -->


<script type="text/javascript">
  var optionValues =[];
$('#filterText1 option').each(function(){
   if($.inArray(this.value, optionValues) >-1){
      $(this).remove()
   }else{
      optionValues.push(this.value);
   }
});
</script>

<script type="text/javascript">
  var optionValues =[];
$('#filterText2 option').each(function(){
   if($.inArray(this.value, optionValues) >-1){
      $(this).remove()
   }else{
      optionValues.push(this.value);
   }
});
</script>

<script>
    function filtert1() {  
        var rex = new RegExp($('#filterText1').val());
        if(rex =="/all/"){clearFilter()}else{
          $('.content1').hide();
          $('.content1').filter(function() {
          return rex.test($(this).text());
          var s=rex.test($(this).text());
          }).show();
      }
      }  
    function clearFilter()
      {
        $('.filterText1').val('');
        $('.content1').show();
      }
    </script>

    <script>
    function filtert2()
      {  
        var rex = new RegExp($('#filterText2').val());
        if(rex =="/all/"){clearFilter()}else{
          $('.content1').hide();
          $('.content1').filter(function() {
          return rex.test($(this).text());
          var s=rex.test($(this).text());
          }).show();
      }
      }      
    function clearFilter()
      {
        $('.filterText2').val('');
        $('.content1').show();
      }
    </script>
      <!-- Scripts -->
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

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

    <script>
      $(document).ready(function(){
        $("#myInput1").on("keyup", function() {
          var value = $(this).val().toLowerCase();
            $("#myTable1 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
        });
    </script>

 
   
  </body>
  </html>
