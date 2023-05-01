<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
      header('location: ../index.html');
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
                            <a href="#" class="nav__link">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="#" class="nav__link">About</a>
                        </li>

                        <li class="nav__item">
                            <a href="#" class="nav__link">Contact</a>
                        </li>

                        <li class="nav__item">
                            <a href="../profile" class="nav__link active-link">Profile</a>
                        </li>

                        <a href="../post_feed" class="button button--ghost">+ Post</a>
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
                <div class="profile-container">
                    <div class="profile-header">
                        <div class="profile-card__img">
                            <div class="profile-pic">
                                <label class="-label" for="file">
                                    <span class="glyphicon glyphicon-camera"></span>
                                    <span>Change Image</span>
                                </label>
                                <input id="file" type="file" onchange="loadFile(event)" />
                                <img src="../../src/singing.png" id="output" width="200" />
                            </div>
                        </div>

                        <div class="profile-details">
                            <h1 id="name">Ritesh Kumar Gupta</h1>
                            <p id="email">ritesh@gmail.com</p>
                            <ul>
                                <li><a href="#">Posts</a></li>
                                <li><a href="#">Likes</a></li>
                                <li><a href="#">Favorites</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="profile-body">
                        <div class="profile-about">
                            <h2>About Me</h2>
                            <p>IIIT A student</p>
                        </div>
                        <div class="profile-posts">
                            <h2>Posts</h2>
                            <p>Bada clg bade professor bada dimaag</p>
                            <!-- Add posts here -->
                        </div>
                    </div>
                </div>
            </section>
            
            <!--==================== DISCOUNT ====================-->
            <section id="my_feed" class="section discount">
                <div id="carding" class="discount__container container grid">
                  <div class="feed-card">
                    <div class="profile-picture">
                      <img src="https://m.media-amazon.com/images/I/415MsdCcduL.png" alt="Profile Picture">
                    </div>
                    <div class="feed-content">
                      <div class="username">
                        John Doe
                      </div>
                      <div class="post-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae erat ut velit vestibulum varius vitae nec libero.
                      </div>
                      <div class="post-image">
                        <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80" alt="Post Image">
                      </div>
                      <div class="like-comment">
                      <div class="post-actions">
                        <span class="post-likes"><i class="material-icons">thumb_up</i> 42 likes</span>
                        <span class="post-comments"><i class="material-icons">mode_comment</i> 7 comments</span>
                        <span class="post-favorites"><i class="material-icons">favorite_border</i> Add to favorites</span>
                      </div>
                      <div class="post-comments-section">
                        <div class="post-comment">
                          <p class="comment-author">Jane Doe</p>
                          <p class="comment-text">Great post!</p>
                        </div>
                        <div class="post-comment">
                          <p class="comment-author">Bob Smith</p>
                          <p class="comment-text">Thanks for sharing!</p>
                        </div>
                        <div class="add-comment">
                          <input type="text" placeholder="Write a comment">
                          <button>Post</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </section>
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
        
        <!--=============== MAIN JS ===============-->
        <script src="../../assets/js/main.js"></script>
        <script src="script.js"></script>
    </body>
</html>