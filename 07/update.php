<?php

$id           =$_POST["id"];
$releasedate  =$_POST["releasedate"];
$music        =$_POST["music"];
$player       =$_POST["player"];
$writer       =$_POST["writer"];
$composer     =$_POST["composer"];
$album        =$_POST["album"];
$tieup        =$_POST["tieup"];


//DB接続

try {
  $pdo = new PDO('mysql:dbname=archive_db_34;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}


$stmt = $pdo->prepare("UPDATE archive_an_table SET releasedate=:releasedate,music=:music,player=:player,writer=:writer,composer=:composer,album=:album,tieup=:tieup WHERE id=:id");

$stmt->bindValue(':releasedate', $releasedate);
$stmt->bindValue(':music', $music);
$stmt->bindValue(':player', $player);
$stmt->bindValue(':writer', $writer);
$stmt->bindValue(':composer', $composer);
$stmt->bindValue(':album', $album);
$stmt->bindValue(':tieup', $tieup);
$stmt->bindValue(':id', $id);
$status = $stmt->execute();


if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);    
}else{
  //５．index.phpへリダイレクト
  header("Location: select.php");
  exit;
}


?>





