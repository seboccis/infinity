<?php $this->layout('backoffice_layout', [
											'title' => 'Gestion des véhicules',
											'page' => 2
										 ]) 					?>

<?php $this->start('main_content') 								?>

	<div id="carTable" data-ajax-path="<?= $this->url('showCarTable'); ?>"></div>

	<div class="divAddCar">
	  <button class="btn btn-primary btnJS btnAddCar">Ajouter un véhicule</button>
	</div>

	<div class="carCard"></div>
	
<?php $this->stop('main_content') ?>