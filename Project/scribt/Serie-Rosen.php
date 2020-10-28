<?php

include '../includes/copyright.php';

// Start Session
session_start();

// Include Class
include_once '../includes/cart.php';

// Create new Instance of cart
$cart = new cart();

// Check if cart exists
$cart->initial_cart();
?>

<!doctype html>
<html lang="de">
<head>
    <title>Serie | Rosen</title>

    <link href="../img/Aus-de-Berg_Favicon.png"
          rel="shortcut icon" type="image/x-icon">

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <link href="../css/all.css" rel="stylesheet" type="text/css">
    <link href="../css/Stylesheet.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
<?php include '../includes/header.php' ?>

<center>
    <main>
        <section class="site-hero">
            <div class="head-slider">
                <div class="slide showing load-image" data-href="contact.html" data-stellar-background-ratio="0.5"
                     style="background-image: url('../img/Serie_Rosen/Rosen_Titel.jpg')">
                    <div class="slide-content">
                        <a>
                            <p class="headline">Serie | Rosen</p>
                            <br>
                            <p>
                                Hier findet ihr die Papeterie-Produkte zur Serie Rosen.
                            </p>
                            <br>
                            <br>
                            <p>
                                Ihr habt eure Wunschkarte gefunden?<br>
                                Dann findet ihr hier den genauen Bestellablauf.
                            </p>
                            <div class="button-field">
                                <a class="button" href="Bestellablauf.html">Bestellablauf</a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="serie">

            <div class="row" id="Safe-the-Date">
                <div class="column column-40 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-StD" onclick="showModal(this);"
                             src="../img/Serie_Rosen/Save-the-Date/Rosen_StD_1.jpg"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-StD" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Save-the-Date/Rosen_StD_1.jpg"/></li>
                        <li><img alt="2" data-target="expandedImg-StD" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Save-the-Date/Rosen_StD_2.jpg"/></li>
                        <li><img alt="3" data-target="expandedImg-StD" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Save-the-Date/Rosen_StD_3.jpg"/></li>
                        <li><img alt="4" data-target="expandedImg-StD" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Save-the-Date/Rosen_StD_4.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = 2.1;
                    $article = "Safe the Date | Serie Rosen";
                    $image = "../img/Serie_Rosen/Save-the-Date/Rosen_StD_1.jpg";
                    $price = 1.50;
                    ?>
                    <div class="box">
                        <div class="box-title">
                            <h2><?php echo $article ?></h2>
                        </div>
                        <div class="box-text">
                            <ul>
                                <li>Format: DIN A6 (10,5 cm x 14,8 cm)</li>
                                <li>Druck: Digitaldruck, Beidseitig bedruckt</li>
                                <li>Papier: Bilderdruckpapier matt (300g)</li>
                                <li>Briefumschläge können seperat dazu bestellt werden
                                </li>
                                <li>Mindestbestellmenge: 25 Stück</li>
                            </ul>
                            <form method="post">
                                <p style="padding-bottom: 3%">
                                    Preis: <strong><?php echo number_format($price, 2, ',', '.'); ?>€/Stück</strong>
                                    <br>
                                    Briefumschläge sind im Preis nicht enthalten.
                                </p>

                                <select id="anzahl-StD" name="anzahl-StD">
                                    <?php include '../includes/count-papeterie.php' ?>
                                </select>

                                <input type="submit" name="basket-StD" class="button" value="In den Warenkorb">

                                <?php
                                if (isset($_POST['basket-StD'])) {
                                    $count = $_POST['anzahl-StD'];
                                    $cart->insertArticle($article_number, $article, $image, $price, $count);
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Einladungskarte">
                <div class="column column-40 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-Einladung" onclick="showModal(this);"
                             src="../img/Serie_Rosen/Einladungskarte/Rosen_Einl_1.jpg"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-Einladung" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Einladungskarte/Rosen_Einl_1.jpg"/></li>
                        <li><img alt="2" data-target="expandedImg-Einladung" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Einladungskarte/Rosen_Einl_2.jpg"/></li>
                        <li><img alt="3" data-target="expandedImg-Einladung" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Einladungskarte/Rosen_Einl_3.jpg"/></li>
                        <li><img alt="4" data-target="expandedImg-Einladung" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Einladungskarte/Rosen_Einl_4.jpg"/></li>
                        <li><img alt="5" data-target="expandedImg-Einladung" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Einladungskarte/Rosen_Einl_5.jpg"/></li>
                        <li><img alt="6" data-target="expandedImg-Einladung" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Einladungskarte/Rosen_Einl_6.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = 2.2;
                    $article = "Hochzeitseinladung | Serie Rosen";
                    $image = "../img/Serie_Rosen/Einladungskarte/Rosen_Einl_1.jpg";
                    $price = 1.80;
                    ?>
                    <div class="box">
                        <div class="box-title">
                            <h2><?php echo $article ?></h2>
                        </div>
                        <div class="box-text">
                            <ul>
                                <li>Geschlossenes Format: DIN A6 (10,5 cm x 14,8 cm)</li>
                                <li>Offenes Format: 31,5 cm x 14,8 cm</li>
                                <li>Druck: Digitaldruck, Beidseitig bedruckt</li>
                                <li>Papier: Bilderdruckpapier matt (300g)</li>
                                <li>Briefumschläge können seperat dazu bestellt werden
                                </li>
                                <li>Mindestbestellmenge: 25 Stück</li>
                            </ul>
                            <form method="post">
                                <p style="padding-bottom: 3%">
                                    Preis: <strong><?php echo number_format($price, 2, ',', '.'); ?>€/Stück</strong>
                                    <br>
                                    Briefumschläge, Polaroid-Bild und Rücksendekarte sind im Preis nicht enthalten.
                                </p>

                                <select id="anzahl-Einladung" name="anzahl-Einladung">
                                    <?php include '../includes/count-papeterie.php' ?>
                                </select>
                                <input type="submit" name="basket-Einladung" class="button" value="In den Warenkorb">

                                <?php
                                if (isset($_POST['basket-Einladung'])) {
                                    $count = $_POST['anzahl-Einladung'];
                                    $cart->insertArticle($article_number, $article, $image, $price, $count);
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Polaroid">
                <div class="column column-40 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-polaroid" onclick="showModal(this);"
                             src="../img/Serie_Rosen/Polaroid/Rosen_Polaroid_1.jpg"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-polaroid" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Polaroid/Rosen_Polaroid_1.jpg"/></li>
                        <li><img alt="2" data-target="expandedImg-polaroid" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Polaroid/Rosen_Polaroid_2.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = 2.3;
                    $article = "Polaroid-Bild | Serie Rosen";
                    $image = "../img/Serie_Rosen/Polaroid/Rosen_Polaroid_1.jpg";
                    $price = 1.30;
                    ?>
                    <div class="box">
                        <div class="box-title">
                            <h2><?php echo $article ?></h2>
                        </div>
                        <div class="box-text">
                            <ul>
                                <li>Format: DIN A7 (7,4 cm x 10,5 cm)</li>
                                <li>Druck: Digitaldruck, einseitig bedruckt</li>
                                <li>Papier: Bilderdruckpapier glänzend mit exklusivem UV-Lack (250g)</li>
                                <li>Mindestbestellmenge: 25</li>
                            </ul>
                            <form method="post">
                                <p style="padding-bottom: 3%">
                                    Preis: <strong><?php echo number_format($price, 2, ',', '.'); ?>€/Stück</strong>
                                    <br>
                                </p>

                                <select id="anzahl-polaroid" name="anzahl-polaroid">
                                    <?php include '../includes/count-papeterie.php' ?>
                                </select>
                                <input type="submit" name="basket-polaroid" class="button" value="In den Warenkorb">

                                <?php
                                if (isset($_POST['basket-polaroid'])) {
                                    $count = $_POST['anzahl-polaroid'];
                                    $cart->insertArticle($article_number, $article, $image, $price, $count);
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Rücksendekarte">
                <div class="column column-40 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-Rück" onclick="showModal(this);"
                             src="../img/Serie_Rosen/Rücksendekarte/Rosen_Rueck_1.jpg"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-Rück" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Rücksendekarte/Rosen_Rueck_1.jpg"/></li>
                        <li><img alt="2" data-target="expandedImg-Rück" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Rücksendekarte/Rosen_Rueck_2.jpg"/></li>
                        <li><img alt="3" data-target="expandedImg-Rück" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Rücksendekarte/Rosen_Rueck_3.jpg"/></li>
                        <li><img alt="4" data-target="expandedImg-Rück" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Rücksendekarte/Rosen_Rueck_4.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = 2.4;
                    $article = "Rücksendekarte | Serie Rosen";
                    $image = "../img/Serie_Rosen/Rücksendekarte/Rosen_Rueck_1.jpg";
                    $price = 1.30;
                    ?>
                    <div class="box">
                        <div class="box-title">
                            <h2><?php echo $article ?></h2>
                        </div>
                        <div class="box-text">
                            <ul>
                                <li>Format: Sonderformat (9,5 cm x 13,8 cm) passend zur Einladungskarte</li>
                                <li>Druck: Digitaldruck, Beidseitig bedruckt</li>
                                <li>Papier: Bilderdruckpapier matt (300g)</li>
                                <li>Briefumschläge können seperat dazu bestellt werden</li>
                                <li>Mindestbestellmenge: 25 Stück</li>
                            </ul>
                            <form method="post">
                                <p style="padding-bottom: 3%">
                                    Preis: <strong><?php echo number_format($price, 2, ',', '.'); ?>€/Stück</strong>
                                    <br>
                                </p>

                                <select id="anzahl-Rück" name="anzahl-Rück">
                                    <?php include '../includes/count-papeterie.php' ?>
                                </select>
                                <input type="submit" name="basket-Rück" class="button" value="In den Warenkorb">

                                <?php
                                if (isset($_POST['basket-Rück'])) {
                                    $count = $_POST['anzahl-Rück'];
                                    $cart->insertArticle($article_number, $article, $image, $price, $count);
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Kirchenheft">
                <div class="column column-40 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-Kirchenheft" onclick="showModal(this);"
                             src="../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_1.jpg"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_1.jpg"/></li>
                        <li><img alt="2" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_2.jpg"/></li>
                        <li><img alt="3" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_3.jpg"/></li>
                        <li><img alt="4" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_4.jpg"/></li>
                        <li><img alt="5" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_5.jpg"/></li>
                        <li><img alt="6" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_6.jpg"/></li>
                        <li><img alt="7" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_7.jpg"/></li>
                        <li><img alt="8" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_8.jpg"/></li>
                        <li><img alt="9" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_9.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = 2.5;
                    $article = "Kirchenheft | Serie Rosen";
                    $image = "../img/Serie_Rosen/Kirchenheft/Rosen_Kirche_1.jpg";
                    $price = 2.80;
                    ?>
                    <div class="box">
                        <div class="box-title">
                            <h2><?php echo $article ?></h2>
                        </div>
                        <div class="box-text">
                            <ul>
                                <li>Geschlossenes Format: DIN A5 (14,8 cm x 21,0 cm)</li>
                                <li>Offenes Format: 29,7 cm x 21,0 cm</li>
                                <li>Druck: Digitaldruck, Beidseitig bedruckt</li>
                                <li>Papier: Bilderdruckpapier matt (250g)</li>
                                <li>Seiten: 8-Seitig inkl. Umschlag (auf Anfrage auch gerne 12/16 Seiten)</li>
                                <li>Mindestbestellmenge: 25 Stück</li>
                            </ul>
                            <form method="post">
                                <p style="padding-bottom: 3%">
                                    Preis: <strong><?php echo number_format($price, 2, ',', '.'); ?>€/Stück</strong>
                                </p>

                                <select id="anzahl-Kirchenheft" name="anzahl-Kirchenheft">
                                    <?php include '../includes/count-papeterie.php' ?>
                                </select>

                                <input type="submit" name="basket-Kirchenheft" class="button" value="In den Warenkorb">

                                <?php
                                if (isset($_POST['basket-Kirchenheft'])) {
                                    $count = $_POST['anzahl-Kirchenheft'];
                                    $cart->insertArticle($article_number, $article, $image, $price, $count);
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Menükarte">
                <div class="column column-40 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-Menü" onclick="showModal(this);"
                             src="../img/Serie_Rosen/Menükarte/Rosen_Menue_1.jpg"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-Menü" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Menükarte/Rosen_Menue_1.jpg"/></li>
                        <li><img alt="2" data-target="expandedImg-Menü" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Menükarte/Rosen_Menue_2.jpg"/></li>
                        <li><img alt="3" data-target="expandedImg-Menü" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Menükarte/Rosen_Menue_3.jpg"/></li>
                        <li><img alt="4" data-target="expandedImg-Menü" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Menükarte/Rosen_Menue_4.jpg"/></li>
                        <li><img alt="5" data-target="expandedImg-Menü" onclick="switchImage(this);"
                                 src="../img/Serie_Rosen/Menükarte/Rosen_Menue_5.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = 2.6;
                    $article = "Menükarte | Serie Rosen";
                    $image = "../img/Serie_Rosen/Menükarte/Rosen_Menue_1.jpg";
                    $price = 1.50;
                    ?>
                    <div class="box">
                        <div class="box-title">
                            <h2><?php echo $article ?></h2>
                        </div>
                        <div class="box-text">
                            <ul>
                                <li>Format: DIN Lang (10,5 cm x 21,0 cm)</li>
                                <li>Druck: Digitaldruck, Beidseitig bedruckt</li>
                                <li>Papier: Bilderdruckpapier matt (300g)</li>
                                <li>Mindestbestellmenge: 25 Stück</li>
                            </ul>
                            <form method="post">
                                <p style="padding-bottom: 3%">
                                    Preis: <strong><?php echo number_format($price, 2, ',', '.'); ?>€/Stück</strong>
                                    <br>
                                </p>

                                <select id="anzahl-Menü" name="anzahl-Menü">
                                    <?php include '../includes/count-papeterie.php' ?>
                                </select>
                                <input type="submit" name="basket-Menü" class="button" value="In den Warenkorb">

                                <?php
                                if (isset($_POST['basket-Menü'])) {
                                    $count = $_POST['anzahl-Menü'];
                                    $cart->insertArticle($article_number, $article, $image, $price, $count);
                                }
                                ?>
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
