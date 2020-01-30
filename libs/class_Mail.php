<?php

class Mail{

	static $subject  = 'По умолчанию';
	static $from     = 'info@fessan.school-php.com';
	static $to       = 'fessan@ya.ru';
	static $text     = 'Шаблонное письмо';
	static $headers = '';

	static function send(){
		self::$subject  = '=?utf-8?b?'.base64_encode(self::$subject).'?=';

		self::$headers  = "Content-type: text/html; charset=\"utf-8\"\r\n";
		self::$headers .= "From: ".self::$from ."\r\n";
		self::$headers .= "MIME-Version: 1.0\r\n";
		self::$headers .= "Date: ". date('D, d M Y h:i:s O'). "\r\n";
		self::$headers .= "Precedence: bulk \r\n ";

		return 	mail(self::$to, self::$subject, self::$text, self::$headers);
	}

	//  тестоовая отправка писем

	static function testSend(){

		if(	mail('fessan@ya.ru','english words', 'english text')){

			echo 'Письмо отправилось';
		}else echo 'Письмо не отправилось';

		exit();
	}
}








