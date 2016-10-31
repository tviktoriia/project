<?php 

require_once(ROOT.'/models/Form.php');

class FormController
{
	//метод вертає відсортовані відгуки в залежності від даних введену в форму і підключає вид.
    public function actionIndex()
	{
		$postsList = array();
			
		if (isset($_POST['check-submit'])) 
		{
			if (isset($_POST['inlineRadioOptions']) && isset($_POST['input_date'])) 
			{
				$date = $_POST['inlineRadioOptions'];
				$sql = $_POST['input_date'];
				$postsList = Form::getDate($date, $sql);
			} 
			else 
			{
			$postsList = Form::getOnDate();
			}
		}
		else
		{
		$postsList = Form::getOnDate();
		}
		
		require_once(ROOT.'/views/form/index.php');
	}
	
    //метод зберігає в базі даних новий відгук створений користувачем.	
	public function actionSave()
	{
		if (isset($_POST['save_recall'])) 
		{
			$author = htmlspecialchars($_POST['author']);
			$e_mail = htmlspecialchars($_POST['e_mail']);
			$text_name = htmlspecialchars($_POST['text_name']);
			
			$date = date("Y-m-d");
			$error = $_FILES['image']['error'];
			$name = $_FILES['image']['name'];
			$tmp = $_FILES['image']['tmp_name'];
			$type = $_FILES['image']['type'];
		    $image = Form::getImage($error, $name, $tmp, $type);		
			
			$save_recall = Form::getSave($author, $e_mail, $image, $date, $text_name);
			
			header("Location: //localhost/project/index.php/form/");
		}
	}
	
}