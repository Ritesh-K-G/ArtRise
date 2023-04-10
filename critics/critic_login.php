<?php
    session_start();
    include "../db_connect.php";
    
    $id = $_GET['logemail'];
    $password = $_GET['logpass'];

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
        $sql= "SELECT * FROM critics WHERE email='$id' AND password='$password'"; 
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['critics_id']= $row['critics_id'];
            $_SESSION['critics_name'] = $row['name'];
            // $_SESSION['crtics_contact']= $row['contact'];
            // $_SESSION['crtics_email']= $row['email'];
            // $_SESSION['crtics_type']= $row['type'];
            // $_SESSION['crtics_qualification']= $row['qualification'];
            echo '<script>alert("Logged in");setTimeout(()=>{window.location.replace("homepage.php");},500);</script>';
            header("Location: homepage.php"); 
            exit();
        }
        else{
            echo '<script>alert(" Incorrect UserName or Password");setTimeout(()=>{window.location.replace("./index.html");},500);</script>';
            exit();
        }
    }
?>