<?php
//テスト２
//testブランチへコメント
//DB接続
try {
    $pdo = new
    PDO('mysql:dbname=archive_db_34;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}


//DB接続
//try{
//    $pdo = new
//    PDO('mysql:dbname=archive_db_34;charaset=utf8;host=localhost','root','');
//}catch (PDOException $e){
// exit('DbConnectError:'.$e->getMessage());
//}





//SQLを作って実行 stmt(statement（ここではstmtとしている）という変数を宣言)
//archive_an_tableを指定
//ORDER BY id DESCとは・・・昇順(ASC)と降順(DESC)の意味
//だからここではDESCを指定しているのでIDが降順で表示することを指定している？？
$stmt = $pdo->prepare("SELECT*FROM archive_an_table");

//statusという変数を宣言
    
$status = $stmt->execute();//execute=実行します


////SQLを作って実行
//$stmt = $pdo->prepare("SELECT*FROM archive_an_table ORDER BY id DESC");
//
//$status = $stmt->execute();//実行の宣言・・・execute




//もし実行処理がfalseだった場合のみ返ってくるための処理らしい


$view = "";
if($status==false){
   $error = $stmt->errorInfo();
   exit("ErrorQuery:".$error[2]);
}else{

//セレクトデータの数だけ自動でループしてくれる・・・らしい。ん？どういう事？
//「->」とはオブジェクト（クラス）のメソッドやフィールド変数を参照するための演算子らしい。fetchは「取ってくる、連れてくる」という意味
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .='<p>';
    $view .='<a href="detail.php?
    id='.$result["id"].'">';
    
    $view .= $result["music"].$result["player"].$result["writer"].$result["composer"].$result["tieup"]."
    [".$result["indate"]."]<br>";
   
    
    
    $view .= '</a>　'; 
    
    
    $view .='<a href="delete.php?
    id='.$result["id"].'">';
    $view .='[削除]';
    $view .='</a>';
    
    $view .='</p>';
        
    
//    $r["releasedate"]."　".$r["music"]."　".$r["player"]."　".$r["tieup"];
//    $view .='</p>';
}
}

//もしfalseだったら返ってくる
//$view ="";
//if($status==false){
//    $error = $stmt->errorInfo();
//    exit("QueryError:".$error[2]);
//}else{
//    //セレクトデータの数だけ自動でループしてくれる
//while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
//    $view .='<p>';
//    $view .= $r["indate"]." ".$r["name"];
//    $view .='</p>';
//
//}
//
//}

?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>アーカイブ表示</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">

        <style>
            div {
                padding: 10px;
                font-size: 16px;
            }

        </style>
    </head>

    <body id="main">
        <!--   ここからはヘッド-->

        <header>
            <nav>
                <div>
                    <div class=navi>
                        <a class="headtitle" href="index.php">登録画面へ</a>
                    </div>
                </div>
            </nav>
        </header>



        <!--ここからメイン  -->
        <div>
            <div>
                <?=$view?>
            </div>

        </div>

    </body>

    </html>
