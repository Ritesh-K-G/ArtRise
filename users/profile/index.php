<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
      header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="../../assets/img/logo1.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="../../assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../../assets/css/styles.css">

    <link rel="stylesheet" href="./design.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>ArtRise</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="../../assets/img/logo1.png" alt="" class="nav__logo-img">
                ArtRise
            </a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="../homepage" class="nav__link">Home</a>
                    </li>
                    
                    <li class="nav__item">
                        <a href="../market/index.php" class="nav__link">Market</a>
                    </li>

                    <li class="nav__item">
                        <a href="../chat/index.php" class="nav__link">Chat</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Profile</a>
                    </li>

                    <li class="nav__item">
                        <a href="../cart/index.php" class="nav__link"><i class="fa fa-shopping-cart" style="font-size:30px;"></i></a>
                    </li>

                    <li class="nav__item">
                        <a href="../user_logout.php" class="nav__link">Logout</a>
                    </li>

                    <a href="../post_feed/index.php" class="button button--ghost">+ Post</a>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>

                <img src="../../assets/img/nav-img.png" alt="" class="nav__img">
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>

        </nav>
    </header>

        <main class="main">
            
            <!--==================== CATEGORY ====================-->
            <?php
                $user_id=$_SESSION['user_id'];
                $sql="Select * from users where user_id=$user_id;";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
            ?>
            <section class="section category">
                <div class="profile-container">
                    <div class="profile-header">
                        <div class="profile-card__img">
                            <div class="profile-pic">
                                <label class="-label" for="file">
                                    <span class="glyphicon glyphicon-camera"></span>
                                    <span>Change Image</span>
                                </label>
                                <input id="file" type="file" onchange="loadFile(event)" />
                                <?php echo "<img src='../../src/" . $row['profile_pic'] ."' id='output' width='200' />"; ?>
                            </div>
                        </div>
                        <div class="profile-details">
                            <h1 id="name">
                                <?php
                                    echo $row['name'];
                                ?>
                            </h1>
                            <p id="email">
                                <?php
                                    echo $row['email'];
                                ?>
                            </p>
                            <ul>
                                <li><a href="#" onclick="myPost()">Posts</a></li>
                                <li><a href="#" onclick="myLikes()">Likes</a></li>
                                <li><a href="#" onclick="myFav()">Favorites</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
            <!--==================== DISCOUNT ====================-->
            <div id="my_posts">
                <section class="section category">
                    <h3 class="section__title">My Posts</h3>
                </section>
                <?php
                        $user_id=$_SESSION['user_id'];
                        $sql="SELECT * from users_content where content_id 
                        in (select content_id from uploads where user_id=$user_id);";
                        $result=mysqli_query($conn,$sql);
                
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                            $file_type = $row['file_type'];
                            $content_id = $row['content_id'];
                            $creator_id= $row['creator_id'];
                            $sql1="select * from users where user_id=$creator_id;";
                            $resultu=mysqli_query($conn,$sql1);
                            $rowu = mysqli_fetch_array($resultu);
                            echo '
                            <section id="my_feed">
                            <div id="carding" class="discount__container container grid">
                                <div class="feed-card">
                                <div class="profile-picture">
                                    <img src="../../src/'.$rowu['profile_pic'].'" alt="Profile Picture">
                                </div>
                                <div class="feed-content">
                                    <div class="username">';
                                        echo $rowu['name'];
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
                                            <form id="post" action="../homepage/increase_likes.php" method="POST">
                                                <input type="hidden" name="post_id" value="' . $content_id . '">
                                                <button type="submit" id="thumbs-up" class="thumbs-up-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);">';
                                                    $sql_likes= "SELECT * FROM likes WHERE content_id= $content_id AND user_id = $user_id";
                                                    $resultl = mysqli_query($conn, $sql_likes);
                                                    if(mysqli_num_rows($resultl) == 0)
                                                        echo '<i class="material-icons" onclick="changeColor_thumbsUp()">thumb_up</i>';
                                                    else 
                                                        echo '<i class="material-icons" style="color: blue;">thumb_up</i>';
                                                    echo '
                                                </button>
                                            </form>';
                                            echo $row["likes"];        
                                            echo '&nbsp;likes</span>';
                                            echo '<span class="post-comments"><i class="material-icons">mode_comment</i>';
                                            $sql1="SELECT * from reviews where content_id = $content_id;";
                                            $result1=mysqli_query($conn,$sql1);
                                            $numComments = mysqli_num_rows($result1);
                                            echo $numComments;
                                            echo '&nbsp;comments</span>

                                            
                                            <span class="post-favorites">
                                            <form id="post" action="../homepage/add_favourites.php" method="POST">
                                                <input type="hidden" name="fav_id" value="' . $content_id . '">
                                                <button type="submit" id="fav_on" class="fav-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);">';
                                                    $sqlf= "SELECT * FROM favourites WHERE content_id= $content_id AND user_id = $user_id";
                                                    $resultf = mysqli_query($conn, $sqlf);                                        
                                                    if(mysqli_num_rows($resultf) == 0)
                                                        echo '<i class="material-icons" onclick="changeColor_Fav()">favorite_border</i>';
                                                    else
                                                        echo '<i class="material-icons" onclick="changeColor_Fav()" style="color: red;">favorite</i></i>';
                                                echo '
                                                </button>
                                            </form>';
                                            echo '&nbsp;Add to favorites
                                            </span>
                                        </div>
                                        <div class="post-comments-section">
                                        ';

                                        // Comment section
                                        while($row1 = mysqli_fetch_array($result1)) 
                                        {    
                                            echo '
                                            <div class="post-comment">
                                            <p class="comment-author">';
                                            echo $row1['name'];
                                            echo '</p>
                                            <p class="comment-text">';
                                            echo $row1['comment'];
                                            echo '</p>
                                            </div>
                                            ';
                                        }

                                        echo '
                                        <form action="../homepage/add_comment.php" method="post">
                                            <div class="add-comment">
                                                <input type="hidden" name="content_id_comment" value="' . $content_id . '">
                                                <input type="text" name="comment" placeholder="Write a comment">
                                                <button type="submit">Post</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </section>';
                            }
                        }
                    ?>
                </div>

                <div id="my_likes">
                    <section class="section category">
                        <h3 class="section__title">My Liked Posts</h3>
                    </section>
                    <?php
                        $user_id=$_SESSION['user_id'];
                        $sql="SELECT * from users_content where content_id in
                        (select content_id from likes where user_id = $user_id);";
                        $result=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                            $file_type = $row['file_type'];
                            $content_id = $row['content_id'];
                            $creator_id= $row['creator_id'];
                            $sql1="select * from users where user_id=$creator_id;";
                            $resultu=mysqli_query($conn,$sql1);
                            $rowu = mysqli_fetch_array($resultu);
                            echo '
                            <section id="my_feed">
                            <div id="carding" class="discount__container container grid">
                                <div class="feed-card">
                                <div class="profile-picture">
                                    <img src="../../src/'.$rowu['profile_pic'].'" alt="Profile Picture">
                                </div>
                                <div class="feed-content">
                                    <div class="username">';
                                        echo $rowu['name'];
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
                                            <form id="post" action="../homepage/increase_likes.php" method="POST">
                                                <input type="hidden" name="post_id" value="' . $content_id . '">
                                                <button type="submit" id="thumbs-up" class="thumbs-up-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);">';
                                                    $sql_likes= "SELECT * FROM likes WHERE content_id= $content_id AND user_id = $user_id";
                                                    $resultl = mysqli_query($conn, $sql_likes);
                                                    if(mysqli_num_rows($resultl) == 0)
                                                        echo '<i class="material-icons" onclick="changeColor_thumbsUp()">thumb_up</i>';
                                                    else 
                                                        echo '<i class="material-icons" style="color: blue;">thumb_up</i>';
                                                    echo '
                                                </button>
                                            </form>';
                                            echo $row["likes"];        
                                            echo '&nbsp;likes</span>';
                                            echo '<span class="post-comments"><i class="material-icons">mode_comment</i>';
                                            $sql1="SELECT * from reviews where content_id = $content_id;";
                                            $result1=mysqli_query($conn,$sql1);
                                            $numComments = mysqli_num_rows($result1);
                                            echo $numComments;
                                            echo '&nbsp;comments</span>

                                            
                                            <span class="post-favorites">
                                            <form id="post" action="../homepage/add_favourites.php" method="POST">
                                                <input type="hidden" name="fav_id" value="' . $content_id . '">
                                                <button type="submit" id="fav_on" class="fav-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);">';
                                                    $sqlf= "SELECT * FROM favourites WHERE content_id= $content_id AND user_id = $user_id";
                                                    $resultf = mysqli_query($conn, $sqlf);                                        
                                                    if(mysqli_num_rows($resultf) == 0)
                                                        echo '<i class="material-icons" onclick="changeColor_Fav()">favorite_border</i>';
                                                    else
                                                        echo '<i class="material-icons" onclick="changeColor_Fav()" style="color: red;">favorite</i></i>';
                                                echo '
                                                </button>
                                            </form>';
                                            echo '&nbsp;Add to favorites
                                            </span>
                                        </div>
                                        <div class="post-comments-section">
                                        ';

                                        // Comment section
                                        while($row1 = mysqli_fetch_array($result1)) 
                                        {    
                                            echo '
                                            <div class="post-comment">
                                            <p class="comment-author">';
                                            echo $row1['name'];
                                            echo '</p>
                                            <p class="comment-text">';
                                            echo $row1['comment'];
                                            echo '</p>
                                            </div>
                                            ';
                                        }

                                        echo '
                                        <form action="../homepage/add_comment.php" method="post">
                                            <div class="add-comment">
                                                <input type="hidden" name="content_id_comment" value="' . $content_id . '">
                                                <input type="text" name="comment" placeholder="Write a comment">
                                                <button type="submit">Post</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </section>';
                            }
                        }
                    ?>
                </div>

                <div id="my_fav">
                    <section class="section category">
                        <h3 class="section__title">My Favorites</h3>
                    </section>
                    <?php
                        $user_id=$_SESSION['user_id'];
                        $sql="SELECT * from users_content where content_id in
                        (select content_id from favourites where user_id=$user_id);";
                        $result=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                            $file_type = $row['file_type'];
                            $content_id = $row['content_id'];
                            $creator_id= $row['creator_id'];
                            $sql1="select * from users where user_id=$creator_id;";
                            $resultu=mysqli_query($conn,$sql1);
                            $rowu = mysqli_fetch_array($resultu);
                            echo '
                            <section id="my_feed">
                            <div id="carding" class="discount__container container grid">
                                <div class="feed-card">
                                <div class="profile-picture">
                                    <img src="../../src/'.$rowu['profile_pic'].'" alt="Profile Picture">
                                </div>
                                <div class="feed-content">
                                    <div class="username">';
                                        echo $rowu['name'];
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
                                            <form id="post" action="../homepage/increase_likes.php" method="POST">
                                                <input type="hidden" name="post_id" value="' . $content_id . '">
                                                <button type="submit" id="thumbs-up" class="thumbs-up-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);">';
                                                    $sql_likes= "SELECT * FROM likes WHERE content_id= $content_id AND user_id = $user_id";
                                                    $resultl = mysqli_query($conn, $sql_likes);
                                                    if(mysqli_num_rows($resultl) == 0)
                                                        echo '<i class="material-icons" onclick="changeColor_thumbsUp()">thumb_up</i>';
                                                    else 
                                                        echo '<i class="material-icons" style="color: blue;">thumb_up</i>';
                                                    echo '
                                                </button>
                                            </form>';
                                            echo $row["likes"];        
                                            echo '&nbsp;likes</span>';
                                            echo '<span class="post-comments"><i class="material-icons">mode_comment</i>';
                                            $sql1="SELECT * from reviews where content_id = $content_id;";
                                            $result1=mysqli_query($conn,$sql1);
                                            $numComments = mysqli_num_rows($result1);
                                            echo $numComments;
                                            echo '&nbsp;comments</span>                                            
                                            <span class="post-favorites">
                                            <form id="post" action="../homepage/add_favourites.php" method="POST">
                                                <input type="hidden" name="fav_id" value="' . $content_id . '">
                                                <button type="submit" id="fav_on" class="fav-btn" style="color:white;background:linear-gradient(136deg, hwb(260 3% 80%) 0%, hsl(266, 48%, 16%) 100%);">';
                                                    $sqlf= "SELECT * FROM favourites WHERE content_id= $content_id AND user_id = $user_id";
                                                    $resultf = mysqli_query($conn, $sqlf);                                        
                                                    if(mysqli_num_rows($resultf) == 0)
                                                        echo '<i class="material-icons" onclick="changeColor_Fav()">favorite_border</i>';
                                                    else
                                                        echo '<i class="material-icons" onclick="changeColor_Fav()" style="color: red;">favorite</i></i>';
                                                echo '
                                                </button>
                                            </form>';
                                            echo '&nbsp;Add to favorites
                                            </span>
                                        </div>
                                        <div class="post-comments-section">
                                        ';

                                        // Comment section
                                        while($row1 = mysqli_fetch_array($result1)) 
                                        {    
                                            echo '
                                            <div class="post-comment">
                                            <p class="comment-author">';
                                            echo $row1['name'];
                                            echo '</p>
                                            <p class="comment-text">';
                                            echo $row1['comment'];
                                            echo '</p>
                                            </div>
                                            ';
                                        }

                                        echo '
                                        <form action="../homepage/add_comment.php" method="post">
                                            <div class="add-comment">
                                                <input type="hidden" name="content_id_comment" value="' . $content_id . '">
                                                <input type="text" name="comment" placeholder="Write a comment">
                                                <button type="submit">Post</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </section>';
                            }
                        }
                    ?>
                </div>
      </main>



    <!--==================== FOOTER ====================-->
    <footer class="footer section">
                <div class="footer__container container grid">
                    <div class="footer__content">
                        <a href="#" class="footer__logo">
                            <img src="../../assets/img/logo1.png" alt="" class="footer__logo-img">
                            ArtRise
                        </a>

                        <p class="footer__description">Enjoy the thrill of creativity</p>
                        
                        <div class="footer__social">
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                                <i class='bx bxl-facebook'></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                                <i class='bx bxl-instagram-alt' ></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                                <i class='bx bxl-twitter' ></i>
                            </a>
                        </div>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">About</h3>
                        
                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">About Us</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Features</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer__content">
                        <h3 class="footer__title">Our Services</h3>
                        
                        <ul class="footer__links">
                            <li>
                                <a href="../drawing/index.php" class="footer__link">Dive into Art</a>
                            </li>
                            <li>
                                <a href="../music/index.php" class="footer__link">Dive into Music </a>
                            </li>
                            <li>
                                <a href="../visual/index.php" class="footer__link">Dive into Visual Treats</a>
                            </li>
                            <li>
                                <a href="../literary/index.php" class="footer__link">Dive into Literature</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <span class="footer__copy">&#169; ArtRise. All rigths reserved</span>

            </footer>
        
        <!--=============== MAIN JS ===============-->
        <script src="../../assets/js/main.js"></script>
        <script src="script.js"></script>
    </body>
</html>