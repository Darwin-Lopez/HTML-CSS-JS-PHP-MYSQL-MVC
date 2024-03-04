<?php
require_once("../model/ClassEmpleado.php");
require_once("../model/ClassProyecto.php");
$empleado = new Empleado();
$proyecto = new Proyecto();
$totalEmpleados = $empleado->getAllEmpleados();
$totalProyectos = $proyecto->getProyectos();
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Categoria');
        data.addColumn('number', 'Total');
        data.addColumn({type: 'string', role: 'style'}); // Agregamos una columna para el color

        data.addRows([
            ['Empleados', <?= count($totalEmpleados) ?>, '#3366cc'], // Color azul para empleados
            ['Proyectos', <?= count($totalProyectos) ?>, '#dc3912']  // Color rojo para proyectos
        ]);

        var options = {
            title: "Total de empleados (<?= count($totalEmpleados) ?>) y proyectos (<?= count($totalProyectos) ?>) existentes",
            width: 400,
            height: 250,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
            annotations: {
                textStyle: {
                    fontSize: 12,
                    color: 'black'
                }
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(data, options);
    }
</script>
<div id="columnchart_values" style="width: 100%; height: 300px"></div>
