<?php

require_once(ROOT.'/models/User.php');
require_once(ROOT.'/models/Form.php');
require_once(ROOT.'/models/Cabinet.php');

class CabinetController
{
	
	//метод відображає в адмін. частині всі відгуки.
	public function actionIndex()
	{
		$userId = User::checkLogged();
		
		$postsList = array();
		$postsList = Cabinet::getAllRecall();
		
		require_once(ROOT.'/views/cabinet/index.php');
		
	}
	
	//метод зберігає в базі відредактований адміністратором відгук
	public function actionEdit($id)
	{
		$recall = Cabinet::getAllById($id);
		
		if (isset($_POST['save_recall_admin'])) 
		{
			$author = $_POST['author'];
			$e_mail = $_POST['e_mail'];
			$date = $_POST['date'];
			$text_name = $_POST['text_name'];
			$change_admin = $_POST['change_admin'];
		    $edit = Cabinet::editRecallByAdmin($author, $e_mail, $date, $text_name, $change_admin, $id);
			
			header("Location: //localhost/project/index.php/cabinet/");
		}
		
		require_once(ROOT.'/views/cabinet/edit.php');
		
		return ' ';
	}
	
	//метод змінює статус відгука.
	public function actionStatus($id)
	{
		if (isset ($_POST['save'])) 
		{
			$status = "Принят";
			$status_recall = Cabinet::getStatus($id, $status);
			
		    header("Location: //localhost/project/index.php/cabinet/");
		}
		elseif (isset ($_POST['not_save'])) 
		{
			$status = "Отклонен";
			$status_recall = Cabinet::getStatus($id, $status);
	
		    header("Location: //localhost/project/index.php/cabinet/");
		}
		
		require_once(ROOT.'/views/cabinet/status.php');
		
		return ' ';
	}
	
}
		