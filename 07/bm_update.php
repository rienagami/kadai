<?php
//1.POSTでParamを取得
$id      = $_POST["id"];
$releasedate    = $_POST["releasedate"];
$music   = $_POST["music"];
$player  = $_POST["player"];
$writer   = $_POST["writer"];
$composer = $_POST["composer"];
$album = $_POST["album"];
$tieup = $_POST["tieup"];




//2.DB接続など
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=archive_db_34;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}


//3.UPDATE archive_an_table SET ....; で更新(bindValue)
//基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE archive_an_table SET releasedate=:releasedate,music=:music,player=:player,writer=:writer,composer=:composer,album=:album,tieup=:tieup WHERE id=:id");

$stmt->bindValue(':id', $id);
$stmt->bindValue(':releasedate', $releasedate);
$stmt->bindValue(':music', $music);
$stmt->bindValue(':player', $player);
$stmt->bindValue(':writer', $writer);
$stmt->bindValue(':composer', $composer);
$stmt->bindValue(':album', $album);
$stmt->bindValue(':tieup', $tieup);
$status = $stmt->execute();


if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: select.php");
  exit;
}



?>
