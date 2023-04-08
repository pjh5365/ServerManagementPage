<?php
$userName = $_POST['userName'];
$userID = $_POST['userID'];
$userPW = $_POST['userPW'];

$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
$sql = "INSERT INTO member (userID, userName, userPW) ";
$sql .= "VALUES('$userID', '$userName', '$userPW');";

if(mysqli_query($conn, $sql)) {
    echo "<script>
        alert('회원가입 성공\\n로그인 페이지로 이동합니다.');
        location.replace('login.php');
        </script>";
}
else {
    echo "<script>
        alert('회원가입에 실패하였습니다.');
        location.replace('join.php');
        </script>";
}
?>