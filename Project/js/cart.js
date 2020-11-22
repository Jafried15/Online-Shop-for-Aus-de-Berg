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

const cartDOM = document.querySelector('.cart');

const addToCartButtons = document.querySelectorAll('[data-action="ADD_TO_CART"]');
addToCartButtons.forEach(addItemToCart => {
    addItemToCart.addEventListener('click', () => {
        const productDOM = document.getElementById(addItemToCart.getAttribute("data-target"));
        console.log(productDOM)
        const product = {
            article_number: productDOM.querySelector('.product-name').getAttribute('data-article_number'),
            image: productDOM.querySelector('.product-image').getAttribute('src'),
            name: productDOM.querySelector('.product-name').innerText,
            price: productDOM.querySelector('.product-price').innerText,
            count: document.getElementById(productDOM.querySelector('.product-count').id).value,
        };

        console.table(product)

        const isInCart = (cart.filter(cartItem => (cartItem.article_number === product.article_number)).length > 0);
        if (!isInCart) {
            cartDOM.insertAdjacentHTML('beforeend', `
             <div class="cart-item">
                 <img class="cart-item-image" src="${product.image}" alt="${product.name}">
                 <h3 class="cart-item-name">${product.name}</h3>
                 <h3 class="cart-item-price">${product.price}</h3>
                 <h3 class="cart-item-count">${product.count}</h3>
            </div>
            `);

            cart.push(product);
        }

    })
});
