<?php



    $dbusername = "AZMI";
    $dbpassword = "20816044";
    $server = "localhost";
    $dbname = "emr";  // the database we are going to use


    $dbconnect = mysqli_connect($server, $dbusername, $dbpassword); //to connect the user to mysql
    $dbselect = mysqli_select_db($dbconnect,$dbname);               //connect the user to a specific database


    $sql = "INSERT INTO emr(ID,HR,SPO2) VALUES('".$_GET["ID"]."','".$_GET["HR"]."','".$_GET["SPO2"]."')" ;  //to take values from the url in incert them in the database

    // Execute SQL statement

    mysqli_query($dbconnect,$sql);  //to write the $sql in the query of the emr database

?>
