function testPwd() {
	var p1 = document.getElementById('password1').value;
	var p2 = document.getElementByd('password2').value;
	if(p1 != p2) {
		alert('비밀번호가 일치하지 않습니다');
		return false;
	}
}