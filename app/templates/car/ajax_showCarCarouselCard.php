<span><?= $car['genre']; ?><?php if(!empty($car['brand'])){ echo " | " . $car['brand'] . " " . $car['model']; } ?></span>
<div class="col-lg-12"><button class="btn btn-primary btnSelectCar" data-car-id="<?= $car['id']; ?>" data-ajax-path="<?= $this->url('selectCar') ?>" data-ajax-pathResponse="<?= $this->url('reservation') ?>">Réserver une prestation avec ce véhicule</button></div>
<div class="col-lg-12"><button class="btn btn-primary btnBackToCarousel">Retourner au caroussel</button></div>
