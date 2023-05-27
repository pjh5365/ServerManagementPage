<?php
header('Content-Type: application/json');   //json형식 만들기
$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정

if($conn) {
    $isCreated = mysqli_query($conn, "DESC boardlist;");    //boardlist를 찾을 수 없을때만 실행
    if(!$isCreated) {   //테이블이 없을때만 실행
        $table = mysqli_query($conn, "CREATE TABLE boardlist (
                                        listNum int AUTO_INCREMENT,
                                        userID varchar(20) NOT NULL,
                                        userName varchar(20) NOT NULL,
                                        title varchar(50) NOT NULL,
                                        content varchar(500) NOT NULL,
                                        time TIMESTAMP DEFAULT NOW(),
                                        updateTime TIMESTAMP DEFAULT NOW() ON UPDATE NOW(),
                                        primary key(listNum))");
    }
}
else{
    echo "<h3>DB연동에 실패하였습니다.</h3>";
}

$sql = "SELECT * FROM boardlist ORDER BY listNum DESC"; //내림차순으로 검색
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);   //검색된 값들의 row값을 받아옴
$jsonData = array();
if($result) {   //쿼리에 대한 결과값이 있을때만
    while ($arr = mysqli_fetch_array($result)) {
        $title = $arr['title'];
        $userID = $arr['userID'];
        $listNum = $arr['listNum'];
        $data = array("title" => $title, "userID" => $userID, "listNum" => $listNum);
        array_push($jsonData, $data);
    }
}
$output = json_encode($jsonData, JSON_UNESCAPED_UNICODE);    //한글이 안깨지게 하기 위해 인코딩
echo urldecode($output)
?>
