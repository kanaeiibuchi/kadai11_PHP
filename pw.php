<?php 
$id  = "test";
//ハッシュ化
$lpw = password_hash($id, PASSWORD_DEFAULT); 
echo $lpw;

