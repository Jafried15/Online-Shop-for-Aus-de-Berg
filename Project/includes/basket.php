<!--
 *   ~ /**
 *   ~ * Copyright (c) 2020, 2020 Veronika Fischer
 *   ~ * All Rights Reserved
 *   ~ *
 *   -->
<?php

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
    public function insertArtikel($Artikelnummer, $Bezeichnung, $Image, $Preis, $Anzahl, $Gesamt)
    {

        $Artikel = array($Artikelnummer, $Bezeichnung, $Image, $Preis, $Anzahl, $Gesamt);
        $cart = $_SESSION['cart'];
        array_push($cart, $Artikel);
        $_SESSION['cart'] = $cart;

    }

    /**
     *
     * Gibt Alle Artikel des Array in einer Tabelle aus.
     */
    public function getCart()
    {
        $Array = $_SESSION['cart'];
        echo "<table width='100%'>";
        echo "<tr><th>Artikel</th><th>Einzelpreis</th>><th>Stückzahl</th><th>Gesamtpreis</th></tr>";
        for ($i = 0; $i < count($Array); $i++) {
            $innerArray = $Array[$i];

            echo "<tr>
            <td>$innerArray[1]</td>
            <td>$innerArray[2]</td>
            <td>$innerArray[3]</td>
            <td>$innerArray[4]</td>
            <td>$innerArray[5]</td>
            </tr>";
        }

        echo "</table>";
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
        $Array = $_SESSION['cart'];
        unset($Array[$point]);
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


