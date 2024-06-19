<?php
session_name('auth');
session_start();

if (isset($_SESSION['id'])) {
    header("Location: admin_form_upd.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/styles/login_admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen&display=swap" rel="stylesheet"> 
    <script src="./sripts/login_admin.js"></script>   
    <title>Login Admin</title>
</head>

<body class="body">
    <main class=container>
        <div class="description">
            <a class="description__logo" href="/admin">Escape.</a>
            <p class="description__text">Log in to start creating</p>
        </div>
        <form action="api-login.php" class="login-form" method="POST" id="login-form" target="_blank">
            <h1 class="login-form__title" id="h1">Log In</h1>
            <div class="login-form__error hide-error" id='error'>
                <img src="images/icon/alert-circle.png" class="login-form__error-icon">                
                <p class="login-form__errorr-msg" id="error-msg"></p>
            </div>
            <div class="login-form__wrapper">
                <label for="email" class="login-form__label">Email</label>
                <input type="email" class="login-form__field" name="email" id="email" autocomplete="off" maxlength="255">
                <p class="login-form__wrapper_error-msg hide" id="email-error-msg"></p>
            </div>
            <div class="login-form__wrapper">
                <label for="password" class="login-form__label">Password</label>
                <input type="password" class="login-form__field" name="password" id="password" autocomplete="off" maxlength="50">
                <button class="login-form__icon hide-button" type="button" id="eye-button"></button>
                <p class="login-form__wrapper_error-msg hide" id="psw-error-msg">Error</p>
            </div> 
            <button class=login-form__button type="submit" id="logIn">Log In</button>               
        </form> 
    </main>   
</body>

</html>