<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Year', '입사자', '퇴사자', '휴직자'],
        ['2004',  1000,      400, 300],
        ['2005',  1170,      460, 130],
        ['2006',  660,       1120, 980],
        ['2007',  1030,      540, 800], 
        ['2008',  730,      440, 500]
    ]);

    var options = {
        title: '우리회사 직원 현황',
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
