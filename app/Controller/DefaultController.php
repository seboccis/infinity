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
		 * Page sur les excursions
		 */
		public function excursions()
		{
			$this->show('default/excursions');
		}

		/**
		 * Page sur les services de conciergerie
		 */
		public function conciergerie()
		{
			$this->show('default/conciergerie');
		}

		/**
		 * Page sur les véhicules
		 */
		public function vehicules()
		{
			$this->show('default/vehicules');
		}

		/**
		 * Page de contact
		 */
		public function contact()
		{
			$this->show('default/contact');
		}

	}