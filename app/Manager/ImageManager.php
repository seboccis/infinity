<?php

	namespace Manager;

	use Manager\DefaultManager;

	/**
	 * Le manager d'images
	 */
	class ImageManager extends DefaultManager
	{

		/**
		 * Cherche le nom de l'image principale d'un véhicule
		 * @param int $id Id du véhicule
		 * @return string Le nom du fichier image
		 */
		public function findCarPrincipalImgFileName($id)
		{
			$sql = "SELECT fileName
					FROM " . $this->table . "
					WHERE id = 	(
									SELECT id_img
									FROM cars_images
									WHERE id_car = :id
									AND isPrincipal = 1
								)";
			$sth = $this->dbh->prepare($sql);
			$sth->bindValue(":id", $id);
			$sth->execute();

			return $sth->fetchColumn();
		}

	}