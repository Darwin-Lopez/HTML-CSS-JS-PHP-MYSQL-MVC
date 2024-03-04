<?php
require_once("../model/ClassProyecto.php");
$proyecto = new Proyecto();
$totalProyectos = $proyecto->getProyectos();
?>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php
                foreach ($totalProyectos as $datos) {
                    echo "['" . $datos["nombre"] . "', " . count($datos) . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Total de proyectos <?php echo count($totalProyectos) ?>',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="piechart_3d" style="width: 100%; height: 300px"></div>
</body>

</html>