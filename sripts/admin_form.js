//Проверка полей

function checkInput() {//valid
  let field = document.querySelectorAll('.form__field');
  
  field.forEach(field => {
    field.addEventListener('blur', () => {
      
      let str = field.value.trim();
      
      if(str.length >= 3) {
        field.classList.add('valid');

        field.classList.remove('invalid');          
          
      } else {
          field.classList.add('invalid');

          field.classList.remove('valid');
      };
      
      if(field.value.length > 0) {
        field.classList.add('not-empty');            
      } else if(field.classList.contains('not-empty')) {
          field.classList.remove('not-empty');
      };

    });
  });
};

// Вывод ошибок

function errorMessage() {
  let title = document.getElementById('title');
  let subtitle = document.getElementById('subtitle');
  let authorName = document.getElementById('author-name');
  let date = document.getElementById('date');
  const titleError = document.getElementById('title-error');
  const subtitleError = document.getElementById('subtitle-error');
  const authorNameError = document.getElementById('author-name-error');
  const dateError = document.getElementById('date-error');

  title.addEventListener('blur', () => {
    let str = title.value.trim();
    if(str.length < 3) {
      titleError.classList.remove('hide');
    };
  });
  title.addEventListener('input', () => {   
    titleError.classList.add('hide');   
  });

  subtitle.addEventListener('blur', () => {
    let str = subtitle.value.trim();
    if(str.length < 3) {
      subtitleError.classList.remove('hide');
    };
  });
  subtitle.addEventListener('input', () => {   
      subtitleError.classList.add('hide');   
  });

  authorName.addEventListener('blur', () => {
    let str = authorName.value.trim();
    if(str.length < 3) {
      authorNameError.classList.remove('hide');
    };
  });
  authorName.addEventListener('input', () => {   
      authorNameError.classList.add('hide');   
  });

  date.addEventListener('blur', () => {
    let str = date.value.trim();
    if(str.length < 3) {
      dateError.classList.remove('hide');
    };
  });
  date.addEventListener('input', () => {   
      dateError.classList.add('hide');   
  });
}

//Загрузка изображений

function uploadAvatar() {
  const preview = document.getElementById('avatar');
  const cardAvatar = document.getElementById('card-avatar');
  const newImg = document.getElementById('avatar-new');
  const remove = document.getElementById('avatar-remove');
  const upload = document.getElementById('avatar-upload');
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
    newImg.classList.remove('hide');
    remove.classList.remove('hide');
    upload.classList.add('hide');
  }; 
};

function uploadArtImg() {
  const preview = document.getElementById('big-image');
  const articleImage = document.getElementById('article-image');
  const newImg = document.getElementById('big-image-new');
  const remove = document.getElementById('big-image-remove');
  const file = document.getElementById('big-image-box').files[0];
  const description = document.getElementById('big-image-description');
  const reader = new FileReader();

  reader.addEventListener("load", () => { 
    preview.src = reader.result;
    articleImage.src = reader.result;
    },
      false,
    );

  if (file) {
    reader.readAsDataURL(file);
    preview.classList.remove('hide');  
    articleImage.classList.remove('hide'); 
    description.classList.add('hide');
    newImg.classList.remove('hide');
    remove.classList.remove('hide');
  };
};

function uploadCardImg() {
  const preview = document.getElementById('small-image');
  const cardImage = document.getElementById('card-image');
  const newImg = document.getElementById('small-image-new');
  const remove = document.getElementById('small-image-remove');
  const file = document.getElementById('small-image-box').files[0];
  const description = document.getElementById('small-image-description');
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
    description.classList.add('hide');
    newImg.classList.remove('hide');
    remove.classList.remove('hide'); 
  }; 
};

//Удаление изображений

function removeAvatar() {
  const preview = document.getElementById('avatar');
  const remove = document.getElementById('avatar-remove');
  const newImg = document.getElementById('avatar-new');
  const avatar = document.getElementById('card-avatar');
  const upload = document.getElementById('avatar-upload');

  remove.addEventListener('click', () => {
    preview.src = "";
    avatar.src = "";
    preview.classList.add('hide');
    avatar.classList.add('hide');
    newImg.classList.add('hide');
    remove.classList.add('hide');
    upload.classList.remove('hide');
  });
};

function removeArtImg() { //Article
  const preview = document.getElementById('big-image');
  const remove = document.getElementById('big-image-remove');
  const newImg = document.getElementById('big-image-new');
  const articleImage = document.getElementById('article-image');
  const description = document.getElementById('big-image-description');

  remove.addEventListener('click', () => {
    preview.src = "";
    articleImage.src = "";
    preview.classList.add('hide');
    articleImage.classList.add('hide');
    newImg.classList.add('hide');
    remove.classList.add('hide');
    description.classList.remove('hide');
  });
};

function removeCardImg() {
  const preview = document.getElementById('small-image');
  const remove = document.getElementById('small-image-remove');
  const newImg = document.getElementById('small-image-new');
  const cardImage = document.getElementById('card-image');
  const description = document.getElementById('small-image-description');

  remove.addEventListener('click', () => {
    preview.src = "";
    cardImage.src = "";
    preview.classList.add('hide');
    cardImage.classList.add('hide');
    newImg.classList.add('hide');
    remove.classList.add('hide');
    description.classList.remove('hide');
  });
};

//Передача значений из инпут в превью

