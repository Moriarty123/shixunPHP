<?php

// var_dump($_POST);

require('database.php');

$conn = connect();

$message = [
	'name'   =>  $_POST['name'],
	'likes'  =>  addslashes(json_encode($_POST['likes'],JSON_UNESCAPED_UNICODE)),
	'sex'	 =>  $_POST['sex'],
	'city'   =>  $_POST['city'],
	'message'=>  $_POST['message']
];


$isInsert = insert($conn, "message", $message);

if($isInsert == true) {
	echo "添加成功";
}
else {
	echo "添加失败";
}

// selectMessage($conn, $message);

$conn->close();

?>