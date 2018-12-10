<?php

interface db {

	public function connect($database);//连接数据库
	public function insert($table, $data);//插入数据
	public function delete($table, $where);//删除数据
	public function update($table, $data, $where);//更新数据
	public function getOne($table, $where = '');//获取一条数据
	public function getAll($table, $where = '');//获取所有数据

}

class Mysql implements db {
	private $conn = null;//连接数据库
	private $debug = false;

	//构造方法
	public function __construct() {
		// echo '构造方法<br />';
		// $this->connect('');
	}

	//析构方法
	public function __destruct() {
		// echo '析构方法<br />';
		$this->conn->close();
	}

	//sql执行函数
	private function execute($sql) {
		if ($this->debug == true) {
			echo 'SQL:'.$sql.'<br />';
		}
		$result = $this->conn->query($sql);
		return $result;
	}

	public function openDebug() {
		$this->debug = true;
	}


	//连接数据库
	//$database: 数据库名
	public function connect($database) {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = $database;

		// 创建连接
		$this->conn = new mysqli($servername, $username, $password, $dbname);

		// 检测连接
		if ($this->conn->connect_error) {
			die("连接失败: " . $this->conn->connect_error);
		} 
		// echo '连接成功<br />';
		// return $this->conn;
	}


	//插入数据
	//$table: 数据表
	//$data: 要插入的数据
	public function insert($table, $data) {
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

		//sql语句
		$sql = "INSERT INTO {$table} ({$fields})
		VALUES ({$values})";

		$result = $this->execute($sql);
		if ($result == true) {
			// echo '插入成功<br />';
			return true;
		}
		else {
			// echo '插入失败<br />';
			return false;
		}
	}

	//删除数据
	//$table: 数据表
	//$where: 删除条件
	public function delete($table, $where) {
		$sql = "DELETE FROM {$table} WHERE {$where}";

		$result = $this->execute($sql);

		$row = mysqli_affected_rows($this->conn);

		if ($row > 0) {
			//echo '删除成功<br />';
			return true;
		}
		else {
			//echo '删除失败<br />';
			return false;
		}
	}

	//更新数据
	//$table: 数据表
	//$data: 要更新的数据
	//$where: 更新条件
	public function update($table, $data, $where) {
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

		//sql语句
		$sql = $before.$fields.$after;

		$result = $this->execute($sql);

		$row = mysqli_affected_rows($this->conn);

		if ($row > 0) {
			// echo '修改成功<br />';
			return true;
		}
		else {
			// echo '修改失败<br />';
			return false;
		}
	}

	//获取一条数据
	//$table: 数据表
	//$where: 要查询的数据， 默认为空
	public function getOne($table, $where = '') {
		if($where != "") {
			$sql = "SELECT * FROM {$table} WHERE {$where}";
		}
		else {
			$sql = "SELECT * FROM {$table}";
		}

		$result = $this->execute($sql);

		$data = [];

		$row = mysqli_num_rows($result);

		if ($row > 0) {
			$data = mysqli_fetch_assoc($result);
			// echo '查询成功<br />';
			return $data;
		}
		else {
			// echo '查询失败<br />';
			return false;
		}
	}

	//获取所有数据
	//$table: 数据表
	//$where: 要查询的数据, 默认为空
	public function getAll($table, $where = '') {
		if($where != "") {
			$sql = "SELECT * FROM {$table} WHERE {$where}";
		}
		else {
			$sql = "SELECT * FROM {$table}";
		}

		$result = $this->execute($sql);

		$data = [];


		$row = mysqli_num_rows($result);

		if ($row > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			// echo '查询成功<br />';
			return $data;
		}
		else {
			// echo '查询失败<br />';
			return false;
		}
	}

}

echo '<pre>';
$Mysql = new Mysql();
// $Mysql->connect('php');
$Mysql->openDebug();
$Mysql -> connect('php');

$data = [
	'name'  	=>  	'tyt',
	'age'   	=>		'23',
	'sex'		=>		'男',
	'action'	=>		'talk'
];

$result = $Mysql->insert('person', $data);


var_dump($result);

$newdata = [
	'name'  	=>  	'tyl',
	'age'   	=>		'19',
	'sex'		=>		'男',
	'action'	=>		'sleep'
];


$result = $Mysql->update('person', $newdata, 'id = 5');

var_dump($result);

$result = $Mysql->delete('person', 'id = 4');

var_dump($result);

$res = $Mysql->getOne('person', 'id = 1');

var_dump($res);

$res = $Mysql->getAll('person');

var_dump($res);