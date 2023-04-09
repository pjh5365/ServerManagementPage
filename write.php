<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>글 쓰기</title>
</head>
<body>
    <h1 style="text-align: center">글 작성</h1>
    <form name="write" method="post" action="writeAction.php">
        <table align="center" border="10" width="1200">
            <tr>
                <td height="20" style="text-align: center">제목</td>
                <td>
                    <input type="text" name="title">
                </td>
            </tr>
            <tr>
                <td height="200" style="text-align: center">내용</td>
                <td>
                    <textarea cols="80" rows="10" name="content"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="글 작성">
                </td>
            </tr>
        </table>
    </form>
</body>