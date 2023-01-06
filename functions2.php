<?php
    // $fullname = $_POST['fullname'];
    // $email = $_POST['email'];
    // $username = $_POST['username'];
    // $psw = $_POST['psw'];

    $uname = filter_input(INPUT_POST, 'username');
    $pass = filter_input(INPUT_POST, 'psw');

    error_reporting(E_ALL);


    if(!empty($uname) || !empty($pass)) {

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "users";

        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if (mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }else{
            $SELECT = "SELECT email From usersprofile Where email = ? Limit 1";
            $INSERT = "INSERT Into usersprofile (fullname, email, username, password) values (?,?,?,?)";

            //Prepare statement
            $stmt = $conn -> prepare($SELECT);
            $stmt -> bind_param("s", $mail);
            $stmt -> execute();
            $stmt -> bind_result($mail);
            $stmt -> store_result();
            $r_num = $stmt -> num_rows;

            if($r_num == 0) {
                $stmt ->close();

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssss", $fname, $mail, $uname, $pass);
                $stmt->execute();
                echo "New record added successfully.";
            }else{
                echo "Someone is already registered using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    } else{
       echo "All fields are required.";
       die(); 
    }
?>

<html>
    Yay
</html>