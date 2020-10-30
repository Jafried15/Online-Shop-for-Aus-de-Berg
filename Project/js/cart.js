/*
 * <!--
 *   ~ /**
 *   ~ * Copyright (c) 2020, 2020 Veronika Fischer
 *   ~ * All Rights Reserved
 *   ~ *
 *   -->
 *
 */

// ************************************************
// Shopping Cart API
// ************************************************

const shoppingCart = (function () {
    // =============================
    // Private methods and properties
    // =============================
    let cart = [];

    // Constructor
    function Item(article_number, name, image, price, count) {
        this.article_number = article_number;
        this.name = name;
        this.image = image;
        this.price = price;
        this.count = count;
    }

    // Save cart
    function saveCart() {
        sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }

    // Load cart
    function loadCart() {
        cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }

    if (sessionStorage.getItem("shoppingCart") != null) {
        loadCart();
    }


    // =============================
    // Public methods and properties
    // =============================
    const obj = {};

    // Add to cart
    obj.addItemToCart = function (article_number, name, image, price, count) {
        for (let item in cart) {
            if (cart[item].name === name) {
                cart[item].count++;
                saveCart();
                return;
            }
        }
        let item = new Item(article_number, name, image, price, count);
        cart.push(item);
        saveCart();
    }

    // Set count for item
    obj.setCountForItem = function (article_number, count) {
        for (let item in cart) {
            if (cart[item].article_number === article_number) {
                cart[item].count = count;
                break;
            }
        }
    };

    // Remove item from cart
    obj.reduceCount = function (article_number) {
        for (let item in cart) {
            if (cart[item].article_number === article_number) {
                cart[item].count--;
                if (cart[item].count === 0) {
                    cart.splice(item, 1);
                }
                break;
            }
        }
        saveCart();
    }

    // Remove all items from cart
    obj.removeItemFromCart = function (article_number) {
        for (let item in cart) {
            if (cart[item].article_number === article_number) {
                cart.splice(item, 1);
                break;
            }
        }
        saveCart();
    }

    // Clear cart
    obj.clearCart = function () {
        cart = [];
        saveCart();
    }

    // Count cart
    obj.totalCount = function () {
        let totalCount = 0;
        for (let item in cart) {
            totalCount += cart[item].count;
        }
        return totalCount;
    }

    // Total cart
    obj.totalCart = function () {
        let totalCart = 0;
        for (let item in cart) {
            totalCart += cart[item].price * cart[item].count;
        }
        return Number(totalCart.toFixed(2));
    }

    // List cart
    obj.listCart = function () {
        let cartCopy = [];
        let item;
        let itemCopy;
        for (let i in cart) {
            item = cart[i];
            itemCopy = {};
            for (let p in item) {
                itemCopy[p] = item[p];

            }
            itemCopy.total = Number(item.price * item.count).toFixed(2);
            cartCopy.push(itemCopy)
        }
        return cartCopy;
    }

    obj.getCart = function () {
        return cart;
    }
    return obj;
})();


// *****************************************
// Triggers / Events
// *****************************************

// Add item
function addItemToCart(article_number, name, image, price, count) {
    shoppingCart.addItemToCart(article_number, name, image, price, count)
}

// Clear items
function clearCart() {
    shoppingCart.clearCart()
}

// Delete item button
function removeItem(article_number) {
    shoppingCart.removeItemFromCart(article_number);
}

// Item count input
function changeCount(article_number, count) {
    shoppingCart.setCountForItem(article_number, count);
}
