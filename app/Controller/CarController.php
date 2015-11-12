<?php

	namespace Controller;

	use \W\Controller\Controller;
	use \Manager\CarManager;
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
		 * Requête AJAX por garder en mémoire le véhicule choisie et
		 * être redirigé vers la réservation 
		 */
		public function selectModel()
		{
			$id = trim(strip_tags($_GET["id"]));
			$response = $_GET['pathResponse'];

			$sessionController = new SessionController();
			$sessionController->setSessionRequest('car', $id);

			die($response);
		}

	}