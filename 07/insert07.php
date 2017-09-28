<?php
//１.POST受信
$releasedate  = $_POST["releasedate"];
$music    = $_POST["music"];
$player   = $_POST["player"];
$writer   = $_POST["writer"];
$composer = $_POST["composer"];
$album    = $_POST["album"];
$tieup    = $_POST["tieup"];
//$indate   = $_POST["indate"];


//DB接続
try {
    $pdo = new PDO('mysql:dbname=archive_db_34;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//SQLを作って実行
$stmt = $pdo->prepare("INSERT INTO archive_an_table(id, releasedate, music, player, writer, composer, album, tieup, indate )VALUES(NULL, :releasedate, :music, :player, :writer, :composer, :album, :tieup, sysdate())");



$stmt->bindValue(':releasedate',   $releasedate,PDO::PARAM_STR);
$stmt->bindValue(':music',     $music,PDO::PARAM_STR);
$stmt->bindValue(':player',    $player,PDO::PARAM_STR);
$stmt->bindValue(':writer',    $writer,PDO::PARAM_STR);
$stmt->bindValue(':composer',  $composer,PDO::PARAM_STR);
$stmt->bindValue(':album',     $album,PDO::PARAM_STR);
$stmt->bindValue(':tieup',     $tieup,PDO::PARAM_STR);
$status = $stmt->execute();//実行を宣言
//↑ここで書く値ってどこの名前を書くんだろうDB上？それともこっちのコード上の名前？

//falseだった場合返ってくる
if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: index07.php");//Locationとindexの間は必ずスペースが必要
    exit;
}
?>
    
    
    
    
    
    
    
    
    