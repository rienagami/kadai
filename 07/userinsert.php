<?php
//このインサート画面でデータの取得・DBへの接続
//データの登録、エラー対応、userselect.phpへの吐き出しまでの
//動作を書き込んでいく

//入力チェック(受信確認処理追加)

if(
!isset($_POST["name"]) || $_POST["name"]=="" ||
//!isset($_POST["email"]) || $_POST["email"]=="" ||
!isset($_POST["lid"]) || $_POST["lid"]=="" ||
!isset($_POST["lpw"]) || $_POST["lpw"]==""
){
    exit('ParamError');
}

//１ POSTデータ取得
$name  = $_POST["name"];
//$email = $_POST["email"];
$lid   = $_POST["lid"];
$lpw   = $_POST["lpw"];

//２ DB接続（エラー処理追加）
try{
    $pdo = new
    PDO('mysql:dbname=gs_db_34;charset=utf8;host=localhost','root','');
}catch(PDOException $e) {
 exit('DbConnectError:'.$e->getMessage());
}

//データ登録SQL作成 
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw, indate )VALUES(NULL, :name, :lid, :lpw, sysdate())");

$stmt->bindValue(':name', $name);
//$stmt->bindValue(':email', $email);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$status = $stmt->execute();


//データ登録処理後もしエラーがあれば・・・

if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
    }else{
    header("Location: userindex.php");
}
?>

