// Переключатель Password: показать/скрыть пароль

function switchPassword() {
  const eyeButton = document.getElementById('eye-button');
  const psw = document.getElementById('password');  
 
  eyeButton.classList.toggle('hide-button');
  eyeButton.classList.toggle('show-button');
  if(eyeButton.classList.contains('hide-button')) {
    psw.type = 'password';
  } else {
      psw.type = 'text';
  };      
};
    


// Переключатель классов Input в зависимости от: пусто/не пусто

let field = document.querySelectorAll('input');

field.forEach(field => {
  field.addEventListener('blur', () => {
    if(field.value.length > 0) {
      field.classList.add('not-empty');            
    } else {
        field.classList.remove('not-empty');
        field.classList.remove('valid');
    }         
  });
});

//Валидация  email

const emailValidChars = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/;
const email = document.getElementById('email');
const errorMsg = document.getElementById('email-error-msg');
let emailReady = new Boolean(false);
const emptyEmail = 'Email is required.'; 
const invalidEmail = 'Incorrect email format. Correct format is ****@**.**';

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
    if(email.value.length == 0) {
      errorMsg.innerHTML = emptyEmail;      
    } else {
      errorMsg.innerHTML = invalidEmail;      
    };
    return emailReady = false;
  };
};

email.addEventListener('blur', checkEmail);

// Проверка пароля

function checkPassword() {
  let psw = document.getElementById('password');
  const pswError = document.getElementById('psw-error-msg');
  const pswErrorMsg = 'Password is required.';

  psw.addEventListener('blur', () => {
    if(psw.value.length < 3) {
      pswError.classList.remove('hide');
      psw.classList.add('invalid')
      pswError.innerHTML = pswErrorMsg;
    } else {
      pswError.classList.add('hide');
      psw.classList.remove('invalid')
      psw.classList.add('valid')
    };
  });  
}; 

// Проверка заполнения формы

let form = document.getElementById('login-form');

function checkForm(form, emailReady) { 
  form.preventDefault();
  
  let psw = document.getElementById('password');
  const error = document.getElementById('error');
  const errorMsg = document.getElementById('error-msg');
  const checkField = 'A-Ah! Check all fields,';
  const incorrectField = 'Email or password is incorrect.';
  const email = document.getElementById('email');

  if((psw.value.length >= 3) && (checkEmail())) {
    console.log('ok');
    error.classList.add('hide');
  } else {       
      error.classList.remove('hide');
      errorMsg.innerHTML = checkField;
      if((psw.value.length > 0) && (email.value.length > 0)) {
        errorMsg.innerHTML = incorrectField;
      };            
  };
};

function initEventListeners() {

};

initEventListeners();
