<?php
session_start();

unset($_SESSION['userID']);
unset($_SESSION['userPW']);

echo "<script>
        alert('로그아웃 하였습니다.');
        location.replace('main.php');
        </script>";
?>
