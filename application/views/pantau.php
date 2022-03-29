<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Monitoring Report</h1>
	</div>


	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-8 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Report</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">



					<?php
					$attributes = array('class' => 'add', 'id' => 'add');
					echo form_open('pantau/add_all', $attributes);
					echo '
							<div class="table-responsive">
								<table class="table table-borderless">';
					echo 	'<tr>
								<th>No.</th>
								<th>Item</th>
								<th>Status</th>
								<th>Status Presentation</th>
								<th>Description<br></th>
							
							</tr>';

					$no = 1;
					foreach ($item as $row) {
						echo '<tr>
								<td>' . $no . '</td>
								<td>';
						echo form_hidden('item' . $row['iditem'], $row['iditem']);
						echo '<a data-toggle="modal" data-target="#keterangan" href="#" onClick="javascript:sop(' . $row['IdItem'] . ', \'' . $row['item'] . '\')">' . $row['item'] .
							'</a>
								</td>
								<td>';
						$status = array(
							'1' => 'OK',
							'2' => 'Cukup Baik',
							'3' => 'Kurang Baik',
							'4' => 'Trouble',
						);
						$pilihstatus = 1;
						if (set_value('status' . $row['iditem']) != '1') {
							$pilihstatus = $this->input->post("status" . $row["iditem"]);
						}
						$attr = 'id="status' . $row["iditem"] . '"';
						echo form_dropdown('status' . $row['iditem'], $status, $pilihstatus, $attr) . '</td><td>';
						$temp = 0;
						while ($temp <= 100) {
							$tingkatstatus[$temp] = $temp . "%";
							$temp += 10;
						}
						$pilihstatus = 100;
						if (set_value('tingkatstatus' . $row['iditem']) != "") {
							$pilihstatus = $this->input->post("tingkatstatus" . $row["iditem"]);
						}
						$attr = 'id="tingkatstatus' . $row["iditem"] . '"';
						echo form_dropdown('tingkatstatus' . $row['iditem'], $tingkatstatus, $pilihstatus, $attr) . '</td><td>';
						if (set_value('keterangan' . $row['iditem']) != "") {
							$keterangan = array(
								'name'        => 'keterangan' . $row['iditem'],
								'id'          => 'keterangan' . $row['iditem'],
								'cols'		=> '25',
								'rows'		=> '3',
								'value' 		=> set_value('keterangan' . $row['iditem']),
							);
						} else {
							$keterangan = array(
								'name'        => 'keterangan' . $row['iditem'],
								'id'          => 'keterangan' . $row['iditem'],
								'cols'		=> '25',
								'rows'		=> '3',
							);
						}

						echo form_textarea($keterangan);
						if (form_error('keterangan' . $row['iditem']))
							echo form_error('keterangan' . $row['iditem']);
						echo '</td>';

						$button = array(
							'name' => 'submit' . $row['iditem'],
							'id' => 'submit' . $row['iditem'],
							'value' => 'submit' . $row['iditem'],
							'content' => 'Submit',
							'onClick' => 'add(' . $row['iditem'] . ')',
						);

						//'</td>
						'</tr>';
						$no++;
					}
					?>
					<tr>
						<td>
							<button class="btn btn-primary btn-sm" type="submit">Submit All</button>
						</td>
					</tr>
					</table>

				</div>

			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-7">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">History</h6>
			</div>
			<!-- Card Body -->
			<div class="card-body">
				<div class="row">
					<div class="text-center">
						Hourly Update
						<div style="margin-top:15px">
							Now : <?php
									date_default_timezone_set("Asia/Jakarta");
									echo date("H:i:s"); ?>
							<table class="table table-borderless">
								<?php
								foreach ($pantau as $row) {
									echo "<tr><td width=\"100px\">" . $row['Jam'] . "</td><td width=\"150px\" style=\"text-align:left;\">" . $row['Item'] . "</td><td width=\"100px\">" . $status[$row['Status']] . "</tr>";
								}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>