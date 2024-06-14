<?php
    if(!isset($_GET["p"]))
        $p = 1;
    else
        $p = $_GET["p"];

    $URL = "https://search.naver.com/search.naver?ssc=tab.news.all&where=news&sm=tab_jum&query=삼성전자";
    // cURL : Client URL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $URL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // 결과를 문자열로 반환
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 원격서버의 인증서 유효성 검사 안함
    //curl_setopt($curl, CURLOPT_COOKIEJAR, "cookie.txt");

    $response = curl_exec($curl);

    //echo $response;

    $split = explode("news_tit", $response);
    for($i=1; $i<count($split); $i++)
    {
        $split2 = explode("</a>", $split[$i]);
        $split3 = explode("title=", $split2[0]);
        $title = str_replace("'", "", $split3[1]);
        $title = str_replace('"', "", $title);
        $splitTitle = explode(">", $title);
        $title = $splitTitle[0];


        echo "<pre>" . $title . "</pre><hr>";
    }
?>

<div class="row">
    <div class="col">
        <textarea class="form-control" rows="10"><?php echo $response?></textarea>
    </div>
</div>