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
		      	<a href="" class="anchorEditCarCard" data-ajax-id="<?= $car['id']; ?>" data-ajax-path="<?= $this->url('getEditCarCard'); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
		      	<a href="" class="anchorDeleteCarCard" data-ajax-id="<?= $car['id']; ?>" data-ajax-path="<?= $this->url('deleteCar'); ?>" data-legend="<?= $car['genre']; ?> <?= $car['brand']; ?> <?= $car['model']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
	    	</td>
	    </tr>

<?php }															?>
	    
	</tbody>

</table>

<div class="divAddCar">
  <button class="btn btn-primary btnJS btnAddCarCard" data-ajax-path="<?= $this->url('getAddCarCard'); ?>">Ajouter un véhicule</button>
</div>