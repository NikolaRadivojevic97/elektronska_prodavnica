<?php include("admin_header.html");?>
<br><br>
<?php
include('db.php');

$query = '';
$output = array();
$query .= "SELECT proizvodjac, count(*) as broj from model_telefona group by proizvodjac";

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


$query2 = '';
$output2 = array();
$query2 .= "SELECT naziv,cena FROM model_telefona";

$statement2 = $connection->prepare($query2);
$statement2->execute();
$result2 = $statement2->fetchAll();

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Proizvodjac', 'Broj modela'],
            <?php
                foreach($result as $row)
                {
                    echo "['".$row["proizvodjac"]."',".$row["broj"]."],";
                }
            ?>
        ]);

        var options = {
          title: 'Broj modela po proizvodjacu'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Model', 'Cena'],
          <?php
                foreach($result2 as $row2)
                {
                    echo "['".$row2["naziv"]."',".$row2["cena"]."],";
                }
            ?>
            ]);

        var options = {
          title: 'Cena telefona',
          legend: { position: 'none' },
        };

        var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

    </script>
  </head>
  <body>
    <div id="piechart" style="width:100%; height: 500px;"></div>
    <div id="chart_div" style="width:100%; height: 700px;"></div>
  </body>
</html>