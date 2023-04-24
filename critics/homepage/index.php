<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['critics_id'])) {
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
                            <a href="#" class="nav__link active-link">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="#" class="nav__link">About</a>
                        </li>

                        <li class="nav__item">
                            <a href="#" class="nav__link">Contact</a>
                        </li>

                        <li class="nav__item">
                            <a href="#" class="nav__link">Profile</a>
                        </li>
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
                            <h1 id="name">Critics</h1>
                            <p id="email">critics@gmail.com</p>
                        </div>
                    </div>
                    <div class="profile-body">
                        <div class="profile-about">
                            <h2>About Me</h2>
                            <p>IIIT A critics</p>
                        </div>
                        <div class="profile-posts">
                            <h2>Qualification</h2>
                            <p>IIIT A alumni</p>
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
                            <span class="post-comments"><i class="material-icons">stars</i>Review it!</span>
                        </div>
                        <div class="post-comments-section">
                            <div>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                            </div>
                            <div class="add-comment">
                            <input type="text" placeholder="Write the review">
                            <button>Post</button>
                            </div>
                        </div>
                     </div>
                  </div>
                </div>
            </section>

            <?php
                // Query the database for artworks
                $sql = "SELECT * FROM critics_content";
                $result = mysqli_query($conn, $sql);

                // Loop through the artworks and display them on the webpage
                while ($row = mysqli_fetch_assoc($result)) {
                    $file_name = $row['content'];
                    // $file_size = $row['file_size'];
                    $file_type = $row['file_type'];
                    // $file_path = $row['file_path'];
                    $description = $row['description'];
                    // $content_type = $row['art_type'];
                    $file_path = "../../uploads/critics_content/" . $file_name;

                    // Display the artwork on the webpage                    
                    echo '
                          <section id="my_feed">
                          <div id="carding" class="discount__container container grid">
                            <div class="feed-card">
                              <div class="profile-picture">
                                <img src="https://m.media-amazon.com/images/I/415MsdCcduL.png" alt="Profile Picture">
                              </div>
                              <div class="feed-content">
                                <div class="username">
                                  John Doe
                                </div>
                                <div class="post-content">';
                                echo "<p>$description</p>";
                                echo
                                '</div>
                                <div class="post-image">';
                                if (strpos($file_type, 'image/') === 0) {
                                    // echo "<img src='$file_path' alt='img'>";
                                    echo "<img src='../../uploads/critics_content/" . $row['content'] . "'>";
                                } else if (strpos($file_type, 'video/') === 0) {
                                    echo "<video width='320' height='240' controls><source src='$file_path' type='$file_type'></video>";
                                } else {
                                    echo "<p>Unsupported file type: $file_type</p>";
                                }
                                echo'</div>
                                <div class="like-comment">
                                    <div class="post-actions">
                                        <span class="post-comments"><i class="material-icons">stars</i>Review it!</span>
                                    </div>
                                    <div class="post-comments-section">
                                        <div>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                            <span class="star"></span>
                                        </div>
                                        <div class="add-comment">
                                        <input type="text" placeholder="Write the review">
                                        <button>Post</button>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          </section>';
                }

                mysqli_close($conn);
            ?>



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
        <script src="logic.js"></script>
    </body>
</html>