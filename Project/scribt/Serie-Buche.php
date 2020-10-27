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
?>

<!doctype html>
<html lang="de">
<head>
    <title>Serie | Buche</title>

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
        <section class="intro" style="padding-bottom: 5%">
            <p class="headline">Serie | Buche</p>
            <br>
            <p>
                Hier findet ihr die Papeterie-Produkte zur Serie Buche.
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
        </section>

        <section class="serie">
            <div class="row" id="Einladungskarte">
                <div class="column column-33 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-Einladung" onclick="showModal(this);" src="../img/Muttertagskarte.JPEG"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-Einladung" onclick="switchImage(this);"
                                 src="../img/Muttertagskarte.JPEG"/></li>
                        <li><img alt="2" data-target="expandedImg-Einladung" onclick="switchImage(this);"
                                 src="../img/Menu%20Card.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = "1.1";
                    $article = "Hochzeitseinladung | Serie Buche";
                    $image = "../img/Muttertagskarte.JPEG";
                    $price = 2.50;
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
                                <li>Briefumschläge können seperat dazu bestellt werden<br>(Tipp: Umschläge mit passendem
                                    Innenfutter findet ihr weiter unten)
                                </li>
                                <li>Mindestbestellmenge: 25 Stück</li>
                            </ul>
                            <form method="post">
                                <p style="padding-bottom: 3%">
                                    Preis: <strong><?php echo number_format($price, 2, ',', '.'); ?>€/Stück</strong>
                                    <br>
                                    Briefumschläge sind im Preis nicht enthalten.
                                </p>

                                <select id="anzahl-Einladung" name="anzahl-Einladung">
                                    <?php include '../includes/count-papeterie.php' ?>
                                </select>

                                <input type="submit" name="basket-Einladung" class="button" value="In den Warenkorb">

                                <?php
                                if (isset($_POST['basket-Einladung'])) {
                                    $count = $_POST['anzahl-Einladung'];
                                    $total = $price * $count;
                                    $cart->insertArticle($article_number, $article, $image, $price, $count, $total);
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Safe-the-Date">
                <div class="column column-33 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-StD" onclick="showModal(this);" src="../img/Muttertagskarte.JPEG"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-StD" onclick="switchImage(this);"
                                 src="../img/Muttertagskarte.JPEG"/></li>
                        <li><img alt="2" data-target="expandedImg-StD" onclick="switchImage(this);"
                                 src="../img/Menu%20Card.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = "1.2";
                    $article = "Safe the Date | Serie Buche";
                    $image = "../img/Muttertagskarte.JPEG";
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
                                <li>Briefumschläge können seperat dazu bestellt werden<br>(Tipp: Umschläge mit passendem
                                    Innenfutter findet ihr weiter unten)
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
                                    $total = $price * $count;
                                    $cart->insertArticle($article_number, $article, $image, $price, $count, $total);
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Kirchenheft">
                <div class="column column-33 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-Kirchenheft" onclick="showModal(this);" src="../img/Muttertagskarte.JPEG"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Muttertagskarte.JPEG"/></li>
                        <li><img alt="2" data-target="expandedImg-Kirchenheft" onclick="switchImage(this);"
                                 src="../img/Menu%20Card.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = "1.3";
                    $article = "Kirchenheft | Serie Buche";
                    $image = "../img/Muttertagskarte.JPEG";
                    $price = 2.50;
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
                                <li>Papier: Bilderdruckpapier matt (300g)</li>
                                <li>Mindestbestellmenge: 25 Stück</li>
                            </ul>
                            <form method="post">
                                <p style="padding-bottom: 3%">
                                    Preis: <strong><?php echo number_format($price, 2, ',', '.'); ?>€/Stück</strong>
                                    <br>
                                    Kordel ist im Preis nicht enthalten.
                                </p>

                                <select id="anzahl-Kirchenheft" name="anzahl-Kirchenheft">
                                    <?php include '../includes/count-papeterie.php' ?>
                                </select>

                                <input type="submit" name="basket-Kirchenheft" class="button" value="In den Warenkorb">

                                <?php
                                if (isset($_POST['basket-Kirchenheft'])) {
                                    $count = $_POST['anzahl-Kirchenheft'];
                                    $total = $price * $count;
                                    $cart->insertArticle($article_number, $article, $image, $price, $count, $total);
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Rücksendekarte">
                <div class="column column-33 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-Rück" onclick="showModal(this);" src="../img/Muttertagskarte.JPEG"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-Rück" onclick="switchImage(this);"
                                 src="../img/Muttertagskarte.JPEG"/></li>
                        <li><img alt="2" data-target="expandedImg-Rück" onclick="switchImage(this);"
                                 src="../img/Menu%20Card.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = "1.4";
                    $article = "Rücksendekarte | Serie Buche";
                    $image = "../img/Muttertagskarte.JPEG";
                    $price = 2.50;
                    ?>
                    <div class="box">
                        <div class="box-title">
                            <h2><?php echo $article ?></h2>
                        </div>
                        <div class="box-text">
                            <ul>
                                <li>(folgt)</li>
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
                                    $total = $price * $count;
                                    $cart->insertArticle($article_number, $article, $image, $price, $count, $total);
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Menükarte">
                <div class="column column-33 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-Menü" onclick="showModal(this);" src="../img/Muttertagskarte.JPEG"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-Menü" onclick="switchImage(this);"
                                 src="../img/Muttertagskarte.JPEG"/></li>
                        <li><img alt="2" data-target="expandedImg-Menü" onclick="switchImage(this);"
                                 src="../img/Menu%20Card.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = "1.5";
                    $article = "Menükarte | Serie Buche";
                    $image = "../img/Muttertagskarte.JPEG";
                    $price = 2.50;
                    ?>
                    <div class="box">
                        <div class="box-title">
                            <h2><?php echo $article ?></h2>
                        </div>
                        <div class="box-text">
                            <ul>
                                <li>(folgt)</li>
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
                                    $total = $price * $count;
                                    $cart->insertArticle($article_number, $article, $image, $price, $count, $total);
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Dankeskarte">
                <div class="column column-33 flex-columns image-container">
                    <div class="dialog-item">
                        <img alt="Image Container" data-lazy-loaded="true" data-target="modal-dialog"
                             id="expandedImg-Danke" onclick="showModal(this);" src="../img/Muttertagskarte.JPEG"/>
                    </div>
                    <ul>
                        <li><img alt="1" data-target="expandedImg-Danke" onclick="switchImage(this);"
                                 src="../img/Muttertagskarte.JPEG"/></li>
                        <li><img alt="2" data-target="expandedImg-Danke" onclick="switchImage(this);"
                                 src="../img/Menu%20Card.jpg"/></li>
                    </ul>
                </div>
                <div class="column column-50 flex-columns">
                    <?php
                    $article_number = "1.6";
                    $article = "Dankeskarte | Serie Buche";
                    $image = "../img/Muttertagskarte.JPEG";
                    $price = 2.50;
                    ?>
                    <div class="box">
                        <div class="box-title">
                            <h2><?php echo $article ?></h2>
                        </div>
                        <div class="box-text">
                            <ul>
                                <li>(folgt)</li>
                            </ul>
                            <form method="post">
                                <p style="padding-bottom: 3%">
                                    Preis: <strong><?php echo number_format($price, 2, ',', '.'); ?>€/Stück</strong>
                                    <br>
                                </p>

                                <select id="anzahl-Danke" name="anzahl-Danke">
                                    <?php include '../includes/count-papeterie.php' ?>
                                </select>

                                <input type="submit" name="basket-Danke" class="button" value="In den Warenkorb">

                                <?php
                                if (isset($_POST['basket-Danke'])) {
                                    $count = $_POST['anzahl-Danke'];
                                    $total = $price * $count;
                                    $cart->insertArticle($article_number, $article, $image, $price, $count, $total);
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
