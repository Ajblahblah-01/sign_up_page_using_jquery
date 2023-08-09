<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "temp_dp";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $check = "SELECT * FROM sign WHERE email = '$email'";
        $result = mysqli_query($conn,$check);
        if(!$result){
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }

        $num = mysqli_num_rows($result);
        if($num>0){
            echo "Email already exists";
        }else{
            $sql = "INSERT INTO sign (email, password) VALUES ('$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }
            else{
                echo "Sign up successful";
            }
        }
    }
    

    
?>