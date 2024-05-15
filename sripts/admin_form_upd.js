const postData = {
  title: '',
  subtitle: '',
  authorName: '',
  authorPhoto: '',
  publishDate: '',
  cardPreviewDate: '',
  articleImage: '',
  cardImage: '',
  content: '',
};

const defaultTitle = 'New Post';
const defaultSubtitle = 'Please, enter any description';
const defaultAuthorName = 'Enter author name';
const defaultPublishDate = '4/19/2023';
const defaultImageSrc = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAPCAIAAABbdmkjAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAAEnQAABJ0Ad5mH3gAAAAmSURBVChTY/hONBh4pd++fYMyv3/Hzx5S3oLSRAAaKR3YcP3+HQDVIV/h+NFFAwAAAABJRU5ErkJggg==';

const title = document.getElementById('title');
const subtitle = document.getElementById('subtitle');
const authorName = document.getElementById('author-name');
const inputAuthorPhoto = document.getElementById('avatar-box');
const inputArticleImage = document.getElementById('big-image-box');
const inputCardImage = document.getElementById('small-image-box');
const removeAuthorPhoto = document.getElementById('avatar-remove');
const removeBigImage = document.getElementById('big-image-remove');
const removeSmallImage = document.getElementById('small-image-remove');
const publishDate = document.getElementById('date');
const content =document.getElementById('textarea');
const form = document.getElementById('form');

const cardDate = document.getElementById('card-date');

const titleError = document.getElementById('title-error');
const subtitleError = document.getElementById('subtitle-error');
const authorNameError = document.getElementById('author-name-error');
const dateError = document.getElementById('date-error');

const errorForm = document.getElementById('wrong');
const validForm = document.getElementById('correct');

const field = document.querySelectorAll('.form__field');

const postPreview = {
  title: document.getElementById('')
}

function onTitleChange(event) {
  postData.title = event.target.value.trim();  

  invalidatePostPreview();
};

function onSubtitleChange(event) {
  postData.subtitle = event.target.value.trim();

  invalidatePostPreview();
};

function onAuthorNameChange(event) {
  postData.authorName = event.target.value.trim();   
  
  invalidatePostPreview();
}

function onAuthorPhotoChange(event) {
  const file = event.target.files[0];

  readFileAsBase64(file, (result) => {
    postData.authorPhoto = result;

    invalidatePostPreview();
  });
};

function onArticleImageChange(event) {
  const file = event.target.files[0];

  readFileAsBase64(file, (result) => {
    postData.articleImage = result;   

    invalidatePostPreview();
  });
};

function onCardImageChange(event) {
  const file = event.target.files[0];
  const removeAuthorPhoto = document.getElementById('avatar-remove');

  readFileAsBase64(file, (result) => {
    postData.cardImage = result;

    invalidatePostPreview();
  });
};

function removePhoto(event) {
  postData.authorPhoto = '';
  invalidatePostPreview();
};

function removeArticleImage(event) {
  postData.articleImage = '';

  invalidatePostPreview();
};

function removeCardImage(event) {
  postData.cardImage = '';

  invalidatePostPreview();
};

function onPublishDateChange(event) {
  let settedDate = new Date(event.target.value);
  let date = event.target.value;

  postData.cardPreviewDate = [settedDate.getMonth() + 1, [settedDate.getDate(), settedDate.getFullYear()].map(n => n < 10 ? '0' + n : '' + n).join('/')].join('/');
    
  [year, month, day] = date.split('-');
  postData.publishDate = new Date(year, month - 1, day).getTime() / 1000;
    
  invalidatePostPreview();
};

function checkInput() {    
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
      } else {
          field.classList.remove('not-empty');
      };
    });
  });
};

