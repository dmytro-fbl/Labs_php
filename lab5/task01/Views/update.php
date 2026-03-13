<form action="handler.php?page=update" method="post">
    <input type="text" name="login" placeholder="Логін" value="<?php echo htmlspecialchars($user['login'])?>" required><br><br>
    <input type="password" name="password" placeholder="Новий пароль"><br><br>
    <input type="text" name="first_name" placeholder="Ім'я" value="<?php echo htmlspecialchars($user['first_name'])?>" required><br><br>
    <input type="text" name="last_name" placeholder="Прізвище" value="<?php echo htmlspecialchars($user['last_name'])?>" required><br><br>
    <input type="email" name="email" placeholder="Почта" value="<?php echo htmlspecialchars($user['email'])?>" required><br><br>
    <input type="text" name="phone" placeholder="Телефон" value="<?php echo htmlspecialchars($user['phone'])?>" required><br><br>
    <input type="date" name="birth_date" value="<?php echo htmlspecialchars($user['birth_date'])?>" required><br><br>
    <input type="text" name="country" placeholder="Країна" value="<?php echo htmlspecialchars($user['country'])?>" required><br><br>
    <input type="text" name="avatar_url" placeholder="Посилання на картинку" value="<?php echo htmlspecialchars($user['avatar_url'])?>" required><br><br>
    <button type="submit">Оновити</button>
</form>