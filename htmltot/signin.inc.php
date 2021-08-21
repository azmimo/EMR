<?php
$dbusername = "AZMI";
$dbpassword = "20816044";
$server = "localhost";
$dbname = "emr";

$dbconnect = mysqli_connect($server, $dbusername, $dbpassword);
$dbselect = mysqli_select_db($dbconnect,$dbname);
 if(isset($_POST["submit"]))
 {
   $username = $_POST["name"];
   $password = $_POST["passW"];
   require_once('check.php');
   check($dbconnect,$dbname,$username,$password);

 }

 else{
   echo '<!DOCTYPE html>
   <html lang="en" dir="ltr">
     <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="f1.css">
     </head>
     <body>
       <h1>submitting error try later!</h1>
       <p>to return to login page
       <a href="http://localhost/wwwm/htmltot/login.html">click Me</a>
       </p>
     </body>
   </html>';
 }
 ?>
