<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>登録</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
<!--    <style>div{text-align: center;font-size: 16px;}</style>-->
</head>
<body>
   
    <!--ヘッダー-->
    <header>
        <nav>
            <div class=navi>
                <div><a class="headtitle" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>


    <!--ここからメイン   -->
<!--actionで情報の送り先を指定する。この場合はinsert07.phpを指定している-->
    <form method="post" action="insert.php">
        <div class="item">
<!--fieldsetタグとは何か、後で調べる-->
            <fieldset>
                <legend>アーカイブ</legend>
                <label>発売月 <input type="text" name="releasedate"></label><br>
                <label>楽曲名 <input type="text" name="music"></label><br>
                <label>演奏者 <input type="text" name="player"></label><br>
                <label>作詞者 <input type="text" name="writer"></label><br>
                <label>作曲者 <input type="text" name="composer"></label><br>
                <label>収録作 <input type="text" name="album"></label><br>
                <label>テーマ <input type="text" name="tieup"></label>
                <input type="submit" value="登録">
            </fieldset>
        </div>
    </form>

</body>

</html>
