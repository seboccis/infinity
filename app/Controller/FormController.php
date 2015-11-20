<?php

	namespace Controller;

	use \W\Controller\Controller;
	use Controller\SessionController;

	class FormController extends Controller
	{
		protected $dateRegex = '#^[0-3][0-9]/[0-1][0-9]/2[0-9][0-9][0-9]$#';

		protected $errorMsg 		= "Veuillez remplir le champ obligatoire.";
		protected $errorEmailMsg 	= "Veuillez entrer un email valide.";
		protected $errorSelectMsg	= "Veuillez choisir entre les différentes propositions.";
		protected $errorDateMsg 	= "Veuillez entrer une date valide.";
		protected $errorAddressMsg 	= "Une des adresses entrées n'est pas reconnue. Veuillez utiliser les propositions qui vous sont faites.";
		protected $errorRouteMsg	= "Une erreur est survenue lors du calcul du coût de la prestation. Veuillez vérifier les adresses que vous avez entrées et utiliser, dans la mesure du possible, celles qui vous sont proposées.";

		protected function validateName($name)
		{
			$errorName = '';

			if(empty($name)){
				$errorName = $this->errorMsg;
			}

			return $errorName;
		}

		protected function validatePhoneNumber($phoneNumber)
		{
			$errorPhoneNumber = '';

			if(empty($phoneNumber)){
				$errorPhoneNumber = $this->errorMsg;
			}

			return $errorPhoneNumber;
		}

		protected function validateEmail($email)
		{
			$errorEmail = '';

			if(empty($email)){
				$errorEmail = $this->errorMsg;
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errorEmail = $this->errorEmailMsg;
			}

			return $errorEmail;
		}

		protected function validateSelect($selectedValue)
		{
			$errorSelect = '';

			if($selectedValue < 1){
				$errorSelect = $this->errorSelectMsg;
			}

			return $errorSelect;
		}

		protected function validateDate($date)
		{
			$errorDate = '';

			if(empty($date) || !preg_match($this->dateRegex, $date)){
				$errorDate = $this->errorDateMsg;
			}

			return $errorDate;
		}

		protected function validateAddresses($origin, $destination)
		{
			$errorOrigin		= '';
			$errorDestination	= '';
			$distance			= '';

			if(empty($origin)){
				$errorOrigin = $this->errorMsg;
			}
			if(empty($destination)){
				$errorDestination = $this->errorMsg;
			}

			if(!empty($origin) && !empty($destination)){
				$arrayGoogleMapAPIResponse = getDistance($origin, $destination);

				if($arrayGoogleMapAPIResponse['geocoded_waypoints'][0]['geocoder_status'] != 'OK'){
					$errorOrigin = $this->errorAddressMsg;
				}

				if($arrayGoogleMapAPIResponse['geocoded_waypoints'][1]['geocoder_status'] != 'OK'){
					$errorDestination = $this->errorAddressMsg;
				}

				if(    empty($errorOrigin)
					&& empty($errorDestination)
					&& $arrayGoogleMapAPIResponse['status'] != 'OK'){
					$errorDestination = $this->errorRouteMsg;
				}
			}

			if(    $errorOrigin		 == ''
				&& $errorDestination == ''){
				$distance = $arrayGoogleMapAPIResponse['routes'][0]['legs'][0]['distance']['value'];
			}

			$arrayErrorAddresses = [$errorOrigin, $errorDestination, $distance];

			return $arrayErrorAddresses;
		}

		public function validateReservation()
		{
			foreach($_GET as $key => $value)
			{
				$$key = trim(strip_tags($value));
			}

			$personalData 	= "novalid";
			$request 		= "novalid";
			$reservation 	= 'novalid';
			$response 		= '';

			$sessionController 	 = new SessionController();

			$errorName 			 = $this->validateName($name);
			$errorPhoneNumber 	 = $this->validatePhoneNumber($phoneNumber);
			$errorEmail 		 = $this->validateEmail($email);

			$errorCategory		 = $this->validateSelect($category);
			$errorCar		 	 = $this->validateSelect($car);
			$errorDate 			 = $this->validateDate($date);
			$arrayErrorAddresses = $this->validateAddresses($origin, $destination);
			$errorOrigin 		 = $arrayErrorAddresses[0];
			$errorDestination 	 = $arrayErrorAddresses[1];
			$distance 			 = $arrayErrorAddresses[2];

			if(    $errorName		 == ''
				&& $errorPhoneNumber == ''
				&& $errorEmail		 == ''){

				$personalData = "valid";

				if(!isset($civility)){$civility = 0;}

				$arrayPersonalData = [
										$civility,
										$name,
										$firstName,
										$phoneNumber,
										$email,
										$address,
									 ];

				$sessionController->setSessionUser($arrayPersonalData);

			}

			if(    $errorCategory	 == ''
				&& $errorCar 		 == ''
				&& $errorDate 		 == ''
				&& $errorOrigin		 == ''
				&& $errorDestination == ''){
				$request = "valid";
			}

			if(	   $personalData == 'valid'
				&& $request		 == 'valid'){

				$reservation = 'valid';
				 
				$cost = 15 + $distance * 1.5 / 1000;
				$response = 'Le coût de cette prestation serait de ' . $cost . ' euros.';
			
			}

			$arrayResponse = array(
									'reservation'  	=> $reservation,
									'response' 		=> $response,
									'errorSpans'  	=> array(
															'errorName' 		=> $errorName,
															'errorPhoneNumber'  => $errorPhoneNumber,
															'errorEmail' 		=> $errorEmail,
															'errorCategory' 	=> $errorCategory,
															'errorCar' 			=> $errorCar,
															'errorDate' 		=> $errorDate,
															'errorOrigin' 		=> $errorOrigin,
															'errorDestination'	=> $errorDestination,
														   ),	
								  );

			$stringResponse = json_encode($arrayResponse);

			$this->showJson($stringResponse);
		}

	}