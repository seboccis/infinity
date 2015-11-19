<?php

	namespace Controller;

	use \W\Controller\Controller;
	use \Manager\CarManager;
	use \Manager\SpecificationManager;
	use Controller\SessionController;

	class CarController extends Controller
	{

		/**
		 * Page sur les services limousine
		 */
		public function services_limousine()
		{
			$this->show('car/services_limousine');
		}

		/**
		 * Page sur les véhicules
		 */
		public function vehicules()
		{
			$carManager 	  = new CarManager();
			$numberCars 	  = $carManager->count();
			$carCarousselData = $carManager->getCarCarouselData();

			$data = [
						'numberCars' 		=> $numberCars,
						'carCarousselData'  => $carCarousselData,
					];

			$this->show('car/cars', $data);
		}

		/**
		 * Page de réservation
		 */
		public function reservation()
		{
			$sessionController = new SessionController();
			$session = $sessionController->session;

			$carManager    = new CarManager();

			$carSelectData = $carManager->getCarSelectData();

			$data = [
						'session' 	   	=> $session,
						'carSelectData' => $carSelectData,
					];

			$this->show('car/reservation', $data);
		}

		/**
		 * Fonction permettant de collecter toutes les données sur un véhicule
		 * @param int $idCar Identifiant du véhicule
		 * @return array Les données
		 */
		protected function getCarData($idCar)
		{
			$carManager = new CarManager();
			$car 		= $carManager->find($idCar);

			$specificationManager = new SpecificationManager();
			$specifications = $specificationManager->findCarSpecifications($idCar);

			$car['specifications'] = $specifications;

			return $car;
		}

		/**
		 * Requête AJAX pour aller charcher la fiche détaillée d'un véhicule 
		 */
		public function getCarCarouselCard()
		{
			$id = trim(strip_tags($_GET["id"]));

			$car = $this->getCarData($id);

			$data = [
						'car' 	   	=> $car,
					];

			$this->show('car/ajax_showCarCarouselCard', $data);
		}

		/**
		 * Requête AJAX pour garder en mémoire le véhicule choisi et
		 * être redirigé vers la réservation 
		 */
		public function selectCar()
		{
			$id = trim(strip_tags($_GET["id"]));
			$response = $_GET['pathResponse'];

			$sessionController = new SessionController();
			$sessionController->setSessionRequest('car', $id);

			die($response);
		}

		/**
		 * BackOffice | Page sur la gestion des véhicules
		 */
		public function backoffice_cars()
		{
			$this->show('car/backoffice_cars');
		}

		/**
		 * BackOffice | Requête AJAX pour aller chercher le tableau des véhicules
		 */
		public function getCarTable()
		{
			$carManager = new CarManager();
			$numberCars = $carManager->count();
			$cars 		= $carManager->getCarBackOfficeData();

			$data = [
						'numberCars' => $numberCars,
						'cars' 		 => $cars,
					];

			$this->show('car/backoffice_ajax_getCarTable', $data);
		}

		/**
		 * BackOffice | Requête AJAX pour afficher la div de modification
		 *				d'un véhicule de la BD
		 */
		public function getEditCarCard()
		{
			$id = trim(strip_tags($_GET["id"]));

			$car = $this->getCarData($id);

			$data = [
						'car' 	   	=> $car,
					];

			$this->show('car/backoffice_ajax_getEditCarCard', $data);
		}

		/**
		 * BackOffice | Requête AJAX pour supprimer un véhicule de la BD
		 */
		public function deleteCar()
		{}

		/**
		 * BackOffice | Requête AJAX pour afficher la div d'ajout
		 *				d'un véhicule à la BD
		 */
		public function getAddCarCard()
		{
			$this->show('car/backoffice_ajax_getAddCarCard');
		}

	}