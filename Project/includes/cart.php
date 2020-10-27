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
     * Add Article to Cart
     * @param int $Article_number
     * @param string $Description
     * @param string $Image
     * @param float $Price
     * @param int $Count
     * @param float $Total
     */
    public function insertArticle(int $Article_number, string $Description, string $Image, float $Price, int $Count, float $Total)
    {
        $Article = array($Article_number, $Description, $Image, $Price, $Count, $Total);
        $cart = $_SESSION['cart'];
        $key = array_search($Article_number, $cart);
        if ($key) {
            $count = intval($this->get_cartValue_at_Point($key));
            $count = $count + $Count;
            $Article[4] = $count;
            $id = $this->get_cartValue_at_Point($key);
            $array = array($id => $Article);
        } else {
            array_push($cart, $Article);
        }
        $_SESSION['cart'] = $cart;
    }

    /**
     * Show all Articles from Array in an table
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
     * Delete Cart
     */
    public function undo_cart()
    {
        $_SESSION['cart'] = array();
    }


    /**
     * Returns one Value
     * @param int $point
     * @return mixed
     */
    public function get_cartValue_at_Point(int $point)
    {
        $Array = $_SESSION['cart'];
        return $Array[$point];
    }

    // TODO: Delete article by id at point (Get function over search for point)

    /**
     * Delete Value at one Point
     * @param int $article
     */
    public function delete_cartValue_at_Point(int $article)
    {

        unset($_SESSION['cart'], $point);
    }

    /**
     * Get Article Count in Cart
     */
    public function get_cart_count()
    {
        return count($_SESSION['cart']);
    }
}



