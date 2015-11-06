<!DOCTYPE html>

<html lang="fr-FR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <?php if($page == 2 || $page == 6){ echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkrPkBV5tNNsIIdDtPMKFdFWsZCTECenM&amp;libraries=places"></script>' ; } ?>
	<title><?= $this->e($title) ?> | Infinity Services VIP</title>
	<link href='https://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/journal.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/style.css') ?>">
</head>

<body>

  <?php if(isset($_SESSION['reservation'])){ debug($_SESSION['reservation']) ;} ?>

	<div class="container">

		<div class="page-header">
			<div class="col-lg-9">
  				<h1>Infinity Services VIP</h1>
  			</div>

  			<div class="col-lg-12 navigation">
  				<nav class="navbar navbar-default">
  					<div class="container-fluid">

  						<div class="navbar-header">
  							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
  								<span class="sr-only">Toggle navigation</span>
  								<span class="icon-bar"></span>
  								<span class="icon-bar"></span>
  								<span class="icon-bar"></span>
  							</button>
  							<a class="navbar-brand navbar-toggle collapsed" href="#">Navigation</a>
  						</div>

  						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  							<ul class="nav navbar-nav">
  								<li <?php if($page == 1){ echo 'class="active"' ;} ?>><a href="<?php echo $this->url('home');?>">Accueil</a></li>
  								<li <?php if($page == 2){ echo 'class="active"' ;} ?>><a href="<?php echo $this->url('services_limousine');?>">Services Limousine</a></li>
  								<li <?php if($page == 3){ echo 'class="active"' ;} ?>><a href="<?php echo $this->url('excursions');?>">Excursions</a></li>
  								<li <?php if($page == 4){ echo 'class="active"' ;} ?>><a href="<?php echo $this->url('conciergerie');?>">Conciergerie</a></li>
  								<li <?php if($page == 5){ echo 'class="active"' ;} ?>><a href="<?php echo $this->url('vehicules');?>">Véhicules</a></li>
  								<li <?php if($page == 6){ echo 'class="active"' ;} ?>><a href="<?php echo $this->url('reservation');?>">Réservation</a></li>
  								<li <?php if($page == 7){ echo 'class="active"' ;} ?>><a href="<?php echo $this->url('contact');?>">Contact</a></li>								
  							</ul>
  						</div>
  					</div>
  				</nav>
  			</div>
		</div>

		<div class="col-lg-12">

			<section>
				<?= $this->section('main_content') ?>
			</section>
			
		</div>

		<footer>
		</footer>

	</div>

  <script type="text/javascript" src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>
  <script type="text/javascript" src="<?= $this->assetUrl('js/main.js') ?>"></script>

</body>

</html>