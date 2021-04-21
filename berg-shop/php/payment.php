<?php
/*
 *
 * Copyright (c) 2020, 2021 Veronika Fischer
 * All Rights Reserved
 *
 */

session_start();

if (isset($_POST['payment'])) {
    $_SESSION['billing'] = $_POST['payment'];
}

header('Location: ../Summary.html');