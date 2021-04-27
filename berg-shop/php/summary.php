<?php
/*
 *
 * Copyright (c) 2020, 2021 Veronika Fischer
 * All Rights Reserved
 *
 */

if (isset($_POST['cart']) && isset($_POST['billingAddress']) && isset($_POST['deliveryAddress']) && isset($_POST['billingOption'])) {
    $cart = $_POST['cart'];
    $billingAddress = $_POST['billingAddress'];
    $deliveryAddress = $_POST['deliveryAddress'];
    $billingOption = $_POST['billingOption'];
    $contact = $_POST['contact'];

    $to = 'info@ausdeberg.de';

    $subject = "Bestellung";

    $message = "Kontakt: " . $contact;
    $message .= "Rechnungsaddresse: " . $billingAddress;
    $message .= "Liederadresse: " . $deliveryAddress;
    $message .= "Zahlungsmethode: " . $billingOption . "\n\n";
    $message = str_replace(",", "\n", $message);
    $message .= "Artikel: " . $cart;
    $message = str_replace("{", "\n", $message);
    $message = str_replace("}", "\n\n", $message);
    $message = str_replace("\"", "", $message);
    $message = str_replace(":", ": ", $message);
    $message = str_replace("[", "", $message);

    $success = mail($to, $subject, $message);

    if ($success) {
        header('Location: ../Finish.html');
    } else {
        echo error_get_last()['message'];
    }
}
