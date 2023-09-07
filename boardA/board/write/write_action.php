<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		echo "<script>alert('로그인을 해주세요');</script>";
		echo "<script>location.replace('../../../user/login/login.php');</script>";
	}
	$connect = mysqli_connect("localhost", "pi", "wnstj0426", "JDB") or die("fail");
	$code = $_SESSION['code'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$nickname = $_SESSION['nickname'];
	$date = date('Y-m-d');
	$tmpfile =  $_FILES['b_file']['tmp_name'];
	$o_name = $_FILES['b_file']['name'];
	$ext = substr(strrchr($o_name, '.'), 1); 
	$filename = date('YmdHis').$nickname.".".$ext;
	$folder = "../../../JDB/JDB/upload/".$filename;
	move_uploaded_file($tmpfile,$folder);

	

	$url = '../board.php';

	$query = "INSERT INTO board (code, nickname, title, content, date, file, rfile ) VALUES ('$code','$nickname', '$title', '$content', '$date', '$o_name', '$filename');";

	$result = $connect->query($query);
	if($result){
?>
<script>
	alert("<?php echo "게시글이 등록되었습니다." ?>");
	location.replace("<?php echo $url ?>");	
</script>
<?php
} else{
	echo "게시글 등록에 실패하였습니다.";
}

mysql_close($connect);
?>
