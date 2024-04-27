<?php
session_start();
$id=$_GET["id"];

//１．PHP
include("funcs.php");
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_mogu_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);
$registered_pdata=array('','川崎','裾野','宇都宮');
?>
<!--
2．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>メンバー登録情報編集</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>メンバー情報編集</legend>
     <label>名前：<input type="text" name="name" value="<?=$values["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$values["email"]?>"></label><br>
     <label>勤務地：<select name="place">
    <?php foreach ($registered_pdata as $option_pdata): ?>
        <option value="<?= $option_pdata ?>" <?= ($option_pdata == $values["place"])? "selected":"" ?>>
            <?=$option_pdata ?>
        </option>
    <?php endforeach; ?>
</select></label><br>
     <label>備考：<textArea name="comment" rows="4" cols="40"><?=$values["comment"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$values["id"]?>">
       <!-- 管理フラグが１の時だけ「更新」を表示する -->
       <?php if($_SESSION["kanri_flg"]=="1"):?>
        <input type="submit" value="更新">
      <?php endif; ?>
       <!-- 管理フラグが関係なく「戻る」をクリックすると一覧に戻る -->
      <input type="submit" name="return" value="戻る">
       <?php if(isset($_POST['return'])) redirect("select.php")?> 
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
</body>
</html>

