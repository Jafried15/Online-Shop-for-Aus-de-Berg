/*
 * <!--
 *   ~ /**
 *   ~ * Copyright (c) 2020, 2020 Veronika Fischer
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
    } else {
        document.getElementById("lieferadresse").style.display = "none";
    }
}
