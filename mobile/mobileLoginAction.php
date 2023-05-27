<?php
$userID = $_POST['userID'];
$userPW = $_POST['userPW'];

$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정
$sql = "SELECT * FROM member where userID = '$userID' && userPW = '$userPW';";
$result = mysqli_query($conn, $sql);
$list = mysqli_num_rows($result);
$arr = mysqli_fetch_array($result);

if($list) { //쿼리로 받아온 리스트에 요청한 사용자 정보가 있다면 로그인
    echo 1;
}
else {
    echo 0;
}
?>