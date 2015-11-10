<?php

	namespace Manager;

	use Manager\DefaultManager;
	use Manager\ImageManager;

	/**
	 * Le manager de véhicules (cars)
	 */
	class CarManager extends DefaultManager
	{

		/**
		 * Cherche les données nécessaires pour mettre en place le caroussel de véhicules
		 * @return array Les données
		 */
		public function getCarCarouselData()
		{
			$arrayCars = $this->findAll();

			$imageManager = new ImageManager();

			for($index = 0; $index < count($arrayCars); $index++){
				$idCar = $arrayCars[$index]['id'];

				$arrayCars[$index]['fileName'] = $imageManager->findCarPrincipalImgFileName($idCar);
			}

			return $arrayCars;
		}

	}