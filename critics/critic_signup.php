<?php
    session_start();
    include "../db_connect.php";

    $logname = $_GET['logname'];
    $logemail = $_GET['logemail'];
    $logpass = $_GET['logpass'];
    $loghash = password_hash($logpass, PASSWORD_DEFAULT);
    $logqualifi= $_GET['logqualifi'];
    $logtype= $_GET['logcontact'];
    if(empty($logname)){
        echo '<script>alert(" Enter Your Name");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($logemail)){
        echo '<script>alert(" Enter Your Email");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($logpass)){
        echo '<script>alert(" Enter Password");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($logqualifi)){
        echo '<script>alert(" Enter Your Qualification");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else if(empty($logtype)){
        echo '<script>alert(" Enter Your Art Speciality");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else{
        $sql = "INSERT INTO critics_request (name,email,critic_type,qualification,password) Values('$logname','$logemail','$logtype','$logqualifi','$loghash');";

        if($conn->query($sql) == true){
            echo '<script>alert(" Request to become  Critic sent to admin");setTimeout(()=>{window.location.replace("../index.php");},500);</script>';
        }
        else{
            echo '<script>alert(" Some error occured");setTimeout(()=>{window.location.replace("../index.php");},500);</script>';
        }
    }
    $conn->close();
?>