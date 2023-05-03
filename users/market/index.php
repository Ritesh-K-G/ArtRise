<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
      header('location: ../index.php');
    }
    if(isset($_GET['id'])) {
        $_SESSION['buying_id'] = $_GET['id'];
        header('location: ../buy_form/index.php');
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
                            <a href="#" class="nav__link">Contact</a>
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
                <h2 class="section__title">Market zone</h2>
            </section>
            <div id="store">
                
            
            <!--==================== POST SECTION ====================-->
                <?php
                    $user_id=$_SESSION['user_id'];
                    $sql="SELECT * from market;";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                          $file_type = $row['file_type'];
                          echo '
                          <section id="my_feed">
                            <div id="carding" class="discount__container container grid">
                                <div class="feed-card">
                                    <div class="feed-content">
                                        <div class="username">';
                                            echo $row['seller'];
                                        echo '</div>
                                        <div class="post-content">';
                                            echo $row['description'];
                                        echo '</div>
                                        <div class="post-image">';
                                            if (strpos($file_type, 'image/') === 0) {
                                            echo "<img src='../../uploads/critics_content/" . $row['content'] . "' style='max-height: 250px; max-width: 250px; margin: auto;'>";
                                            } else if (strpos($file_type, 'video/') === 0) {
                                            echo "<video width='250' max-height='200' controls><source src='../../uploads/critics_content/" . $row['content'] . "' type='$file_type'></video>";
                                            }
                                        echo'                                     
                                        </div>
                                        <div>
                                        <br>';
                                            echo "
                                            <button>";
                                                echo "<a href='index.php?id=" . $row['content_id'] ."'>";
                                                echo '
                                                Buy &nbsp; &#8377; 
                                                ';
                                                echo $row['cost'];
                                                echo '</a>';
                                                echo'
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </section>';
                        }
                    }
                    mysqli_close($conn);
                ?>
                
            </div>
      </main>

        <!--==================== FOOTER ====================-->
            <footer class="footer section">
                <div class="footer__container container grid">
                    <div class="footer__content">
                        <a href="#" class="footer__logo">
                            <img src="../../assets/img/logo.png" alt="" class="footer__logo-img">
                            Halloween
                        </a>

                        <p class="footer__description">Enjoy the scariest night <br> of your life.</p>
                        
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