<?php $this->layout('backoffice_layout', [
											'title' => 'Gestion des véhicules',
											'page' => 2
										 ]) 					?>

<?php $this->start('main_content') 								?>

	<div id="carTable" data-ajax-path="<?= $this->url('getCarTable'); ?>"></div>

	<div class="carCard"></div>

	<div class="confirmCarCard"></div>
	
<?php $this->stop('main_content') ?>