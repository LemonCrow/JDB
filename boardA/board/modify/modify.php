<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>수정</title>
	<style type="text/css">
		*{
			text-align: center;
			font-family: korean;
			padding: 0;
			margin: 0;
		}

		html{
			background-color: #f5f5f7;
			width: 100%;
			height: 100%;
		}

		body{
			width: 100%;
			height: 80%;
		}

		@font-face{
			src: url('../../../font/AppleSDGothicNeoBold.ttf');
			font-family: korean;
		}

		hr{
			margin: 0 auto;
			margin-top: 3%;
			width: 50%;

		}

		#main{
			display: inline-block;
			width: 50%;
			height: 80%;
			background-color: white;
			margin: 0 auto;
			margin-top: 3%;
			border-radius: 2rem;
		}

		.layer{
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			text-align: center;
		}

		.layer .content{
			margin-top: 1%;
			color: black;
			vertical-align: middle;
			width: 100%;
			height: 70%;
		}

		.layer .blank{
			display: inline-block;
			width: 0;	
			height: 100%;
			vertical-align: middle;
		}

		.tinput{
			text-align: center;
			border: 0.15rem solid black;
			border-radius: 2em;
			height: 1.8rem;
			width: 40%;
			margin-top: 5%;
		}

		#logoutBtn{
			position: relative;
			z-index: 1000;
			text-align: center;
			margin: 0rem auto;
			background-color: #0071e3;
			border-radius: 2em;
			color: white;
			border: 0rem solid;
			padding: 0.3%;
			width: 10%;
			height: 2rem;
		}

		#logoutBtn:hover{
			transform: scale(1.05);
			transition: .5s;
			background-color: #0581ff;
		}
	</style>
</head>
<body>
	<?php
		$connect = mysqli_connect('localhost', 'pi', 'wnstj0426', 'JDB') or die("fail");
		$number = $_GET['number'];
		$query = "SELECT nickname, title, content, date, file, rfile FROM board WHERE idx = $number";
		$result = $connect->query($query);
		$rows = mysqli_fetch_assoc($result);

		$nickname = $rows['nickname'];
		$title = $rows['title'];
		$content = $rows['content'];

		session_start();

		$url = "../../index.php";

		if (!isset($_SESSION['nickname'])) {
			?>
			<script>
				alert("권한이 없습니다.");
				location.replace("<?php echo $url ?>");
			</script>
		<?php } else if($_SESSION['nickname'] == $nickname){
			?>
			<h1 style="margin-top: 5%;">수정</h1>
			<a href="javascript:window.history.back();"><button id="logoutBtn" style="width:5%;margin-top: 1%;">뒤로</button></a>
			<hr>
			<div id="main">
				<form action="modify_action.php" method="post">
					<input type="text" name="title" value="<?= $title ?>" class="tinput"><br>
					<textarea name="content" style="width: 50%; height: 20rem;" class="tinput"><?= $content ?></textarea><br><br>
					<input type="hidden" name="number" value="<?= $number ?>">
					<button type="submit" id="logoutBtn" style="margin-top: 3%;">완료</button>
				</form>
			</div>
	<?php } else {?>
		<script>
			alert("권한이 없습니다.");
			location.replace("<?php echo $url ?>");
		</script>
	<?php } ?>
</body>
</html>