<?php
    $id = $_POST["id"];
    $pass = $_POST["pass"];

    echo "id = $id , pass = $pass <br>";

    if($id == "admin" and $pass== "1111")
    {
        $_SESSION["sess_id"] = $id;
        $_SESSION["sess_name"] = "관리자";
        $_SESSION["sess_level"] = 9;
        $msg = "관리자님 반갑습니다.";
    }else if($id == "test" and $pass== "1111")
    {
        $_SESSION["sess_id"] = $id;
        $_SESSION["sess_name"] = "테스터";
        $_SESSION["sess_level"] = 1;
        $msg = "홍길동님 반갑습니다.";
    }else
    {
        $msg = "아이디나 비번을 확인하세요.";
    }

    echo "
    <script>
        alert('$msg');
        location.href='index.php';
    </script>
    ";
    

?>