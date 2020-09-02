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
    if (current_step.toString().localeCompare("step-one")) {
        document.getElementById('step-one').style.display = "none";
        document.getElementById('step-two').style.display = "block";
        if (current_step.toString().localeCompare("step-two")) {
            document.getElementById("step-two").style.display = "none";
            document.getElementById("step-three").style.display = "block";
        }
    }
}

function backStep(current_step) {
    if (current_step.toString().localeCompare("step-two")) {
        document.getElementById("step-one").style.display = "block";
        document.getElementById("step-two").style.display = "none";
        if (current_step.toString().localeCompare("step-three")) {
            document.getElementById('step-two').style.display = "block";
            document.getElementById('step-three').style.display = "none";
        }
    }
}
