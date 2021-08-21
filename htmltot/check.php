<?php




function check($dbconnect,$dbname,$username,$password)
{

  $dbselect = mysqli_select_db($dbconnect,$dbname);
  $conncheck = "SELECT * FROM users WHERE username = '$username' and password = '$password';";
  $insert = mysqli_query($dbconnect,$conncheck);

  if(mysqli_num_rows($insert))
  {
    header("location: http://localhost/wwwm/htmltot/DATABASE.php?name=$username");
    exit();
  }



  else
  {
    echo '<!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="f1.css">
      </head>
      <body>
        <img src="wait-a-minute.jpg" alt="boy">
        <h2>You entered invalid password or username.To try again!
        <a href="http://localhost/wwwm/htmltot/login.html">click.</a>
        </h2>
      </body>
    </html>';
  }



}




?>
