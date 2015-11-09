<?php

	namespace Manager;

	use Manager\DefaultManager;

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
			$sql = "SELECT cars.id as id, cars.genre as genre, cars.brand as brand, cars.model as model, images.fileName as fileName
					FROM cars
					LEFT JOIN images
					ON  cars.idImg = images.id";
			$sth = $this->dbh->prepare($sql);
			$sth->execute();

			return $sth->fetchAll();
		}

	}