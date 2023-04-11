<?php
    session_start();
    include "../db_connect.php";

    $name= $_GET['SignName'];
    $email = $_GET['SignEmail'];
    $password = $_GET['SignPass'];
    $age = $_GET['SignAge'];
    $contact = $_GET['SignContact'];

    if(empty($name)){
        echo '<script>alert(" Enter Name");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($password)){
        echo '<script>alert(" Enter Password");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($age)){
        echo '<script>alert(" Enter age");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($email)){
        echo '<script>alert(" Enter email");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($contact)){
        echo '<script>alert(" Enter contact");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else{
        // $password=md5($password);
        $sql = "INSERT INTO users (password,name,age,email,contact) Values('$password','$name','$age','$email','$contact');";

        if($conn->query($sql) == true){
            echo '<script>alert(" Succesfully inserted");setTimeout(()=>{window.location.replace("./index.html");},500);</script>';
        }
        else{
            echo '<script>alert(" Some error occured");setTimeout(()=>{window.location.replace("./index.html");},500);</script>';
        }
    }
    $conn->close();
?>