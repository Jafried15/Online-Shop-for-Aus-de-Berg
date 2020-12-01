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
            count: parseInt(document.getElementById(productDOM.querySelector('.product-count').id).value),
        };

        const isInCart = (cart.filter(cartItem => (cartItem.article_number === product.article_number)).length > 0);
        if (isInCart) {
            increaseItemCountAdd(product, product.count);
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
        calculateBilling();
    }
}

function addToDOM(product) {
    const total = calculateTotal(product.count, product.price).replace(".", ",");
    cartDOM.insertAdjacentHTML('beforeend', `
            <tr class="cart-item" data-article_number="${product.article_number}">
                <td><img class="cart-item-image" src="${product.image}" alt="${product.name}">
                     <p class="cart-item-name">${product.name}</p></td>
                <td><p class="cart-item-price product-price">${product.price}</p></td>
                <td>
                <div>
                    <button class="quantity-btn fa fa-minus" data-action="DECREASE_ITEM"></button>
                    <p class="cart-item-count">${product.count}</p>
                    <button class="quantity-btn fa fa-plus" data-action="INCREASE_ITEM"></button>
                    <button class="quantity-btn fa fa-trash" data-action="REMOVE_ITEM"></button>
                    </div>
                </td>
                <td>
                    <p class="cart-item-total amount">${total}</p>
                </td>
            </tr>
        `);
    addActionsToButtons(product);
}

function addActionsToButtons(product) {
    const cartItemsDOM = document.querySelectorAll('.cart-item');
    cartItemsDOM.forEach(cartItemDOM => {
        if (cartItemDOM.getAttribute('data-article_number') === product.article_number) {
            cartItemDOM.querySelector('[data-action="INCREASE_ITEM"]').addEventListener('click', () => increaseItemCountCart(product, cartItemDOM));
            cartItemDOM.querySelector('[data-action="DECREASE_ITEM"]').addEventListener('click', () => decreaseItemCount(product, cartItemDOM));
            cartItemDOM.querySelector('[data-action="REMOVE_ITEM"]').addEventListener('click', () => removeItem(product, cartItemDOM));
        }
    })
}

function increaseItemCountCart(product, cartItemDOM) {
    cart.forEach(cartItem => {
        if (cartItem.article_number === product.article_number) {
            if (cartItem.article_number === "1.5" && parseInt(cartItem.count) < 100) {
                cartItem.count = parseInt(cartItem.count) + 20;
            } else {
                cartItem.count = parseInt(cartItem.count) + 25;
            }
            cartItemDOM.querySelector('.cart-item-count').innerText = cartItem.count;
            cartItemDOM.querySelector('.cart-item-total').innerText = calculateTotal(cartItem.count, cartItem.price).replace(".", ",");
            calculateBilling();
            localStorage.setItem('cart', JSON.stringify(cart));
        }
    })
}

function decreaseItemCount(product, cartItemDOM) {
    cart.forEach(cartItem => {
        if (cartItem.article_number === product.article_number && cartItem.count > 25) {
            if (cartItem.article_number === "1.5" && parseInt(cartItem.count) <= 100) {
                cartItem.count = parseInt(cartItem.count) - 20;
            } else {
                cartItem.count = parseInt(cartItem.count) - 25;
            }
            cartItemDOM.querySelector('.cart-item-count').innerText = cartItem.count;
            cartItemDOM.querySelector('.cart-item-total').innerText = calculateTotal(cartItem.count, cartItem.price).replace(".", ",");
            calculateBilling();
            localStorage.setItem('cart', JSON.stringify(cart));
        }
    });
}


function removeItem(product, cartItemDOM) {
    cart.forEach(cartItem => {
        if (cartItem.article_number === product.article_number) {
            cartItemDOM.remove();
            cart = cart.filter(cartItem => cartItem.article_number !== product.article_number);
            localStorage.setItem('cart', JSON.stringify(cart));
            calculateBilling();
        }
    });
}

function calculateTotal(count, price) {
    return (parseFloat(count) * parseFloat(price.replace(",", "."))).toFixed(2);
}

function calculateBilling() {
    let totalItems = 0.0;
    cart.forEach(cartItem => {
        let itemTotal = calculateTotal(cartItem.count, cartItem.price)
        totalItems = (parseFloat(totalItems) + parseFloat(itemTotal)).toFixed(2);
    })
    document.getElementById('totalItem').innerText = totalItems.replace(".", ",");
    document.getElementById('delivery').innerText = "4,99";
    let mwst = (totalItems * 0.19).toFixed(2);
    document.getElementById('mwst').innerText = mwst.replace(".", ",");

    let totalBilling = (parseFloat(totalItems) + 4.99 + parseFloat(mwst)).toFixed(2);
    document.getElementById('totalBilling').innerText = totalBilling.replace(".", ",");
}
