<?php
//外部フェイルの読み込み
require_once("../database.php");
require_once("../classes.php");
//データベース接続オブジェクトを取得
$pdo = connectDatabase();
//実行するSQLを設定
$sql = "select * from areas";
//sql実行オブジェクトを取得
$pstmt = $pdo->prepare($sql);
//sql実行
$pstmt ->execute();
//結果セットを取得
$rs = $pstmt->fetchAll();

//結果セットを配列に格納
$areas = [];

foreach ($rs as $record){
    $id = intval($record["id"]);
    $name = $record["name"];
    $area = new Area($id,$name);
    $areas[]= $area;
    
}

//結果セットを確認
/*echo "<pre>";
var_dump($rs);
echo "</pre>";
exit(0);
*/
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<title>PDOを使ってみる</title>
	</head>
	<body>
		<h1>PDOを使ってみる</h1>
		<h2>地域を選択する</h2>
		<form action="restaurants.html" method="get">
		<select name="area">
			<option value="0">-- 選択してください --</option>
			<?php foreach($areas as $area) { ?>
			<option value="<?=$area->getId() ?>"><?=$area->getName() ?></option>
			<?php  }?>
			
		
		</select>
		<input type="submit" value="選択" />
		</form>
	</body>
</html>
