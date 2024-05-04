<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/styles/creating_post.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen&display=swap" rel="stylesheet"> 
    <script src="./sripts/creating_post.js" async></script>   
    <title>Creating post</title>
</head>
<body class="body">
    <header class="header">
        <div class="container running-title">
            <a class="header__logo" href="/creating_post">Escape.</a>
            <div class="header__menu">
                <button class="header__navigation">N</button>
                <button class="header__out-button"></button>
            </div>  
        </div>
    </header>
    <main class= "container">
        <div class="main__title-block">
            <span class="main__wrapper">
                <h1 class="main__title">New Post</h1>
                <p class="main__subtitle">Fill out the form bellow and publish your article</p>
            </span>
            <button class="main__button-submit">Publish</button>
        </div>
        <form action="" class="form">
            <div class="form__info">
                <h2 class="form__title">Main Information</h2>
                <span class="form__wrapper">
                    <div class="form__upload">
                        <div class="form__field_wrapper">
                            <label for="title" class="form__label">Title</label>
                            <input type="text" class="form__field" id="title">
                            <!-- <p class="login-form__wrapper_error-msg" id="error-msg">Error</p> -->
                        </div>
                        <div class="form__field_wrapper">
                            <label for="subtitle" class="form__label">Short description</label>
                            <input type="text" class="form__field" id="subtitle">
                            <!-- <p class="login-form__wrapper_error-msg" id="error-msg">Error</p> -->
                        </div>
                        <div class="form__field_wrapper">
                            <label for="author-name" class="form__label">Author name</label>
                            <input type="text" class="form__field" id="author-name">
                            <!-- <p class="login-form__wrapper_error-msg" id="error-msg">Error</p> -->
                        </div>
                        <div class="form__field_wrapper">
                            <label for="avatar-box" class="form__label">Author photo</label>
                            <div class="form__avatar_wrapper">
                                <label for="avatar-box" class="form__avatar-upload">
                                    <input type="file" class="hide" id="avatar-box" onchange="uploadAvatar()" accept=".png, .jpg, .jpeg, .gif">
                                    <!-- <div class="form__icon">
                                        <img src="../images/icon/camera.png" class="form__icon-img">                                    
                                    </div> -->
                                    <img class="form__image avatar hide" src="" id="avatar">
                                    <!-- <p class="form__icon-name avatar-name">Upload</p>                                 -->
                                </label>
                                <label for="avatar-box" class="form__avatar-update">Upload</label>                                
                            </div>
                            <!-- <p class="login-form__wrapper_error-msg" id="error-msg">Error</p> -->
                        </div>
                        <div class="form__field_wrapper">
                            <label for="date" class="form__label">Publish date</label>
                            <input type="date" class="form__field date" id="date">
                            <!-- <p class="login-form__wrapper_error-msg" id="error-msg">Error</p> -->
                        </div>
                        <div class="form__field_wrapper">
                            <label for="big-image-box" class="form__label">Hero image</label>
                            <label for="big-image-box" class="form__img-upload big" id="big-image-label">
                                <input type="file" class="hide" id="big-image-box" onchange="uploadArtImg()" accept=".png, .jpg, .jpeg, .gif">
                                <div class="form__icon">
                                    <img src="../images/icon/camera.png" class="form__icon-img">
                                    <p class="form__icon-name">Upload</p>
                                </div>
                                <img class="form__image hide" src="" id="big-image">                                
                            </label>                            
                            <p class="form__description">Size up to 10mb. Format: png, jpeg, gif.</p>
                            <!-- <p class="login-form__wrapper_error-msg" id="error-msg">Error</p> -->
                        </div>
                        <div class="form__field_wrapper">
                            <label for="small-image-box" class="form__label">Hero image</label>
                            <label for="small-image-box" class="form__img-upload small">
                                <input type="file" class="hide" id="small-image-box" onchange="uploadCardImg()" accept=".png, .jpg, .jpeg, .gif">
                                <div class="form__icon">
                                    <img src="../images/icon/camera.png" class="form__icon-img">
                                    <p class="form__icon-name">Upload</p>
                                </div>
                                <img class="form__image hide" src="" id="small-image">
                            </label>
                            <p class="form__description">Size up to 5mb. Format: png, jpeg, gif.</p>
                            <!-- <p class="login-form__wrapper_error-msg" id="error-msg">Error</p> -->
                        </div>
                    </div>
                    <div class="form__preview">
                        <div class="form__article">
                            <h3 class="form__preview_title">Article preview</h3>
                            <div class="form__outer_article-frame">
                                <div class="form__inner_article-frame">
                                    <span class="form__button-wrapper">
                                        <button class="form__article_button">
                                            <span class="form__circle"></span>
                                            <span class="form__circle"></span>
                                            <span class="form__circle"></span>
                                        </button>
                                    </span>
                                    <div class="form__article_title-block">
                                        <h4 class="form__article_title">New Post</h4>
                                        <p class="form__article_subtitle">Please, enter any description</p>
                                    </div>
                                    <div class="form__preview_img article" id="article-img">
                                        <img class="form__image hide" src="" id="article-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form__post">
                            <h3 class="form__preview_title">Post card preview</h3>
                            <div class="form__outer_post-frame">
                                <div class="form__inner_post-frame">
                                    <div class="form__preview_img post">
                                        <img class="form__image hide" src="" id="card-image">
                                    </div>
                                    <div class="form__post_title-block">
                                        <h4 class="form__post_title">New Post</h4>
                                        <p class="form__post_subtitle">Please, enter any description</p>
                                    </div>
                                    <div class="form__post_info">
                                        <div class="form__post_author">
                                            <div class="form__author-avatar">
                                                <img class="form__image avatar hide" src="" id="card-avatar">
                                            </div>
                                            <p class="form__author-name">Enter author name</p>
                                        </div>
                                        <p class="form__publish-date">4/19/2023</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
            </div>
            <div class="form__content">
                <h2 class="form__title">Content</h2>
                <label class="form__label" for="textarea">Post content (plain text)</label>
                <textarea type="text" class="form__textarea" id="textarea" placeholder="Type anything you want ..."></textarea>
            </div>
        </form>
    </main>
</body>
</html>