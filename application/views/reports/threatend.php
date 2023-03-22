<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Threatend Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <!-- Small cardes (Stat card) -->
        <div class="row">
            <div class="col-md-12 col-xs-12">

                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
                        <div id="GoogleLineChart" style="height: 400px; width: 100%"></div>

                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script>
                            google.charts.load('current', {
                                'packages': ['corechart', 'bar']
                            });

                            // Line Chart
                            var values = {
                                "Low": 40,
                                "Medium": 70,
                                "High": 100
                            }
                            var d = {};
                            fetch('../response.json')
                                .then((response) => response.json())
                                .then((json) => {
                                    d = json.Threatend[0];
                                    google.charts.setOnLoadCallback(drawBarChart);
                                    console.log(json)
                                });

                            function drawBarChart() {
                                console.log(d);
                                var maindata = [
                                    ['Geolocation', 'Attack Complexity', {
                                        role: 'annotation'
                                    }, 'Confidentiality Impact', {
                                        role: 'annotation'
                                    }],
                                    [d.threat1_geolocation, values[d.threat1_attackcomplexity], d.threat1_attackcomplexity, values[d.threat1_confidentialityimpact], d.threat1_confidentialityimpact],
                                    [d.threat2_geolocation, values[d.threat2_attackcomplexity], d.threat2_attackcomplexity, values[d.threat2_confidentialityimpact], d.threat2_confidentialityimpact],
                                    [d.threat3_geolocation, values[d.threat3_attackcomplexity], d.threat3_attackcomplexity, values[d.threat3_confidentialityimpact], d.threat3_confidentialityimpact],
                                    [d.threat4_geolocation, values[d.threat4_attackcomplexity], d.threat4_attackcomplexity, values[d.threat4_confidentialityimpact], d.threat4_confidentialityimpact]
                                ];
                                console.log(maindata, 'maindata');
                                var data = google.visualization.arrayToDataTable(maindata);
                                var options = {
                                    title: 'Column chart of Attack Complexity and Confidentiality Impact Geolocation wise',
                                    // curveType: 'function',
                                    legend: {
                                        position: 'top'
                                    },
                                    // isStacked: true,
                                    is3D: true,
                                };
                                var chart = new google.visualization.ColumnChart(document.getElementById('GoogleLineChart'));
                                chart.draw(data, options);
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>