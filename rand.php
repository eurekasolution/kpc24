<form method="post" action="index.php?cmd=rand">
<div class="row">
    <div class="col-2">횟수</div>
    <div class="col">
        <input type="number" name="no" class="form-control" value="10" step="1">
    </div>
    <div class="col-2">
        <button type="submit" class="btn btn-primary">실행</button>
    </div>
</div>
</form>

<?php
    if(isset($_POST["no"]))
    {
        $no = $_POST["no"];

        $dice[1] = 0;
        $dice[2] = 0;
        $dice[3] = 0;
        $dice[4] = 0;
        $dice[5] = 0;
        $dice[6] = 0;

        for($i = 1; $i <= $no; $i++)
        {
            $rand = rand(1, 6);
            $dice[$rand]++;
        }

        for($i=1; $i<=6; $i++)
        {
            echo "[ $i ] $dice[$i] <br>";
        }
    }
?>