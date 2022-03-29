<div class="container-fluid">


    <!-- Content Row -->
    <div class="row">
        <?php

        foreach ($portdata as $key => $value) {
            $datachart[] = ['label' => $value['TanggalJam'], 'y' => $value['TingkatStatus']];
        };
        //print_r(json_encode($datachart, JSON_NUMERIC_CHECK));
        //echo "</br>";
        ?>
        <?php
        foreach ($aissat as $key => $value) {
            $aissatapp[] = ['label' => $value['TanggalJam'], 'y' => $value['TingkatStatus']];
        };
        //print_r(json_encode($aissatapp, JSON_NUMERIC_CHECK));
        //echo "</br>";
        ?>
        <?php
        foreach ($m2prime as $key => $value) {
            $m2p[] = ['label' => $value['TanggalJam'], 'y' => $value['TingkatStatus']];
        };
        //print_r(json_encode($m2p, JSON_NUMERIC_CHECK));
        //echo "</br>";
        ?>
        <?php
        foreach ($mrtg as $key => $value) {
            $mg[] = ['label' => $value['TanggalJam'], 'y' => $value['TingkatStatus']];
        };
        //print_r(json_encode($mg, JSON_NUMERIC_CHECK));
        //echo "</br>";
        ?>
        <?php
        foreach ($web as $key => $value) {
            $wb[] = ['label' => $value['TanggalJam'], 'y' => $value['TingkatStatus']];
        };
        //print_r(json_encode($wb, JSON_NUMERIC_CHECK));
        //echo "</br>";
        ?>
        <?php
        // foreach ($pantau as $key) {
        //  $dataperjam[] = ['label' => $key['Item'], 'y' => $key['TingkatStatus']];
        // };
        // print_r($dataperjam = json_encode($dataperjam, JSON_NUMERIC_CHECK));
        //die();
        ?>

        <?php

        foreach ($sekarang as $key => $value) {

            $dataPoints[] = ['label' => $value['Item'], 'y' => $value['TingkatStatus']];
        };
        //echo "</br>";
        //print_r(json_encode($dataPoints, JSON_NUMERIC_CHECK));
        //die();
        ?>
        <?php
        foreach ($kemaren as $key => $value) {

            $dataais[] = ['label' => $value['Item'], 'y' => $value['TingkatStatus']];
        };

        //print_r(json_encode($dataais, JSON_NUMERIC_CHECK));
        //die();
        ?>
        <script>
            window.onload = function() {
                CanvasJS.addColorSet("greenShades",
                    [ //colorSet Array

                        "#6d78ad",
                        "#51cda0",
                        "#df7970",
                        "#ae7d99",
                        "#c9d45c"
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
                        color: "#6d78ad",
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
                        color: "#51cda0",
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
                        color: "#df7970",
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
                        text: "MRTG"
                    },
                    axisX: {

                        margin: 30
                    },
                    axisY: {
                        title: "Presentase Status",
                        suffix: "%",

                    },
                    data: [{
                        color: "#ae7d99",
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
                        color: "#c9d45c",
                        type: "spline",
                        yValueFormatString: "#,##0\"%\"",
                        legendText: "{label}",
                        indexLabelFontSize: 16,



                        dataPoints: <?php echo json_encode($wb, JSON_NUMERIC_CHECK); ?>
                    }]
                });

                chart8.render();

            }
        </script>

        <!--
        <div class="col-xl-12 col-lg-7">

            Area Chart
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hourly Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">

                        <div id="chartsejam" style="height: 300px; width: 100%;"></div>
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

                        <div id="chartsekarang" style="height: 300px; width: 100%;"></div>
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

                        <div id="chartkemarin" style="height: 300px; width: 100%;"></div>
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

                        <div id="chartportdata" style="height: 300px; width: 100%;"></div>
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

                        <div id="chartaissat" style="height: 300px; width: 100%;"></div>
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

                        <div id="chartm2prime" style="height: 300px; width: 100%;"></div>
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

                        <div id="chartmrtg" style="height: 300px; width: 100%;"></div>
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

                        <div id="chartweb" style="height: 300px; width: 100%;"></div>
                    </div>


                </div>
            </div>



        </div>
    </div>
</div>