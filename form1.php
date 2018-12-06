<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>表单提交</title>

	<style type="text/css">
	.div {
		width: 100%; 
		height: 50px; 
		/*border: 1px solid red; */
		text-align: center;
		margin-top:10px;
	}
</style>
</head>
<body>
	<div style="width: 300px; height: 300px; border: 1px solid red; margin: 0 auto; ">
		<form action="post.php" method="post">
			<div class="div">
				<span>姓名：</span>
				<input type="text" name="name"><br />
			</div>
			<div class="div">
				<span>密码：</span>
				<input type="password" name="password"><br />
			</div>
			<div class="div">
				<span>性别：</span>
				<input type="radio" name="sex" value="1" />男
				<input type="radio" name="sex" value="2" />女<br />
			</div>
			<div class="div">
				<input type="submit" name="submit" value="提交">
			</div>
		</form>
	</div>
</body>
</html>