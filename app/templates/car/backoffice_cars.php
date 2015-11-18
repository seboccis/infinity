<?php $this->layout('backoffice_layout', [
											'title' => 'Gestion des véhicules',
											'page' => 2
										 ]) 					?>

<?php $this->start('main_content') 								?>

	<div id="tableCars">

		<table class="table table-striped table-hover">

			<thead>
		    	<tr>
		     		<th>#</th>
		     		<th>Type</th>
		     		<th>Marque</th>
		     		<th>Modèle</th>
		     		<th>Actions</th>
		    	</tr>
			</thead>

			<tbody>

<?php for($index = 1; $index <= $numberCars; $index++){
			$car = $cars[$index - 1];							?>

			    <tr>
			    	<td><?= $index; ?></td>
			    	<td><?= $car['genre']; ?></td>
			    	<td><?= $car['brand']; ?></td>
			    	<td><?= $car['model']; ?></td>
			    	<td>
				      	<a href="" class="anchorShowCarCard" data-id="<?= $car['id']; ?>"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
				      	<a href="" class="anchorEditCarCard" data-id="<?= $car['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				      	<a href="" class="anchorDeleteCarCard" data-id="<?= $car['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			    	</td>
			    </tr>

<?php }															?>

	    
			</tbody>

		</table>

	</div>

	<div class="carCard"></div>
	
<?php $this->stop('main_content') ?>