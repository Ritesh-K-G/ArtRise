<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
        header('location: ../index.html');
    }

    // Get the post ID from the form data
    $post_id = $_POST['post_id'];

    // Update the likes for the post
    $sql = "UPDATE users_content SET likes = likes + 1 WHERE content_id = $post_id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>window.location.replace("index.php");</script>';
    } else {
        echo "Error updating likes: " . $conn->error;
    }
    $conn->close();
?>