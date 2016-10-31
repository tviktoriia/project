<?php

class DateBase
{
	
    public function getConnect()
	{
      
    $db = new PDO("mysql:host=localhost;dbname=recalls", "root", "");
    return $db;
	
	}
}