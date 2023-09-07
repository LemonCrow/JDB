<?php
$connect = mysqli_connect('localhost', 'pi', 'wnstj0426', 'JDB') or die("fail");
$number = $_GET['number'];

$query = "SELECT nickname FROM board WHERE idx = $number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$nickname = $rows['nickname'];

session_start();

$url = "../../index.php";
?>

<?php
if (!isset($_SESSION['nickname'])) {
?>
<script>
	alert('권한이 없습니다.');
	location.replace("<?php echo $url ?>");
</script>

<?php } else if($_SESSION['nickname'] == $nickname){
	$query1 = "DELETE FROM board WHERE idx = $number";
	$result1 = $connect->query($query1); ?>
	<script>
		alert('게시글이 삭제되었습니다.');
		location.replace("../board.php");
	</script>

<?php } else { ?>
	<script>
		alert('권한이 없습니다');
		location.replace("<?php echo $url ?>");
	</script>
<?php }
?>