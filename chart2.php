<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['시간', '클릭수'],

        <?php
            // 2024-06-14 00:00:00 ==> 2024-6-3 3:4:5
            $today = Date('Y-m-d');
            for($i=0; $i<24; $i++)
            {
                $next = $i + 1;
                $sql = "select * from log 
                            where time>='$today $i:00:00' and 
                                    time< '$today $i:59:59' ";
                $result = mysqli_query($conn, $sql);
                $click = mysqli_num_rows($result);
                echo "[ '$i:00' , $click ],";
            }
        ?>
    ]);

    var options = {
        title: '접속 현황',
        curveType: 'function',
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('kpc_chart'));

    chart.draw(data, options);
    }
</script>

<div class="row">
    <div class="col">
        <div id="kpc_chart" style="width: 100%; height: 500px"></div>
    </div>
</div>

<script>
    setTimeout(function(){
        location.href='index.php?cmd=chart2';
    }, 5000);
</script>