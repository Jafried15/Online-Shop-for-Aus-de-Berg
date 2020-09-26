<?php

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
    <title>Warenkorb</title>

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
        <section class="basket intro" id="empty" style="padding-bottom: 5%">
            <i class="fa fa-shopping-cart shopping-cart"></i><br>
            <p class="headline">Warenkorb</p>
            <br>
            <p>
                Huch, was ist denn hier passiert?<br>
                Ich schätze mal dein Warenkorb ist leer...
            </p>
            <br>
            <p>
                Damit das nicht so bleibt, besuche einfach den
                <a href="Bergshop.php">Berg-Shop</a>
                - dort findest du alle Papeterie-Artikel und Berg-Produkte.<br>
                Viel Spaß beim Shoppen und bis später!
            </p>
        </section>

        <section class="basket intro" id="basket-icon" style="padding-bottom: 0">
            <p class="headline" id="headline_basket">Warenkorb</p>
        </section>

        <section class="basket" id="filled" style="padding-bottom: 5%">
            <div class="row">
                <div class="column column-33 flex-columns">
                    <div class="box active" id="step-1">
                        <div class="box-title">
                            <i class="icon step-1-white" id="step-1-icon"></i>
                            Warenkorb
                        </div>
                    </div>
                </div>
                <div class="column column-33 flex-columns">
                    <div class="box" id="step-2">
                        <div class="box-title">
                            <i class="icon step-2" id="step-2-icon"></i>
                            Adresse
                        </div>
                    </div>
                </div>
                <div class="column column-33 flex-columns">
                    <div class="box" id="step-3">
                        <div class="box-title">
                            <i class="icon step-3" id="step-3-icon"></i>
                            Kasse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="step step-one" id="step-one">
            <div class="row">
                <?php
                $cart->getCart();
                ?>
            </div>
            <div class="row total">
                <div class="column-50">
                    <hr>
                    <div class="row">
                        <div class="column-50">
                            <p>Gesamtsumme</p>
                            <p>Versandkosten</p>
                            <p>inkl. MWST 19%</p>
                        </div>
                        <div class="column-50" style="text-align: right">
                            <?php
                            $Array = $_SESSION['cart'];
                            $total = 0;
                            for ($i = 0; $i < count($Array); $i++) {
                                $innerArray = $Array[$i];
                                $total = $total + $innerArray[5];
                            }

                            $delivery = 4.90;

                            $MWSTRate = 0.19;
                            $MWSTSum = $total * $MWSTRate;

                            $amount = $total + $delivery + $MWSTSum;
                            ?>
                            <p><?php echo number_format($total, 2, ',', '.'); ?> €</>
                            <p><?php echo number_format($delivery, 2, ',', '.'); ?> €</p>
                            <p><?php echo number_format($MWSTSum, 2, ',', '.'); ?> €</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="column-50">
                            <p style="font-weight: bold">Rechnungsbetrag</p>
                        </div>
                        <div class=" column-50" style="text-align: right">
                            <p style="font-weight: bold"><?php echo number_format($amount, 2, ',', '.'); ?> €</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="column-100" style="text-align: right">
                    <div class="button-field">
                        <button class="button" onclick="nextStep('step-one')">
                            Weiter
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="step step-two" id="step-two">
            <form id="rechnungsadresse">
                <h2>Rechnungsadresse</h2>
                <div class="row">
                    <div class="column flex-columns column-20">
                        <label for="gender">Geschlecht:</label>
                        <select class="half" id="gender" name="gender">
                            <option selected value="mrs">Frau</option>
                            <option value="mr">Herr</option>
                            <option value="mx">Divers</option>
                        </select>
                    </div>
                    <div class="column flex-columns column-40">
                        <label class="half" for="surname">Vorname:</label>
                        <input class="half" id="surname" name="surname" placeholder="Vorname" type="text">
                    </div>
                    <div class="column flex-columns column-40">
                        <label for="lastname">Nachname:</label>
                        <input class="half" id="lastname" name="lastname" placeholder="Nachname" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="column flex-columns column-100">
                        <label for="firma">Firma (optional):</label>
                        <input id="firma" name="firma" placeholder="Firma (optional)" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="column flex-columns column-75">
                        <label for="street">Strasse:</label>
                        <input class="long" id="street" name="street" placeholder="Strasse" type="text">
                    </div>
                    <div class="column flex-columns column-25">
                        <label for="number">Hausnummer:</label>
                        <input class="long" id="number" name="number" placeholder="Hausnummer" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="column flex-columns column-25">
                        <label for="plz">PLZ:</label>
                        <input class="short" id="plz" name="plz" placeholder="PLZ" type="text">
                    </div>
                    <div class="column flex-columns column-75">
                        <label for="ort">Ort:</label>
                        <input class="long" id="ort" name="ort" placeholder="Ort" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="column flex-columns column-100">
                        <label for="mail">E-Mail:</label>
                        <input id="mail" name="mail" placeholder="E-Mail" type="email">
                    </div>
                </div>
                <div class="row">
                    <div class="column flex-columns column-100">
                        <label for="tel">Telefon (optional):</label>
                        <input id="tel" name="tel" placeholder="Telefon (optional)" type="tel">
                    </div>
                </div>

                <div class="row" style="padding-top: 3vh; padding-bottom: 5vh">
                    <div class="column column-100">
                        <input id="different" name="different" type="checkbox" value="different"
                               onclick="showShippingAddress(this)">
                        <label for="different">Die Lieferadresse weicht von der Rechnungsadresse ab</label>
                    </div>
                </div>
            </form>

            <form id="lieferadresse" style="display: none">
                <h2>Lieferadresse</h2>
                <div class="row">
                    <div class="column flex-columns column-20">
                        <label for="genderLief">Geschlecht:</label>
                        <select class="half" id="genderLief" name="genderLief">
                            <option selected value="mrs">Frau</option>
                            <option value="mr">Herr</option>
                            <option value="mx">Divers</option>
                        </select>
                    </div>
                    <div class="column flex-columns column-40">
                        <label class="half" for="surnameLief">Vorname:</label>
                        <input class="half" id="surnameLief" name="surnameLief" placeholder="Vorname" type="text">
                    </div>
                    <div class="column flex-columns column-40">
                        <label for="lastnameLief">Nachname:</label>
                        <input class="half" id="lastnameLief" name="lastnameLief" placeholder="Nachname" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="column flex-columns column-100">
                        <label for="firmaLief">Firma (optional):</label>
                        <input id="firmaLief" name="firmaLief" placeholder="Firma (optional)" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="column flex-columns column-75">
                        <label for="streetLief">Strasse:</label>
                        <input class="long" id="streetLief" name="streetLief" placeholder="Strasse" type="text">
                    </div>
                    <div class="column flex-columns column-25">
                        <label for="numberLief">Hausnummer:</label>
                        <input class="long" id="numberLief" name="numberLief" placeholder="Hausnummer" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="column flex-columns column-25">
                        <label for="plzLief">PLZ:</label>
                        <input class="short" id="plzLief" name="plzLief" placeholder="PLZ" type="text">
                    </div>
                    <div class="column flex-columns column-75">
                        <label for="ortLief">Ort:</label>
                        <input class="long" id="ortLief" name="ortLief" placeholder="Ort" type="text">
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="column-100" style="text-align: right">
                    <div class="button-field">
                        <button class="button" onclick="backStep('step-two')">
                            Zurück
                        </button>
                        <button class="button" onclick="nextStep('step-two')">
                            Weiter
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="step step-three" id="step-three">

            <div class="row">
                <div class="column-100" id="paypal-container"></div>
            </div>
            <div class="row">
                <div class="column-100" id="vorkasse-container"></div>
            </div>

            <div class="row">
                <div class="column-100" style="text-align: right">
                    <div class="button-field">
                        <button class="button" onclick="backStep('step-three')">
                            Zurück
                        </button>
                        <button class="button" onclick="nextStep('step-three')">
                            Weiter
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="step step-summary" id="step-summary">
            <div class="row" style="padding-top: 3%">
            </div>
            
            <div class="row">
                <?php
                $cart->getCart();
                ?>
            </div>
            <div class="row total">
                <div class="column-50">
                    <hr>
                    <div class="row">
                        <div class="column-50">
                            <p>Gesamtsumme</p>
                            <p>Versandkosten</p>
                            <p>inkl. MWST 19%</p>
                        </div>
                        <div class="column-50" style="text-align: right">
                            <?php
                            $Array = $_SESSION['cart'];
                            $total = 0;
                            for ($i = 0; $i < count($Array); $i++) {
                                $innerArray = $Array[$i];
                                $total = $total + $innerArray[5];
                            }

                            $delivery = 4.90;

                            $MWSTRate = 0.19;
                            $MWSTSum = $total * $MWSTRate;

                            $amount = $total + $delivery + $MWSTSum;
                            ?>
                            <p><?php echo number_format($total, 2, ',', '.'); ?> €</>
                            <p><?php echo number_format($delivery, 2, ',', '.'); ?> €</p>
                            <p><?php echo number_format($MWSTSum, 2, ',', '.'); ?> €</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="column-50">
                            <p style="font-weight: bold">Rechnungsbetrag</p>
                        </div>
                        <div class=" column-50" style="text-align: right">
                            <p style="font-weight: bold"><?php echo number_format($amount, 2, ',', '.'); ?> €</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="column-100" style="text-align: right">
                    <div class="button-field">
                        <button class="button" onclick="backStep('step-summary')">
                            Zurück
                        </button>
                        <button class="button" onclick="">
                            Bestellung absenden
                        </button>
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
