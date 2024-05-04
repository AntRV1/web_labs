<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/styles/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen&display=swap" rel="stylesheet"> 
    <script src="./sripts/admin.js" async></script>   
    <title>Admin Log In</title>
</head>

<body class="body">
    <main class=container>
        <div class="description">
            <a class="description__logo" href="/admin">Escape.</a>
            <p class="description__text">Log in to start creating</p>
        </div>
        <form action="" class="login-form" method="POST" onsubmit="checkForm(event);" id="login-form">
            <h1 class="login-form__title" id="h1">Log In</h1>
            <div class="login-form__error-hide" id='error'>
                <img src="images/icon/alert-circle.png" class="login-form__error-icon">                
                <p class="login-form__errorr-msg" id="error-msg">Error</p>
            </div>
            <div class="login-form__wrapper">
                <label for="email" class="login-form__label">Email</label>
                <input type="email" class="login-form__field" id="email">
                <p class="login-form__wrapper_error-msg" id="error-msg">Error</p>
            </div>
            <div class="login-form__wrapper">
                <label for="password" class="login-form__label">Password</label>
                <input type="password" class="login-form__field" id="password">
                <button class="login-form__icon hide" type="button" id="hide"></button>
                <p class="login-form__wrapper_error-msg" id="error-msg">Error</p>
            </div>       
            <button class=login-form__button type="submit">Log In</button>
        </form> 
    </main>   
</body>

</html>