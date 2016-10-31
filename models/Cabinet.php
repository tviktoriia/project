<?php 

require_once('components/DB.php');

class Cabinet
{
       
	//метод вертає всі отзиви.
	public function getAllRecall()
	{
	    $recalls = DB::getRecallForAdmin();
	    
		return $recalls;
	}
		
	//метод вертає відгука по id
	public function getAllById($id)
	{
	    $db_id = DB::getById($id);
	    
		return $db_id;
	}
		
	//метод вертає статус відгука по його id.
	public function editAdmin($id)
	{
		$db_change = DB::getById($id);
		if ($db_change['change_admin'] = "Изменино")  
		{
		    return true;
		} else {
		    return false;
		}
    }	
		
	//метод вертає отзив по заданому id і status.
	public function getStatus($id, $status)
	{
		$stat = DB::getEditStatus($id, $status);
		
		return $stat;
	}
		
	//метод заносить в базу відредактовані адміном дані.
	public function editRecallByAdmin($author, $e_mail, $date, $text_name, $change_admin, $id)
	{
		$save = DB::editRecall($author, $e_mail, $date, $text_name, $change_admin, $id);
	}

}