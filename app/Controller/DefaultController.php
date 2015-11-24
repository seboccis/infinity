<?php

	namespace Controller;

	use \W\Controller\Controller;

	class DefaultController extends Controller
	{

		/**
		 * Page d'accueil
		 */
		public function home()
		{
			$this->show('default/home');
		}

		/**
		 * Page sur les services aéroportuaires
		 */
		public function airport()
		{
			$this->show('default/airport');
		}

		/**
		 * Page sur les services aéroportuaires au départ
		 */
		public function departure()
		{
			$this->show('default/departure');
		}

		/**
		 * Page sur les services aéroportuaires en transit
		 */
		public function transit()
		{
			$this->show('default/transit');
		}

		/**
		 * Page sur les services aéroportuaires à l'arrivée
		 */
		public function arrival()
		{
			$this->show('default/arrival');
		}

		/**
		 * Page sur les services de conciergerie
		 */
		public function conciergerie()
		{
			$this->show('default/conciergerie');
		}

		/**
		 * Page de contact
		 */
		public function contact()
		{
			$this->show('default/contact');
		}

		/**
		 * BackOffice | Page d'accueil
		 */
		public function backoffice_home()
		{
			$this->show('default/backoffice_home');
		}

	}