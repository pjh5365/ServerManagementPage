<?php
header('Content-Type: application/json');   //json형식 만들기
$listNum = $_GET['listNum'];  //리스트에서 post방식으로 글의 번호 전달

$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정
$sql = "SELECT * FROM boardlist WHERE listNum = $listNum;";
$result = mysqli_query($conn, $sql);

$jsonData = array();
if($result) {   //쿼리에 대한 결과값이 있을때만
    while ($arr = mysqli_fetch_array($result)) {
        $title = $arr['title'];
        $content = $arr['content'];
        $userID = $arr['userID'];
        $time = $arr['time'];
        $data = array("title" => $title,"content" =>$content ,"userID" => $userID, "time" => $time);
        array_push($jsonData, $data);
    }
}
$output = json_encode($jsonData, JSON_UNESCAPED_UNICODE);    //한글이 안깨지게 하기 위해 인코딩
echo urldecode($output)
?>