function sendValueTitle() {
  let title = document.getElementById('title');
  let articleTitle = document.getElementById('article-title');
  let cardTitle = document.getElementById('card-title');
  const defaultTitle = "New Post";

  title.addEventListener('blur', () => {
    let str = title.value.trim();
    if(str.length >= 3) {
      articleTitle.innerHTML = str;
      cardTitle.innerHTML = str;      
    } else {
        articleTitle.innerHTML = defaultTitle;
        cardTitle.innerHTML = defaultTitle;
    };
  }); 
};

function sendValueSubtitle() {
  let subtitle = document.getElementById('subtitle');
  let articleSubtitle = document.getElementById('article-subtitle');
  let cardSubtitle = document.getElementById('card-subtitle');
  const defaultSubtitle = "Please, enter any description";

  subtitle.addEventListener('blur', () => {
    let str = subtitle.value.trim();
    if(str.length >= 3) {
      articleSubtitle.innerHTML = str;
      cardSubtitle.innerHTML = str;
    } else {
        articleSubtitle.innerHTML = defaultSubtitle;
        cardSubtitle.innerHTML = defaultSubtitle;
    };
  }); 
};

function sendValueAuthorName() {
  let name = document.getElementById('author-name');
  let cardname = document.getElementById('card-author-name');
  const defaultName = "Enter author name";

  name.addEventListener('blur', () => {
    let str = name.value.trim();
    if(str.length >= 3) {
      cardname.innerHTML = str;
    } else {
        cardname.innerHTML = defaultName;
    };
  });
};

function sendValueDate() {
  let publishDate = document.getElementById('date');
  let cardDate = document.getElementById('card-date');
  const defaultDate = "4/19/2023";

  date.addEventListener('blur', () => {
    let today = new Date();
    // let today = Date.parse(publishDate.value);
    userDate = [today.getMonth() + 1, [today.getDate(), today.getFullYear()].map(n => n < 10 ? '0' + n : '' + n).join('/')].join('/');
    // console.log(today);
    // console.log(userDate);
    // console.log(publishDate.value);
    let str = publishDate.value;
    if(str.length > 0) {
      cardDate.innerHTML = userDate;
    } else {
        cardDate.innerHTML = defaultDate;
    };
  }); 
};

// Валидация
// const form = document.getElementById('form');

// function checkForm(form) {  
//   form.preventDefault();
//   // console.log('fdgvfd');
//   const formCorrect = document.getElementById('correct');
//   const formWrong = document.getElementById('wrong');
//   const submit = document.getElementById('submit');

//   let title = document.getElementById('title');
//   let subtitle = document.getElementById('subtitle');
//   let authorName = document.getElementById('author-name');
//   let avatar = document.getElementById('avatar');
//   let date = document.getElementById('date');
//   let bigImage = document.getElementById('big-image');
//   let smallImage = document.getElementById('small-image');
//   let content = document.getElementById('textarea');
  

//   let titleOk = Boolean;
//   let subtitleOk = Boolean;
//   let authorNameOk = Boolean;
//   let dateOk = Boolean;
//   let avatarOk = Boolean;
//   let bigImageOk = Boolean;
//   let contentOk = Boolean;

//   // let titleVal = "";
//   // let subtitleVal = "";
//   // let authorNameVal = "";
//   // let dateVal = "";
//   // let avatarVal = "";
//   // let bigImageVal = "";
//   // let contentVal = "";

   
//   if(title.value.trim().length >= 3) {
//     let titleVal = title.value.trim();
//     titleOk = true;
//     // console.log(titleVal);
//   } else {
//       titleOk = false;
//   };
//   if(subtitle.value.trim().length >= 3) {
//     let subtitleVal = subtitle.value.trim();
//     subtitleOk = true;
//     // console.log(subtitleVal);
//   } else {
//       subtitleOk = false;
//   };
//   if(authorName.value.trim().length >= 3) {
//     let authorNameVal = authorName.value.trim();
//     authorNameOk = true;
//     // console.log(authorNameVal);
//   } else {
//       authorNameOk = false;
//   };
//   if(date.value.length >= 3) {
//     let dateiVal = date.value;
//     dateOk = true;
//     // console.log(date.value);
//   } else {
//       dateOk = false;
//   };
//   if(avatar.src.length >= 10) {
//     let avatarVal = avatar.src;
//     avatarOk = true
//     // console.log(avatarVal);
//   } else {
//       avatarOk = false;
//   };
//   if(bigImage.src.length >= 10) {
//     let bigImageVal = bigImage.src;
//     bigImageOk = true;
//     // console.log(bigImageVal);
//   } else {
//       bigImageOk = false;
//   };
//   if(content.value.trim().length >= 10) {
//     let contentVal = content.value.trim();
//     contentOk = true;
//     // console.log(contentVal);
//   } else {
//       contentOk = false;
//   };  
  
//   if((titleOk = true) && (subtitleOk = true) && (authorNameOk = true) && (dateOk = true) && (avatarOk = true) && (bigImageOk = true) && (contentOk = true)) {
//     formCorrect.classList.remove('hide');
//     formWrong.classList.add('hide');
//     console.log('ok');
//   } else {
//     formCorrect.classList.add('hide');
//     formWrong.classList.remove('hide');
//     console.log('!!!');
//   };

// }; 

// // "image":
// // "title": "New post",
// // "subtitle": "Very new post.",
// // "author_name": "William Wong",
// // "author_avatar": "/static/images/olga-moiseeva.jpg",
// // "publish_date": "1443176990",
// // "image_src": "/static/images/fox.png",
// // "image_alt": "Лиса",
// // "content": "New content",
// // "featured": "0",
// // "most_recent": "1",
// // "label": "0"