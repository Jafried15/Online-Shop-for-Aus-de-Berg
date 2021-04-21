<?php
/*
 *
 * Copyright (c) 2020, 2021 Veronika Fischer
 * All Rights Reserved
 *
 */
session_start();

$_billingAddress = null;
$_deliveryAddress = null;

if (isset($_POST['gender']) && isset($_POST['surname']) && isset($_POST['lastname'])
    && isset($_POST['street']) && isset($_POST['number']) && isset($_POST['plz']) && isset($_POST['ort'])
    && isset($_POST['mail']) && isset($_POST['tel'])
    && isset($_POST['genderLief']) && isset($_POST['surnameLief']) && isset($_POST['lastnameLief'])
    && isset($_POST['streetLief']) && isset($_POST['numberLief']) && isset($_POST['plzLief']) && isset($_POST['ortLief'])) {
    $_billingAddress = array(
        'Gender' => $_POST['gender'],
        'Surname' => $_POST['surname'],
        'Lastname' => $_POST['lastname'],
        'Organisation' => $_POST['organisation'],
        'Street' => $_POST['street'],
        'Number' => $_POST['number'],
        'PLZ' => $_POST['plz'],
        'Ort' => $_POST['ort'],
        'Mail' => $_POST['mail'],
        'Tel' => $_POST['tel']
    );
}

if (isset($_POST['different']) && isset($_POST['genderLief']) && isset($_POST['surnameLief']) && isset($_POST['lastnameLief'])
    && isset($_POST['streetLief']) && isset($_POST['numberLief']) && isset($_POST['plzLief']) && isset($_POST['ortLief'])) {
    $_deliveryAddress = array(
        'GenderLief' => $_POST['genderLief'],
        'SurnameLief' => $_POST['surnameLief'],
        'LastnameLief' => $_POST['lastnameLief'],
        'OrganisationLief' => $_POST['organisationLief'],
        'StreetLief' => $_POST['streetLief'],
        'NumberLief' => $_POST['numberLief'],
        'PLZLLief' => $_POST['plzLief'],
        'OrtLief' => $_POST['ortLief']
    );
}

if (!empty($_shippingAddress)) {
    $_SESSION['address'] = array('BillingAddress' => $_billingAddress, 'DeliveryAddress' => $_deliveryAddress);
} else {
    $_SESSION['address'] = array('BillingAddress' => $_billingAddress);
}

header('Location: ../Payment.html');