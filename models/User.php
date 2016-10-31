<?php
require_once('config/DateBase.php'); 

class User
{
   
   // метод перевіряє відповідність довжини логіна.
    public static function checkLogin($login)
    {
	    if (strlen($login) >= 4) 
		{
		  return true;
	  	}
		
	    return false;
    }
  
   // метод перевіряє відповідність довжини пароля.
    public static function checkPassword($password)
    {
	    if (strlen($password) >= 3) 
		{
		  return true;
	  	}
		
	    return false;
    }
  
    //метод перевіряє наявність в базі даних введених в форму логіна і пароля.
    public static function checkUserData($login,$password) 
	{
	    $db = DateBase::getConnect();
	    $stm = "SELECT * FROM users WHERE login = :login AND password = :password";
        $qu = $db->prepare($stm);
		$qu->bindParam(':login', $login, PDO::PARAM_INT);
		$qu->bindParam(':password', $password, PDO::PARAM_INT);
		$qu->execute();
			
		$user = $qu->fetch();
		if ($user) 
		{
			return $user['id'];
		}
		
		return false;
    }
 
    //метод отримує id з сесії
	public static function auth($userId) 
    {
		 $_SESSION['user'] = $userId;
    }
 
   //метод перевіряє чи авторизован користувач.
   public static function checkLogged()
    {
	    if (isset($_SESSION['user'])) 
		{
		    return $_SESSION['user'];
	    }
	 
        header("Location: //localhost/project1/index.php/user/login");
    }
 
    //метод перевідяє чи авторизований користувач чи ні.
	public static function isGuest()
    {
	    if (isset($_SESSION['user'])) 
		{
		    return false;
		}
		
		 return true;
    }

}
 
 