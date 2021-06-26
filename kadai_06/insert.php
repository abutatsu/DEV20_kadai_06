<?php
//入力チェック
if(
    !isset($_POST["number"]) || $number = $_POST["number"] =="" ||
    !isset($_POST["name"]) || $name = $_POST["name"] =="" ||
    !isset($_POST["birth"]) || $birth = $_POST["birth"] =="" ||
    !isset($_POST["country"]) || $country = $_POST["country"] =="" ||
    !isset($_POST["position"]) || $position = $_POST["position"] =="" ||
    !isset($_POST["value"]) || $value = $_POST["value"] =="" ||
    !isset($_POST["comment"]) || $comment = $_POST["comment"] ==""
){
    exit('ParamError');
}

//1. POSTデータ取得
//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$number = $_POST["number"];
$name = $_POST["name"];
$birth = $_POST["birth"];
$country = $_POST["country"];
$position = $_POST["position"];
$value = $_POST["value"];
$comment = $_POST["comment"];
$age = "TIMESTAMPDIFF(YEAR, `birth`, CURDATE())";

//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
// mamppの方は
// $pdo = new PDO('mysql:dbname=xxx;charset=utf8;host=localhost', 'root', 'root');

try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$sql =  "INSERT INTO arsenal_member_table(id,number, name, birth,age, country,
position,value,comment )VALUES(NULL,:number, :name, :birth,$age, :country, :position, :value, :comment)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':number', $number, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':birth', $birth, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':country', $country, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':position', $position, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':value', $value, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//execute→実行しますという関数。全てのデータが$statusに入る

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: index.php");
    exit;
}
