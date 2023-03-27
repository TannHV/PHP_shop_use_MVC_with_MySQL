<title>Admin Home</title>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Product</li>
            </ol>
            <?php
            if (isset($_POST['Time'])) {
                $monthYear = $_POST['Time'];
                $month = date('m', strtotime($monthYear));
                $year = date('Y', strtotime($monthYear));
            } else {
                $month = date('m');
                $year = date('Y');
                $monthYear = date('Y-m');
            }
            ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Statistics Product Sold
                                </div>
                                <div class="col-3">
                                    <form method="post" action="./">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <input id="Time" class="form-control" type="month" name="Time" min="2022-01" max="2024-12" value="<?php echo $monthYear ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-primary" type="submit">Choose</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php

                        $tk = new thongke();
                        $result = $tk->getStatistics($month, $year);
                        if ($result->rowCount() != 0) {
                        ?>
                            <script src="https://www.google.com/jsapi"></script>
                            <script type="text/javascript">
                                google.load('visualization', '1.0', {
                                    'packages': ['corechart']
                                });
                                google.setOnLoadCallback(drawVisualization);

                                function drawVisualization() {
                                    var data = new google.visualization.DataTable();
                                    var tenhh = new Array();
                                    var soluongban = new Array();
                                    var dataten = 0;
                                    var slb = 0;
                                    var rows = new Array();
                                    <?php
                                    while ($set = $result->fetch()) {
                                        $tenhh = $set['tenhh'];
                                        $soluongban = $set['soluong'];
                                        echo "tenhh.push('" . $tenhh . "');";
                                        echo "soluongban.push('" . $soluongban . "');";
                                    }

                                    ?>

                                    for (var i = 0; i < tenhh.length; i++) {
                                        dataten = tenhh[i];
                                        slb = parseInt(soluongban[i]);
                                        rows.push([dataten, slb]);

                                    }
                                    data.addColumn('string', 'Name Product');
                                    data.addColumn('number', 'Sold quantity ');
                                    data.addRows(rows);

                                    var options = {
                                        title: 'Statistics of sales',
                                        'width': 1500,
                                        'height': 400,
                                        'backgroundColor': '#ffffff',
                                        colors: ['#7289da'],
                                        is3D: true

                                    };
                                    var chart = new google.visualization.ColumnChart(document.getElementById('myStatistics'));
                                    chart.draw(data, options);

                                    var options2 = {
                                        'width': 1500,
                                        'height': 400,
                                        'backgroundColor': '#ffffff',
                                    };
                                    var chart2 = new google.visualization.PieChart(document.getElementById('myStatistics2'));
                                    chart2.draw(data, options2);

                                }
                            </script>
                            <div class="card-body">
                                <div id="myStatistics"></div>
                            </div>
                            <div class="card-body">
                                <div id="myStatistics2"></div>
                            </div>
                        <?php
                        } else {
                            echo '
                            <div class="card-body">
                                <div class="text-center text-danger">
                                    <h4>No There are no products for sale at this time</h4>
                                </div>
                            </div>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
            </div>
        </div>
    </main>