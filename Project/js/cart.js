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

let cart = [];

const cartDOM = document.querySelector('.cart-table');

const addToCartButtons = document.querySelectorAll('[data-action="ADD_TO_CART"]');
addToCartButtons.forEach(addItemToCart => {
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

            cart.push(product);

            const cartItemsDOM = cartDOM.querySelectorAll('.cart-item');
            cartItemsDOM.forEach(cartItemDOM => {
                if (cartItemDOM.getAttribute('data-article_number') === product.article_number) {
                    cartItemDOM.querySelector('[data-action="INCREASE_ITEM"]').addEventListener('click', () => {
                        cart.forEach(cartItem => {
                            if (cartItem.article_number === product.article_number) {
                                if (cartItem.article_number === "1.5" && parseInt(cartItem.count) < 100) {
                                    cartItem.count = parseInt(cartItem.count) + 20;
                                } else {
                                    cartItem.count = parseInt(cartItem.count) + 25;
                                }
                                cartItemDOM.querySelector('.cart-item-count').innerText = cartItem.count;
                            }
                        })
                    });

                    cartItemDOM.querySelector('[data-action="DECREASE_ITEM"]').addEventListener('click', () => {
                        cart.forEach(cartItem => {
                            if (cartItem.article_number === product.article_number && cartItem.count > 25) {
                                if (cartItem.article_number === "1.5" && parseInt(cartItem.count) <= 100) {
                                    cartItem.count = parseInt(cartItem.count) - 20;
                                } else {
                                    cartItem.count = parseInt(cartItem.count) - 25;
                                }
                                cartItemDOM.querySelector('.cart-item-count').innerText = cartItem.count;
                            }
                        })
                    });

                    cartItemDOM.querySelector('[data-action="REMOVE_ITEM"]').addEventListener('click', () => {
                        cart.forEach(cartItem => {
                            if (cartItem.article_number === product.article_number) {
                                cartItemDOM.remove();
                                cart = cart.filter(cartItem => cartItem.article_number !== product.article_number);
                            }
                        })
                    });
                }
            })
        }
    })
});
