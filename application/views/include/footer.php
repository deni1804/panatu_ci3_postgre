<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span> &copy; PT. Imani Prima</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- keterangan Modal-->
<div class="modal fade" id="keterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">SOP
					<div id="item"></div>
				</h5>

				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 id="dialog">
				</h6>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<!-- Example Modal-->
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-primary" id="exampleModalLabel">Example Description</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="modal-title text-primary" id="exampleModalLabel">Penulisan link website</h6>
				Gunakan sintak
				<xmp><a href="http://mtr.aissat.com">mtr.aissat.com</a></xmp>
				<h6 class="modal-title text-primary" id="exampleModalLabel">Untuk membuat baris baru</h6>
				Gunakan sintak
				<xmp><br></xmp>

			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>




<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?php echo site_url(); ?>/logout">Logout</a>
			</div>
		</div>
	</div>
</div>

<!--<script type="text/javascript" src="<?php echo base_url('themes/lib/js/jquery-ui.js'); ?>">
</script>-->


<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<!-- Page level plugins 
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
-->
<!-- Page level custom scripts 
<script src="<?= base_url('assets/js/demo/chart-area-demo.js') ?>"></script>
<script src="<?= base_url('assets/js/demo/chart-pie-demo.js') ?>"></script>
-->
</body>











</html>