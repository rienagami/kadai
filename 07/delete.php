<?php
$id = $_GET["id"];

//DB接続！！
try {
    $pdo = new
    PDO('mysql:dbname=archive_db_34;charset=utf8;host=localhost','root','');
    
}catch(PDOException $e){
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

//SQL作成と実行

$stmt = $pdo->prepare("DELETE FROM archive_an_table WHERE id=:id");
$stmt->bindValue(':id',$id);
$status = $stmt->execute();


//Errorチェック&エラーがなければselect.phpへとぶ

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    
    header("Location: select.php");
    exit;
}

?>
