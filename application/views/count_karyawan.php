<div class="container-fluid">
    <div class="row">

        <!-- Tabel -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Report <?php
                                                                            foreach ($idkaryawan as $row) {
                                                                                echo $row['namalengkap'];
                                                                            }
                                                                            ?>
                    </h6>

                    <?php
                    $id = $this->uri->segment(3);
                    echo "<form action='" . site_url() . "dasboard/count_karyawan/" . $id . "' method='POST'>";
                    ?>

                    <div class="row">
                        <div class="col-auto ">
                            <label for="dari_tanggal" class="text-primary">Select Month</label>
                            <input type="month" name="month" id="month" value="<?= $this->input->post('month') ?>">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary btn-sm" name="search">
                                Search
                            </button>
                        </div>
                    </div>
                    </form>
                </div>

                <?php
                foreach ($month as $key => $value) {
                    $datachart[] = ['label' => $value['jam'], 'y' => $value['count']];
                };
                //print_r(json_encode($datachart, JSON_NUMERIC_CHECK));
                //print_r(date("Y-d-m H:i:s"));
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
                                "#696969"
                            ]

                        );
                        var chart1 = new CanvasJS.Chart("chartreport", {
                            exportEnabled: true,
                            animationEnabled: true,
                            title: {
                                text: "Report   <?php foreach ($idkaryawan as $row) {
                                                    echo $row['namalengkap'];
                                                } ?>"
                            },
                            subtitles: [{
                                text: "Periode <?= $this->input->post('month') ?>       Jumlah  <?php foreach ($jumlah as $row) {
                                                                                                    echo $row['count'];
                                                                                                } ?> Report ",
                                fontSize: 15,
                            }],
                            axisX: {

                                margin: 30
                            },
                            axisY: {
                                title: "Report",
                                suffix: " Report",

                            },
                            data: [{
                                color: "#B8860B",
                                type: "spline",
                                yValueFormatString: "#,##0\"Report\"",
                                legendText: "{label}",
                                indexLabelFontSize: 16,



                                dataPoints: <?php echo json_encode($datachart, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart1.render();
                    }
                </script>
                <!-- Card Body -->
                <div class="card-body ">
                    <div class="chart-area">

                        <div id="chartreport" class="w-100 h-100"></div>
                    </div>
                </div>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $historyall['count'];
                                                                    ?> Repots</h6>


                </div>
            </div>
        </div>



    </div>
</div>