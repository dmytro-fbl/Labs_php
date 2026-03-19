<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="js/script.js"></script>
</head>
<body>
<form action="" method="post" id="registrationForm">
    <label for="name">Ім'я</label>
    <input type="text" name="name" id="name" placeholder="Ім'я" required><br>

    <label for="email">Почта</label>
    <input type="email" name="email" id="email" placeholder="Почта" required><br>

    <label for="password">Пароль</label>
    <input type="password" name="password" id="password" placeholder="Пароль" required><br>
    <button type="submit">Зареєструватись</button>
</form>
<div id="messageDb"></div>

<button id="getAllUsers">Усі користувачі</button>
<div id="divListUsers"></div>
<hr>

<h2>Вхід</h2>
<form action="" method="post" id="loginForm">
    <input type="email" placeholder="Почта" id="loginEmail"><br>
    <input type="password" placeholder="Пароль" id="loginPass"><br>
    <button type="submit" id="btnLogin">Увійти</button>
</form>

<div id="welcomeBlock" style="display: none;">
    <h2 id="userName"></h2>
    <button onclick="location.reload()">Вийти</button>
</div>

</body>
</html>
