<?php
$listNum = $_POST['listNum'];

$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정
$sql = "DELETE FROM boardlist WHERE listNum = '$listNum'";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "1";
}
?>