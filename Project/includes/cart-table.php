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
    foreach ($_SESSION["cart"] as $item) {
    ?>
    <tr>
        <td><img src="<?php echo $item[2] ?>" alt="article-image"> <?php echo $item[1] ?></td>
        <td><?php echo number_format($item[3], 2, ',', '.') . " €/Stück" ?></td>
        <td><?php echo $item[4] ?>
            <br>
            <a onclick="<?php $cart->delete_cartValue_at_Point($item[1]) ?>"
        </td>
        <td><?php echo number_format($item[5], 2, ',', '.') . " €" ?></td>
        <?php
        }
        ?>
    </tr>
</table>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>