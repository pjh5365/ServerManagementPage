<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>서버관리 회원가입 페이지</title>
</head>
<body>
    <br><br>
    <h1 style="text-align: center">회원가입</h1>
    <form name="join" method="post" action="joinAction.php">
        <table style="text-align: center" align="center" border="10" width="300" height="100">
            <tr>
                <td>이름</td>
                <td>
                    <input type="text" name="userName">
                </td>
            </tr>
            <tr>
                <td>아이디</td>
                <td>
                    <input type="text" name="userID">
                </td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td>
                    <input type="password" name="userPW">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="회원가입">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>