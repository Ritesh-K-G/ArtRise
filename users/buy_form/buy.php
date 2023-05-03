<?php
    session_start();
    include "../../db_connect.php";
    $work = $_SESSION['buying_id'];
    $user = $_SESSION['user_id'];
    $msg = "Your Content with id = " . $work . " has been sold.";
    $sql = "INSERT INTO notification (user_id, msg) VALUES ('$user', '$msg');";
    mysqli_query($conn, $sql);
    $sql = "DELETE from market where content_id = '$work';";
    mysqli_query($conn, $sql);
    $conn->close();
    echo '<script>alert("Successfully bought the product");setTimeout(()=>{window.location.replace("../homepage/index.php");},500);</script>';
?>