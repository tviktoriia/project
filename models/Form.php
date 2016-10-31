<?php 

require_once('components/DB.php');

class Form
{
    
	public function getDate($date, $sql)
    {
		$db = DB::getRecallByEmail($date, $sql);
		if ($db == NULL) 
		{
			$db1 = DB::getRecallByRadio($date);
			return $db1;
		}
		
		return $db; 
	}
						
	public function getOnDate()
    {
	    $db = DB::getRecall();
	    
		return $db;  
	}
		
	public function getSave($author, $e_mail, $image, $date, $text_name)
    {
		$db = DB::getSaveRecall($author, $e_mail, $image, $date, $text_name);
		
		return $db;
	}
		
	//метод перевіряє зображення на наявність та відповідність формату та вертає його
	public function getImage($error, $name, $tmp, $type) 
	{
		$file = ROOT.'/views/img/';
		if ($error == 4) 
		{
			$image = ' ';
			return $image;			  
		}
        else  
		{
			$types = array('image/gif', 'image/png', 'image/jpeg');
			if (!in_array($type, $types))
			{
                die ('Недопустимый тип файла. Допустимо загружать только изображения: *.gif, *.png, *.jpg');
            }
			else 
			{
				$ext = array_pop(explode('.',$name)); // расширение
				$image = time().'.'.$ext;
			    $new_image = Form::getImagesSize($tmp, $image, $file);
				if (move_uploaded_file($tmp, ROOT.$image)) 
				{
					return $image;
				}
			}
		}							
	}
	
    //метод зменшує зображення і зберігає його.
	public function getImagesSize($tmp, $image, $file)
	{
        $width = 320;
        $height = 240;
        $params = getimagesize($tmp) ;
        if ($params['0'] > $width || $params['1'] > $height) 
		{
            switch ($params['2']) 
			{
                case 1: $old_img = imagecreatefromgif($tmp); break;
                case 2: $old_img = imagecreatefromjpeg($tmp); break;
                case 3: $old_img = imagecreatefrompng($tmp); break;
            }
			
            if ($params['0'] > $params['1']) 
			{
                $size = $params['0'] ;
                $resolution = $width;
            }
            else 
			{
            $size = $params['1'] ;
            $resolution = $height;
            }
            $new_width = floor($params['0'] * $resolution / $size) ;
            $new_height = floor($params['1'] * $resolution / $size) ;

            $new_img = imagecreatetruecolor($new_width, $new_height) ;
            imagecopyresampled ($new_img, $old_img, 0, 0, 0, 0, $new_width, $new_height, $params['0'], $params['1']) ;

             switch ($params['2']) 
			{
                case 1: $type = '.gif'; break;
                case 2: $type = '.jpg'; break;
                case 3: $type = '.png'; break;
            }
            
			switch ($type) 
			{
                case '.gif': imagegif($new_img, $file.$image); break;
                case '.jpg': imagejpeg($new_img, $file.$image, 100); break;
                case '.png': imagepng($new_img, $file.$image); break;
            }

            imagedestroy($old_img);
			
			return $new_image;
		}
        else 
		{
            switch ($params['2']) 
			{
                case 1: $type = '.gif'; break;
                case 2: $type = '.jpg'; break;
                case 3: $type = '.png'; break;
            }
			
            copy($tmp, $file.$image);
        }
    }

}
	