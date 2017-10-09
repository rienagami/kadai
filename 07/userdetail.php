<?php
//GETでidを取得
$id = $_GET["id"];

//DB接続など
try {
    $pdo = new
    PDO('mysql:dbname=gs_db_34;charset=utf8;host=localhost','root','');
    } catch (PDOException $e){
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

//データ登録SQK作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id', $id);
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    $row = $stmt->fetch();
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>ユーザー登録</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            div {
                padding: 10px;
                font-size: 16px;
            }

        </style>
    </head>

    <body>

        <!-- ヘッダースタート  -->

        <header>
            <nav>
                <div>
                    <a href="userselect.php">ユーザー一覧
       </a>

                </div>
            </nav>
        </header>

        <!--        メインここから-->
        <form method="post" action="userupdate.php">
            <div class="jumbotron">
                <fieldset>
                    <legend>ユーザー登録</legend>
                    <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
                    <label>ログインID：<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
                    <label>パスワード：<input type="text" name="lpw" value="<?=$row["lpw"]?>"></label><br>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" value="登録">  
                </fieldset>
            </div>

        </form>


    </body>

    </html>
