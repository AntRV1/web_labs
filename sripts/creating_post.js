//Проверка полей

function checkInput() {
  let field = document.querySelectorAll('.form__field');

  field.forEach(field => {
    field.addEventListener('blur', () => {
      if(field.value.length >= 3) {
        field.classList.add('valid');            
      } else if(field.classList.contains('valid')) {
        field.classList.remove('valid');
      }         
    });
  });
}

//Загрузка изображений

// function downloadFile(input) {
//   let preview = document.querySelector("#big-image");
//   let file = input.files[0];
//   let reader = new FileReader();
//   reader.readAsDataURL(file);
  
//   reader.onload = function () {
//     let img = document.createElement('img');
//     img.className = 'form__image';
//     preview.appendChild(img);
//     img.src = reader.result;
//   }
// }

function uploadAvatar() {
  const preview = document.getElementById('avatar');
  const cardAvatar = document.getElementById('card-avatar');
  const file = document.getElementById('avatar-box').files[0];
  const reader = new FileReader();

  reader.addEventListener("load", () => { 
    preview.src = reader.result;
    cardAvatar.src = reader.result;
    },
      false,
    );

  if (file) {
    reader.readAsDataURL(file);
    preview.classList.remove('hide');  
    cardAvatar.classList.remove('hide'); 
  } 
}

function uploadArtImg() {
  const preview = document.getElementById('big-image');
  const artcleImage = document.getElementById('article-image');
  const file = document.getElementById('big-image-box').files[0];
  const reader = new FileReader();

  reader.addEventListener("load", () => { 
    preview.src = reader.result;
    artcleImage.src = reader.result;
    },
      false,
    );

  if (file) {
    reader.readAsDataURL(file);
    preview.classList.remove('hide');  
    artcleImage.classList.remove('hide'); 
  } 
}

function uploadCardImg() {
  const preview = document.getElementById('small-image');
  const cardImage = document.getElementById('card-image');
  const file = document.getElementById('small-image-box').files[0];
  const reader = new FileReader();

  reader.addEventListener("load", () => { 
    preview.src = reader.result;
    cardImage.src = reader.result;
    },
      false,
    );

  if (file) {
    reader.readAsDataURL(file);
    preview.classList.remove('hide');  
    cardImage.classList.remove('hide'); 
  } 
}