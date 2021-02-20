<?php
/*
 *
 * Copyright (c) 2020, 2021 Veronika Fischer
 * All Rights Reserved
 *
 */

if (isset($_POST['cart']) && isset($_POST['billingAddress']) && isset($_POST['deliveryAddress']) && isset($_POST['billingOption'])) {
    $cart = json_decode($_POST['cart']);
    $billingAddress = $_POST['billingAddress'];
    $deliveryAddress = $_POST['deliveryAddress'];
    $billingOption = $_POST['billingOption'];
    $contact = $_POST['contact'];

    $to = 'arbeit@jfriedrich.net';
    $subject = 'Bestellung';

    $message = 'Kontakt: ' . $contact . 'Rechnungsadresse :' . $billingAddress . 'Lieferadresse :' . $deliveryAddress . 'Zahlungsmethode :' . $billingOption . 'Artikel : ' . $cart;
    echo $message;
    mail($to, $subject, $message);
}