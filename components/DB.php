<?php

require_once('config/DateBase.php');

class DB
{
//метод вертає всі відгуки з статусом "Принят" сортуючи іх по даті.
    public function getRecall()
	{
		$status = "Принят";
		
		$db = DateBase::getConnect();
		$stmt = $db->prepare("SELECT * FROM recalls WHERE status = :status ORDER BY date DESC");
		$stmt->bindParam(':status', $status);
		$stmt->execute();
        $res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        foreach($res as $arr) 
		{
			return $res;
	    }
    }
	
	//метод вертає всі відгуки сортуючи іх по даті.
    public function getRecallForAdmin()
	{
		$db = DateBase::getConnect();
		$stmt = $db->prepare("SELECT * FROM recalls ORDER BY date DESC");
		$stmt->execute();
        $res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        foreach($res as $arr) 
		{
			return $res;
		}
    }
	
    //метод вертає всі відгуки з статусом "Принят" де значення колонки рівне $date, а її значення рівне $sql.
	public function getRecallByEmail($date, $sql)
	{
		$status = "Принят";
		
		$db = DateBase::getConnect();
		$stmt = $db->prepare("SELECT * FROM recalls WHERE $date = :sql AND status = :status");
		$stmt->bindParam(':sql', $sql);
		$stmt->bindParam(':status', $status);
        $stmt->execute();
        $res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        foreach($res as $arr) 
		{
			return $res;
		}
    }
	
    //метод вертає все по значенню колони $date.
	public function getRecallByRadio($date)
	{
		$status = "Принят";
		
		$db = DateBase::getConnect();
		switch($date)
		{		
		    case "author":
		    $stmt = $db->prepare("SELECT * FROM recalls WHERE status = :status ORDER BY author");
			break;
			case "date":
		    $stmt = $db->prepare("SELECT * FROM recalls WHERE status = :status ORDER BY date");
			break;
			case "e_mail":
		    $stmt = $db->prepare("SELECT * FROM recalls WHERE status = :status ORDER BY e_mail");
			break;
		}
		
		$stmt->bindParam(':status', $status);
		$stmt->execute();
        $res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        foreach($res as $arr) 
		{
			return $res;
		}
	}
	
    //метод заносить в базу даних дані з форми створення нового відгука.
	public function getSaveRecall($author, $e_mail, $image, $date, $text_name)
	{
		$db = DateBase::getConnect();
						  
        $ins = "INSERT INTO recalls (author, e_mail, image, date, text_name) values (:author, :e_mail, :image, :date, :text_name)";
		$que = $db->prepare($ins);
        $que->execute(array(':author'=>$author,
		                    ':e_mail'=>$e_mail,
							':image'=>$image,
							':date'=>$date,
		                    ':text_name'=>$text_name
							));
	}
	
	//метод зберігає відгук відредактований адміном.
	public function editRecall($author, $e_mail, $date, $text_name, $change_admin, $id)
	{
		$db = DateBase::getConnect();
		
		$stmt = $db->prepare('UPDATE recalls SET author = :author, e_mail = :e_mail, date = :date, text_name = :text_name, change_admin = :change_admin WHERE id = :id');
        $stmt->bindParam(':author', $author);
		$stmt->bindParam(':e_mail', $e_mail);
		$stmt->bindParam(':date', $date);
		$stmt->bindParam(':text_name', $text_name);
		$stmt->bindParam(':change_admin', $change_admin);
		$stmt->bindParam(':id', $id);
        $stmt->execute();
		
		//return $stmt;
	}
	
    //метод вертає к-ть полів в таблиці recalls	
	public function getCount()
	{
		$db = DateBase::getConnect();
		$stmt = $db->query("SELECT COUNT(*) FROM recalls");
		$res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
       
			foreach($res as $arr) 
		    {
				foreach($arr as $value)
				{
				    return $value;
				}
			}
	}
	
	//метод вертає все по заданому id.
	public function getById($id)
	{
		$db = DateBase::getConnect();
		
		$stmt = $db->prepare("SELECT * FROM recalls WHERE id = :id");
		$stmt->bindParam(':id', $id);
        $stmt->execute();
        $res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
        foreach($res as $arr) 
		{
			return $arr;
		}
	}
	
    //метод зберігає відредактований статус відгука.
	public function getEditStatus($id, $status)
	{
		$db = DateBase::getConnect();
					
		$stmt = $db->prepare('UPDATE recalls SET status = :status WHERE id = :id');
        $stmt->bindParam(':status', $status);
		$stmt->bindParam(':id', $id);
        $stmt->execute();
		
		//return $stmt;
    }
	
}