<?php

if (!empty($_POST)) {
    login();
}

if (session_status() === PHP_SESSION_ACTIVE) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Victor+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <div class="title">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="rgb(0, 255, 0)">
                <path d="M120-80v-60h100v-30h-60v-60h60v-30H120v-60h120q17 0 28.5 11.5T280-280v40q0 17-11.5 28.5T240-200q17 0 28.5 11.5T280-160v40q0 17-11.5 28.5T240-80H120Zm0-280v-110q0-17 11.5-28.5T160-510h60v-30H120v-60h120q17 0 28.5 11.5T280-560v70q0 17-11.5 28.5T240-450h-60v30h100v60H120Zm60-280v-180h-60v-60h120v240h-60Zm180 440v-80h480v80H360Zm0-240v-80h480v80H360Zm0-240v-80h480v80H360Z" />
            </svg>
            <div class="title">
                <Span>Todoes</span>
            </div>
        </div>
    </header>
    <div class="login-form-container">
        <form method="POST" action="createaccount.php" class="login-form">
            <span id=login-title>
                > Register
            </span>

            <div class="login-text-container">
                <input id="mail" class="login-text" type="text" name="mail" placeholder="E-Mail">
                <input id="username" class="login-text" type="text" name="username" placeholder="Username">
                <input id="password" class="login-text" type="password" name="password" placeholder="Password">
                <input id="passwordconfirm" class="login-text" type="password" placeholder="Confirm password">
            </div>
            <div class="login-submit-container">
                <input id="login-submit" disabled type="submit" type="button" value="Register">
                <a class="" href="login.php">> Go back to login</a>
            </div>
            <span id="error">
                <?php
                if(!empty($_GET)) {
                    echo $_GET[error] == "0" ? $_GET[error] == "1" ? : "> Mail already used" : "> Username already used";
                }
                ?>
            </span>
        </form>
    </div>
</body>
</html>

<script src="accountscript.js"></script>