<?php
require('sample_php/functions.php');

createToken();

//1.  DB接続します xxxにDB名を入れます
try {
$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');//
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM arsenal_transfer_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<tr>";
    $view .= "<td>".$result["indate"]."</td>";
    $view .= "<td>".$result["name"]."</td>";
    $view .= "<td>".$result["birth"]."</td>";
    $view .= "<td>".$result["age"]."</td>";
    $view .= "<td>".$result["position"]."</td>";
    $view .= "<td>".$result["value"]."</td>";
    $view .= "<td>".$result["comment"]."</td>";
    $view .= "</tr>";
  }

}


include('sample_php/_nav.php');

//掲示板
$filename = 'sample_php/messages.txt';
$messages = file($filename,FILE_IGNORE_NEW_LINES);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ARSENAL MEMBER</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<!-- テーブルソート用->tablesorter使用 -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.default.min.css">
<style>div{padding: 10px;font-size:16px;}</style>
<style>
  #fav-table th {
    background-color:#ff9999;
  }
  .sorter-false {
    background-image: none;
  }
</style>
<!-- テーブルソート用 1,2,6はソートしない -->
<script>
$(document).ready(function() {
    $('#fav-table').tablesorter({
            headers: {
               1: { sorter: false },
               2: { sorter: false },
               6: { sorter: false }
            }
    });
});
</script>

</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
  <style type="text/css">
  .navbar-default{
    background-image: url("img/arsenal_image.jpg");
    /* background-size: cover; */
    background-position: center 55%;
    border-color:initial;
  }
  
  </style>
    <div class="container-fluid">
      <div class="navbar-header">
      <div class="navbar-brand"><span>移籍候補リスト</sapn></div>
      </div>
    </div>
</nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] $view-->
<div class="main">
    <div class="card-body">
      <table id="fav-table" class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">更新日</th>
            <th scope="col">名前</th>
            <th scope="col" width="100">誕生日</th>
            <th scope="col" width="100">年齢</th>
            <th scope="col" width="150">ポジション</th>
            <th scope="col" width="150">交渉価格(万€)</th>
            <th scope="col">コメント</th>
          </tr>
        </thead>
      <tbody><?=$view?></tbody>

      </table>
      <div class="boardContainer">
        <legend>更新履歴</legend>
        <div class="board">
          <ul>
            <?php foreach ($messages as $message): ?>
              <li><?=h($message);?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        
        <form action="board.php" method="post">
          <input type="text" name="message" autocomplete="off">
          <button>投稿する</button>
          <input type="hidden" name="token" value="<?=h($_SESSION['token']); ?>">
        </form>
      </div>
    
    </div>
<?php
    
    
    
    
?>
</div>
<div class="left-navi">
<form method="post" action="insert_trf.php">
  <div class="form-group">
   <fieldset style="margin:20px">
    <legend>ターゲット登録</legend>
     <label>名　前：<input type="text" class="form-control" name="name"></label><br>
     <label>誕生日：<input type="text" class="form-control" name="birth"></label><br>
     <label>国　籍：<input type="text" class="form-control" name="country"></label><br>
     <label>交渉価格：<input type="text" class="form-control" name="value"></label><br>
     <label>ポジション：
      <select name= "position">
        <option value = "FW">FW</option>
        <option value = "MF">MF</option>
        <option value = "DF">DF</option>
        <option value = "GK">GK</option>
      </select>
    </label><br>
     <label>コメント：<textArea name="comment" class="form-control" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信" class="btn btn-primary">
     <input type="hidden" name="token" value="<?=h($_SESSION['token']); ?>">
    </fieldset>
  </div>
</form>
</div>
<!-- Main[End] -->


</body>
</html>
