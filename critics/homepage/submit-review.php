<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['critics_id'])) {
      header('location: ../index.html');
    }

    $review = $_POST['review'];
    $star_index = $_POST['star_index'];
    $content_id = $_POST['content_id'];
    // echo $review;
    // echo $star_index;
    // echo $content_id;
    if(empty($star_index) || empty($review)){
        echo '<script>alert(" Fill Both Stars and Comment fields");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
        exit();
    }
    else{
        $sql = "UPDATE CRITICS_CONTENT
                SET rating = rating + $star_index,
                 critics_rated = critics_rated + 1
                WHERE content_id = '$content_id';";
        
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert(" data Updated");setTimeout(()=>{window.location.replace("index.php");},500);</script>';
          } else {
            echo "Error: " . mysqli_error($conn);
          }
        $sql2 = "select * from critics_content where content_id = '$content_id';";

        $result= mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($result);

        $critic_rat = $row['critics_rated'];
        $rating_recv = $row['rating'];

        if($critic_rat == 3 && $rating_recv >= 5)
        {
            $content = $row['content'];
            // $sql3 = "insert into user_content (content, ratings, likes, type, file, upload_date) values ();"
        }

        
    }

?>