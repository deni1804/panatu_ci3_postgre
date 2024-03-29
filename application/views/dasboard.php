<div class="container-fluid">


    <!-- Content Row -->
    <div class="row">
        <?php


        foreach ($portdata as $key => $value) {
            $datachart[] = ['label' => $value['tanggaljam'], 'y' => $value['tingkatstatus']];
        };
        //print_r(json_encode($datachart, JSON_NUMERIC_CHECK));
        //print_r(date("Y-d-m H:i:s"));


        foreach ($aissat as $key => $value) {
            $aissatapp[] = ['label' => $value['tanggaljam'], 'y' => $value['tingkatstatus']];
        };

        foreach ($m2prime as $key => $value) {
            $m2p[] = ['label' => $value['tanggaljam'], 'y' => $value['tingkatstatus']];
        };

        foreach ($mrtg as $key => $value) {
            $mg[] = ['label' => $value['tanggaljam'], 'y' => $value['tingkatstatus']];
        };

        foreach ($web as $key => $value) {
            $wb[] = ['label' => $value['tanggaljam'], 'y' => $value['tingkatstatus']];
        };
        //print_r(json_encode($datachart, JSON_NUMERIC_CHECK));
        //echo "</br>";


        foreach ($sekarang as $key => $value) {

            $dataPoints[] = ['label' => $value['item'], 'y' => $value['tingkatstatus']];
        };

        foreach ($kemaren as $key => $value) {

            $dataais[] = ['label' => $value['item'], 'y' => $value['tingkatstatus']];
        };

        foreach ($gps as $key => $value) {

            $comuter[] = ['label' => $value['tanggaljam'], 'y' => $value['tingkatstatus']];
        };

        foreach ($primasaver as $key => $value) {

            $prima[] = ['label' => $value['tanggaljam'], 'y' => $value['tingkatstatus']];
        };

        foreach ($monstrack as $key => $value) {

            $mcl[] = ['label' => $value['tanggaljam'], 'y' => $value['tingkatstatus']];
        };

        foreach ($pipelinemedco as $key => $value) {

            $medco[] = ['label' => $value['tanggaljam'], 'y' => $value['tingkatstatus']];
        };
        /*
        //json kabel bawah laut
        foreach ($kabelbawah as $key => $value) {

            $kabel[] = ['label' => $value['tanggaljam'], 'y' => $value['tingkatstatus']];
        };
*/

        //print_r(json_encode($dataais, JSON_NUMERIC_CHECK));
        //die();
        ?>
        <script>
            window.onload = function() {
                CanvasJS.addColorSet("greenShades",
                    [ //colorSet Array dasboard

                        "#B8860B",
                        "#006400",
                        "#FF8C00",
                        "#483D8B",
                        "#00CED1",
                        "#FF1493",
                        "#800080",
                        "#BDB76B",
                        "#696969",
                        "#B22222"
                    ]

                );

                var chart1 = new CanvasJS.Chart("chartsekarang", {
                    exportEnabled: true,
                    colorSet: "greenShades",
                    animationEnabled: true,
                    title: {
                        text: "Data Monitoring"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0\"%\"",

                        indexLabelFontSize: 16,


                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>

                    }]
                });
                chart1.render();
                var chart2 = new CanvasJS.Chart("chartkemarin", {
                    exportEnabled: true,
                    colorSet: "greenShades",
                    animationEnabled: true,
                    title: {
                        text: "Data Monitoring"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0\"%\"",



                        dataPoints: <?php echo json_encode($dataais, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart2.render();
                /* 
                 var chart3 = new CanvasJS.Chart("chartsejam", {
                     exportEnabled: true,
                     colorSet: "greenShades",
                     animationEnabled: true,
                     title: {
                         text: "Data Monitoring"
                     },
                     axisX: {
                         margin: 30
                     },
                     axisY: {
                         title: "Presentase Status",
                         suffix: "%",
                     },
                     data: [{
                         type: "column",
                         yValueFormatString: "#,##0\"%\"",
                         indexLabelFontSize: 16,
                         dataPoints: <?php //echo json_encode($dataperjam, JSON_NUMERIC_CHECK); 
                                        ?>
                     }]
                 });
                 */
                //chart3.render();

                var chart4 = new CanvasJS.Chart("chartportdata", {
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "AISSAT-PORT$DATA"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        color: "#B8860B",
                        type: "spline",
                        yValueFormatString: "#,##0\"%\"",
                        legendText: "{label}",
                        indexLabelFontSize: 16,



                        dataPoints: <?php echo json_encode($datachart, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart4.render();

                var chart5 = new CanvasJS.Chart("chartaissat", {
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "AISSAT-APP"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        color: "#006400",
                        type: "spline",
                        yValueFormatString: "#,##0\"%\"",
                        legendText: "{label}",
                        indexLabelFontSize: 16,



                        dataPoints: <?php echo json_encode($aissatapp, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart5.render();

                var chart6 = new CanvasJS.Chart("chartm2prime", {
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "M2PRIME"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        color: "#FF8C00",
                        type: "spline",
                        yValueFormatString: "#,##0\"%\"",
                        legendText: "{label}",
                        indexLabelFontSize: 16,



                        dataPoints: <?php echo json_encode($m2p, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart6.render();

                var chart7 = new CanvasJS.Chart("chartmrtg", {
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "SERVER"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        color: "#483D8B",
                        type: "spline",
                        yValueFormatString: "#,##0\"%\"",
                        legendText: "{label}",
                        indexLabelFontSize: 16,



                        dataPoints: <?php echo json_encode($mg, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart7.render();

                var chart8 = new CanvasJS.Chart("chartweb", {
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "WEBSITE"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        color: "#00CED1",
                        type: "spline",
                        yValueFormatString: "#,##0\"%\"",
                        legendText: "{label}",
                        indexLabelFontSize: 16,



                        dataPoints: <?php echo json_encode($wb, JSON_NUMERIC_CHECK); ?>
                    }]
                });

                chart8.render();

                var chart9 = new CanvasJS.Chart("chartgps", {
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "GPS Anouncer"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        color: "#FF1493",
                        type: "spline",
                        yValueFormatString: "#,##0\"%\"",
                        legendText: "{label}",
                        indexLabelFontSize: 16,



                        dataPoints: <?php echo json_encode($comuter, JSON_NUMERIC_CHECK); ?>
                    }]
                });

                chart9.render();

                var chart10 = new CanvasJS.Chart("chartprima", {
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "Prima Saver"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        color: "#800080",
                        type: "spline",
                        yValueFormatString: "#,##0\"%\"",
                        legendText: "{label}",
                        indexLabelFontSize: 16,



                        dataPoints: <?php echo json_encode($prima, JSON_NUMERIC_CHECK); ?>
                    }]
                });

                chart10.render();

                var chart11 = new CanvasJS.Chart("chartmcl", {
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "Monstrack Cileungsi & Meratus"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        color: "#BDB76B",
                        type: "spline",
                        yValueFormatString: "#,##0\"%\"",
                        legendText: "{label}",
                        indexLabelFontSize: 16,



                        dataPoints: <?php echo json_encode($mcl, JSON_NUMERIC_CHECK); ?>
                    }]
                });

                chart11.render();

                var chart13 = new CanvasJS.Chart("chartmedco", {
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "Pipeline Medco"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        color: "#B22222",
                        type: "spline",
                        yValueFormatString: "#,##0\"%\"",
                        legendText: "{label}",
                        indexLabelFontSize: 16,



                        dataPoints: <?php echo json_encode($medco, JSON_NUMERIC_CHECK); ?>
                    }]
                });

                chart13.render();
                /*
                //javascript kabel bawah laut
                                var chart12 = new CanvasJS.Chart("chartkabel", {
                                    exportEnabled: true,
                                    animationEnabled: true,
                                    title: {
                                        text: "Kabel Bawah Laut (SKKL)"
                                    },
                                    axisX: {

                                        margin: 30
                                    },
                                    axisY: {
                                        title: "Presentase Status",
                                        suffix: "%",

                                    },
                                    data: [{
                                        color: "#696969",
                                        type: "spline",
                                        yValueFormatString: "#,##0\"%\"",
                                        legendText: "{label}",
                                        indexLabelFontSize: 16,



                                        dataPoints: <?php echo json_encode($kabel, JSON_NUMERIC_CHECK); ?>
                                    }]
                                });

                                chart12.render();

                */

            }
        </script>
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <small>
                    <div class="card text-center">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Daily Report</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Yesterday Report</a>
                                        <a class="nav-item nav-link" id="nav-bulan-tab" data-toggle="tab" href="#nav-bulan" role="tab" aria-controls="nav-bulan" aria-selected="false">Monthly Reports</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">All Reports</a>

                                    </div>
                                </nav>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Report</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($harian as $row) {
                                                echo "<tr >
									<td >" . $no . "</td>
									<td>" . $row['username'] . "</td>
									<td>" . $row['count'] . "</td>

									</tr>";
                                                $no++;
                                            }

                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Report</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($yesterday as $row) {
                                                echo "<tr>
									<td >" . $no . "</td>
									<td>" . $row['username'] . "</td>
									<td>" . $row['count'] . "</td>
									</tr>";
                                                $no++;
                                            }

                                            ?>
                                        </tbody>
                                    </table>

                                </div>

                                <div class="tab-pane fade" id="nav-bulan" role="tabpanel" aria-labelledby="nav-bulan-tab">
                                    <form action="<?php base_url('Dasboard/') ?>" method='POST'>
                                        <div class="row">
                                            <div class="col-auto ">
                                                <label for="dari_tanggal" class="text-primary">Select Month</label>
                                                <input type="month" name="bulan" id="bulan" value="<?= $this->input->post('bulan') ?>">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary btn-sm" name="caribulan">
                                                    Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>

                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Report</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($bulan as $row) {
                                                echo "<tr >
									<td >" . $no . "</td>
									<td>" . $row['username'] . "</td>
									<td>" . $row['count'] . " &nbsp &nbsp &nbsp <a href='" . site_url() . "dasboard/count_karyawan/" . $row['idkaryawan'] . "' class='btn btn-success btn-sm'>View</a> </td>
									</tr>";
                                                $no++;
                                            }

                                            ?>
                                        </tbody>
                                    </table>

                                </div>

                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>History All</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($allrepots as $row) {
                                                echo "<tr>
									<td >" . $no . "</td>
									<td>" . $row['username'] . "</td>
                                    <td>
                                    <a href='" . site_url() . "history/history_karyawan/" . $row['idkaryawan'] . "' class='btn btn-success btn-sm'>View</a> </td>
									</tr>";
                                                $no++;
                                            }

                                            ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                </small>
            </div>

        </div>







        <!--
        <div class="col-xl-6 col-lg-7">

            Area Chart 
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Report</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Report</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                /*
                                $no = 1;
                                foreach ($bulanan as $row) {
                                    echo "<tr>
									<td >" . $no . "</td>
									<td>" . $row['username'] . "</td>
									<td>" . $row['count'] . "</td>
									</tr>";
                                    $no++;
                                }
*/
                                ?>
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>



        </div>

                            -->
        <div class="col-xl-6 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Today's Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartsekarang" class="w-100 h-100"></div>
                    </div>
                </div>
            </div>



        </div>
        <div class="col-xl-6 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yesterday's Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartkemarin" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>



        </div>
        <div class="col-xl-6 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">AISSAT-PORT$DATA Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartportdata" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>



        </div>
        <div class="col-xl-6 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">AISSAT-APP Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartaissat" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>



        </div>
        <div class="col-xl-6 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">M2PRIME Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartm2prime" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>



        </div>
        <div class="col-xl-6 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">MRTG Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartmrtg" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>



        </div>
        <div class="col-xl-6 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">WEBSITE Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartweb" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>



        </div>
        <div class="col-xl-6 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">GPS ANOUNCER Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartgps" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>



        </div>
        <div class="col-xl-6 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">PRIMA SAVER Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartprima" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>

        </div>

        <div class="col-xl-6 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">MONSTRACK Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartmcl" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>

        </div>

        <div class="col-xl-6 col-lg-7">

             
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">PIPELINE MEDCO Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartmedco" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>

        </div>
        <!-- Area Chart
        <div class="col-xl-6 col-lg-7">

             
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kabel Bawah Laut (SKKL)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartkabel" class="w-100 h-100"></div>
                    </div>


                </div>
            </div>

        </div>
-->

    </div>
</div>