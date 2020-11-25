/*
 * <!--
 *   ~ /**
 *   ~ * Copyright (c) 2020, 2020 Veronika Fischer
 *   ~ * All Rights Reserved
 *   ~ *
 *   -->
 *
 */

'use strict';

let cart = (JSON.parse(localStorage.getItem('cart')) || []);

const cartDOM = document.querySelector('.cart-table');

const addToCartButtonsDOM = document.querySelectorAll('[data-action="ADD_TO_CART"]');

addToCartButtonsDOM.forEach(addItemToCart => {
    addItemToCart.addEventListener('click', () => {
        const productDOM = document.getElementById(addItemToCart.getAttribute("data-target"));
        const product = {
            article_number: productDOM.querySelector('.product-name').getAttribute('data-article_number'),
            image: productDOM.querySelector('.product-image').getAttribute('src'),
            name: productDOM.querySelector('.product-name').innerText,
            price: productDOM.querySelector('.product-price').innerText,
            count: document.getElementById(productDOM.querySelector('.product-count').id).value,
        };

        const isInCart = (cart.filter(cartItem => (cartItem.article_number === product.article_number)).length > 0);
        if (!isInCart) {
            increaseItemCountAdd(product, product.count);
            cart.push(product);
            localStorage.setItem('cart', JSON.stringify(cart));
        } else {
            cart.push(product);
            localStorage.setItem('cart', JSON.stringify(cart));
        }
    })
});

function increaseItemCountAdd(product, count) {
    cart.forEach(cartItem => {
        if (cartItem.article_number === product.article_number) {
            cartItem.count = parseInt(cartItem.count) + count;
            //cartItemDOM.querySelector('.cart-item-count').innerText = cartItem.count;
            localStorage.setItem('cart', JSON.stringify(cart));

        }
    })
}

function removeItem(product, cartItemDOM) {
    cart.forEach(cartItem => {
        if (cartItem.article_number === product.article_number) {
            cartItemDOM.remove();
            cart = cart.filter(cartItem => cartItem.article_number !== product.article_number);
            localStorage.setItem('cart', JSON.stringify(cart));
        }
    })
}

function showCart() {
    if (cart.length === 0) {
        document.getElementById("empty").style.display = "block";
        document.getElementById("basket-icon").style.display = "none";
        document.getElementById("filled").style.display = "none";
        document.getElementById("step-one").style.display = "none";
    } else {
        cart = JSON.parse(localStorage.getItem('cart'));
        document.getElementById("empty").style.display = "none";
        document.getElementById("basket-icon").style.display = "block";
        document.getElementById("filled").style.display = "block";
        document.getElementById("step-one").style.display = "block";
        cart.forEach(cartItem => {
            addToDOM(cartItem);
        });
    }
}

function addToDOM(product) {
    cartDOM.insertAdjacentHTML('beforeend', `
            <tr class="cart-item" data-article_number="${product.article_number}">
                <td><img class="cart-item-image" src="${product.image}" alt="${product.name}">
                     <h3 class="cart-item-name">${product.name}</h3></td>
                <td><h3 class="cart-item-price">${product.price}</h3></td>
                <td>
                    <button class="quantity-btn" data-action="DECREASE_ITEM">&minus;</button>
                    <h3 class="cart-item-count">${product.count}</h3>
                    <button class="quantity-btn" data-action="INCREASE_ITEM">&plus;</button>
                    <button class="quantity-btn" data-action="REMOVE_ITEM">&times;</button>
                </td>
            </tr>
        `);
    addActionsToButtons(product);
}

function addActionsToButtons(product) {
    const cartItemsDOM = cart.querySelectorAll('.cart-item');
    cartItemsDOM.forEach(cartItemDOM => {
        if (cartItemDOM.getAttribute('data-article_number') === product.article_number) {
            cartItemDOM.querySelector('[data-action="INCREASE_ITEM"]').addEventListener('click', () => increaseItemCountCart(product));
            cartItemDOM.querySelector('[data-action="DECREASE_ITEM"]').addEventListener('click', () => decreaseItemCount(product, cartItemDOM));
            cartItemDOM.querySelector('[data-action="REMOVE_ITEM"]').addEventListener('click', () => removeItem(product, cartItemDOM));
        }
    })
}

function increaseItemCountCart(product) {
    cart.forEach(cartItem => {
        if (cartItem.article_number === product.article_number) {
            if (cartItem.article_number === "1.5" && parseInt(cartItem.count) < 100) {
                cartItem.count = parseInt(cartItem.count) + 20;
            } else {
                cartItem.count = parseInt(cartItem.count) + 25;
            }
            //cartItemDOM.querySelector('.cart-item-count').innerText = cartItem.count;
            localStorage.setItem('cart', JSON.stringify(cart));
        }
    })
}

function decreaseItemCount(product) {
    cart.forEach(cartItem => {
        if (cartItem.article_number === product.article_number && cartItem.count > 25) {
            if (cartItem.article_number === "1.5" && parseInt(cartItem.count) <= 100) {
                cartItem.count = parseInt(cartItem.count) - 20;
            } else {
                cartItem.count = parseInt(cartItem.count) - 25;
            }
            //cartItemDOM.querySelector('.cart-item-count').innerText = cartItem.count;
            localStorage.setItem('cart', JSON.stringify(cart));
        }
    });
}
