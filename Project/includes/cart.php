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

class cart
{

    /**
     * Initialisiert die Klasse, muss in jeder Seite ausgeführt werden.
     */
    public function initial_cart()
    {
        $cart = array();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = $cart;
        }
    }

    /**
     *
     * Fügt einen Artikel in das Array ein
     * @param int $Artikelnummer
     * @param string $Bezeichnung
     * @param string $Image
     * @param float $Preis
     * @param int $Anzahl
     * @param float $Gesamt
     */
    public function insertArtikel(int $Artikelnummer, string $Bezeichnung, string $Image, float $Preis, int $Anzahl, float $Gesamt)
    {
        $Artikel = array($Artikelnummer, $Bezeichnung, $Image, $Preis, $Anzahl, $Gesamt);
        $cart = $_SESSION['cart'];
        $key = array_search($Artikelnummer, $cart);
        if ($key) {
            $count = intval($this->get_cartValue_at_Point($key));
            $count = $count + $Anzahl;
            $Artikel[4] = $count;
            $id = $this->get_cartValue_at_Point($key);
            $array = array($id => $Artikel);
        } else {
            array_push($cart, $Artikel);
        }
        $_SESSION['cart'] = $cart;
    }

    /**
     *
     * Gibt Alle Artikel des Array in einer Tabelle aus.
     */
    public function getCart()
    {
        if ($this->get_cart_count() === 0) {
            echo '<script type = "text/javascript" >
            document.getElementById("empty").style.display = "block";
            document.getElementById("basket-icon").style.display = "none";
            document.getElementById("filled").style.display = "none";
            document.getElementById("step-one").style.display = "none";
             </script>';
        } else if ($this->get_cart_count() != 0) {
            echo '<script type = "text/javascript" >
            document.getElementById("empty").style.display = "none";
            document.getElementById("basket-icon").style.display = "block";
            document.getElementById("filled").style.display = "block";
            document.getElementById("step-one").style.display = "block";
             </script>';
        }
        include 'cart-table.php';
    }


    /**
     *
     * Löscht den Waren Korb
     */
    public function undo_cart()
    {
        $_SESSION['cart'] = array();
    }


    /**
     * Gibt einen Datensatz Zurück
     * @param int $point
     * @return
     */
    public function get_cartValue_at_Point($point)
    {
        $Array = $_SESSION['cart'];
        return $Array[$point];
    }

    /**
     *
     * Entfernt ein Artikel am Point n
     * @param int $point
     */
    public function delete_cartValue_at_Point($point)
    {
        array_splice($_SESSION['cart'], $point, $point);
    }

    /**
     *
     * Gibt die Anzahl der Artikel zurück
     */
    public function get_cart_count()
    {
        return count($_SESSION['cart']);
    }
}

?>


