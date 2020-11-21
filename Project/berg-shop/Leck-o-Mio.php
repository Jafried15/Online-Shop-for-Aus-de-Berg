<?php
/*
 * <!--
 *   ~ /**
 *   ~ * Copyright (c) 2020, 2020 Veronika Fischer
 *   ~ * All Rights Reserved
 *   ~ *
 *   -->
 *
 */

include '../includes/copyright.php';

// Die Session Starten
session_start();

// Die Klasse Includieren
include_once '../includes/cart.php';

// Eine Neue Instanz der Klasse cart erstellen
$cart = new cart();

// Prüfen ob der Warenkorb besteht
$cart->initial_cart();
$article_number = "5";
$article = "Holzbrett | Leck o Mio";
$image = "../img/Muttertagskarte.JPEG";
$price = 19.90;

if (isset($_POST['basket'])) {
    $count = $_POST['anzahl'];
    $total = $price * $count;
    $cart->insertArticle($article_number, $article, $image, $price, $count, $total);
}
?>

<!doctype html>
<html lang="de">
<head>
    <title><?php echo $article ?></title>

    <link href="../img/Aus-de-Berg_Favicon.png"
          rel="shortcut icon" type="image/x-icon">

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <link href="../css/all.css" rel="stylesheet" type="text/css">
    <link href="../css/Stylesheet.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <div class="site-nav_Logo">
        <img alt="" src="../img/Aus de Berg Logo_ohne Text.png" width="50px">
        <p class="site-nav_Logo">Grafikdesign<br>Veronika Fischer</p>
    </div>
    <nav class="site-nav">
        <i class="fas fa-bars"></i>
        <ul>
            <a href="../index.html">
                <li>Home</li>
            </a>
            <a href="designvorschlaege.html">
                <li>Designmuster</li>
            </a>
            <a href="Blog.html">
                <li>Portfolio</li>
            </a>
            <a href="Bergshop.php">
                <li>Berg-Shop</li>
            </a>
            <a href="Kontakt.php">
                <li>Kontakt</li>
            </a>
        </ul>
    </nav>
    <div class="basket-icon">
        <a href="Basket.php"><i class="fa fa-shopping-cart button"></i>
        </a>
    </div>
</header>

<center>
    <main>
        <section class="intro" style="padding-bottom: 5%">
            <p class="headline"><?php echo $article ?></p>
            <br>
            <p>
                "Leck o Mio isst ma die Wurst auch ohne Brot"<br>
                Das war schon der Spruch von Oma, wenn wir als Kinder die Wurst-Scheiben einfach so genascht haben. Na,
                seid ihr noch immer solche Naschkatzen?
            </p>
        </section>

        <section class="product">
            <div class="row" id="LeckOMio">
                <div class="column column-33 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-LeckOMio" onclick="showModal(this);" src="../img/Muttertagskarte.JPEG"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-LeckOMio" onclick="switchImage(this);"
                                 src="../img/Muttertagskarte.JPEG"/></li>
                        <li><img alt="2" data-target="expandedImg-LeckOMio" onclick="switchImage(this);"
                                 src="../img/Menu%20Card.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <div class="box">
                        <div class="box-title">
                            <h2><?php echo $article ?></h2>
                        </div>
                        <div class="box-text">
                            <ul>
                                <li>Größe: 30,0 cm x 18,0 cm 1,5 cm</li>
                                <li>Holzart: Buche</li>
                                <li>Produziert in Bayern</li>
                                <li>Abgerundete Ecken, geölt, glatt geschliffen</li>
                                <li>Lasergravur: "Leck o Mio"</li>
                                <li>Nicht geeignet für die Spülmaschine</li>
                            </ul>
                            <p style="padding-bottom: 3%">
                                Preis: <strong><?php echo number_format($price, 2, ',', '.'); ?> €/Stück</strong>
                            </p>

                            <form method="post">
                                <?php include '../includes/count-products.php' ?>
                                <input type="submit" name="basket" class="button" value="In den Warenkorb">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade in" id="modal-dialog" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content" data-target="modal-dialog">
                        <button class="close fa fa-close" id="close-modal" onclick="closeModal(this);"
                                type="button"></button>
                        <div class="item-details">
                            <img alt="modal" class="item-img load-image" data-lazy-loaded="true" id="modal-image" src=""
                                 style="display: inline">
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <footer>
        <div class="footer_content">
            <img alt="" height="150" src="../img/Aus de Berg Logo_Online.png" width="150">
            <nav class="nav-ende">
                <ul>
                    <li>
                        <a href="Impressum.html">Impressum</a>
                    </li>
                    <li>
                        <a href="Datenschutz.html">Datenschutz</a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
</center>

<script crossorigin="anonymous" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="../js/mobile-menu.js"></script>
<script src="../js/berg-shop.js"></script>

</body>
</html>
