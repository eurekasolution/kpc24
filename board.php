<?php
    if(isset($_GET["mode"]))
        $mode = $_GET["mode"];
    else
        $mode = "list";

    if($mode == "list")
    {
        // 순서(X), 제목(0), 작성자(0), 작성일(x)

        $Y = Date('Y');
        $y = Date('y');
        $m = Date('m');
        $d = Date('d');

        $today = Date('Y') . "-" . Date('m') . "-" . Date('d');

        echo "Y = $Y , y = $y , m = $m, d = $d, today = $today<br>";


        ?>
        <div class="row">
            <div class="col d-none col-md-1 d-md-block colLine">순서</div>
            <div class="col-8 col-md-6 colLine">제목</div>
            <div class="col-4 col-md-2 colLine">작성자</div>
            <div class="col d-none d-md-block col-md-3 colLine">작성일</div>
        </div>
        <?php

        $sql = "select * from bbs order by idx desc";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        while($data)
        {
            $time = $data["time"];
            $split = explode(" ", $time);

            if($split[0] == $today)
            {   // 2024-06-13 12:34:56
                $printTime = substr($split[1], 0, 5);
            }else
            {
                $printTime = $split[0];
            }

            ?>
            <div class="row">
                <div class="col d-none col-md-1 d-md-block colLine"><?php echo $data["idx"] ?></div>
                <div class="col-8 col-md-6 colLine ellipsis"><a href="index.php?cmd=board&mode=show&idx=<?php echo $data["idx"] ?>"><?php echo $data["title"] ?></a></div>
                <div class="col-4 col-md-2 colLine"><?php echo $data["name"] ?></div>
                <div class="col d-none d-md-block col-md-3 colLine"><?php echo $printTime ?></div>
            </div>
            <?php         
            $data = mysqli_fetch_array($result);
        }

        ?>
        <div class="row">
            <div class="col-3 colLine">
                <button type="button" class="btn btn-primary btn-sm" onClick="location.href='index.php?cmd=board&mode=write' ">글쓰기</button>
            </div>
            <div class="col colLine">[1] [2] [3]</div>
            <div class="col colLine">검색</div>
        </div>
        <?php
    } 
    else if($mode == "doWrite")
    {
        $title = $_POST["title"];
        $name = $_POST["name"];
        $html = $_POST["html"];

        // 공격은 왜 당하는가?
        // <script> <a> <   ScRiPT >
        // <  : &lt;   > : &gt;
        // 동해물과 &nbsp; &nbsp;     백두산이

        $title = str_replace("<", "&lt;", $title);
        $title = str_replace(">", "&gt;", $title);

        $html = str_replace("<", "&lt;", $html);
        $html = str_replace(">", "&gt;", $html);

        $title = addslashes($title);
        $html = addslashes($html);

        $sql = "insert into bbs (title, name, html, time)
                     values('$title', '$name', '$html', now())";
        $result = mysqli_query($conn, $sql);
        if($result)
            $msg = "등록 되었습니다. : ";
        else
            $msg = "등록 에러!!!";
        
        echo "
        <script>
            alert('$msg');
            location.href='index.php?cmd=board';
        </script>
        ";
        


    }
    else if($mode == "write")
    {
        // 1. 제목
        // 2. 작성자 
        // 3. 글쓰기
        // 4. 완료, 목록
        ?>

        <form method="post" action="index.php?cmd=board&mode=doWrite">
        <div class="row">
            <div class="col-3 col-md-2 colLine">제목</div>
            <div class="col colLine">
                <input type="text" name="title" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3 col-md-2 colLine">작성자</div>
            <div class="col colLine">
                <input type="text" name="name" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col colLine">
                <textarea name="html" rows="10" class="form-control" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col colLine text-center">
                <button type="submit" class="btn btn-primary btn-sm">완료</button>
                <button type="button" class="btn btn-primary btn-sm" onClick="location.href='index.php?cmd=board' ">목록</button>
            </div>
        </div>

        </form>

        <?php
    }else if($mode == "show")
    {
        $idx = $_GET["idx"];
        echo "idx = $idx<br>";
    }
?>