<div class="container-fluid">
	<div class="row">

		<!-- Tabel -->
		<div class="col-xl-7 col-lg-6">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Today's History</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="table-responsive">
						<div class="table-wrapper-scroll-y my-custom-scrollbar">
							<small>
								<table id="data" class="table table-bordered mb-0" style="width:100%">
									<thead>
										<tr>
											<th>Jam</th>
											<th>Item</th>
											<th>Status</th>
											<th>Keterangan</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$status = array(
											'1' => 'OK',
											'2' => 'Cukup Baik',
											'3' => 'Kurang Baik',
											'4' => 'Trouble',
										);
										foreach ($sekarang as $row) {
											$pchenter = explode("\r\n", $row['keterangan']);
											$txtout = "";
											for ($i = 0; $i <= count($pchenter) - 1; $i++) {
												$pchpart = str_replace($pchenter[$i], "<br>" . $pchenter[$i], $pchenter[$i]);
												$txtout .= $pchpart;
											}

											echo "<tr>
									<td>" . $row['jam'] . "</td>
									<td>" . $row['item'] . "</td>
									<td >" . $status[$row['status']] . "</td>
									<td >" . $txtout .  "</td>
									</tr>";
										}
										?>
									</tbody>
								</table>
							</small>
						</div>
					</div>
				</div>
			</div>
		</div>




		<div class="col-xl-5 col-lg-6">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Yesterday's History</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">

					<div class="table-responsive">
						<div class="table-wrapper-scroll-y my-custom-scrollbar">
							<small>
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Jam</th>
											<th>Item</th>
											<th>Status</th>
											<th>Keterangan</th>
										</tr>
									</thead>

									<tbody>
										<?php
										foreach ($kemaren as $row) {
											$pchenter = explode("\r\n", $row['keterangan']);
											$txtoutyesterday = "";
											for ($i = 0; $i <= count($pchenter) - 1; $i++) {
												$pchpart = str_replace($pchenter[$i], "<br>" . $pchenter[$i], $pchenter[$i]);
												$txtoutyesterday .= $pchpart;
											}

											echo "<tr>
									<td >" . $row['jam'] . "</td>
									<td>" . $row['item'] . "</td>
									<td>" . $status[$row['status']] . "</td>
									<td >" . $txtoutyesterday .  "</td>
									</tr>";
										}
										?>
									</tbody>
								</table>
							</small>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-12 col-lg-7">

			<!-- Area Chart -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">List Report</h6>
				</div>
				<div class="card-body">
					<div class="chart-area">
						<small>
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
									foreach ($karyawan as $row) {
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
						</small>
					</div>


				</div>
			</div>



		</div>
		<!--
		<div class="col-xl-12 col-lg-7">

			 Area Chart 
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Today's Chart</h6>
				</div>
				<div class="card-body">
					<div class="chart-area">
						<?php
						/*


						foreach ($sekarang as $key => $value) {

							$dataPoints[] = ['label' => $value['Item'], 'y' => $value['TingkatStatus']];
						};

						//print_r(json_encode($dataPoints, JSON_NUMERIC_CHECK));
						//die();
						*/
						?>

						<?php

						/*

						foreach ($kemaren as $key => $value) {

							$dataais[] = ['label' => $value['Item'], 'y' => $value['TingkatStatus']];
						};

						//print_r(json_encode($dataais, JSON_NUMERIC_CHECK));
						//die();
						*/
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
									]);

								var chart1 = new CanvasJS.Chart("chartsekarang", {
									exportEnabled: true,
									colorSet: "greenShades",
									animationEnabled: true,
									theme: "light2", // "light1", "light2", "dark1", "dark2"
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
										showInLegend: true,
										legendText: "{label}",



										dataPoints: <?php // echo json_encode($dataPoints, JSON_NUMERIC_CHECK); 
													?>

									}]
								});
								var chart2 = new CanvasJS.Chart("chartkemarin", {
									exportEnabled: true,
									colorSet: "greenShades",
									animationEnabled: true,
									theme: "light2", // "light1", "light2", "dark1", "dark2"
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



										dataPoints: <?php // echo json_encode($dataais, JSON_NUMERIC_CHECK); 
													?>
									}]
								});
								chart1.render();


								chart2.render();

							}
							
						</script>
						<div id="chartsekarang" style="height: 300px; width: 100%;"></div>
					</div>


				</div>
			</div>



		</div>

		<div class="col-xl-12 col-lg-7">

			 Area Chart 
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

	-->
	</div>
</div>