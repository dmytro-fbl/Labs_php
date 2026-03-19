<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="script.js"></script>
</head>
<body>
<form id="noteForm">
    <input type="hidden" id="noteId">

    <label for="title">Заголовок</label><br>
    <input type="text" id="title" placeholder="Введіть заголовок"><br>

    <label for="text">Заголовок</label><br>
    <textarea rows="4" id="text" placeholder="Введіть заголовок"></textarea><br>

    <button type="submit" id="saveBtn">Зберегти замітку</button>
    <button type="button" id="cancelBtn" style="display: none">Скасувати редагування</button>
</form>
<div id="messageBox"></div>

<hr>
<h3>Список заміток:</h3>
<div id="notesList">

</div>
</body>
</html>
