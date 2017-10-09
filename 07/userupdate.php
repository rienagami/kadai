<?php
$id     = $_POST["id"];
$name   = $_POST["name"];
$lid    = $_POST["lid"];
$lpw    = $_POST["lpw"];


//DB接続する
try {
    $pdo = new
    PDO('mysql:dbname=gs_db_34;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

//UPDATE gs_user_table SET   で更新
//基本的にuserinsert.phpの処理の流れ
$stmt = $pdo->prepare("UPDATE gs_user_table SET name=:name,lid=:lid,lpw=:lpw WHERE id=:id");


$stmt->bindValue(':name',$name);
$stmt->bindValue(':lid',$lid);
$stmt->bindValue(':lpw',$lpw);
$stmt->bindValue(':id', $id);
$status = $stmt->execute();


if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
    
}else{
    header("Location: userselect.php");
    exit;
  
}
?>
