<?php

	namespace Controller;

	use \W\Controller\Controller;

	/**
	 * Le controller de la session
	 */
	class SessionController extends Controller
	{

		public $session;

		/**
		 * Constructeur
		 */
		public function __construct()
		{
			if(!empty($_SESSION["reservation"])){
				$this->session = $_SESSION["reservation"];
			}
			else{
				$this->session = [];
			}
		}

		protected function refreshSession()
		{
			$_SESSION['reservation'] = $this->session;
		}

		protected function setSession($genre, $key, $value)
		{
			$this->session[$genre][$key] = $value;
		}

		public function writeSession()
		{
			echo '<pre style="padding: 10px; font-family: Consolas, Monospace; background-color: #000; color: #FFF;">';
			print_r($this->session);
			echo '</pre>';
		}

		public function setSessionUser($arrayPersonalData)
		{

			$this->setSession('user', 'civility', $arrayPersonalData[0]);
			$this->setSession('user', 'name', $arrayPersonalData[1]);
			$this->setSession('user', 'firstName', $arrayPersonalData[2]);
			$this->setSession('user', 'phoneNumber', $arrayPersonalData[3]);
			$this->setSession('user', 'email', $arrayPersonalData[4]);
			$this->setSession('user', 'address', $arrayPersonalData[5]);
			$this->setSession('user', 'city', $arrayPersonalData[6]);
			$this->setSession('user', 'zipcode', $arrayPersonalData[7]);

			$this->refreshSession();

		}

		public function unsetSessionUser()
		{
			unset($this->session['user']);
			$this->refreshSession();
		}

		public function setSessionRequest($key, $value)
		{
			$this->setSession('request', $key, $value);

			$this->refreshSession();
		}

		public function unsetSessionRequest()
		{
			unset($this->session['request']);
			$this->refreshSession();
		}

	}