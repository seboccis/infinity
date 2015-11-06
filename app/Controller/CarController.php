<?php

	namespace Controller;

	use \W\Controller\Controller;
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
		 * Page de réservation
		 */
		public function reservation()
		{
			$sessionController = new SessionController();
			$session = $sessionController->session;

			$data = [
						'session' => $session,
					];

			$this->show('car/reservation', $data);
		}

	}