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
		 * Requête AJAX pour aller charcher la fiche détaillée d'un véhicule 
		 */
		public function getCarCarouselCard()
		{
			$id = trim(strip_tags($_GET["id"]));

			$carManager = new CarManager();
			$car 		= $carManager->find($id);

			$specificationManager = new SpecificationManager();
			$specifications = $specificationManager->findCarSpecifications($id);

			$car['specifications'] = $specifications;

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
			$carManager 	   = new CarManager();
			/*$numberCars 	   = $carManager->count();*/
			$carBackOfficeData = $carManager->getCarBackOfficeData();

			$data = [
						/*'numberCars' 		=> $numberCars,*/
						'carBackOfficeData'  => $carBackOfficeData,
					];

			$this->show('car/backoffice_cars', $data);
		}

	}