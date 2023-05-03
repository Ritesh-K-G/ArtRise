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
                            <a href="#" class="nav__link active-link">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="#" class="nav__link">About</a>
                        </li>

                        <li class="nav__item">
                            <a href="../market/index.php" class="nav__link">Market</a>
                        </li>

                        <li class="nav__item">
                            <a href="../chat/index.php" class="nav__link">Chat</a>
                        </li>

                        <li class="nav__item">
                            <a href="../profile" class="nav__link">Profile</a>
                        </li>

                        <li class="nav__item">
                          <a href="../user_logout.php" class="nav__link">Logout</a>
                        </li>

                        <a href="../post_feed/index.php" class="button button--ghost">+ Post</a>

                        <div class="notification">
                          <div class="notification-bell">
                            <i class="fa fa-bell-o"></i>
                            <span class="btn__badge pulse-button">3</span>
                          </div>
                          <div class="notification-drop">
                            <div class="item">
                            <a href="#">Notification 1</a>
                            </div>
                            <div class="item">
                            <a href="#">Notification 2</a>
                            </div>
                            <div class="item">
                            <a href="#">Notification 3</a>
                            </div>
                          </div>
                        </div>

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
            <section class="section category">
                <h2 class="section__title">Favorite Art <br> Category</h2>

                <div class="category__containers">
                    <div class="category__data">
                        <a href="../drawing/index.php">
                            <img src="../../src/drawing.jpg" alt="" id="imgForcat">
                            <h3 class="category__title">Paintings</h3>
                            <p style="color: white;">Paintings which touches your heart</p>
                        </a>
                    </div>

                    <div class="category__data">
                        <a href="../music/index.php">
                            <img src="../../src/music.jpg" alt="" id="imgForcat">
                            <h3 class="category__title">Music</h3>
                            <p style="color: white;">Pick your daily drive</p>
                        </a>
                    </div>

                    <div class="category__data">
                        <a href="../visual/index.php">
                            <img src="../../src/visual.jpg" alt="" id="imgForcat">
                            <h3 class="category__title">Visual</h3>
                            <p style="color: white;">Enjoy the shorts</p>
                        </a>
                    </div>

                    <div class="category__data">
                        <a href="../literary/index.php">
                            <img src="../../src/literature.jpg" alt="" id="imgForcat">
                            <h3 class="category__title">Literature</h3>
                            <p style="color: white;">Pick the most loved literature</p>
                        </a>
                    </div>
                </div>
            </section>
            
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
                                    echo $row['creator_id'];
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
                                        <form id="post" action="add_favourites.php" method="POST">
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
                                    <form action="add_comment.php" method="post">
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
                    mysqli_close($conn);
                ?>
      </main>

        <!--==================== FOOTER ====================-->
            <footer class="footer section">
                <div class="footer__container container grid">
                    <div class="footer__content">
                    <a href="#" class="footer__logo">
                    <img src="../../assets/img/logo3.png" alt="" class="footer__logo-img">
                </a>

                <p class="footer__description"> Let your Art <br> Beautify the world.</p>
                        
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
                            <li>
                                <a href="#" class="footer__link">News</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__content">
                        <h3 class="footer__title">Our Services</h3>
                        
                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">Pricing</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Discounts</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Shipping mode</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__content">
                        <h3 class="footer__title">Our Company</h3>
                        
                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">Blog</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">About us</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Our mision</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
            <!--=============== SCROLL UP ===============-->
            <a href="#" class="scrollup" id="scroll-up">
                <i class='bx bx-up-arrow-alt scrollup__icon'></i>
            </a>        
        <!--=============== SCROLL REVEAL ===============-->
        <script src="../../assets/js/scrollreveal.min.js"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="../../assets/js/swiper-bundle.min.js"></script>

        <!--=============== Icon color JS ===============-->
        <script>
            function changeColor_thumbsUp() {
            var thumbsUp = document.getElementById('thumbs-up');
            thumbsUp.style.color = 'red';
        }
        
            function changeColor_Fav() {
            var FavOn = document.getElementById('fav_on');
            FavOn.style.color = 'red';
            }

        </script>
        
        <!--=============== MAIN JS ===============-->
        <script src="../../assets/js/main.js"></script>
        <script src="script.js"></script>
    </body>
</html>