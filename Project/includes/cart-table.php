<?php

include '../includes/copyright.php';

// Include Class
include_once '../includes/cart.php';

// Create new Instance of cart
$cart = new cart();

// Check if cart exists
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
        <td><img src="<?php echo $item['image'] ?>" alt="article-image"> <?php echo $item['name'] ?></td>
        <td><?php echo number_format($item['price'], 2, ',', '.') . " €/Stück" ?></td>
        <td>
            <?php echo $item['count'] ?>
            <button onclick="<?php $cart->removeArticle($item['id']) ?>"><i class="fa fa-trash"></i></button>
        </td>
        <td><?php echo number_format($item['total'], 2, ',', '.') . " €" ?></td>
        <?php
        }
        ?>
    </tr>
</table>
