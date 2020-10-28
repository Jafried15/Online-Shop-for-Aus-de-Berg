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
     * Initialise the class
     * Must be done in every class
     */
    public function initial_cart()
    {
        $cart = array();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = $cart;
        }
        if (!isset ($_SESSION['id'])) {
            $_SESSION['id'] = 0;
        }
    }


    private function setId($id)
    {
        $_SESSION['id'] = $id;
    }

    private function getId()
    {
        return $_SESSION['id'];
    }

    /**
     * Add Article to Cart
     * @param float $Article_number
     * @param string $Name
     * @param string $Image
     * @param float $Price
     * @param int $Count
     */
    public function insertArticle(float $Article_number, string $Name, string $Image, float $Price, int $Count)
    {
        $cart = $_SESSION['cart'];
        echo $_SESSION['id'];
        foreach ($cart as $article) {
            if ($article['article_number'] == $Article_number) {
                $count = $article['count'];
                $this->removeArticle($article['id']);
                $Count = $Count + $count;
            }
        }
        $cart = $_SESSION['cart'];
        $Total = $Price * $Count;
        $Article = array("id" => $this->getId(), "article_number" => $Article_number, "name" => $Name, "image" => $Image, "price" => $Price, "count" => $Count, "total" => $Total);
        $this->setId($_SESSION['id'] + 1);
        echo $_SESSION['id'];
        array_push($cart, $Article);
        $_SESSION['cart'] = $cart;
    }

    /**
     * Show all Articles from Array in an table
     */
    public function getCart()
    {
        if ($this->getCount() == 0) {
            echo '<script type = "text/javascript" >
            document.getElementById("empty").style.display = "block";
            document.getElementById("basket-icon").style.display = "none";
            document.getElementById("filled").style.display = "none";
            document.getElementById("step-one").style.display = "none";
             </script>';
        } else if ($this->getCount() != 0) {
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
     * Returns one Article in Cart
     * @param int $id
     */
    public function getArticle(int $id)
    {
        $cart = $_SESSION['cart'];
        return $cart[$id];
    }

    /**
     * Clear Cart
     */
    public function clearCart()
    {
        $_SESSION['cart'] = array();
        $this->setId(0);
    }

    /**
     * Remove Article
     * @param int $id
     */
    public function removeArticle(int $id)
    {
        $cart = $_SESSION['cart'];
        unset($cart[$id]);
        $_SESSION['cart'] = $cart;
    }

    /**
     * Get Article Count in Cart
     */
    public function getCount()
    {
        return count($_SESSION['cart']);
    }
}



