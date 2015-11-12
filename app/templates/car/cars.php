<?php $this->layout('front_layout', ['title' => 'Véhicules', 'page' => 5]) ?>

<?php $this->start('main_content') 	?>

	<?php 	if($numberCars > 0){		?>

		<div id="carCarousel" class="carousel slide" data-ride="carousel">

		  	<!-- Indicators -->
		  	<ol class="carousel-indicators">
		    	<li data-target="#carCarousel" data-slide-to="0" class="active"></li>

		    	<?php for($index = 1; $index < $numberCars; $index++){ 		?>

			    	<li data-target="#carCarousel" data-slide-to="<?= $index; ?>"></li>

			    <?php }														?>

		 	 </ol>

		  	<!-- Wrapper for slides -->
		  	<div class="carousel-inner" role="listbox">
		    	<div class="item active">
		      		<a class="carouselImg" href="#" data-carouselCard="carouselCard0">
		      			<img src="<?= $this->assetUrl('img/cars/' .  $carCarousselData[0]['fileName']) ?>" alt="Photo du véhicule <?= $carCarousselData[0]['genre']; ?><?php if(!empty($carCarousselData[0]['brand'])){ echo " " . $carCarousselData[0]['brand'] . " " . $carCarousselData[0]['model']; } ?>">
		      			<div class="carousel-caption">
		      			    <span class="legend"><?= $carCarousselData[0]['genre']; ?><?php if(!empty($carCarousselData[0]['brand'])){ echo " | " . $carCarousselData[0]['brand'] . " " . $carCarousselData[0]['model']; } ?></span>
		      			</div>
		      		</a>
		    	</div>

    	    	<?php for($index = 1; $index < $numberCars; $index++){ 		?>

    		    	<div class="item">
				     	<a class="carouselImg" href="#" data-carouselCard="carouselCard<?= $index; ?>">
				     		<img src="<?= $this->assetUrl('img/cars/' . $carCarousselData[$index]['fileName']) ?>" alt="Photo du véhicule <?= $carCarousselData[$index]['genre']; ?><?php if(!empty($carCarousselData[$index]['brand'])){ echo " " . $carCarousselData[$index]['brand'] . " " . $carCarousselData[$index]['model']; } ?>">
				     		<div class="carousel-caption">
			      			    <span class="legend"><?= $carCarousselData[$index]['genre']; ?><?php if(!empty($carCarousselData[$index]['brand'])){ echo " | " . $carCarousselData[$index]['brand'] . " " . $carCarousselData[$index]['model']; } ?></span>
			      			</div>
				     	</a>
				    </div>

    		    <?php }														?>

		  	</div>

		  	<!-- Left and right controls -->
		  	<a class="left carousel-control" href="#carCarousel" role="button" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    	<span class="sr-only">Previous</span>
		  	</a>
		  	<a class="right carousel-control" href="#carCarousel" role="button" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    	<span class="sr-only">Next</span>
		  	</a>
		  	
		</div>

    	<?php for($index = 0; $index < $numberCars; $index++){ 		?>

	    	<div id="carouselCard<?= $index; ?>" class="carouselCard">
				<span><?= $carCarousselData[$index]['genre']; ?><?php if(!empty($carCarousselData[$index]['brand'])){ echo " | " . $carCarousselData[$index]['brand'] . " " . $carCarousselData[$index]['model']; } ?></span>
				<div class="col-lg-12"><button class="btn btn-primary btnSelectModel" data-car-id="<?= $carCarousselData[$index]['id']; ?>" data-ajax-path="<?= $this->url('selectModel') ?>" data-ajax-pathResponse="<?= $this->url('reservation') ?>">Réserver une prestation avec ce véhicule</button></div>
				<div class="col-lg-12"><button class="btn btn-primary btnBackToCarousel">Retourner au caroussel</button></div>
			</div>

	    <?php }														?>

		<script type="text/javascript" src="<?= $this->assetUrl('js/carousel.js') ?>"></script>
		<script type="text/javascript" src="<?= $this->assetUrl('js/myCarousel.js') ?>"></script>
		
	<?php 	}							?>

<?php $this->stop('main_content') 	?>