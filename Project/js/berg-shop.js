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
    expandImg.parentElement.style.display = 'block';
}

/* Modal Dialog */
function showModal(image) {
    const target = image.dataset.target;
    const modal = document.getElementById(target);

    const img = document.getElementById('modal-image');
    img.setAttribute('src', image.src);

    modal.style.display = 'block';
}

/* Close Button */
function closeModal(close) {
    const target = close.parentElement.dataset.target;
    const modal = document.getElementById(target);

    modal.style.display = 'none';
}

function nextStep() {
    window.location.href = 'Address.html';
}

/*function backStep() {
    history.back();
}*/

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

function showShippingAddress(checkbox) {
    const checked = checkbox.checked;
    if (checked) {
        document.getElementById('lieferadresse').style.display = 'block';
        document.getElementById('surnameLief').required = true;
        document.getElementById('lastnameLief').required = true;
        document.getElementById('streetLief').required = true;
        document.getElementById('numberLief').required = true;
        document.getElementById('plzLief').required = true;
        document.getElementById('ortLief').required = true;
    } else {
        document.getElementById('lieferadresse').style.display = 'none';
        document.getElementById('surnameLief').required = false;
        document.getElementById('lastnameLief').required = false;
        document.getElementById('streetLief').required = false;
        document.getElementById('numberLief').required = false;
        document.getElementById('plzLief').required = false;
        document.getElementById('ortLief').required = false;
    }
}

function saveAddress() {
    let billingAddress = {
        Geschlecht: document.getElementById('gender').value,
        Vorname: document.getElementById('surname').value,
        Nachname: document.getElementById('lastname').value,
        Firma: document.getElementById('organisation').value,
        Straße: document.getElementById('street').value,
        Hausnummer: document.getElementById('number').value,
        Postleitzahl: document.getElementById('plz').value,
        Ort: document.getElementById('ort').value,
    }
    sessionStorage.setItem('billingAddress', JSON.stringify(billingAddress));

    if (document.getElementById('different').checked) {
        let deliveryAddress = {
            Geschlecht: document.getElementById('genderLief').value,
            Vorname: document.getElementById('surnameLief').value,
            Nachname: document.getElementById('lastnameLief').value,
            Firma: document.getElementById('organisationLief').value,
            Straße: document.getElementById('streetLief').value,
            Hausnummer: document.getElementById('numberLief').value,
            Postleitzahl: document.getElementById('plzLief').value,
            Ort: document.getElementById('ortLief').value,
        }
        sessionStorage.setItem('deliveryAddress', JSON.stringify(deliveryAddress));
    } else {
        sessionStorage.setItem('deliveryAddress', JSON.stringify(billingAddress));
    }

    let contact = {
        Mail: document.getElementById('mail').value,
        Telefon: document.getElementById('tel').value,
    }

    sessionStorage.setItem('contact', JSON.stringify(contact));
}

function saveBilling() {
    let billingOption;
    /*if (document.getElementById('paypal').checked) {
        billingOption = 'PayPal'
    } else {*/
    billingOption = 'Vorkasse'
    // }
    sessionStorage.setItem('billingOption', billingOption);
}

function switchBilling(method) {
    if (method.id === 'paypal' && method.checked) {
        document.getElementById('prepayment').checked = false;
    } else if (method.id === 'prepayment' && method.checked) {
        document.getElementById('paypal').checked = false;
    }
}

function summaryAddressesAndBilling() {
    const billingAddressDOM = document.querySelector('.billingAddress');
    let billingAddress = JSON.parse(sessionStorage.getItem('billingAddress'));
    billingAddressDOM.insertAdjacentHTML('beforeend', `
        <p>${billingAddress.Geschlecht} ${billingAddress.Vorname} ${billingAddress.Nachname}</p>
        <p>${billingAddress.Straße} ${billingAddress.Hausnummer}</p>
        <p>${billingAddress.Postleitzahl} ${billingAddress.Ort}</p>
        `);

    const deliveryAddressDOM = document.querySelector('.deliveryAddress');
    let deliveryAddress = JSON.parse(sessionStorage.getItem('deliveryAddress'));
    deliveryAddressDOM.insertAdjacentHTML('beforeend', `
        <p>${deliveryAddress.Geschlecht} ${deliveryAddress.Vorname} ${deliveryAddress.Nachname}</p>
        <p>${deliveryAddress.Straße} ${deliveryAddress.Hausnummer}</p>
        <p>${deliveryAddress.Postleitzahl} ${deliveryAddress.Ort}</p>
        `);

    const billingOptionDOM = document.querySelector('.paymentOption');
    let billingOption = sessionStorage.getItem('billingOption');
    billingOptionDOM.insertAdjacentHTML('beforeend', `
        <p>${billingOption}</p>
        `);
}

function addItemsToForm() {
    document.getElementById('hiddenCart').value = JSON.stringify(localStorage.getItem('cart'));
    document.getElementById('hiddenBillingAddress').value = sessionStorage.getItem('billingAddress');
    document.getElementById('hiddenDeliveryAddress').value = sessionStorage.getItem('deliveryAddress');
    document.getElementById('hiddenBillingOption').value = sessionStorage.getItem('billingOption');
    document.getElementById('hiddenContact').value = sessionStorage.getItem('contact');
}
