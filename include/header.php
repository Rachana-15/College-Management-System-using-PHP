<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection"/>
    <!-- Dropify File Upload -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="../dist/css/demo.css"> -->
    <link rel="stylesheet" href="../dist/css/dropify.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        header, .main, footer {
          padding-left: 300px;
        }
    
        @media only screen and (max-width : 992px) {
          header, .main, footer {
            padding-left: 0;
          }
        }
    </style>
    
  </head>
  <body>
  <?php
    session_start();
  ?>

  <!-- Session Checking -->
<?php
if(isset($_SESSION['uid']))
{

}
else{
  header("location:../login.php");
}

?>