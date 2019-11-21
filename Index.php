<?php

require "db.php";
?>
<?php if(isset($_SESSION['logged_user']) ): ?>
	Авторизоваг!
<?php else : ?>
<a href="/login.php">Авторизоваться</a></br>
<a href="/signup.php">Регистрация</a>
<?php endif; ?>