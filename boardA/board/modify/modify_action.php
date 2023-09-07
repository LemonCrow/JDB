<?php
$connect = mysqli_connect('localhost', 'pi', 'wnstj0426', 'JDB') or die('fail');

$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];

$date = date('Y-m-d');

$query = "UPDATE board set title='$title', content='$content', date='$date' WHERE idx=$number";
$result = $connect->query($query);
if($result){
	?>
	<script>
		alert('수정되었습니다.');
		location.replace("../read/read.php?number=<?= $number ?>");
	</script>
<?php } else {
	echo "다시 시도해주세요";
}
?>


