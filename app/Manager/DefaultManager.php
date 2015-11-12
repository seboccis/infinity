<?php

namespace Manager;

use W\Manager\Manager;

/**
 * Le manager par défaut à extender
 */
abstract class DefaultManager extends Manager
{

	/**
	 * Simplifie la réponse à un fetchAll sur une colonne
	 * @param array $arrayOfArray La réponse d'un fetchAll sur une colonne
	 * @param string $columnName Le nom de la colonne
	 * @return array Les données
	 */
	protected function moveUpArray($arrayOfArray, $columnName)
	{
		$result = [];

		foreach($arrayOfArray as $array){
			if(!in_array($array[$columnName], $result)){
				$result[] = $array[$columnName];
			}
		}

		return $result;
	}

	/**
	 * Ajoute une ligne
	 * @param array $data Un tableau associatif de valeurs à insérer
	 * @param boolean $stripTags Active le strip_tags automatique sur toutes les valeurs
	 * @return int Le dernier id inséré
	 */
	public function insert(array $data, $stripTags = true)
	{

		$colNames = array_keys($data);
		$colNamesString = implode(", ", $colNames);

		$sql = "INSERT INTO " . $this->table . " ($colNamesString) VALUES (";
		foreach($data as $key => $value){
			$sql .= ":$key, ";
		}
		$sql = substr($sql, 0, -2);
		$sql .= ")";

		$sth = $this->dbh->prepare($sql);
		foreach($data as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(":".$key, $value);
		}
		$sth->execute();
		return $this->dbh->lastInsertId();
	}

	/**
	 * Compte les lignes de la table
	 * @return int Le nombre de lignes
	 */
	public function count()
	{

		$sql = "SELECT COUNT(*) FROM " . $this->table;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchColumn();
	}

	/**
	 * Récupère toutes les lignes de la table au hasard
	 * @return array Toutes les données de la table
	 */
	public function findAllRand()
	{
		$sql = "SELECT * 
				FROM " . $this->table . "
				ORDER BY RAND()";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

	/**
	 * Cherche toutes les valeurs de la colonne $columnName
	 * @param string $columnName Le nom de la colonne
	 * @return array Les données
	 */
	public function getAll($columnName)
	{
		$sql = "SELECT " . $columnName . " 
				FROM " . $this->table . "
				ORDER BY " . $columnName;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		$arrayOfArray = $sth->fetchAll();

		return $this->moveUpArray($arrayOfArray, $columnName);
	}

}
