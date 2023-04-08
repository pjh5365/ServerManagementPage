<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
</head>
<body>
    <br><br>
    <h1 style="text-align: center">로그인</h1>
    <form name="login" method="post" action="loginAction.php">
        <table style="text-align: center" align="center" border="10" width="300" height="100">
            <tr>
                <td>아이디</td>
                <td>
                    <input type="text" name="userID"> <br><br>
                </td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td>
                    <input type="password" name="userPW"> <br><br>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="로그인">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>