<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>messageForm</title>

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
		<form action="messageAdd.php" method="post">
				
			<div class="div">
				<h2>留言板</h2>
			</div>
			<div class="div">
				<span>昵称：</span>
				<input type="text" name="name"><br />
			</div>
			<div class="div">
				<span>兴趣：</span>
				<input type="checkbox" name="likes[]" value="篮球">篮球
				<input type="checkbox" name="likes[]" value="足球">足球
				<input type="checkbox" name="likes[]" value="排球">排球
				<br />
			</div>
			<div class="div">
				<span>性别：</span>
				<input type="radio" name="sex" value="1" />男
				<input type="radio" name="sex" value="2" />女
				<br />
			</div>
			<div class="div">
				<span>城市</span>
				<select name="city">
					<option value="东莞">东莞</option>
					<option value="深圳">深圳</option>
					<option value="广州">广州</option>
				</select>
				<br />
			</div>
			<div class="div">
				<span>留言</span>
				<textarea style="height: 50px;" name="message"></textarea>
			</div>
			<div class="div">
				<input type="submit" name="submit" value="提交">
			</div>
		</form>
	</div>


</body>
</html>