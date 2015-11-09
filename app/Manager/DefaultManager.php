<?php

namespace Manager;

use W\Manager\Manager;

/**
 * Le manager par défaut à extender
 */
abstract class DefaultManager extends Manager
{

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

}
