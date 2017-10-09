<?php

$id = $_GET["id"];

//DB接続
try {
    $pdo = new
    PDO('mysql:dbname=archive_db_34;charset=utf8;
    host=localhost','root','');
}catch (PDOException $e) {
 exit('データベースに接続できませんでした。'.$e->getMessage());
}

//データとうろくSQL作成
$stmt = $pdo->prepare("SELECT * FROM archive_an_table WHERE id=:id");
$stmt->bindValue(':id',$id);
$status = $stmt->execute();


//データ表示
$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else{
    //セレクトデータの数だけ自動でループしてくれる。
$row = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
  <header>
 <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">アーカイブ一覧</a></div>
    </div>
  </nav>
  </header> 
   
   <form method="post" action="update.php">
    <div class="jumbotron">
       <fieldset>
           <legend>アーカイブの更新</legend>
           <label>発売日：<input type="text" name="releasedate" value="<?=$row["releasedate"]?>"></label><br>
           
           <label>曲名：<input type="text" name="music" value="<?=$row["music"]?>"></label><br>
           
           <label>アーティスト：<input type="text" name="player" value="<?=$row["player"]?>"></label><br>
           
           <label>作詞：<input type="text" name="writer" value="<?=$row["writer"]?>"></label><br>
           
           <label>作曲：<input type="text" name="composer" value="<?=$row["composer"]?>"></label><br>
           
           <label>収録：<input type="text" name="album" value="<?=$row["album"]?>"></label><br>
           
           <label>タイアップ：<input type="text" name="tieup" value="<?=$row["tieup"]?>"></label><br>
           
           <input type="hidden" name="id" value="<?=$id?>">
           <input type="submit" value="送信">
       </fieldset>
    </div>
   </form>
</body>
</html>










