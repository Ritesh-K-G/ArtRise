<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
        header('location: ../index.html');
    }

    $content_id = $_POST['fav_id'];
    $user_id = $_SESSION['user_id'];

    $sql= "SELECT * FROM favourites WHERE content_id= $content_id AND user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 0) {

        $sql1 = "INSERT into favourites (user_id, content_id) VALUES ($user_id, $content_id);";
        $result1 = mysqli_query($conn, $sql1);

        if ($conn->query($sql1) === TRUE) {
            echo '<script>window.location.replace("index.php");</script>';

        } else {
            echo "Error updating likes: " . $conn->error;
        }
        $conn->close();
 
    } 
    else {

        $sql2 = "DELETE from favourites where content_id = $content_id";
        $result2 = mysqli_query($conn, $sql2);

        if ($conn->query($sql2) === TRUE) {
            echo '<script>window.location.replace("index.php");</script>';
        } else {
            echo "Error updating likes: " . $conn->error;
        }
        $conn->close();
}