<?php
require_once("../model/ClassEmpleado.php");
$empleado = new Empleado();
$totalEmpleados = $empleado->getAllEmpleados();
?>
<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Total'],
      <?php
      foreach ($totalEmpleados as $dato) {
        echo "['" . $dato["nombre"] . "', " . count($dato) . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Total de empleados <?php echo count($totalEmpleados) ?>'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>
</head>
<body>
  <div id="piechart" style="width: 100%; height: 300px"></div>
</body>
</html>
