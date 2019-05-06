<?php


$author = q("
	SELECT *
	FROM `books_author`
	WHERE `id` = ".(int)$_GET['key2']."
  	LIMIT 1
") ;

$row = $author->fetch_assoc();

$res = q("
  SELECT *
  FROM `books2books_author`
  WHERE `author_id` = ".(int)$row['id']."
");

while($res2=$res->fetch_assoc()){
	$id[]=$res2['book_id'];
}
if(isset($id)) {
	$q = q("
 SELECT *
 FROM `books`
 WHERE `id` IN (".implode(",", $id).")
 
");
	$row2 = $q->fetch_assoc();
}


if(!$author->num_rows){

	$_SESSION['info'] = 'Данного автора не существует!';
	header('Location: /admin/books');
	exit();

}


DB::close();
if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}