<?php

class Upload {


	public static $name = '';
	public static $temp = '';
	public static $error = [];

	public static function uploader($file) {
		$array = ['image/gif', 'image/jpg', 'image/png', 'image/jpeg'];
		$array2 = ['jpg', 'gif', 'png', 'jpeg'];
		if($file['file']['error'] == 4){
			return false;
		}

		elseif($file['file']['size'] < 5000 OR $file['file']['size'] > 50000000) {
			self::$error['img']= 'Размер изображения не подходит';
		}
		else {
			self::$temp = getimagesize($file['file']['tmp_name']);
			self::$name = '/upload/'.date('Ymd-His').'img'.rand(1000, 9000).'.jpg';

			preg_match('#\.([a-z]+)$#iu', $file['file']['name'], $matches);
			if(isset($matches[1])) {
				$matches[1] = strtolower($matches[1]);

				if(!in_array($matches[1], $array2)) {
					self::$error['img'] = 'Не подходит расширение файла';
				}
				elseif(!in_array(self::$temp['mime'], $array)) {
					self::$error['img']= 'Не подходит тип файла';
				}
				elseif(!move_uploaded_file($file['file']['tmp_name'], '.'.self::$name)) {
					self::$error['img'] = 'Изображение нет';
				} return true;
			}else{
				self::$error['img'] = 'Данный файл не является картинкой';}
		}

	}

	public static function resize($newwidht = false,$newheight=false){


		$oldwidth = self::$temp['0'];// размер исходника
		$oldheight = self::$temp['1'];//размер исходника

		if(!$newheight){
			$newheight = $newwidht/($oldwidth/$oldheight);
		}
		if(!$newwidht){
			$newwidht = $newheight/($oldheight/$oldwidth);
		}


		$tmp = imagecreatetruecolor($newwidht, $newheight);        //создается картинка по соотношению сторон???????
		if(self::$temp['mime'] == 'image/jpeg') {                    //
			$new_img = imagecreatefromjpeg('.'.self::$name);// создает картинку с адреса где лежит файл
		}
		elseif(self::$temp['mime'] == 'image/gif') {                    //
			$new_img = imagecreatefromgif('.'.self::$name); //
		}
		elseif(self::$temp['mime'] == 'image/png') {                    //
			$new_img = imagecreatefrompng('.'.self::$name);    //
		}
		else self::$error['img'] = 'ошибка создания файла';
		imagecopyresampled($tmp, $new_img, 0, 0, 0, 0, $newwidht, $newheight, $oldwidth, $oldheight);


		imagejpeg($tmp, '.'.self::$name, 100); // создает новую картинку
		imagedestroy($tmp);//
		return self::$name;

	}

}



