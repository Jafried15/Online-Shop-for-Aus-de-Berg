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
