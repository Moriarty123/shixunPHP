<?php 

require_once('database.php');

$conn = connect();

$data = select($conn, "message");

// var_dump($data);

//删除该ID的数据
if(is_array($_GET)&&count($_GET)>0) {
	if(isset($_GET['id'])) {
		$delete = delete($conn, 'message', "id={$_GET['id']}");

		if($delete == true) {
			echo "删除成功";
			header("Location:messageList.php");
		}
		else {
			// echo "删除失败";
		}
	}
}



$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>messageList</title>
	<meta charset="utf-8">
</head>
<body>

	<table border="1" cellpadding="0">
		<thead>
			<th>编号</th>
			<th>姓名</th>
			<th>兴趣</th>
			<th>性别</th>
			<th>城市</th>
			<th>留言</th>
			<th>操作</th>
		</thead>
		<?php 
		foreach ($data as $value) {
			// var_dump($value);
			?>

			<tr>
				<td><?=$value['id']?></td>
				<td><?=$value['name']?></td>
				<td><?=$value['likes']?></td>
				<td><?=$value['sex']?></td>
				<td><?=$value['city']?></td>
				<td><?=$value['message']?></td>
				<td>
					<a href="messageEdit.php?id=<?=$value['id']?>">编辑</a> |
					<a href="?id=<?=$value['id']?>">删除</a>

				</td>
			</tr>

			<?php			
		}
		?>

	</table>

</body>
</html>