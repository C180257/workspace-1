<?php
//外部ファイルの読込み
require_once("../database.php");
require_once("../classes.php");
// Step-1. リクエストパラメータを取得
$area = -1;
if (isset($_REQUEST["area"])){
    $area = $_REQUEST["area"];
}
// Step-2. データベースに接続
$pdo = connectDatabase();

// Step-3. 実行するSQLを設定
$sql = "select * from restaurants where area=?";

// Step-4. SQL実行オブジェクトを取得（プレースホルダ付きSQL）
$pstmt =$pdo->prepare($sql);

// Step-5. プレースホルダにリクエストパラメータを設定（置換：replace）
$pstmt -> bindValue(1, $area);
//$params[":area"]= $area;

// Step-6. SQLを実行
$pstmt ->execute();

// Step-7. 結果セットを取得
$rs = $pstmt->fetchAll();

// Step-8. 結果セットを配列に納
$restaurant =[];
foreach ($rs as $record){
    $id= intval($record["id"]);
    $name = $record["name"];
    $detail = $record["detail"];
    $image = $record ["image"];
    $restaurant = new Restaurtant($id,$name,$detail,$image,$area);
    $restaurant[] = $restaurant;
   
   
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>PDOを使ってみる</title>
</head>
<body>
<h1>PDOを使ってみる</h1>
<h2>選択された地域のレストラン一覧</h2>
<table border="1">
<tr>
<th>レストランID</th>
<th>レストラン名</th>
<th>詳細</th>
<th>画像ファイル名</th>
<th>地域ID</th>
</tr>
<?php foreach ($restaurants as $restaurant){?>
<tr>
   <td><?=$restaurant->getId() ?> </td>
    <td><?=$restaurant->getName() ?> </td>
     <td><?=$restaurant->getDetail() ?> </td>
      <td><?=$restaurant->getImage() ?> </td>
       <td><?=$restaurant->getArea() ?> </td>
       
 
</tr>

<?php }?>


</table>
</body>
</html>