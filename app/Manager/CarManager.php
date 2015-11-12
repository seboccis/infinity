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
			$arrayCars = $this->findAllRand();

			$imageManager = new ImageManager();

			for($index = 0; $index < count($arrayCars); $index++){
				$idCar = $arrayCars[$index]['id'];

				$arrayCars[$index]['fileName'] = $imageManager->findCarPrincipalImgFileName($idCar);
			}

			return $arrayCars;
		}

		/**
		 * Cherche les données nécessaires pour mettre en place le select de véhicules
		 * @return array Les données
		 */
		public function getCarSelectData()
		{
			$carSelectData = [];

			$arrayGenres = $this->getAll('genre');

			foreach($arrayGenres as $genre){
				$sql = "SELECT * 
						FROM " . $this->table . "
						WHERE genre = '" . $genre ."'";
				$sth = $this->dbh->prepare($sql);
				$sth->execute();

				$arrayCars = $sth->fetchAll();

				$carSelectData[] = array(
											"genre" => $genre,
											"cars"	=> $arrayCars,
										);
			}

			return $carSelectData;
		}

	}