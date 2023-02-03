<!-- Core JS Goes here -->
	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- JS Cookie -->
	<script src="<?php echo base_url() ?>assets/plugins/js-cookie/js.cookie.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
	<!-- Regex format for float input (for Firefox)
	<script src="<?php echo base_url() ?>assets/dist/js/regex_format.js"></script>  -->
	<!-- Tooltip -->
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>

<!-- Additional library needed -->
	<?php if(in_array('sweetalert2',$assets)){ ?>
		<!-- SweetAlert 2 -->
		<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<?php } ?>

	<?php if(in_array('datatables',$assets)){ ?>
	  <!-- DataTables -->
		<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<?php } ?>

<!-- additional Page script goes here -->
	<?php if(in_array('crud', $assets)){ ?>
		<script>
			var type = "<?php if(in_array('update', $assets)){ echo 'update'; } else { echo 'create'; } ?>"
			var data = "<?php if(in_array('update', $assets)){ json_encode($data); } else { NULL; } ?>"
			var update_url = "<?php echo base_url('Crud_c/update/'.$id) ?>";
			var store_url = "<?php echo base_url('Crud_c/store/') ?>";
		</script>
		<!-- List Produk Assets -->
		<script src="<?php echo base_url() ?>assets/dist/js/pages/crud_assets.js"></script>
	<?php } ?>

	<?php if(in_array('list_crud', $assets)){ ?>
		<script>
			var list_url = "<?php echo base_url('Crud_c/list') ?>";
			var delete_url = "<?php echo base_url('Crud_c/delete/') ?>";
		</script>
		<!-- List Produk Assets -->
		<script src="<?php echo base_url() ?>assets/dist/js/pages/list_assets.js"></script>
	<?php } ?>
