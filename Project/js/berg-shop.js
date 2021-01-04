/*
 * <!--
 *   ~ /**
 *   ~ * Copyright (c) 2020, 2021 Veronika Fischer
 *   ~ * All Rights Reserved
 *   ~ *
 *   -->
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

function nextStep(current_step) {
    if (current_step === "step-one") {
        document.getElementById("step-one").style.display = "none";
        document.getElementById("step-two").style.display = "block";
        document.getElementById("step-1").classList.remove("active");
        document.getElementById("step-2").classList.add("active");
        document.getElementById("step-1-icon").classList.remove("step-1-white");
        document.getElementById("step-1-icon").classList.add("step-1");
        document.getElementById("step-2-icon").classList.remove("step-2");
        document.getElementById("step-2-icon").classList.add("step-2-white");
        document.getElementById("headline_basket").innerHTML = "Adresse eingeben";
    } else if (current_step === "step-two") {
        document.getElementById("step-two").style.display = "none";
        document.getElementById("step-three").style.display = "block";
        document.getElementById("step-2").classList.remove("active");
        document.getElementById("step-3").classList.add("active");
        document.getElementById("step-2-icon").classList.remove("step-2-white");
        document.getElementById("step-2-icon").classList.add("step-2");
        document.getElementById("step-3-icon").classList.remove("step-3");
        document.getElementById("step-3-icon").classList.add("step-3-white");
        document.getElementById("headline_basket").innerHTML = "Zahlungsart wählen";
    } else if (current_step === "step-three") {
        document.getElementById("step-three").style.display = "none";
        document.getElementById("step-summary").style.display = "block";
        document.getElementById("step-3").classList.add("active");
        document.getElementById("step-3-icon").classList.remove("step-3-white");
        document.getElementById("step-3-icon").classList.add("step-3");
        document.getElementById("filled").style.display = "none";
        document.getElementById("headline_basket").innerHTML = "Zusammenfassung";
        showCart(true);
    }
}


function backStep(current_step) {
    if (current_step === "step-two") {
        document.getElementById("step-one").style.display = "block";
        document.getElementById("step-two").style.display = "none";
        document.getElementById("step-2").classList.remove("active");
        document.getElementById("step-1").classList.add("active");
        document.getElementById("step-2-icon").classList.remove("step-2-white");
        document.getElementById("step-2-icon").classList.add("step-2");
        document.getElementById("step-1-icon").classList.remove("step-1");
        document.getElementById("step-1-icon").classList.add("step-1-white");
        document.getElementById("headline_basket").innerHTML = "Warenkorb";
    } else if (current_step === "step-three") {
        document.getElementById("step-two").style.display = "block";
        document.getElementById("step-three").style.display = "none";
        document.getElementById("step-3").classList.remove("active");
        document.getElementById("step-2").classList.add("active");
        document.getElementById("step-3-icon").classList.remove("step-3-white");
        document.getElementById("step-3-icon").classList.add("step-3");
        document.getElementById("step-2-icon").classList.remove("step-2");
        document.getElementById("step-2-icon").classList.add("step-2-white");
        document.getElementById("headline_basket").innerHTML = "Adresse eingeben";
    } else if (current_step === "step-summary") {
        document.getElementById("step-three").style.display = "block";
        document.getElementById("step-summary").style.display = "none";
        document.getElementById("step-3").classList.add("active");
        document.getElementById("step-3-icon").classList.remove("step-3");
        document.getElementById("step-3-icon").classList.add("step-3-white");
        document.getElementById("filled").style.display = "block";
        document.getElementById("headline_basket").innerHTML = "Zahlungsart wählen";
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
    document.querySelector('[data-action="CLEAR_CART"]').addEventListener('click', () => clearCart(cartItemsDOM));

    document.querySelector('[data-action="CLEAR_ADDRESSES"]').addEventListener('click', () => {
        sessionStorage.removeItem('billingAddress');
        sessionStorage.removeItem('deliveryAddress');
    });

    document.querySelector('[data-action="DELIVERY_ADDRESS"]').addEventListener('click', () => checkAddress());

    document.querySelector('[data-action="BILLING_OPTION"]').addEventListener('click', () => saveBilling());
}

function checkAddress() {
    if (document.getElementById("surname").checkValidity()
        && document.getElementById("lastname").checkValidity()
        && document.getElementById("street").checkValidity()
        && document.getElementById("number").checkValidity()
        && document.getElementById("plz").checkValidity()
        && document.getElementById("ort").checkValidity()
        && document.getElementById("mail").checkValidity()) {
        sessionStorage.setItem('billingAddress', JSON.stringify({
            gender: document.getElementById("gender").value,
            surname: document.getElementById("surname").value,
            lastname: document.getElementById("lastname").value,
            organisation: document.getElementById("organisation").value,
            street: document.getElementById("street").value,
            number: document.getElementById("number").value,
            plz: document.getElementById("plz").value,
            ort: document.getElementById("ort").value,
            mail: document.getElementById("mail").value,
            phone: document.getElementById("tel").value,
        }));
        if (document.getElementById("lieferadresse").style.display === "block") {
            sessionStorage.setItem('deliveryAddress', JSON.stringify({
                gender: document.getElementById("genderLief").value,
                surname: document.getElementById("surnameLief").value,
                lastname: document.getElementById("lastnameLief").value,
                organisation: document.getElementById("organisationLief").value,
                street: document.getElementById("streetLief").value,
                number: document.getElementById("numberLief").value,
                plz: document.getElementById("plzLief").value,
                ort: document.getElementById("ortLief").value,
            }));
        } else {
            sessionStorage.setItem('deliveryAddress', JSON.stringify({
                gender: document.getElementById("gender").value,
                surname: document.getElementById("surname").value,
                lastname: document.getElementById("lastname").value,
                organisation: document.getElementById("organisation").value,
                street: document.getElementById("street").value,
                number: document.getElementById("number").value,
                plz: document.getElementById("plz").value,
                ort: document.getElementById("ort").value,
                mail: document.getElementById("mail").value,
            }));
        }
        nextStep('step-two')
    } else {
        if (document.getElementById("mail").checkValidity()) {
            alert("Keine gültige E-Mail Adresse!")
        } else {
            alert("Bitte überprüfe deine Eingaben!")
        }
    }
}

function saveBilling() {
    let paypal = document.getElementById("paypal");
    if (paypal.checked) {
        sessionStorage.setItem('billingOption', 'PayPal');
    } else {
        sessionStorage.setItem('billingOption', 'Gegen Vorkasse');
    }
    summaryAddressesAndBilling();
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
            url: 'handler.php',
            data: $form.serialize(),
            success: after_form_submitted,
            dataType: 'json'
        });

    });
});
