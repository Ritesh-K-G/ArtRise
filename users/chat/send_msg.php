<?php
    session_start();
    include "../../db_connect.php";

    $msg = $_GET['msg'];
    $user_id = $_SESSION['user_id'];
    $friend = $_SESSION['friend'];
    $room = $_SESSION['room'];

    $sql= "INSERT INTO messages (room_id, msg, sender, receiver) values ($room, '$msg', $user_id, '$friend')";
    $result = mysqli_query($conn, $sql);
    $sql= "UPDATE chatroom set last_msg = '$msg' where room_id = $room";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
?>