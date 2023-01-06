<?php
    $fname = $_REQUEST['fullname'];
    $mail = $_REQUEST['email'];
    $uname = $_REQUEST['username'];
    $pass = $_REQUEST['psw'];

    // $fname = filter_input(INPUT_POST, 'fullname');
    // $mail = filter_input(INPUT_POST, 'email');
    // $uname = filter_input(INPUT_POST, 'username');
    // $pass = filter_input(INPUT_POST, 'psw');

    error_reporting(E_ALL);


    if(!empty($fname) || !empty($mail) || !empty($uname) || !empty($pass)) {

        $host = "sql104.epizy.com";
        $dbUsername = "epiz_31974009";
        $dbPassword = "aAG6orZpjaMh9VG";
        $dbname = "epiz_31974009_users";

        // $host = "localhost";
        // $dbUsername = "root";
        // $dbPassword = "";
        // $dbname = "tmi_creative";

        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if (mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }else{
            $sql = "INSERT INTO user_profile (fullname, email, username, passcode) VALUES ($fname, $mail, $uname, $pass)";

            echo "You've succesfully registered.";

            echo ("\n$fname\n $mail \n$uname\n $pass");

            mysqli_close($conn);
        }
    } else{
       echo "All fields are required.";
       die(); 
    }
