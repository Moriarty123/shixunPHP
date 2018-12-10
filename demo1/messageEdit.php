<?php

require_once("database.php");

$conn = connect();

if(is_array($_GET)&&count($_GET)>0) { 
	if(isset($_GET)) {

		$data = select($conn, "message", "id={$_GET['id']}");
		// var_dump($data[0]);
		$message = $data[0];
	}

}


$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>messageEdit</title>

	<style type="text/css">

	* {
		margin:0px;
		padding: 0px;
	}

	.container {
		width: 300px;
		height: 300px;
		margin: 20px auto;
		border:1px solid red;
	}

	form {
		width: 250px;
		margin: 0 auto;

	}

	h2 {
		text-align: center;
	}
	

	.div {
		width: 100%;
		margin-top: 10px;
	}

</style>
</head>
<body>
	
	<div class="container">
		<form action="messageUpdate.php" method="post">

			<div class="div">
				<h2>留言修改</h2>
			</div>
			<input type="hidden" name="id" value="<?=$message['id']?>">
			<div class="div">
				<span>昵称：</span>
				<input type="text" name="name" value="<?=$message['name']?>"><br />
			</div>
			<div class="div">
				<span>兴趣：</span>
				<?php
				$arr = json_decode($message['likes']);

				if( in_array('篮球', $arr) ) {
					?>
					<input type="checkbox" name="likes[]" value="篮球" checked="checked">篮球
					<?php
				}
				else {
					?>
					<input type="checkbox" name="likes[]" value="篮球">篮球
					<?php
				}
				?>

				<?php
				if( in_array('足球', $arr) ) {
					?>
					<input type="checkbox" name="likes[]" value="足球" checked="checked">足球
					<?php
				}
				else {
					?>
					<input type="checkbox" name="likes[]" value="足球">足球
					<?php
				}
				?>

				<?php
				if( in_array('排球', $arr) ) {
					?>
					<input type="checkbox" name="likes[]" value="排球" checked="checked">排球
					<?php
				}
				else {
					?>
					<input type="checkbox" name="likes[]" value="排球">排球
					<?php
				}
				?>
				<br />
			</div>
			<div class="div">
				<span>性别：</span>
				<?php
				if($message['sex'] == 1) {
					?>
					<input type="radio" name="sex" value="1" checked="checked"/>男
				<?php
				}
				else {
					?>
					<input type="radio" name="sex" value="1" />男
				<?php
				}
				?>

				<?php
				if($message['sex'] == 2) {
					?>
					<input type="radio" name="sex" value="2" checked="checked"/>女
				<?php
				}
				else {
					?>
					<input type="radio" name="sex" value="2" />女
				<?php
				}
				?>
			
				<br />
			</div>
			<div class="div">
				<span>城市：</span>
				<select name="city">
					<?php
					if($message['city'] == "东莞") {
						?>
						<option value="东莞" selected>东莞</option>
						<?php
					}
					else {
						?>
						<option value="东莞">东莞</option>
						<?php
					}
					?>

					<?php
					if($message['city'] == "深圳") {
						?>
						<option value="深圳" selected>深圳</option>
						<?php
					}
					else {
						?>
						<option value="深圳">深圳</option>
						<?php
					}

					?>

					<?php
					if($message['city'] == "广州") {
						?>
						<option value="广州" selected>广州</option>
						<?php
					}
					else {
						?>
						<option value="广州">广州</option>
						<?php
					}

					?>
				</select>
				<br />
			</div>
			<div class="div">
				<span>留言：</span>
				<textarea style="height: 50px;" name="message" value=""><?=$message['message']?></textarea>
			</div>
			<div class="div">
				<input type="submit" name="submit" value="提交">
			</div>
		</form>
	</div>


</body>
</html>