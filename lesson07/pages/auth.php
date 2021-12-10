<?php
if($_GET['errors_reg']){
    echo "<h2 style='color: crimson'>{$_GET['errors_reg']}</h2>";
}
if($_GET['noUser']){
    echo "<h2 style='color: crimson'>Пользователь не существует! Попробуйте войти снова.</h2>";
    echo "<br><br>";
} 
if($_GET['success_reg']){
    echo "<h2 style='color: darkgreen'>Регистрация прошла успешно! Теперь вы можете войти!</h2>";
}   
?>
<div class='flexcontainer'>
<form class='signIn-form' action="../controllers/user.php" method="post">
    <h2>Войти</h2>
    <br>
    <p>Ваш логин</p>
    <input type="text" name="login">
    <p>Ваш пароль</p>
    <input type="password" name="password">
    <br>
    <br>
    <input type="submit" name="signIn" value="Войти">
</form>

<form class='signUp-form' action="controllers/user.php" method="post">
    <h2>Регистрация</h2>
    <br>
    <p>Придумайте логин</p>
    <input type="text" name="login">
    <p>Придумайте пароль</p>
    <input type="password" name="password">
    <p>Ваше имя</p>
    <input type="text" name="username">
    <p>Ваш email</p>
    <input type="email" name="email">
    <p>Ваш телефон</p>
    <input type="phone" name="phone">
    <p>Адрес доставки</p>
    <textarea name="address" cols="30" rows="10"></textarea>
    <br>
    <br>
    <input type="submit" name="singUp" value="Зарегистрироваться">
</form>
</div>