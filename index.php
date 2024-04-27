<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<div class="text-center">
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">もぐちゃれメンバー登録</div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フォーム</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>Email：<input type="text" name="email"></label><br>
     <label>勤務地：<select name="place">
        <option value=""></option>
        <option value="川崎">川崎</option>
        <option value="裾野">裾野</option>
        <option value="宇都宮">宇都宮</option></select>
     </label><br>
     <label>備考：<textArea name="comment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
<footer>
<nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">登録情報</a></div>
    </div>
  </nav>
</footer>
</div>
</body>
</html>
