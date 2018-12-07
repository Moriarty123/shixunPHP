<?php

//连接数据库
function connect() {
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = 'php';

	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);

	// 检测连接
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	// echo "连接成功".'<br />';
	return $conn;
}

function insert($conn, $table, $data) {

	$fields = "";
	$values = "";

	foreach ($data as $key => $value) {
		
		if ($fields == "") {
			$fields = $key;
		}
		else {
			$fields = $fields.','.$key;
		}

		if ($values == "") {
			$values = "'".$value."'";
		}
		else {
			$values = $values.",'".$value."'";
		}

	}

	$sql = "INSERT INTO {$table} ({$fields})
	VALUES ({$values})";

	// echo "<br />".$sql."<br />";

	if ($conn->query($sql) === TRUE) {
		// echo "新记录插入成功".'<br />';
		return true;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		return false;
	}

	// return $isInsert;

}

function select($conn,$sql) {
	$result = mysqli_query($conn,$sql);

	return $result;
	// while($row = mysqli_fetch_array($result))
	// {
 //    	echo 'name:'.$row['name']."<br>";
 //    	echo 'password:'.$row['name']."<br>";
 //    	echo 'sex:'.$row['sex']."<br>";
 //    	echo "<br>";
	// }
}



?>
