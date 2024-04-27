<?php
//1. POSTデータ取得
//[name,email,age,naiyou]
$name    = $_POST["name"];
$email   = $_POST["email"];
// $place   = $_POST["place"];
$place = isset($_POST["place"]) ? $_POST["place"] : null;
$comment = $_POST["comment"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$sql="INSERT INTO gs_mogu_table(id,name,email,place,comment,indate)VALUES(NULL,:name,:email,:place,:comment,sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name' , $name,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':place', $place, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //true or false

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
}else{
  //５．index.phpへリダイレクト 成功したとき
  redirect("index.php");
}
?>
