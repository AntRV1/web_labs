document.addEventListener("DOMContentLoaded", (event) => {

    const burgerMenu = document.getElementById('list');
    const burgerButton = document.getElementById('burger-button');
    // const burgerLink = document.querySelectorAll('#burger-link');
    const buttonLine = document.getElementById('button-line');

    function onClickButton(event) {

        burgerMenu.classList.toggle('hide');
        buttonLine.classList.toggle('rotate-line');
    };

    function initEventListeners() {
        burgerButton.addEventListener('click', onClickButton);
    };

    initEventListeners();
})