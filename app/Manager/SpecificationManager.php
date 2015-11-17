<?php

	namespace Manager;

	use Manager\DefaultManager;

	/**
	 * Le manager de caractéristiques techniques de véhicules (specifications)
	 */
	class SpecificationManager extends DefaultManager
	{

		/**
		 * Cherche les caractéristiques techniques d'un véhicule
		 * @param int $idCar Identifiant du véhicule
		 * @return array Tableau ordonné des caractéristiques techniques du véhicule
		 */
		public function findCarSpecifications($idCar)
		{
			$sql = "SELECT description
					FROM " . $this->table . "
					WHERE id IN (
									SELECT id_specification
									FROM cars_specifications
									WHERE id_car = :idCar
									ORDER BY position
								)";
			$sth = $this->dbh->prepare($sql);
			$sth->bindValue(":idCar", $idCar);
			$sth->execute();

			$arraySpecifications = $sth->fetchAll();

			return $this->moveUpArray($arraySpecifications, 'description');
		}

	}