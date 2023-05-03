<?php
    session_start();
    include "../../db_connect.php";
    if(!isset($_SESSION['user_id'])) {
      header('location: ../index.php');
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
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
                            <a href="../homepage/index.php" class="nav__link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="#" class="nav__link">About</a>
                        </li>
                        <li class="nav__item">
                            <a href="#" class="nav__link">Contact</a>
                        </li>
                        <li class="nav__item">
                            <a href="../profile" class="nav__link">Profile</a>
                        </li>
                        <a href="../post_feed" class="button button--ghost active-link">+ Post</a>
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
        <!--==================== CATEGORY ====================-->
        <main class="main">
            <section class="section category">
                <form action="#" method="post" enctype="multipart/form-data">
                    <label id="writing" for="description">Shipping address:</label>
                    <input placeholder="What's your address?" name="description" type="text" id="description" required>
                    <br>
                    <label id="writing" for="description">Your mobile number:</label>
                    <input placeholder="What's your phone number?" maxlength="10" minlength="10" name="description" type="number" id="description" required>
                    <br>
                    <p>Do you want to pay online?</p>
                    <label><input type="radio" name="sell" value="yes" required>Yes</label>
                    <label><input type="radio" name="sell" value="no" required>No</label>
                    <div id="cost-field" style="display: none;">
                        <label for="qr">Scan this QR code to pay:</label>
                        <br>
                        <img id="qr" name="qr" src="../../src/QR.jpeg" style="max-height: 400px;>
                        <br>
                        <label for="file">Give screenshot of payment:</label>
                        <input type="file" id="file" name="file" accept=".jpg,.png,.jpeg" required>
                    </div>
                    <br>
                    <button>BUY</button>
                </form>
            </section>
        </main>
    <script>
        const sellYesRadio = document.querySelector('input[value="yes"]');
        const sellNoRadio = document.querySelector('input[value="no"]');
        const costField = document.querySelector('#cost-field');

        sellYesRadio.addEventListener('change', () => {
            if (sellYesRadio.checked) {
            costField.style.display = 'block';
            } else {
            costField.style.display = 'none';
            }
        });

        sellNoRadio.addEventListener('change', () => {
            if (sellNoRadio.checked) {
            costField.style.display = 'none';
            } else {
            costField.style.display = 'block';
            }
        });
    </script>
</body>

</html>