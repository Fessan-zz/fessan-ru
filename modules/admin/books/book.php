<?php
$book = q("
	SELECT *
	FROM `books`
	WHERE `id` = ".(int)$_GET['key2']."
  	LIMIT 1
") ;


$row = $book->fetch_assoc();


$res = q("
  SELECT *
  FROM `books2books_author`
  WHERE `book_id` = ".(int)$row['id']."
");


while($res2=$res->fetch_assoc()){
	$id[]=$res2['author_id'];
}



$q=  q("
 SELECT *
 FROM `books_author`
 WHERE `id` IN (".implode(" ,",$id).")
");



if(!$book->num_rows){

	$_SESSION['info'] = 'Такой книги не существует!';
	header('Location: /admin/books');
	exit();

}


DB::close();

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}