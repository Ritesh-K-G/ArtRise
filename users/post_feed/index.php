<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
      header('location: ../index.html');
    }
    if (isset($_POST['submit'])) {
        $image = $_FILES['image']['name'];
        $temp_image = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp_image, "../../../uploads/" . $image);
        $sql = "INSERT INTO content (content, likes) VALUES ('$image', 7)";
        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Feed</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <nav>
        <ul>
          <li><a href="../homepage/">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
    </nav>      
    <div class="feed-post-form">
        <h2>Post your fitness journey, experience, advice</h2>
        <form id="feeds-post" method="post" enctype="multipart/form-data">
            <textarea placeholder="What's on your mind?" name="description" id="description"></textarea>
            <div class="form-actions">
                <label for="image-upload" class="action-item"><i class="material-icons">photo</i></label>
                <input type="file" name="image" id="image" accept="image/*">
                <input type="submit" name="submit" class="action-item" value="Post">
            </div>
        </form>
    </div>
</body>
</html>