		</main>	
		
		
		<!-- Carga de librerias !!.. -->
		<script src="<?php echo(base_url('assets/common/js/librerias/plugins/sweetalert2.min.js')) ?>" type="text/javascript"></script>

		<script src="<?php echo(base_url('assets/common/js/librerias/mootools-core.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/mootools-more.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/plugins.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/admin/js/owner/main.js')) ?>"></script>
		
		<?php
			if (!empty($varFlash)) {
				$session = session();
				$errors = $session->getFlashdata($varFlash . 'Error');
				$success = $session->getFlashdata($varFlash . 'Success');

				if (!empty($errors)) {
					echo popFlash('error', $errors);
				} elseif (!empty($success)) {
					echo popFlash('success', $success);
				}
			}
		?>
		<script>
			// Código JS personalizado
			// ...
		</script>
	</body>
</html>