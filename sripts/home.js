//Валидация  email

const emailValidChars = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/;
const email = document.getElementById('email');
const errorMsg = document.getElementById('email-error-msg');
// let emailReady = new Boolean(false);
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
