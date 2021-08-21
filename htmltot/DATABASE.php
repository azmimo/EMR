<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>final</title>
<link rel="stylesheet" href="table.css">
</head>
<body>
<?php

  $dbusername = "AZMI";
  $dbpassword = "20816044";
  $server = "localhost";
  $dbname = "emr";
  $dbconnect = mysqli_connect($server, $dbusername, $dbpassword);
  $dbselect = mysqli_select_db($dbconnect,$dbname);
  $username = $_GET["name"];
  if ($username=='Azmi')
  {
    $ID = 1;
  }
  elseif ($username=='YAHYA') {
    $ID = 2;
  }
  elseif ($username=='Ghefar') {
    $ID = 3;
  }
  else {
    echo "WTF";
  }
  $sql_table = "SELECT ID,TIME,HR,SPO2 FROM emr where ID=$ID";
  $conn = mysqli_query($dbconnect,$sql_table);
  if(mysqli_num_rows($conn))
  {
    echo "<table><h2> Patient Measurements </h2>
     <tr>
     <th> ID </th>
    <th> Time </th>
    <th> HR </th>
    <th> SpO2</th>
  </tr>";
    while ($row = mysqli_fetch_assoc($conn))
    {
      echo "
          <tr><td>".$row["ID"]."</td><td>".$row["TIME"]."</td><td>".$row["HR"]."</td><td>".$row["SPO2"]."</td></tr>";
    }
  echo "</table>";
  }

  else
  {
    echo ":(";
  }

?>
</body>
</html>
