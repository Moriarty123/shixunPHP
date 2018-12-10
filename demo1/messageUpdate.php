<?php

var_dump($_POST);

require("database.php");

$conn = connect();

$message = [

	'name'   =>  $_POST['name'],
	'likes'  =>  addslashes(json_encode($_POST['likes'],JSON_UNESCAPED_UNICODE)),
	'sex'	 =>  $_POST['sex'],
	'city'   =>  $_POST['city'],
	'message'=>  $_POST['message']
];

$update = update($conn, "message", $message, "id = {$_POST['id']}");

if($update == true) {
	echo "修改成功！";
}
else {
	echo "修改失败！";
}

$conn->close();

?>
