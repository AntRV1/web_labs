document.addEventListener("DOMContentLoaded", (event) => {
  
  const burgerButton = document.getElementById('burger-button');
  const burgerLink = document.querySelectorAll('#burger-link');
  const buttonLine = document.getElementById('button-line');


  const emailValidChars = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/;
  const email = document.getElementById('email');
  const errorMsg = document.getElementById('email-error-msg');
  const emptyEmail = 'Email is required.'; 
  const invalidEmail = 'Incorrect email format. Correct format is ****@**.**';

  function emailValid(value) {
    return emailValidChars.test(value);
  }

  function checkEmail() {
    if (emailValid(email.value)) {      
      errorMsg.classList.add('hide');
      email.classList.remove('invalid');
      // email.classList.add('valid');
      return emailReady = true;
    } else {
      errorMsg.classList.remove('hide');
      email.classList.add('invalid');
      errorMsg.innerHTML = invalidEmail;
      // if(email.value.length == 0) {
      //   errorMsg.innerHTML = emptyEmail;      
      // } else {
      //   errorMsg.innerHTML = invalidEmail;      
      // };
      // return emailReady = false;
    };
  };

  email.addEventListener('blur', checkEmail);


  const burgerMenu = document.getElementById('list');


  function onClickButton(event) {
    burgerMenu.classList.toggle('hide');
    buttonLine.classList.toggle('rotate-line');
  };

  function initEventListeners() {
    burgerButton.addEventListener('click', onClickButton);

    // window.addEventListener('resize', () => {

    //   burgerMenu.classList.add('hide');
    //   buttonLine.classList.add('rotate-line');
    // })
  };

  initEventListeners();
  // onClickBurgerLink();

});