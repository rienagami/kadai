<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー登録画面</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

    </style>
</head>

<body>

    <!--ヘッドここから-->
    <header>
        <nav>
            <div><a href="userselect.php">ユーザー一覧</a></div>
        </nav>
    </header>
    <!--ヘッドはここまで-->

    <!--ここからメイン-->
    <form method="post" action="userinsert.php">
        <div>
            <fieldset>
                <legend>サインイン</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <!--                <label>Email：<input type="text" name="email"></label><br>-->
                <label>Login ID：<input type="text" name="lid"></label><br>
                <label>password：<input type="text" name="lpw"></label><br>
                <input type="submit" value="登録">
            </fieldset>
        </div>
    </form>

</body>

</html>
