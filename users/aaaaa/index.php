<?php
    session_start();
    include "../../db_connect.php";
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="../../assets/img/logo1.png" type="image/x-icon">

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>  

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== SWIPER CSS ===============--> 
        <link rel="stylesheet" href="../../assets/css/swiper-bundle.min.css">

        <!--=============== NOTIFICATION CSS ===============--> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!--=============== CSS ===============--> 
        <link rel="stylesheet" href="../../assets/css/styles.css">

        <link rel="stylesheet" href="style.css">

        <link rel="stylesheet" href="notif.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

        <title>ArtRise</title>
    </head>
    <body>

        <main class="main">
            
            
            <!--==================== POST SECTION ====================-->
                <?php
                    $user_id=$_SESSION['user_id'];
                    $sql="SELECT * from users_content;";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                          $file_type = $row['file_type'];
                          $content_id = $row['content_id'];
                          echo '
                          <section id="my_feed">
                          <div id="carding" class="discount__container container grid">
                            <div class="feed-card">
                                <div class="profile-picture">
                                    <img src="https://m.media-amazon.com/images/I/415MsdCcduL.png" alt="Profile Picture">
                                </div>
                                <div class="feed-content">
                                    <div class="username">';
                                    $creator = $row['creator_id'];
                                    $sql = "select * from users where user_id = '$creator';";
                                    $result_inner = mysqli_query($conn, $sql);
                                    $nrow = mysqli_fetch_assoc($result_inner);
                                    $uploader_name = $nrow['name'];
                                        echo $uploader_name;
                                    echo '</div>
                                    <div class="post-content">';
                                        echo $row['description'];
                                    echo '</div>
                                    <div class="post-image">';
                                    if (strpos($file_type, 'image/') === 0) {
                                    echo "<img src='../../uploads/critics_content/" . $row['content'] . "'>";
                                    } else if (strpos($file_type, 'video/') === 0) {
                                    echo "<video width='320' height='240' controls><source src='../../uploads/critics_content/" . $row['content'] . "' type='$file_type'></video>";
                                    }
                                    echo'</div>
                                    <div class="like-comment">
                                        <div class="post-actions">
                                            <span class="post-likes">
                                            <form id="post" action="increase_likes.php" method="POST">
                                                <input type="hidden" name="post_id" value="' . $content_id . '">
                                                <button type="submit" id="like-button" class="thumbs-up-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);">';
                                                    $sql_likes= "SELECT * FROM likes WHERE content_id= $content_id AND user_id = $user_id";
                                                    $resultl = mysqli_query($conn, $sql_likes);
                                                    if(mysqli_num_rows($resultl) == 0)
                                                        echo '<i class="material-icons" onclick="changeColor_thumbsUp()">thumb_up</i>';
                                                    else 
                                                        echo '<i class="material-icons" style="color: blue;">thumb_up</i>';
                                                    echo '
                                                </button>
                                            </form>';
                                            echo '<span class="like-count">' . $row["likes"];        
                                            echo '</span>&nbsp;likes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          </section>';
                        }
                    }
                    mysqli_close($conn);
                ?>
      </main>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script>
document.getElementById("like-button").addEventListener("click", function(event){
  event.preventDefault(); // Prevent the form from submitting normally

  var post_id = <?php echo $content_id ?>; // Get the post ID

  // Send the AJAX request
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "increase_likes.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // Update the like count
      document.getElementById("like-count").textContent = this.responseText;
    }
  };
  xhr.send("post_id=" + post_id);
});
</script>
    </body>
</html>