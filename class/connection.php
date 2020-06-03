<?php

/**
 * Faz conecção com o banco de dados
 */
class Connection
{
	protected $pdo;

	public function __construct() 
	{
		try {
			$this->pdo = new PDO("mysql:dbname=stock;host=localhost", "root", "");

		} catch(PDOException $e) {
			echo "Erro: " . $e->getMessage();
		}
	}
}
