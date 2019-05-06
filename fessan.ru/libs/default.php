<?php

function wtf($array, $stop = false) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop) {
		exit();
	}
}

/*
 * функция для удаления кук
function destCS($c = false,$s = false){
	if($c ){setcookie('id', '', time() - 3600, '/');
		setcookie('hash', '', time() - 3600, '/');
		setcookie('ip', '', time() - 3600, '/');

	}
	if($s){
		session_unset();
		session_destroy();

	}
}
=================================================================

  $assortment->close();

DB::close();

ALIAS:
q(); Запрос
es(); mysqli_real_escape_string

РАБОТА С ОБЪЕКТОМ ВЫБОРКИ
$res = q(); // Запрос с возвратом результата
$res->num_rows; // Количество возвращенных строк - mysqli_num_rows();
$res->fetch_assoc(); // достаём запись - mysqli_fetch_assoc();
$res->close(); // Очищаем результат выборки

РАБОТА С ПОДКЛЮЧЕННОЙ MYSQL
DB::_()->affected_rows; // Количество изменённых записей
DB::_()->insert_id; // Последний ID вставки
DB::_()->real_escape_string(); // аналог es();
DB::_()->query(); // аналог q
DB::_()->multi_ query(); // Множественные запросы

DB::close(); // Закрываем соединение с БД




 */

class DB {
	static public $mysqli = [];
	static public $connect = [];

	static public function _($key = 0) {
		if(!isset(self::$mysqli[$key])) {
			if(!isset(self::$connect['server']))
				self::$connect['server'] = Core::$DB_LOCAL;
			if(!isset(self::$connect['user']))
				self::$connect['user'] = Core::$DB_LOGIN;
			if(!isset(self::$connect['pass']))
				self::$connect['pass'] = Core::$DB_PASS;
			if(!isset(self::$connect['db']))
				self::$connect['db'] = Core::$DB_NAME;

			self::$mysqli[$key] = @new mysqli(self::$connect['server'],self::$connect['user'],self::$connect['pass'],self::$connect['db']); // WARNING
			if (mysqli_connect_errno()) {
				echo 'Не удалось подключиться к Базе Данных';
				exit;
			}
			if(!self::$mysqli[$key]->set_charset("utf8")) {
				echo 'Ошибка при загрузке набора символов utf8:'.self::$mysqli[$key]->error;
				exit;
			}
		}
		return self::$mysqli[$key];
	}
	static public function close($key = 0) {
		self::$mysqli[$key]->close();
		unset(self::$mysqli[$key]);
	}
}

function q($query,$key = 0) {
	$res = DB::_($key)->query($query);
	if($res === false) {
		$info = debug_backtrace();
		$error = "QUERY: ".$query."<br>\n".DB::_($key)->error."<br>\n".
			"file: ".$info[0]['file']."<br>\n".
			"line: ".$info[0]['line']."<br>\n".
			"date: ".date("Y-m-d H:i:s")."<br>\n".
			"===================================";

		file_put_contents('./logs/mysql.log',strip_tags($error)."\n\n",FILE_APPEND);
		echo $error;
		exit();
	}
	return $res;
}

function trimALL($el){
	if(!is_array($el)) {
		$el = trim($el);
	} else {
		$el = array_map('trimALL',$el);
	}
	return $el;

}

function iALL($el){
	if(!is_array($el)) {
		$el = (int)$el;
	} else {
		$el = array_map('iALL',$el);
	}
	return $el;

}
function fALL($el){
	if(!is_array($el)) {
		$el = (float) $el;
	} else {
		$el = array_map('fALL',$el);
	}
	return $el;

}

function hc($el){
	if(!is_array($el)) {
		$el = htmlspecialchars($el);
	} else {
		$el = array_map('hc',$el);
	}
	return $el;

}

function es($el,$key = 0) {
	return DB::_($key)->real_escape_string($el);
}

spl_autoload_register(function ($class) {
	include './libs/class_'.$class.'.php';

});

function myHash($var){
	$salt = '1624';
	$salt2 = 'siberia';
	$var =crypt(md5($salt.$var),$salt2);
	return $var;
}










function imgResize($file,$newwidht = false,$newheight=false){
	$array = ['image/gif', 'image/jpg', 'image/png', 'image/jpeg'];
	$array2 = ['jpg', 'gif', 'png', 'jpeg'];
			if($file['file']['error'] != 0){
			$errors['img'] = 'Вы не загрузули файл';

		}elseif($file['file']['size'] < 500 OR $file['file']['size'] > 50000000){
			$errors['img'] = 'Размер изображения не подходит';
		}
		else{

		$temp = getimagesize($file['file']['tmp_name']);
		$name = '/upload/'.date('Ymd-His').'img'.rand(1000,9000).'.jpg';
		preg_match('#\.([a-z]+)$#iu', $file['file']['name'], $matches);

		if(isset($matches[1])) {
				$matches[1] = strtolower($matches[1]);

				if(!in_array($matches[1], $array2)) {
					$errors['img'] = 'Не подходит расширение файла';
				}
				elseif(!in_array($temp['mime'], $array)) {
					$errors['img'] = 'Не подходит тип файла';
				}
				elseif(!move_uploaded_file($file['file']['tmp_name'], '.'.$name)) {
					$errors['img'] = 'Изображение нет';
				}else{  // здесь обработка изображения
					$oldwidth = $temp['0'];// размер исходника
					$oldheight = $temp['1'];//размер исходника

					if(!$newheight){
						$newheight = $newwidht/($oldwidth/$oldheight);
					}
					if(!$newwidht){
						$newwidht = $newheight/($oldheight/$oldwidth);
					}


					$tmp = imagecreatetruecolor($newwidht, $newheight);        //создается картинка по соотношению сторон???????
					if($temp['mime'] == 'image/jpeg') {                    //
						$new_img = imagecreatefromjpeg('.'.$name);// создает картинку с адреса где лежит файл
					}
					elseif($temp['mime'] == 'image/gif') {                    //
						$new_img = imagecreatefromgif('.'.$name); //
					}
					elseif($temp['mime'] == 'image/png') {                    //
						$new_img = imagecreatefrompng('.'.$name);    //
					}
					else $errors['img'] = 'ошибка создания файла';
					imagecopyresampled($tmp, $new_img, 0, 0, 0, 0, $newwidht, $newheight, $oldwidth, $oldheight);
					/* создает полную картинку( НО НЕ ВЫВОДИТ! ЛИБО ТРУ,ЛИБО ФОЛС!!). Берет соотношение сторон из ресурса $tmp. из исходного изображения $new_img б указывает 4 нуля
					(отступы). Далее указываются новые пропорции. ширина. высота. и старые пропорции. ширина.высота)
					  */
			imagejpeg($tmp, '.'.$name, 100); // создает новую картинку
				imagedestroy($tmp);//
				return $name;

				}
		}else {
			$errors['img'] = 'Данный файл не является картинкой';
			}
		}



}





























