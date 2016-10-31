<?php

require_once(ROOT.'/models/User.php');

class UserController
{
	
	//метод перевіряє правельність введення логіна і пароля та допускає в кабінет адміністратора.
	public function actionLogin()
	{
		$login = '';
		$password = '';
			
		if (isset($_POST['submit'])) 
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			$errors = false;
			
			if (!User::checkLogin($login)) 
			{
				$errors[] = 'Неправельный логин';
			}
			
			if (!User::checkPassword($password)) 
			{
				$errors[] = 'Неправельный пароль';
			}
			
			$userId = User::checkUserData($login, $password);
			if ($userId == false) 
			{
				$errors[] = 'Неправельно введены даные';
			} 
			else 
			{
				User::auth($userId);
				header("Location: //localhost/project/index.php/cabinet/");
			}
		}
		
		require_once(ROOT.'/views/user/login.php');
	}
	
	//метод закінчує сесію, виходить з адмін частини та здійснює перехід на головну сторінку.
	public function actionLogout()
	{
		unset($_SESSION["user"]);
		header("Location: //localhost/project/index.php/form/");
	}

}