function errorMessage() {
  title.addEventListener('blur', () => {    
    if(postData.title.length < 3) {
      titleError.classList.remove('hide');
    };
  });
  title.addEventListener('input', () => {   
    titleError.classList.add('hide');   
  });

  subtitle.addEventListener('blur', () => {    
    if(postData.subtitle.length < 3) {
      subtitleError.classList.remove('hide');
    };
  });
  subtitle.addEventListener('input', () => {   
      subtitleError.classList.add('hide');   
  });

  authorName.addEventListener('blur', () => {    
    if(postData.authorName.length < 3) {
      authorNameError.classList.remove('hide');
    };
  });
  authorName.addEventListener('input', () => {   
      authorNameError.classList.add('hide');   
  });

  date.addEventListener('change', () => {    
    if(postData.publishDate.length < 3) {
      dateError.classList.remove('hide');
    };
  });
  date.addEventListener('change', () => {   
      dateError.classList.add('hide');   
  });
}

function onContentChange(event) {
  postData.content = event.target.value.trim();
};

function validateForm(event) {
  event.preventDefault();

  if(postData.title.length >= 3
    && postData.subtitle.length >= 3
    && postData.authorName.length >= 3
    && postData.authorPhoto.length >= 3
    && postData.publishDate >= 3
    && postData.articleImage.length >= 3
    && postData.cardImage.length >= 3
    && postData.content.length >= 3) {
      errorForm.classList.add('hide');
      validForm.classList.remove('hide');
      
      // console.log('"image": "'+postData.articleImage+'",');
      // console.log('"title": "'+postData.title+'",');
      // console.log('"subtitle": "'+postData.subtitle+'",');
      // console.log('"author_name": "'+postData.authorName+'",');
      // console.log('"author_avatar": "/static/images/'+postData.authorName.replace(/\s/g, '-')+'.jpg",');
      // console.log('"publish_date": "'+postData.publishDate+'",');
      // console.log('"image_src": "/static/images/'+postData.title.replace(/\s/g, '-')+'.jpg",');
      // console.log('"image_alt": "'+postData.title+'",');
      // console.log('"content": "'+postData.content+'",');
      // console.log('"featured": "0",');
      // console.log('"most_recent": "1",');
      // console.log('"label": "0"');

      addPost();
    } else {
      errorForm.classList.remove('hide');
      validForm.classList.add('hide');
      
    };

    if(postData.title.length >= 3){
      titleError.classList.add('hide');
    } else {
        titleError.classList.remove('hide');
    };

    if(postData.subtitle.length >= 3){
      subtitleError.classList.add('hide');
    } else {
        subtitleError.classList.remove('hide');
    };

    if(postData.authorName.length >= 3){
      authorNameError.classList.add('hide');
    } else {
        authorNameError.classList.remove('hide');
    };

    if(postData.publishDate >= 3){
      dateError.classList.add('hide');
    } else {
        dateError.classList.remove('hide');
    };    
};

async function addPost() {
  const newPost = { 
    image: postData.articleImage.replace(/jpeg|png/g, postData.title.replace(/\s/g, '-')+'.jpg'),    
    // photo: postData.authorPhoto,
    title: postData.title,
    subtitle: postData.subtitle,
    author_name: postData.authorName,
    author_avatar: '/static/images/'+postData.authorName.replace(/\s/g, '-')+'.jpg',
    publish_date: postData.publishDate,
    image_src: '/static/images/'+postData.title.replace(/\s/g, '-')+'.jpg',
    image_alt: postData.title,
    content: postData.content,
    featured: '0',
    most_recent: '1',
    label: '0',    
  }

  let response = await fetch('/api.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'aplication/json;charset=utf-8'
    },
    body: JSON.stringify(newPost)
  });  
};

