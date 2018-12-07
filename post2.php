<!-- post2.php -->

<?php

// var_dump($_POST);


require('database.php');

function selectMessage($conn) {

	// $name = $message['name'];

	$sql = "SELECT * FROM message";

	// echo $sql."<br />";

	$message = select($conn,$sql);

	// echo $message;
	while($row = mysqli_fetch_array($message))
	{
    	echo 'name:'.$row['name']."<br />";
    	// echo 'likes:'.json_decode($row['likes'])."<br />";
    	var_dump(json_decode($row['likes'], true));
    	echo 'sex:'.$row['sex']."<br />";
    	echo 'city:'.$row['city']."<br />";
    	echo 'message'.$row['message']."<br />";
    	echo "<br>";
	}

	return $message;
}


$conn = connect();

// $message['name'] = $_POST['name'];
// $message['likes'] = json_encode($_POST['likes']);
// $message['sex'] = $_POST['sex'];
// $message['city'] = $_POST['city'];

$message = [
	'name'   =>  $_POST['name'],
	'likes'  =>  json_encode($_POST['likes'],JSON_UNESCAPED_UNICODE),
	'sex'	 =>  $_POST['sex'],
	'city'   =>  $_POST['city'],
	'message'=>  $_POST['message']
];

// echo $message['name'].'<br />';
// echo $message['like'].'<br />';
// echo $message['sex'].'<br />';
// echo $message['city'].'<br />';

$table = "message";
// insert($conn, $table, $message);

selectMessage($conn, $message);

$conn->close();

?>