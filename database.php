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

//插入数据库
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
	$result = mysqli_query($conn, $sql);



	$row = mysqli_affected_rows($conn);
	// echo $row;
	if($row > 0) {
		// echo '插入成功';
		return true;
	}
	else {
		// echo '插入失败';
		return false;
	}

	// return $isInsert;

}


//查询数据库
function select($conn, $table, $where = "") {

	if($where != "") {
		$sql = "SELECT * FROM {$table} WHERE {$where}";
	}
	else {
		$sql = "SELECT * FROM {$table}";
	}

	// var_dump($sql);

	$result = mysqli_query($conn, $sql);

	$data = [];


	$row = mysqli_num_rows($result);

	if ($row > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
			// var_dump($row);
		}
		// var_dump($data);
		return $data;
	}
	else {
		return false;
	}
}

//删除数据
function delete($conn, $table, $where) {

	$sql = "DELETE FROM {$table} WHERE {$where}";

	$result = mysqli_query($conn, $sql);

	$row = mysqli_affected_rows($conn);

	if ($row > 0) {
		return true;
	}
	else {
		return false;
	}

}


//修改数据
function update($conn, $table, $data, $where) {
	// $sql = "UPDATE {$table} SET `id`=[value-1],`name`=[value-2],`likes`=[value-3],`sex`=[value-4],`city`=[value-5],`message`=[value-6] WHERE {$where}";

	$before = "UPDATE {$table} SET ";
	$after = " WHERE {$where}";

	$fields = "";
	foreach ($data as $key => $value) {
		if ($fields == "") {
			$fields = "{$key} = "."'{$value}'";
		}
		else {
			$fields = $fields.",{$key} = "."'{$value}'";
		}
	}

	$sql = $before.$fields.$after;

	// var_dump($sql);

	$result = mysqli_query($conn, $sql);

	$row = mysqli_affected_rows($conn);

	// var_dump($row);

	if ($row > 0) {
		// echo '修改成功';
		return true;
	}
	else {
		return false;
	}
}