function initEventListeners() {
  title.addEventListener('input', onTitleChange);
  subtitle.addEventListener('input', onSubtitleChange);
  authorName.addEventListener('input', onAuthorNameChange);
  inputAuthorPhoto.addEventListener('change', onAuthorPhotoChange);  
  inputArticleImage.addEventListener('change', onArticleImageChange);
  inputCardImage.addEventListener('change', onCardImageChange);
  removeAuthorPhoto.addEventListener('click', removePhoto);  
  removeBigImage.addEventListener('click', removeArticleImage);
  removeSmallImage.addEventListener('click', removeCardImage);
  publishDate.addEventListener('change', onPublishDateChange);
  content.addEventListener('blur', onContentChange);
  form.addEventListener('submit', validateForm);
}  
  
function invalidatePostPreview() {
  const postPreviewTitle = document.getElementById('article-title');
  const cardPreviewTitle = document.getElementById('card-title');
  postPreviewTitle.innerText = postData.title || defaultTitle;
  cardPreviewTitle.innerText = postData.title || defaultTitle;

  const postPreviewSubtitle = document.getElementById('article-subtitle');
  const cardPreviewSubtitle = document.getElementById('card-subtitle');
  postPreviewSubtitle.innerText = postData.subtitle || defaultSubtitle;
  cardPreviewSubtitle.innerText = postData.subtitle || defaultSubtitle;

  const cardAuthorName = document.getElementById('card-author-name');
  cardAuthorName.innerText = postData.authorName || defaultAuthorName;

  const authorPhoto = document.getElementById('avatar');
  const cardAuthorPhoto = document.getElementById('card-avatar');
  const avatarUpload = document.getElementById('avatar-upload');
  const avatarNew = document.getElementById('avatar-new');
  const avatarRemove = document.getElementById('avatar-remove');

  authorPhoto.src = postData.authorPhoto;  
  cardAuthorPhoto.src = postData.authorPhoto || defaultImageSrc;
  if(postData.authorPhoto != '') {
    [authorPhoto, avatarNew, avatarRemove].forEach(el => {el.classList.remove('hide')});
    avatarUpload.classList.add('hide');
  } else {
    [authorPhoto, avatarNew, avatarRemove].forEach(el => {el.classList.add('hide')});
    avatarUpload.classList.remove('hide');
  };

  const bigImage = document.getElementById('big-image');
  const articleImage = document.getElementById('article-image');
  const bigImageNew = document.getElementById('big-image-new');
  const bigImageRemove = document.getElementById('big-image-remove');
  const bigImageDescription = document.getElementById('big-image-description');
  bigImage.src = postData.articleImage;
  articleImage.src = postData.articleImage || defaultImageSrc;
  if(postData.articleImage != '') {    
    bigImageDescription.classList.add('hide');
    [bigImage, bigImageNew, bigImageRemove].forEach(el => {el.classList.remove('hide')});
  } else {    
    [bigImage, bigImageNew, bigImageRemove].forEach(el => {el.classList.add('hide')});
    bigImageDescription.classList.remove('hide');
  };

  const smallImage = document.getElementById('small-image');
  const cardImage = document.getElementById('card-image');
  const smallImageNew = document.getElementById('small-image-new');
  const smallImageRemove = document.getElementById('small-image-remove');
  const smallImageDescription = document.getElementById('small-image-description');
  smallImage.src = postData.cardImage;
  cardImage.src = postData.cardImage || defaultImageSrc;
  if(postData.cardImage != '') {    
    [smallImage, smallImageNew, smallImageRemove].forEach(el => {el.classList.remove('hide')});
    smallImageDescription.classList.add('hide');
  } else {
    [smallImage, smallImageNew, smallImageRemove].forEach(el => {el.classList.add('hide')});
    smallImageDescription.classList.remove('hide');
  };

  const cardDate = document.getElementById('card-date');
  cardDate.innerText = postData.cardPreviewDate || defaultPublishDate;
}

  function readFileAsBase64(file, onload) {
    const reader = new FileReader();

    reader.addEventListener('load', () => {
      onload(reader.result);
    },
      false,
    );

    reader.readAsDataURL(file);
  }

initEventListeners();
invalidatePostPreview();
checkInput();
errorMessage();
