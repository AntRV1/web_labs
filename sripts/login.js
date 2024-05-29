document.addEventListener("DOMContentLoaded", (event) => {
  const formData = {
    email: '',
    password: '',
  }

  const eyeButton = document.getElementById('eye-button');
  const field = document.querySelectorAll('.login-form__field');
  const email = document.getElementById('email');
  const errorMsg = document.getElementById('email-error-msg');
  const form = document.getElementById('login-form');  
  const psw = document.getElementById('password');

  const emailValidChars = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/;
  const emptyEmail = 'Email is required.';
  const invalidEmail = 'Incorrect email format. Correct format is ****@**.**';

  let emailReady = false;

  function switchPassword() {

    eyeButton.classList.toggle('hide-button');
    eyeButton.classList.toggle('show-button');
    if (eyeButton.classList.contains('hide-button')) {
      psw.type = 'password';
    } else {
      psw.type = 'text';
    };
  };

  function checkPassword() {
    const pswError = document.getElementById('psw-error-msg');
    const pswErrorMsg = 'Password is required.';
    let str = psw.value.trim();

    if ((str.length < 5) || (str.length > 255)) {
      pswError.classList.remove('hide');
      psw.classList.add('invalid')
      pswError.innerText = pswErrorMsg;
    } else {
      pswError.classList.add('hide');
      psw.classList.remove('invalid')
      psw.classList.add('valid')
    };
  };

  function checkInput() {
    field.forEach(field => {
      field.addEventListener('blur', () => {
        let str = field.value.trim();

        if ((str.length >= 5) && (str.length <= 255)) {
          field.classList.add('valid');
          field.classList.remove('invalid');
        } else {
          field.classList.add('invalid');
          field.classList.remove('valid');
        };

        if (field.value.length > 0) {
          field.classList.add('not-empty');
        } else {
          field.classList.remove('not-empty');
        };
      });
    });
  };

  function emailValid(value) {
    return emailValidChars.test(value);
  }

  function checkEmail() {
    if (emailValid(email.value)) {
      errorMsg.classList.add('hide');
      email.classList.remove('invalid');
      email.classList.add('valid');
      return emailReady = true;
    } else {
      errorMsg.classList.remove('hide');
      email.classList.add('invalid')
      if (email.value.length == 0) {
        errorMsg.innerHTML = emptyEmail;
      } else {
        errorMsg.innerHTML = invalidEmail;
      };
      return emailReady = false;
    };
  };

  function checkForm(event, emailReady) {
    event.preventDefault();
    
    const logIn = document.getElementById('LogIn');
    const createAccount = document.getElementById('createAccount');    

    const error = document.getElementById('error');
    const errorMsg = document.getElementById('error-msg');
    const checkField = 'A-Ah! Check all fields,';
    const incorrectField = 'Email or password is incorrect.';
    let pswLen = psw.value.trim();

    if ((psw.value.length >= 5) && (checkEmail())) {
      console.log('ok');
      submitForm();
      error.classList.add('hide-error');
      error.classList.remove('show-error');      
    } else {          
      error.classList.remove('hide-error');
      error.classList.add('show-error');
      errorMsg.innerText = checkField;
      if ((psw.value.length > 0) && (email.value.length > 0)) {
        errorMsg.innerText = incorrectField;
      };
    };    
  };

  function onEmailChange(event) {
    formData.email = event.target.value.trim();
    console.log(formData.email)
  };

  function onPasswordChange(event) {
    formData.password = event.target.value.trim();
    console.log(formData.password)
  };

  function initEventListeners() {
    eyeButton.addEventListener('click', switchPassword);
    email.addEventListener('blur', checkEmail);
    psw.addEventListener('blur', checkPassword);
    email.addEventListener('input', onEmailChange);
    psw.addEventListener('input', onPasswordChange);
    form.addEventListener('submit', checkForm);
  };

  async function submitForm() {
       
    let response = await fetch('/api-login.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'aplication/json;charset=utf-8'
      },
      body: JSON.stringify(formData)
    });
  
    console.log(response);
  };

  initEventListeners();
  checkInput();
});
