<?php $this->layout('backoffice_layout', [
											'title' => 'Gestion des véhicules',
											'page' => 2
										 ]) ?>

<?php $this->start('main_content') ?>

	<!-- <div class="table carsTable">
	
		<div class="row titleRow">
	
			<div class="cell titleCell cell1"><span>id</span></div>
			<div class="cell titleCell cell2"><span>terme</span></div>
			<div class="cell titleCell cell3"><span>modification</span></div>
			<div class="cell titleCell cell4"><span>actions</span></div>
					
		</div>
		
		<?php foreach($terms as $term): ?>
	
		<div class="row termRow <?php if($term['is_wotd'] == 1){ echo 'rowWotd'; }?>">
	
			<div class="cell termCell cell1"><span><?= $this->e($term['id']); ?></span></div>
			<div class="cell termCell cell2"><span><?= $this->e($term['name']); ?></span></div>
			<div class="cell termCell cell3"><span><?= $this->e($term['modifiedDate']); ?></span></div>
			<div class="cell termCell cell4">
				<a href="<?php echo $this->url('edit_term', ['id' => $this->e($term['id'])]);?>" class="action edit" title="Modifier ce terme"><i class="fa fa-pencil"></i>Modifier</a>
				<a href="<?php echo $this->url('delete_term', ['id' => $this->e($term['id'])]);?>" class="action delete" title="Supprimer ce terme"><i class="fa fa-trash-o"></i>Supprimer</a>
				<?php if($term['is_wotd'] != 1){
				?>
				<a href="<?php echo $this->url('direct_change_wotd', ['id' => $this->e($term['id'])]);?>" class="action wotd" title="Ce terme devient le mot du jour"><i class="fa fa-star"></i>MDJ !</a>
				<?php
				}
				?>
			</div>
					
		</div>
	
		<?php endforeach; ?>
	
	</div> -->

	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>#</th>
	      <th>Type</th>
	      <th>Marque</th>
	      <th>Modèle</th>
	      <th>Détails</th>
	    </tr>
	  </thead>
	  <tbody>

<?php for($index = 1; $index <= $numberCars; $index++){
			$car = $cars[$index - 1];						?>

	    <tr>
	      <td><?= $index; ?></td>
	      <td><?= $car['genre']; ?></td>
	      <td><?= $car['brand']; ?></td>
	      <td><?= $car['model']; ?></td>
	      <td>
	      	<a href="" data-id="<?= $car['id']; ?>"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
	      	<a href="" data-id="<?= $car['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
	      	<a href="" data-id="<?= $car['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
	      </td>
	    </tr>

<?php }																?>

	    <!-- <tr>
	      <td>2</td>
	      <td>Column content</td>
	      <td>Column content</td>
	      <td>Column content</td>
	    </tr>
	    <tr class="info">
	      <td>3</td>
	      <td>Column content</td>
	      <td>Column content</td>
	      <td>Column content</td>
	    </tr>
	    <tr class="success">
	      <td>4</td>
	      <td>Column content</td>
	      <td>Column content</td>
	      <td>Column content</td>
	    </tr>
	    <tr class="danger">
	      <td>5</td>
	      <td>Column content</td>
	      <td>Column content</td>
	      <td>Column content</td>
	    </tr>
	    <tr class="warning">
	      <td>6</td>
	      <td>Column content</td>
	      <td>Column content</td>
	      <td>Column content</td>
	    </tr>
	    <tr class="active">
	      <td>7</td>
	      <td>Column content</td>
	      <td>Column content</td>
	      <td>Column content</td>
	    </tr> -->
	  </tbody>
	</table> 
	
<?php $this->stop('main_content') ?>