<?php $this->layout('front_layout', ['title' => 'Véhicules', 'page' => 5]) ?>

<?php $this->start('main_content') ?>

	<div id="carCarousel" class="carousel slide" data-ride="carousel">

	  	<!-- Indicators -->
	  	<ol class="carousel-indicators">
	    	<li data-target="#carCarousel" data-slide-to="0" class="active"></li>
	    	<li data-target="#carCarousel" data-slide-to="1"></li>
	    	<li data-target="#carCarousel" data-slide-to="2"></li>
	    	<li data-target="#carCarousel" data-slide-to="3"></li>
	 	 </ol>

	  	<!-- Wrapper for slides -->
	  	<div class="carousel-inner" role="listbox">
	    	<div class="item active">
	      		<a class="carouselImg" href="#" data-carouselCard="carouselCard1">
	      			<img src="<?= $this->assetUrl('img/cars/01.jpg') ?>" alt="Limousine">
	      			<div class="carousel-caption">
	      			    <span class="legend">Limousine</span>
	      			</div>
	      		</a>
	    	</div>

		    <div class="item">
		     	<a class="carouselImg" href="#" data-carouselCard="carouselCard2">
		     		<img src="<?= $this->assetUrl('img/cars/02.jpg') ?>" alt="Monospace">
		     		<div class="carousel-caption">
	      			    <span class="legend">Monospace</span>
	      			</div>
		     	</a>
		    </div>

		    <div class="item">
		    	<a class="carouselImg" href="#" data-carouselCard="carouselCard3">
		    		<img src="<?= $this->assetUrl('img/cars/03.jpg') ?>" alt="Berline">
		    		<div class="carousel-caption">
	      			    <span class="legend">Berline</span>
	      			</div>
		    	</a>
		    </div>

		    <div class="item">
		    	<a class="carouselImg" href="#" data-carouselCard="carouselCard4">
		    		<img src="<?= $this->assetUrl('img/cars/04.jpg') ?>" alt="Exécutive">
		    		<div class="carousel-caption">
	      			    <span class="legend">Exécutive</span>
	      			</div>
		    	</a>
		    </div>

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

	<div id="carouselCard1" class="carouselCard">
		<span>a</span>
		<div class="col-lg-12"><button class="btn btn-primary btnBackToCarousel">Retourner au caroussel</button></div>
	</div>

	<div id="carouselCard2" class="carouselCard">
		<span>b</span>
		<div class="col-lg-12"><button class="btn btn-primary btnBackToCarousel">Retourner au caroussel</button></div>
	</div>

	<div id="carouselCard3" class="carouselCard">
		<span>c</span>
		<div class="col-lg-12"><button class="btn btn-primary btnBackToCarousel">Retourner au caroussel</button></div>
	</div>

	<div id="carouselCard4" class="carouselCard">
		<span>d</span>
		<div class="col-lg-12"><button class="btn btn-primary btnBackToCarousel">Retourner au caroussel</button></div>		
	</div>

	<script type="text/javascript" src="<?= $this->assetUrl('js/carousel.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/myCarousel.js') ?>"></script>
	
<?php $this->stop('main_content') ?>