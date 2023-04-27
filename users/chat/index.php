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

        <!--=============== CSS ===============--> 
        <link rel="stylesheet" href="../../assets/css/styles.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="design.css">

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
                            <a href="../homepage" class="nav__link">Home</a>
                        </li>

                        <li class="nav__item">
                            <a href="#" class="nav__link">About</a>
                        </li>

                        <li class="nav__item">
                            <a href="#" class="nav__link">Contact</a>
                        </li>

                        <li class="nav__item">
                            <a href="#" class="nav__link active-link">Chat</a>
                        </li>

                        <li class="nav__item">
                            <a href="../profile" class="nav__link">Profile</a>
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
                    
                  <!-- Chat section -->
                    <div class="chat-container">
                      <div class="chat-header">
                        <h2>Chat</h2>
                      </div>
                      <div class="chat-box">
                        <div class="message received">
                          <p>Hello!</p>
                        </div>
                        <div class="message sent">
                          <p>Hi there!</p>
                        </div>
                        <div class="message received">
                          <p>How are you doing today?</p>
                        </div>
                        <div class="message sent">
                          <p>Not too bad, thanks for asking!</p>
                        </div>
                      </div>
                      <form class="chat-form">
                        <input type="text" placeholder="Type your message...">
                      <button type="submit">
                      <i class="fa fa-send-o" style="font-size:20px;color:hsl(267, 85%, 15%)"></i>
                      </button>
                    </form>
                  </div>
        
        <!--=============== MAIN JS ===============-->
        <script src="../../assets/js/main.js"></script>
        <script src="logic.js"></script>
        
    </body>
</html>