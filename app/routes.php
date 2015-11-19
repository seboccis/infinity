<?php
	
	$w_routes = array(

		//////*Pages du FrontOffice*//////

		/*Page d'accueil*/ 
		['GET', '/', 'Default#home', 'home'],

		/*Page sur les services limousine*/ 
		['GET', '/services_limousine/', 'Car#services_limousine', 'services_limousine'],

		/*Page sur les excursions*/ 
		['GET', '/excursions/', 'Default#excursions', 'excursions'],

		/*Page sur les services de conciergerie*/ 
		['GET', '/conciergerie/', 'Default#conciergerie', 'conciergerie'],

		/*Page sur les véhicules*/ 
		['GET', '/vehicules/', 'Car#vehicules', 'vehicules'],

		/*Page de réservation*/ 
		['GET', '/reservation/', 'Car#reservation', 'reservation'],

		/*Page de contact*/ 
		['GET', '/contact/', 'Default#contact', 'contact'],


		//////*Pages du BackOffice*//////

		/*Page d'accueil*/ 
		['GET', '/backoffice/', 'Default#backoffice_home', 'backoffice_home'],

		/*Page sur les véhicules*/ 
		['GET', '/backoffice/vehicules/', 'Car#backoffice_cars', 'backoffice_cars'],


		//////*Appels AJAX*//////

		/*Aller chercher la fiche détaillée d'un véhicule*/ 
		['GET', '/carousel/getCarCarouselCard/', 'Car#getCarCarouselCard', 'getCarCarouselCard'],

		/*Sélection d'un véhicule*/ 
		['GET', '/reservation/selectCar/', 'Car#selectCar', 'selectCar'],

		/*Vider la session des données personnelles*/ 
		['GET', '/reservation/unsetSessionUser/', 'Session#unsetSessionUser', 'unsetSessionUser'],

		/*Vider la session des données relatives à la demande*/ 
		['GET', '/reservation/unsetSessionRequest/', 'Session#unsetSessionRequest', 'unsetSessionRequest'],

		/*Validation du formulaire de réservation*/ 
		['GET', '/reservation/validateReservation/', 'Form#validateReservation', 'validateReservation'],

		/*Aller chercher le tableau de véhicules*/ 
		['GET', '/backoffice/getCarTable/', 'Car#getCarTable', 'getCarTable'],

		/*Afficher la div de modification d'un véhicule de la BD*/ 
		['GET', '/backoffice/getEditCarCard/', 'Car#getEditCarCard', 'getEditCarCard'],

		/*Supprimer un véhicule de la BD*/ 
		['GET', '/backoffice/deleteCar/', 'Car#deleteCar', 'deleteCar'],

		/*Afficher la div d'ajout d'un véhicule à la BD*/ 
		['GET', '/backoffice/getAddCarCard/', 'Car#getAddCarCard', 'getAddCarCard'],

	);