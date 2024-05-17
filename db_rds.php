<?php
echo "aiueo";

ini_set('display_errors', "On"); //エラー表示
ini_set('error_reporting', E_ALL); //全レベルのエラーを出力

#データベースに接続
$dsn = 'mysql:host=●●●●; dbname=rds1; charset=utf8';
$user = 'admin';
$pass = 'admin1234';

try{
  $dbh = new PDO($dsn, $user, $pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($dbh == null){
    echo "接続に失敗しました。";
  }else{

    # SQL文を定める
    $SQL = "SELECT * FROM users1";
    $stmt = $dbh->prepare($SQL);

    # SQL文の実行と表示
    $stmt->execute();
    while($row = $stmt->fetch()){
      echo "<pre>";
      print_r($row);
      echo "</pre>";
    }
  }
}catch (PDOException $e){
  echo('エラー内容：'.$e->getMessage());
  die();
}
$dbh = null;
