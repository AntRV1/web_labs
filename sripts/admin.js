// Переключатель Password: показать/скрыть пароль

let psw = document.querySelector('#password');
let checkbox = document.querySelector('#hide');

checkbox.addEventListener('click', () => {
  checkbox.classList.toggle('hide');
  checkbox.classList.toggle('show');
  psw.type = psw.type === 'password' ? 'text' : 'password';
});

// Переключатель классов Input в зависимости от: пусто/не пусто

let field = document.querySelectorAll('input');

field.forEach(field => {
  field.addEventListener('blur', () => {
    if(field.value.length != 0) {
      field.classList.add('active');            
    } else if(field.classList.contains('active')) {
        field.classList.remove('active');
    }         
  });
});

//Валидация  email

const emailValidChars = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/;
let emailInput = document.querySelector('#email');
let emailReady = false;

function emailValid(value) {
  return emailValidChars.test(value);
}

function checkEmail() {
  if (emailValid(emailInput.value)) {
    console.log('email valid');
    emailReady = true;
  } else {
      console.log('email invalid');
  }
};

emailInput.addEventListener('blur', checkEmail);

// Проверка пароля
function checkPassword() {
  
}; 

// Проверка заполнения формы

let form = document.getElementById('login-form');

function checkForm(form, emailReady) { 
  form.preventDefault();
  
  let psw = document.getElementById('password');

  // const div = document.createElement('div');
  // const parentElement = document.querySelector('.login-form__title');
  // const img = document.createElement('img');
  // img.src = 'images/icon/alert-circle.png';
  // img.className = 'login-form__warning-icon';
  // div.className = 'login-form__error';  
  // div.innerText = 'A-Ah! Check all fields,';

  let error = document.getElementById('error');
  const div = document.createElement('div');
  const parentElement = document.getElementById('error-msg');
  let innerText = 'A-Ah! Check all fields,';

  if((psw.value.length >= 3) && (emailReady = true)) {
    console.log('ok');
  } else {  
      console.log('555');      
      error.classList.add('login-form__error-show');
      parentElement.innerHTML = innerText;      
  }
};
