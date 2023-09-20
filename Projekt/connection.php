<?php
    //_DataCollection
    //THIS PART IS JUST FOR GETTING DATA! DO NOT ECHO!

    $servername = "localhost";
    $username = "root"; //FONTOS, ez a személyi gépet jelenti a ROOT. NEM custom név!!!
    $password = ""; //szintén nem custom jelszó
    $dbname = "chemprojektdb";
    //CREATE USER 'Admin'@'localhost' IDENTIFIED BY ''; |potenciális 

    $con = new mysqli($servername,$username,$password,$dbname);
    //GRANT ALL PRIVILEGES ON `chemProjekt-db`.* TO 'Admin'@'localhost';

    if (mysqli_connect_errno()){
        echo "Connection Failure"; //ALLOWED due to 
        exit();
    }

    //echo "Connection Successful <br>"; //Testing Purposes Only

    $stats = "SELECT * FROM `reagentreactions`"; // Select all columns

    $result = $con->query($stats);
?>