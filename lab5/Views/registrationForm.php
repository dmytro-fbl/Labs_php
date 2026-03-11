    <form action="handler.php?page=register" method="post">

        <input type="text" name="login" placeholder="Логін" required><br><br>
        <input type="password" name="password" placeholder="Пароль" required><br><br>
        <input type="text" name="first_name" placeholder="Ім'я" required><br><br>
        <input type="text" name="last_name" placeholder="Прізвище" required><br><br>
        <input type="email" name="email" placeholder="Почта" required><br><br>
        <input type="text" name="phone" placeholder="Телефон" required><br><br>
        <input type="date" name="birth_date" required><br><br>
        <input type="text" name="country" placeholder="Країна" required><br><br>
        <input type="text" name="avatar_url" placeholder="Посилання на картинку" required><br><br>
        <button type="submit">Зареєструватись</button>
    </form>
    <a href="index.php?page=login">Увійти</a>
