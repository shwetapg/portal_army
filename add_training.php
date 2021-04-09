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
    $url2 = 'https://api.neptune.bitjiniapps.com/add_area/';
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
?> 

  <?php  
        if(isset($_POST['submit1']))
        {
          $cpr1arr=array();
          $url = 'https://api.neptune.bitjiniapps.com/add_more_check_points/';
          $data = array(
                    array(
                      'check_point_name' =>$_POST['checkpt1r1_name'],
                      'cp_status'=>$_POST['check_pt1r1_status'],
                      'distance' =>$_POST['distance_ckpt1r1'],
                      'min1' =>$_POST['min1r1'],
                      'min2' =>$_POST['min2r1'], 
                      'min3' =>$_POST['min3r1'],
                      'min4'=>$_POST['min4r1'],
                      'min5'=>$_POST['min5r1'],
                      'min6'=>$_POST['min6r1'],
                      'min7' =>$_POST['min7r1'],
                      'min8' =>$_POST['min8r1'], 
                      'min9' =>$_POST['min9r1'],
                      'min10'=>$_POST['min10r1'],
                      'point1'=>$_POST['pts1r1'],
                      'point2'=>$_POST['pts2r1'],
                      'point3'=>$_POST['pts3r1'],
                      'point4'=>$_POST['pts4r1'],
                      'point5'=>$_POST['pts5r1'],
                      'point6'=>$_POST['pts6r1'],
                      'point7'=>$_POST['pts7r1'],
                      'point8'=>$_POST['pts8r1'],
                      'point9'=>$_POST['pts9r1'],
                      'point10'=>$_POST['pts10r1'],
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1 = json_decode($result,true);
          // print_r($arr1);
          foreach ($arr1 as $new) {
            $s=$new['pk'];
            array_push($cpr1arr,$s);
          }

          $url = 'https://api.neptune.bitjiniapps.com/add_more_check_points/';
          $data = array(
                    array( 
                      'check_point_name' =>$_POST['checkpt2r1_name'],
                      'cp_status'=>$_POST['check_pt2r1_status'],
                      'distance' =>$_POST['distance_ckpt2r1'],
                      'min1' =>$_POST['min1_ckpt2_r1'],
                      'min2' =>$_POST['min2_ckpt2_r1'], 
                      'min3' =>$_POST['min3_ckpt2_r1'],
                      'min4'=>$_POST['min4_ckpt2_r1'],
                      'min5'=>$_POST['min5_ckpt2_r1'],
                      'min6'=>$_POST['min6_ckpt2_r1'],
                      'min7' =>$_POST['min7_ckpt2_r1'],
                      'min8' =>$_POST['min8_ckpt2_r1'], 
                      'min9' =>$_POST['min9_ckpt2_r1'],
                      'min10'=>$_POST['min10_ckpt2_r1'],
                      'point1'=>$_POST['pts1_ckpt2_r1'],
                      'point2'=>$_POST['pts2_ckpt2_r1'],
                      'point3'=>$_POST['pts3_ckpt2_r1'],
                      'point4'=>$_POST['pts4_ckpt2_r1'],
                      'point5'=>$_POST['pts5_ckpt2_r1'],
                      'point6'=>$_POST['pts6_ckpt2_r1'],
                      'point7'=>$_POST['pts7_ckpt2_r1'],
                      'point8'=>$_POST['pts8_ckpt2_r1'],
                      'point9'=>$_POST['pts9_ckpt2_r1'],
                      'point10'=>$_POST['pts10_ckpt2_r1'],
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1 = json_decode($result,true);
          // print_r($arr1);
          if($_POST['checkpt2r1_name']==""){

          }else{
          foreach ($arr1 as $new) {
            $s=$new['pk'];
            array_push($cpr1arr,$s);
          }
          }


          $url = 'https://api.neptune.bitjiniapps.com/add_more_check_points/';
          $data = array(
                    array( 
                      'check_point_name' =>$_POST['checkpt3r1_name'],
                      'cp_status'=>$_POST['check_pt3r1_status'],
                      'distance' =>$_POST['distance_ckpt3r1'],
                      'min1' =>$_POST['min1_ckpt3_r1'],
                      'min2' =>$_POST['min2_ckpt3_r1'], 
                      'min3' =>$_POST['min3_ckpt3_r1'],
                      'min4'=>$_POST['min4_ckpt3_r1'],
                      'min5'=>$_POST['min5_ckpt3_r1'],
                      'min6'=>$_POST['min6_ckpt3_r1'],
                      'min7' =>$_POST['min7_ckpt3_r1'],
                      'min8' =>$_POST['min8_ckpt3_r1'], 
                      'min9' =>$_POST['min9_ckpt3_r1'],
                      'min10'=>$_POST['min10_ckpt3_r1'],
                      'point1'=>$_POST['pts1_ckpt3_r1'],
                      'point2'=>$_POST['pts2_ckpt3_r1'],
                      'point3'=>$_POST['pts3_ckpt3_r1'],
                      'point4'=>$_POST['pts4_ckpt3_r1'],
                      'point5'=>$_POST['pts5_ckpt3_r1'],
                      'point6'=>$_POST['pts6_ckpt3_r1'],
                      'point7'=>$_POST['pts7_ckpt3_r1'],
                      'point8'=>$_POST['pts8_ckpt3_r1'],
                      'point9'=>$_POST['pts9_ckpt3_r1'],
                      'point10'=>$_POST['pts10_ckpt3_r1'],
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1 = json_decode($result,true);
          // print_r($arr1);
          if($_POST['checkpt3r1_name']==""){

          }else{
          foreach ($arr1 as $new) {
            $s=$new['pk'];
            array_push($cpr1arr,$s);
          }
          }

          $url = 'https://api.neptune.bitjiniapps.com/add_more_check_points/';
          $data = array(
                    array( 
                      'check_point_name' =>$_POST['checkpt4r1_name'],
                      'cp_status'=>$_POST['check_pt4r1_status'],
                      'distance' =>$_POST['distance_ckpt4r1'],
                      'min1' =>$_POST['min1_ckpt4_r1'],
                      'min2' =>$_POST['min2_ckpt4_r1'], 
                      'min3' =>$_POST['min3_ckpt4_r1'],
                      'min4'=>$_POST['min4_ckpt4_r1'],
                      'min5'=>$_POST['min5_ckpt4_r1'],
                      'min6'=>$_POST['min6_ckpt4_r1'],
                      'min7' =>$_POST['min7_ckpt4_r1'],
                      'min8' =>$_POST['min8_ckpt4_r1'], 
                      'min9' =>$_POST['min9_ckpt4_r1'],
                      'min10'=>$_POST['min10_ckpt4_r1'],
                      'point1'=>$_POST['pts1_ckpt4_r1'],
                      'point2'=>$_POST['pts2_ckpt4_r1'],
                      'point3'=>$_POST['pts3_ckpt4_r1'],
                      'point4'=>$_POST['pts4_ckpt4_r1'],
                      'point5'=>$_POST['pts5_ckpt4_r1'],
                      'point6'=>$_POST['pts6_ckpt4_r1'],
                      'point7'=>$_POST['pts7_ckpt4_r1'],
                      'point8'=>$_POST['pts8_ckpt4_r1'],
                      'point9'=>$_POST['pts9_ckpt4_r1'],
                      'point10'=>$_POST['pts10_ckpt4_r1'],
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1 = json_decode($result,true);
          // print_r($arr1);
          if($_POST['checkpt4r1_name']==""){

          }else{
          foreach ($arr1 as $new) {
            $s=$new['pk'];
            array_push($cpr1arr,$s);
          }
          }

          $url = 'https://api.neptune.bitjiniapps.com/add_more_check_points/';
          $data = array(
                    array( 
                      'check_point_name' =>$_POST['checkpt5r1_name'],
                      'cp_status'=>$_POST['check_pt5r1_status'],
                      'distance' =>$_POST['distance_ckpt5r1'],
                      'min1' =>$_POST['min1_ckpt5_r1'],
                      'min2' =>$_POST['min2_ckpt5_r1'], 
                      'min3' =>$_POST['min3_ckpt5_r1'],
                      'min4'=>$_POST['min4_ckpt5_r1'],
                      'min5'=>$_POST['min5_ckpt5_r1'],
                      'min6'=>$_POST['min6_ckpt5_r1'],
                      'min7' =>$_POST['min7_ckpt5_r1'],
                      'min8' =>$_POST['min8_ckpt5_r1'], 
                      'min9' =>$_POST['min9_ckpt5_r1'],
                      'min10'=>$_POST['min10_ckpt5_r1'],
                      'point1'=>$_POST['pts1_ckpt5_r1'],
                      'point2'=>$_POST['pts2_ckpt5_r1'],
                      'point3'=>$_POST['pts3_ckpt5_r1'],
                      'point4'=>$_POST['pts4_ckpt5_r1'],
                      'point5'=>$_POST['pts5_ckpt5_r1'],
                      'point6'=>$_POST['pts6_ckpt5_r1'],
                      'point7'=>$_POST['pts7_ckpt5_r1'],
                      'point8'=>$_POST['pts8_ckpt5_r1'],
                      'point9'=>$_POST['pts9_ckpt5_r1'],
                      'point10'=>$_POST['pts10_ckpt5_r1'],
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1 = json_decode($result,true);
          // print_r($arr1);
          if($_POST['checkpt5r1_name']==""){

          }else{
          foreach ($arr1 as $new) {
            $s=$new['pk'];
            array_push($cpr1arr,$s);
          }
          }

           $url = 'https://api.neptune.bitjiniapps.com/add_more_check_points/';
          $data = array(
                    array( 
                      'check_point_name' =>$_POST['checkpt6r1_name'],
                      'cp_status'=>$_POST['check_pt6r1_status'],
                      'distance' =>$_POST['distance_ckpt6r1'],
                      'min1' =>$_POST['min1_ckpt6_r1'],
                      'min2' =>$_POST['min2_ckpt6_r1'], 
                      'min3' =>$_POST['min3_ckpt6_r1'],
                      'min4'=>$_POST['min4_ckpt6_r1'],
                      'min5'=>$_POST['min5_ckpt6_r1'],
                      'min6'=>$_POST['min6_ckpt6_r1'],
                      'min7' =>$_POST['min7_ckpt6_r1'],
                      'min8' =>$_POST['min8_ckpt6_r1'], 
                      'min9' =>$_POST['min9_ckpt6_r1'],
                      'min10'=>$_POST['min10_ckpt6_r1'],
                      'point1'=>$_POST['pts1_ckpt6_r1'],
                      'point2'=>$_POST['pts2_ckpt6_r1'],
                      'point3'=>$_POST['pts3_ckpt6_r1'],
                      'point4'=>$_POST['pts4_ckpt6_r1'],
                      'point5'=>$_POST['pts5_ckpt6_r1'],
                      'point6'=>$_POST['pts6_ckpt6_r1'],
                      'point7'=>$_POST['pts7_ckpt6_r1'],
                      'point8'=>$_POST['pts8_ckpt6_r1'],
                      'point9'=>$_POST['pts9_ckpt6_r1'],
                      'point10'=>$_POST['pts10_ckpt6_r1'],
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1 = json_decode($result,true);
          // print_r($arr1);
          if($_POST['checkpt6r1_name']==""){

          }else{
          foreach ($arr1 as $new) {
            $s=$new['pk'];
            array_push($cpr1arr,$s);
          }
          }

            $url = 'https://api.neptune.bitjiniapps.com/add_more_check_points/';
          $data = array(
                    array( 
                      'check_point_name' =>$_POST['checkpt7r1_name'],
                      'cp_status'=>$_POST['check_pt7r1_status'],
                      'distance' =>$_POST['distance_ckpt7r1'],
                      'min1' =>$_POST['min1_ckpt7_r1'],
                      'min2' =>$_POST['min2_ckpt7_r1'], 
                      'min3' =>$_POST['min3_ckpt7_r1'],
                      'min4'=>$_POST['min4_ckpt7_r1'],
                      'min5'=>$_POST['min5_ckpt7_r1'],
                      'min6'=>$_POST['min6_ckpt7_r1'],
                      'min7' =>$_POST['min7_ckpt7_r1'],
                      'min8' =>$_POST['min8_ckpt7_r1'], 
                      'min9' =>$_POST['min9_ckpt7_r1'],
                      'min10'=>$_POST['min10_ckpt7_r1'],
                      'point1'=>$_POST['pts1_ckpt7_r1'],
                      'point2'=>$_POST['pts2_ckpt7_r1'],
                      'point3'=>$_POST['pts3_ckpt7_r1'],
                      'point4'=>$_POST['pts4_ckpt7_r1'],
                      'point5'=>$_POST['pts5_ckpt7_r1'],
                      'point6'=>$_POST['pts6_ckpt7_r1'],
                      'point7'=>$_POST['pts7_ckpt7_r1'],
                      'point8'=>$_POST['pts8_ckpt7_r1'],
                      'point9'=>$_POST['pts9_ckpt7_r1'],
                      'point10'=>$_POST['pts10_ckpt7_r1'],
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1 = json_decode($result,true);
          // print_r($arr1);
          if($_POST['checkpt7r1_name']==""){

          }else{
          foreach ($arr1 as $new) {
            $s=$new['pk'];
            array_push($cpr1arr,$s);
          }
          }


          $url = 'https://api.neptune.bitjiniapps.com/add_more_check_points/';
          $data = array(
                    array( 
                      'check_point_name' =>$_POST['checkpt8r1_name'],
                      'cp_status'=>$_POST['check_pt8r1_status'],
                      'distance' =>$_POST['distance_ckpt8r1'],
                      'min1' =>$_POST['min1_ckpt8_r1'],
                      'min2' =>$_POST['min2_ckpt8_r1'], 
                      'min3' =>$_POST['min3_ckpt8_r1'],
                      'min4'=>$_POST['min4_ckpt8_r1'],
                      'min5'=>$_POST['min5_ckpt8_r1'],
                      'min6'=>$_POST['min6_ckpt8_r1'],
                      'min7' =>$_POST['min7_ckpt8_r1'],
                      'min8' =>$_POST['min8_ckpt8_r1'], 
                      'min9' =>$_POST['min9_ckpt8_r1'],
                      'min10'=>$_POST['min10_ckpt8_r1'],
                      'point1'=>$_POST['pts1_ckpt8_r1'],
                      'point2'=>$_POST['pts2_ckpt8_r1'],
                      'point3'=>$_POST['pts3_ckpt8_r1'],
                      'point4'=>$_POST['pts4_ckpt8_r1'],
                      'point5'=>$_POST['pts5_ckpt8_r1'],
                      'point6'=>$_POST['pts6_ckpt8_r1'],
                      'point7'=>$_POST['pts7_ckpt8_r1'],
                      'point8'=>$_POST['pts8_ckpt8_r1'],
                      'point9'=>$_POST['pts9_ckpt8_r1'],
                      'point10'=>$_POST['pts10_ckpt8_r1'],
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1 = json_decode($result,true);
          // print_r($arr1);
          if($_POST['checkpt8r1_name']==""){

          }else{
          foreach ($arr1 as $new) {
            $s=$new['pk'];
            array_push($cpr1arr,$s);
          }
          }

          $url = 'https://api.neptune.bitjiniapps.com/add_more_check_points/';
          $data = array(
                    array( 
                      'check_point_name' =>$_POST['checkpt9r1_name'],
                      'cp_status'=>$_POST['check_pt9r1_status'],
                      'distance' =>$_POST['distance_ckpt9r1'],
                      'min1' =>$_POST['min1_ckpt9_r1'],
                      'min2' =>$_POST['min2_ckpt9_r1'], 
                      'min3' =>$_POST['min3_ckpt9_r1'],
                      'min4'=>$_POST['min4_ckpt9_r1'],
                      'min5'=>$_POST['min5_ckpt9_r1'],
                      'min6'=>$_POST['min6_ckpt9_r1'],
                      'min7' =>$_POST['min7_ckpt9_r1'],
                      'min8' =>$_POST['min8_ckpt9_r1'], 
                      'min9' =>$_POST['min9_ckpt9_r1'],
                      'min10'=>$_POST['min10_ckpt9_r1'],
                      'point1'=>$_POST['pts1_ckpt9_r1'],
                      'point2'=>$_POST['pts2_ckpt9_r1'],
                      'point3'=>$_POST['pts3_ckpt9_r1'],
                      'point4'=>$_POST['pts4_ckpt9_r1'],
                      'point5'=>$_POST['pts5_ckpt9_r1'],
                      'point6'=>$_POST['pts6_ckpt9_r1'],
                      'point7'=>$_POST['pts7_ckpt9_r1'],
                      'point8'=>$_POST['pts8_ckpt9_r1'],
                      'point9'=>$_POST['pts9_ckpt9_r1'],
                      'point10'=>$_POST['pts10_ckpt9_r1'],
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1 = json_decode($result,true);
          // print_r($arr1);
          if($_POST['checkpt9r1_name']==""){

          }else{
          foreach ($arr1 as $new) {
            $s=$new['pk'];
            array_push($cpr1arr,$s);
          }
          }

          $url = 'https://api.neptune.bitjiniapps.com/add_more_check_points/';
          $data = array(
                    array( 
                      'check_point_name' =>$_POST['checkpt10r1_name'],
                      'cp_status'=>$_POST['check_pt10r1_status'],
                      'distance' =>$_POST['distance_ckpt10r1'],
                      'min1' =>$_POST['min1_ckpt10_r1'],
                      'min2' =>$_POST['min2_ckpt10_r1'], 
                      'min3' =>$_POST['min3_ckpt10_r1'],
                      'min4'=>$_POST['min4_ckpt10_r1'],
                      'min5'=>$_POST['min5_ckpt10_r1'],
                      'min6'=>$_POST['min6_ckpt10_r1'],
                      'min7' =>$_POST['min7_ckpt10_r1'],
                      'min8' =>$_POST['min8_ckpt10_r1'], 
                      'min9' =>$_POST['min9_ckpt10_r1'],
                      'min10'=>$_POST['min10_ckpt10_r1'],
                      'point1'=>$_POST['pts1_ckpt10_r1'],
                      'point2'=>$_POST['pts2_ckpt10_r1'],
                      'point3'=>$_POST['pts3_ckpt10_r1'],
                      'point4'=>$_POST['pts4_ckpt10_r1'],
                      'point5'=>$_POST['pts5_ckpt10_r1'],
                      'point6'=>$_POST['pts6_ckpt10_r1'],
                      'point7'=>$_POST['pts7_ckpt10_r1'],
                      'point8'=>$_POST['pts8_ckpt10_r1'],
                      'point9'=>$_POST['pts9_ckpt10_r1'],
                      'point10'=>$_POST['pts10_ckpt10_r1'],
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr1 = json_decode($result,true);
          // print_r($arr1);
          if($_POST['checkpt10r1_name']==""){

          }else{
          foreach ($arr1 as $new) {
            $s=$new['pk'];
            array_push($cpr1arr,$s);
          }
          }


          $rarr=array();
          $url = 'https://api.neptune.bitjiniapps.com/add_more_routes/';
          $data = array(
                    array(
                      'route_name'=>$_POST['route1_name'],
                      'check_point_id'=>$cpr1arr,
                     ) 
                  );

          $options = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
              'method'  => 'POST',
              'content' => json_encode( $data ),
            ),
          );
          //$s=json_encode( $data );
          $context  = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          $arr2 = json_decode($result,true);
          // print_r($arr2);
          foreach ($arr2 as $new) {
            $s=$new['pk'];
            array_push($rarr,$s);
          }

               
        $url1 = 'https://api.neptune.bitjiniapps.com/add_live_training/';
        $data1 = array(
                    'ref_no' => $_POST['ref_no'],
                    'l_type' => $_POST['l_type'], 
                    'route_id' => $rarr,
                    'office_incharge'=> $_POST['incharge'],
                    'total_duration'=> $_POST['total_duration'],
                    'total_marks'=>$_POST['total_marks'],
                    'area_id'=>$_POST['area'],
                  );

          $options1 = array(
            'http' => array(
              'header'  => array(
                'Authorization: '.'Token 7733513f8a2d44f607ebd4135a5d6a484644776b',
                 "Content-Type: application/json\r\n" .
                           "Accept: application/json\r\n",
                ),
               
              'method'  => 'POST',
              'content' => json_encode( $data1 ),
            ),
          );
          // $s=json_encode($data);
          $context1  = stream_context_create($options1);
          $result1 = file_get_contents($url1, false, $context1);
          $arr3 = json_decode($result1);
          // print_r($arr3);
          // echo "string";
          echo '<script>alert("Added Trainig Details Successfully");</script>';
        echo "<script>location='training_db.php'</script>";
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
                               <div class="col-md-2" style=""><input type="text" id="ref.no" name="ref_no" class="form-control" ></div>
                               <div class="col-md-5"></div>
                               <div class="col-md-1"><label for="date">Date:</label></div>
                               <div class="col-md-3" style=""><input type="date" id="date" name="date" class="form-control" style="width: 115%;" value="<?php echo date('Y-m-d');?>" ></div>
                            </div>

                             <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="type">Type:</label></div>
                               <div class="col-12 col-md-6">
                               <select  name="l_type" class="form-control" >
                                <option value="Day Navigation">Day Navigation</option>
                                <option value="Night Navigation">Night Navigation</option>
                               </select> 
                               </div>
                            </div>

                            <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="area">Exercise:</label></div>
                               <div class="col-12 col-md-6">
                               <select  name="area" class="form-control" >
                                <option value="">Select Exercise</option>
                                 <?php  foreach ($arr as $jsonArray) { ?>
                                  <option value="<?php echo $jsonArray['pk'];?>""><?php  echo $jsonArray['name'];?></option>
                                 <?php } ?>
                               </select> 
                               </div>
                            </div>
                            
                            <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="incharge">Office Incharge:</label></div>
                               <div class="col-12 col-md-6"><input type="text" id="incharge" name="incharge" class="form-control" ></div>
                            </div>

                            <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="duration">Total Duration:</label></div>
                               <div class="col-md-3"><input type="number" id="duration" name="total_duration" class="form-control" ></div>
                            </div>   
                            
                            <div class="row form-group">
                               <div class="col col-md-3" style="text-align: end;"><label for="marks">Total Marks:</label></div>
                               <div class="col-md-3"><input type="number" id="marks" name="total_marks" class="form-control" ></div>
                            </div>

                        </div>
                        <div class="col-xs-1 col-sm-1"></div> 

                        </div><hr>

                   <!--first route-->
                        <div class="row">
                        <div style="margin-left: 2%;margin-bottom:3%;">Routes:</div><br/>
                        <div style="background-color: #728370;margin-left: 2%;margin-right: 2%;">
                         <div class="col-xs-11 col-sm-11" style="margin-top: 5%;">

                        <div class="row">
                         <div class="col-xs-6 col-sm-6">
                          <div class="row form-group">
                            <div class="col col-md-6" style="text-align: end;"><label for="route1">Route 1:</label></div>
                            <div class="col-12 col-md-6"><input type="text" id="" name="route1_name" class="form-control" style="" required></div>
                          </div>
                         </div> 
                          <div class="col-xs-6 col-sm-6"></div>    
                         </div>

                         <div class="row">
                         <div class="col-xs-6 col-sm-6">
                          <div class="row form-group">
                            <div class="col col-md-6" style="text-align: end;"><label for="checkpt">Check Point 1:</label></div>
                            <div class="col-12 col-md-6"><input type="text" id="" name="checkpt1r1_name" class="form-control" required></div>
                          </div>
                         </div> 
                          <div class="col-xs-6 col-sm-6"></div>    
                         </div>

                         <div class="row">
                         <div class="col-xs-6 col-sm-6">
                          <div class="row form-group">
                            <div class="col col-md-6" style="text-align: end;"><label for="check_pt_status">Status:</label></div>
                            <div class="col-12 col-md-6">
                            <select  name="check_pt1r1_status" class="form-control" required>
                              <option value="">Select Status</option>
                              <option value="startpoint">Start Point</option>
                              <option value="midPoint">Mid Point</option>
                              <option value="endPoint">End Point</option>
                            </select> 
                            </div>
                          </div>
                         </div> 
                          <div class="col-xs-6 col-sm-6"></div>    
                         </div>

                         <div class="row">
                         <div class="col-xs-6 col-sm-6">
                          <div class="row form-group">
                            <div class="col col-md-6" style="text-align: end;"><label for="distance">Distance:</label></div>
                            <div class="col-12 col-md-3"><input type="number" id="" name="distance_ckpt1r1" class="form-control" style="width: 130%;" required></div>
                            <div class="col col-md-3">ms</div>
                          </div>
                         </div> 
                          <div class="col-xs-6 col-sm-6"></div>    
                         </div>


                         <div class="row">
                         <div class="col-xs-2 col-sm-2">
                          <div class="row form-group" style="margin-left:94%;">
                            <div class="col col-md-3" style="text-align: end;"><label for="timing">Timings:</label></div>
                          </div>
                          </div> 
                          <div class="col-xs-2 col-sm-2">
                          <div class="row form-group" style="margin-left:55%;">
                            <div class="col col-md-3" style="text-align: end;"><label for="mins">mins</label></div>
                          </div>
                          </div> 
                          <div class="col-xs-8 col-sm-8">
                          <div class="row form-group">
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="min1r1" class="form-control" ></div>
                              <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="min2r1" class="form-control" ></div>
                              <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="min3r1" class="form-control" ></div>
                              <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="min4r1" class="form-control" ></div>
                              <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="min5r1" class="form-control" ></div>
                            </div>    

                           <div class="row form-group">
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="min6r1" class="form-control" ></div>
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="min7r1" class="form-control" ></div>
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="min8r1" class="form-control" ></div>
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="min9r1" class="form-control" ></div>
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="min10r1" class="form-control" ></div>

                          </div>    
                          </div>    
                         </div>

                          <div class="row">
                         <div class="col-xs-2 col-sm-2"></div> 
                          <div class="col-xs-2 col-sm-2">
                          <div class="row form-group" style="margin-left:55%;">
                            <div class="col col-md-3" style="text-align: end;"><label for="pts">pts</label></div>
                          </div>
                          </div> 
                          <div class="col-xs-8 col-sm-8">
                          <div class="row form-group">
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="pts1r1" class="form-control" ></div>
                              <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="pts2r1" class="form-control" ></div>
                              <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="pts3r1" class="form-control" ></div>
                              <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="pts4r1" class="form-control" ></div>
                              <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="pts5r1" class="form-control" ></div>
                             
                          </div> 
                          <div class="row form-group">
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="pts6r1" class="form-control" ></div>
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="pts7r1" class="form-control" ></div>
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="pts8r1" class="form-control" ></div>
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="pts9r1" class="form-control" ></div>
                            <div class="col col-md-2.5" style=""><input type="number" id="qr-text" name="pts10r1" class="form-control" ></div>
                          </div> 

                          
                          </div>    
                         </div>

                         </div><br/>

                         <div id="dynamic_field1"> 	
                          
                          </div><br/>

                         <div class="col-xs-1 col-sm-1"></div>
                         </div>
                      </div>   
                     <button type="button" name="add" id="add1" style="">ADD CHECKPOINT</button> <br/><br/><br/>
                    
                        
                     
                         <button type="submit" name="submit1" style="width: 12%;" class="btn btn-primary btn-sm">SAVE</button>&nbsp;&nbsp;&nbsp;
                         <button type="button" style="width: 12%;" class="btn btn-danger btn-sm" onclick="window.location.href='./training_db.php'">CANCEL</button>&nbsp;&nbsp;&nbsp;
                        <!--  <button type="button" style="width: 12%;" class="btn btn-primary btn-sm">START</button>&nbsp;&nbsp;&nbsp;
                         <button type="button" style="width: 12%;" class="btn btn-danger btn-sm">END</button> -->
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
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

<!-- Adding input field on clicking button   -->
<script>
    $(document).ready(function(){      
      var i=2; 

      $('#add1').click(function(){  
           
           if (i<=10)
           {
           $('#dynamic_field1').append('<div id="row'+i+'" class="dynamic-added"><div class="row"><div class="col-xs-1 col-sm-1"></div><div class="col-xs-10 col-sm-10"><div class="row"><div class="col-xs-6 col-sm-6"><div class="row form-group"><div class="col col-md-6"><label for="checkpt">Check Point '+i+':</label></div><div class="col-12 col-md-6" style="margin-left:-15%;"><input type="text" id="qr-text" name="checkpt'+i+'r1_name" class="form-control"></div></div></div><div class="col-xs-6 col-sm-6"></div></div><div class="row"><div class="col-xs-6 col-sm-6"><div class="row form-group"><div class="col col-md-6"><label for="check_pt_status">Status:</label></div><div class="col-12 col-md-6" style="margin-left:-15%;"><select  name="check_pt'+i+'r1_status" class="form-control"><option value="">Select Status</option><option value="startpoint">Start Point</option><option value="midPoint">Mid Point</option><option value="endPoint">End Point</option></select></div></div></div><div class="col-xs-6 col-sm-6"></div></div><div class="row"><div class="col-xs-6 col-sm-6"><div class="row form-group"><div class="col col-md-6" style=""><label for="distance">Distance:</label></div><div class="col-12 col-md-3" style="margin-left:-15%;"><input type="number" id="qr-text" name="distance_ckpt'+i+'r1" class="form-control" style="width:130%;"></div><div class="col col-md-3">ms</div></div></div><div class="col-xs-6 col-sm-6"></div></div></div><div class="row"><div class="col-xs-2 col-sm-2"><div class="row form-group" style="margin-left:60%;"><div class="col col-md-3" style=""><label for="timing">Timings:</label></div></div></div><div class="col-xs-2 col-sm-2"><div class="row form-group" style="margin-left:10%;"><div class="col col-md-3" style="text-align: end;"><label for="mins">mins</label></div></div></div><div class="col-xs-8 col-sm-8" style="margin-left:-5.5%;"><div class="row form-group"><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="min1_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="min2_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="min3_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="min4_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="min5_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div></div><div class="row form-group"><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="min6_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="min7_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="min8_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="min9_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="min10_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div></div></div></div><div class="row"><div class="col-xs-2 col-sm-2"></div><div class="col-xs-2 col-sm-2"><div class="row form-group" style="margin-left:10%;"><div class="col col-md-3" style="text-align: end;"><label for="pts">pts</label></div></div></div><div class="col-xs-8 col-sm-8" style="margin-left:-5.5%;"><div class="row form-group"><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="pts1_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="pts2_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="pts3_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="pts4_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="pts5_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div></div><div class="row form-group"><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="pts6_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="pts7_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="pts8_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="pts9_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div><div class="col col-md-2.5" style="margin-left: -2.5%;"><input type="number" id="qr-text" name="pts10_ckpt'+i+'_r1" class="form-control" style="width:70%;"></div></div></div></div><div class="col-xs-1 col-sm-1"></div><div style="margin-top:4%;margin-left:33%;"><button type="button" name="remove" style="width:60px;height:30px;background-color:#f03e3e;border-color:#f03e3e;" id="'+i+'"class="btn_remove">X</button></div></div><br/><br/>');  
         i++;  
       }
        else{
    $("#add1").off("click");   //remove click listener. 
 }

      }); 

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
    });  
</script>

   
  </body>
  </html>
