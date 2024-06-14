<?php
    // 순서(idx), work, id, time, ip, (비고)

    if(isset($_GET["didx"]))
    {
        $didx = $_GET["didx"];
        $sql = "delete from log where idx='$didx'";
        $result = mysqli_query($conn, $sql);
    }

    $sql = "select * from log order by idx desc limit 50";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    ?>

    <script>
        function confirmDelete(pidx)
        {
            if(confirm('삭제된 데이터는 복구할 수 없습니다.\n\r정말 삭제하시겠습니까?'))
            {
                location.href="index.php?cmd=log&didx="+pidx;
            }
        }
    </script>

    <div class="row">
        <div class="col colLine">순서</div>
        <div class="col-4 colLine">작업</div>
        <div class="col colLine">id</div>
        <div class="col colLine">time</div>
        <div class="col colLine">ip</div>
        <div class="col colLine">국가</div>
        <div class="col colLine">비고</div>
    </div>

    <?php
        function ip2country($ip)
        {
            $splitIP = explode(".", $ip);
            include "ip_files/" . $splitIP[0] . ".php";

            $code = ($splitIP[0] * 16777216) +($splitIP[1] * 65536) + ($splitIP[2] * 256) + $splitIP[3];
            foreach($ranges as $key => $value)
            {
                if($key <= $code)
                {
                    if($ranges[$key][0] >= $code)
                    {
                        $country = $ranges[$key][1];
                        break;
                    }
                }
            }

            if(!isset($country))
                $country = "";

            if(isset($country) and $country == "")
                $country = "noflag";

            return $country;
        }


        while($data)
        {
            $nation = ip2country($data["ip"]);
            $flag = "<img src='flags/$nation.gif'>"
            ?>
            <div class="row">
                <div class="col colLine"><?php echo $data["idx"]?></div>
                <div class="col-4 colLine"><?php echo $data["work"]?></div>
                <div class="col colLine"><?php echo $data["id"]?></div>
                <div class="col colLine"><?php echo $data["time"]?></div>
                <div class="col colLine"><?php echo $data["ip"]?></div>
                <div class="col colLine"><?php echo $flag ?></div>
                <div class="col colLine">
                    <button type="button" class="btn btn-primary btn-sm" onClick=confirmDelete(<?php echo $data["idx"]?>)>삭제</button>
                </div>
            </div>
            <?php
            $data = mysqli_fetch_array($result);
        }
    ?>


    <?php
?>