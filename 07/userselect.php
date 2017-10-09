<?
//DB接続をする
try {
    $pdo = new
    PDO('mysql:dbname=gs_db_34;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
    //execute (SQL実行時にエラーがある場合)
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
        
    $view .='<a href="userdetail.php?
    id='.$result["id"].'">';
    $view .= $result["name"]."
    [".$result["indate"]."]<br>";
    $view .= '</a>　';
        
    
//デリート処理の時書いた
    $view .='<a href="userdelete.php?
    id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
        
    $view .= '</p>';
        
    }
}
?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>ユーザー登録</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            div {
                padding: 10px;
                font-size: 16px;
            }

        </style>
    </head>

    <body id="main">
        <!--HEAD　ここからスタート-->
        <header>
            <nav>
                <div>
                    <a href="userindex.php">サインイン</a>
                </div>
            </nav>
        </header>
        <!--  ヘッダーここまで-->

        <!--メインここから-->
        <div>
            <div class="container jumpbotron">
                <?=$view?>

            </div>

        </div>

        <!--  メインここまで-->


    </body>

    </html>
