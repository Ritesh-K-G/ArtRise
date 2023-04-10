<?php
    session_start();
    include "../db_connect.php";
    
    $id = $_GET['id'];
    $password = $_GET['password'];

    if(empty($id)){
        echo '<script>alert(" Enter email ID");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($password)){
        echo '<script>alert(" Enter Password");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else{
        // $password = md5($password);
        $sql= "SELECT * FROM users WHERE email='$id' AND password='$password'"; 
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 1){

            // $_SESSION['user_id']= $row['user_id'];
            $_SESSION['user_name'] = $row['name'];
            // $_SESSION['user_age']= $row['age'];
            // $_SESSION['user_contact']= $row['contact'];
            // $_SESSION['user_email']= $row['email'];
            // echo 'successfully logged in';
            echo '<script>alert(" Successfully logged in");setTimeout(()=>{window.location.replace("homepage.php");},500);</script>';
            // header("Location: ./index.html"); 
            exit();
        }
        else{
            echo '<script>alert(" Incorrect UserName or Password");</script>';
            exit();
        }
    }
?>