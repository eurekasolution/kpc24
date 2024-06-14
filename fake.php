<form method="post" action="index.php?cmd=fake">
    <div class="row">
        <div class="col colLine">생성수</div>
        <div class="col colLine">
            <input type="number" name="no" class="form-control" min="10" max="1000000" step="10" value="100">
        </div>
        <div class="col colLine">
            <button type="submit" class="btn btn-primary">Generate!!</button>
        </div>
    </div>
</form>

<?php
    if(isset($_POST["no"]) and $_POST["no"])
    {
        $name1 = "김,김,김,김,이,이,이,박,박,최,정,오,구,선우,독고,강,황,민,고,곽,나,노,마,서,신,심,안,윤,은,지,임";
        $name2 = "병,석,연,윤,인,정,효,성,완,영,택,계,규,근,수,영,종,지,태,현";
        $name3 = "포,하,구,훈,림,주,진,훈,선,현,영종,호,태,은,연,임,조미,길,현,석,우";

        $no = $_POST["no"];
        $split1 = explode(",", $name1);
        $split2 = explode(",", $name2);
        $split3 = explode(",", $name3);

        ?>
        <div class="row" id="copy">
            <br><br>
        <table class='table table-bordered'>
            <tr>
                <td>순서</td>
                <td>이름</td>
                <td>나이</td>
            </tr>
        <?php
        for($i=1; $i<=$no; $i++)
        {
            $n1 = rand(0, count($split1) -1);
            $n2 = rand(0, count($split2) -1);
            $n3 = rand(0, count($split3) -1);
            $name = "$split1[$n1]$split2[$n2]$split3[$n3]";

            $age = rand(10, 99);
            echo "
            <tr>
                <td>$i</td>
                <td>$name</td>
                <td>$age</td>
            </tr>
            ";
        }
        ?>
        </table>
        <br><br>
        </div>
        <?php
    }
?>