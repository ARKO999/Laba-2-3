<?php
require "db.php"; 
$data = $_POST;
if(isset($data['do_signup']) )
{	
	$errors = array();
	if(trim($data['login']) == '')
	{
		$errors[] = 'Введите логин';
	}
		if(trim($data['email']) == '')
	
{
		$errors[] = 'Введите Email';
}
	if( $data['password'] == '' )
	{	
	$errors[] = 'Введите пароль!';
	}
	
		if (trim($data['password2']) !=$data['password'] )
	{
		$errors[] = 'Повторный парольн введен не верно!';
	}
}
if( R::count('users', "login = ?", array($data['login'])) > 0 )
	{
		$errors [] = 'Пользователь с таким логином уже есть!';
	}
if( R::count('users', "Email = ?", array($data['Email'], )) > 0 )
{
		$errors [] = 'Пользователь с таким Email уже есть!';
	}
	if( empty($errors))
		{ 
			$user = R::dispense('users');
	$user->login = $data['login'];
	$user->email = $data['email'];
	$user->password = password_hash($data['password'],
	PASSWORD_DEFAULT);
	R::store($user);
echo'<div style="color: green;">Вы успешно зарегистрированы!
</div><hr>';
	} 
	else 
	{
	echo '<div style="color: red;">'.array_shift($errors).'<
	/div><hr>';
}
?>	

<form action="/signup.php"method="POST">

<p>
<p><strong>Ваш логин</strong>:</p>
<input type="text" name="login" value="<?php echo $data['login']; ?>">
</p>

<p>
<p><strong>Ваш Email</strong>:</p>
<input type="email" name="email"value="<?php echo $data['email']; ?>">
</p>

<p>
<p><strong>Ваш пароль</strong>:</p>
<input type="password" name="password"value="<?php echo $data['password']; ?>">
</p>

<p>
<p><strong>Повторный пароль</strong>:</p>
<input type="password" name="password2"value="<?php echo $data['password2']; ?>">
</p>

<p>
<button type="sumbit"name="do_signup">Зарегистрироваться</button>
</p>
</form> 