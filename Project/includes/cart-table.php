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


// Die Session Starten
session_start();

// Die Klasse Includieren
include_once '../includes/cart.php';

// Eine Neue Instanz der Klasse cart erstellen
$cart = new cart();

// Prüfen ob der Warenkorb besteht
$cart->initial_cart();
$Array = $_SESSION['cart'];
?>

<table class="cart-table">
    <tr>
        <th>Produkt</th>
        <th>Einzelpreis</th>
        <th>Stückzahl</th>
        <th>Gesamtpreis</th>
    </tr>
    <?php
    for ($i = 0;
    $i < count($Array);
    $i++) {
    $innerArray = $Array[$i];
    ?>
    <tr>
        <td><img src="<?php echo $innerArray[2] ?>" alt="article-image"> <?php echo $innerArray[1] ?></td>
        <td><?php echo number_format($innerArray[3], 2, ',', '.') . " €/Stück" ?></td>
        <td><?php echo $innerArray[4] ?>
        </td>
        <td><?php echo number_format($innerArray[5], 2, ',', '.') . " €" ?></td>
        <?php
        }
        ?>
    </tr>
</table>
