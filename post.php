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
	echo "连接成功".'<br />';
	return $conn;
}

//插入数据
function insert($conn, $user) {
	$name = $user['name'];
	$password = $user['password'];
	$sex = $user['sex'];

	//插入数据库
	$sql = "INSERT INTO user (name, password, sex)
	VALUES ('$name', '$password', $sex)";

	if ($conn->query($sql) === TRUE) {
		echo "新记录插入成功".'<br />';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


function where($conn) {
	$result = mysqli_query($conn,"SELECT * FROM user
	WHERE name='john'");

	while($row = mysqli_fetch_array($result))
	{
    	echo 'name:'.$row['name']."<br>";
    	echo 'password:'.$row['name']."<br>";
    	echo 'sex:'.$row['sex']."<br>";
    	echo "<br>";
	}
}

function update($conn) {
	$flag = mysqli_query($conn,"UPDATE user SET password = 'tyt'
	WHERE name ='john' AND sex = 1");

	if ($flag) {
		echo '更新成功！';
	}
	else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	// mysqli_close($conn);
}


function delete($conn) {
	$flag = mysqli_query($conn,"DELETE FROM user WHERE name ='john'");

	if ($flag) {
		echo '删除成功！';
	}
	else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

//连接数据库
$conn = connect();

//获取post值
$user['name'] = $_POST['name'];
$user['password'] = $_POST['password'];
$user['sex'] = $_POST['sex'];

//插入数据库
// insert($conn, $user);

// where($conn);

// update($conn);

delete($conn);

//改变数据库
$conn->close();


?>
