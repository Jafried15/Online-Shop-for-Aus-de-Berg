/*
 *
 * Copyright (c) 2020, 2021 Veronika Fischer
 * All Rights Reserved
 *
 */

function switchImage(image) {
    const target = image.dataset.target;
    const expandImg = document.getElementById(target);
    expandImg.src = image.src;
    expandImg.parentElement.style.display = "block";
}

/* Modal Dialog */
function showModal(image) {
    const target = image.dataset.target;
    const modal = document.getElementById(target);

    const img = document.getElementById('modal-image');
    img.setAttribute('src', image.src);

    modal.style.display = "block";
}

/* Close Button */
function closeModal(close) {
    const target = close.parentElement.dataset.target;
    const modal = document.getElementById(target);

    modal.style.display = "none";
}

function nextStep() {
    window.location.href = "Address.html";
}

function backStep(current_step) {
    if (current_step === "step-two") {
        window.location.href = "Basket.html";
    } else if (current_step === "step-three") {
        window.location.href = "Address.html";
    } else if (current_step === "step-summary") {
        window.location.href = "Payment.html";
    }
}

function showShippingAddress(checkbox) {
    const checked = checkbox.checked;
    if (checked) {
        document.getElementById("lieferadresse").style.display = "block";
        document.getElementById("surnameLief").required = true;
        document.getElementById("lastnameLief").required = true;
        document.getElementById("streetLief").required = true;
        document.getElementById("numberLief").required = true;
        document.getElementById("plzLief").required = true;
        document.getElementById("ortLief").required = true;
    } else {
        document.getElementById("lieferadresse").style.display = "none";
        document.getElementById("surnameLief").required = false;
        document.getElementById("lastnameLief").required = false;
        document.getElementById("streetLief").required = false;
        document.getElementById("numberLief").required = false;
        document.getElementById("plzLief").required = false;
        document.getElementById("ortLief").required = false;
    }
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
    document.querySelector('[data-action="CLEAR_CART"]').addEventListener('click', () => clearCart());

    document.querySelector('[data-action="CLEAR_ADDRESSES"]').addEventListener('click', () => {
        sessionStorage.removeItem('billingAddress');
        sessionStorage.removeItem('deliveryAddress');
    });
}

function switchBilling(method) {
    if (method.id === "paypal" && method.checked) {
        document.getElementById("prepayment").checked = false;
    } else if (method.id === "prepayment" && method.checked) {
        document.getElementById("paypal").checked = false;
    }
}

function summaryAddressesAndBilling() {
    const billingAddressDOM = document.querySelector('.billingAddress');
    let billingAddress = JSON.parse(sessionStorage.getItem('billingAddress'));
    billingAddressDOM.insertAdjacentHTML('beforeend', `
        <p>${billingAddress.gender} ${billingAddress.surname} ${billingAddress.lastname}</p>
        <p>${billingAddress.street} ${billingAddress.number}</p>
        <p>${billingAddress.plz} ${billingAddress.ort}</p>
        `);

    const deliveryAddressDOM = document.querySelector('.deliveryAddress');
    let deliveryAddress = JSON.parse(sessionStorage.getItem('deliveryAddress'));
    deliveryAddressDOM.insertAdjacentHTML('beforeend', `
        <p>${deliveryAddress.gender} ${deliveryAddress.surname} ${deliveryAddress.lastname}</p>
        <p>${deliveryAddress.street} ${deliveryAddress.number}</p>
        <p>${deliveryAddress.plz} ${deliveryAddress.ort}</p>
        `);

    const billingOptionDOM = document.querySelector('.paymentOption');
    let billingOption = sessionStorage.getItem('billingOption');
    billingOptionDOM.insertAdjacentHTML('beforeend', `
        <p>${billingOption}</p>
        `);
}

$(function () {
    $('#submit').on("click", function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: 'Finish.html',
            data: $form.serialize(),
            success: after_form_submitted,
            dataType: 'json'
        });

    });
});
