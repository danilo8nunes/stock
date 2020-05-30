<?php
include_once "connection.php";

class Products extends Connection{
	
	public function addProducts($name, $price)
	{
		if ($this->checkProducts($name) == false){
			$query = "INSERT INTO  products (name, sale_price) VALUES (:name, :price)";
			$sql = $this->pdo->prepare($query);
			$sql->bindValue(':name', $name);
			$sql->bindValue(':price', $price);
			$sql->execute();

			if ($sql->errorCode() != "00000") {
				return false;
			 
			} else {
				return true;
			}
		} else {
			return false;
		}
	}
	public function getProducts($search = "")
	{
		if ($search == ""){
			$query = "SELECT * FROM products ORDER BY id";
		
		} else {
			$query = "SELECT * FROM products WHERE name LIKE :search ORDER BY id";
		}

		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':search', $search);
		$sql->execute();

		if ($sql->errorCode() != "00000") {
			return false;
		 
		} else {
			if ($sql->rowCount() > 0){
				return $sql->fetchAll(); 
			
			} else {
				return array();
			}
		}
	}
	public function delProducts($id)
	{
		if ($this->checkEntries($id) == false){
			$query = "DELETE FROM products WHERE id = :id";
			$sql = $this->pdo->prepare($query);
			$sql->bindValue(':id', $id);
			$sql->execute();
		
			if ($sql->errorCode() != "00000") {
				return false;
		 
			} else {
				return true;
			}
		} else {
			return false;
		}
	}
	private function checkEntries($id)
	{
		$query = "SELECT * FROM entries WHERE id_prod = :id";
		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':id_prod', $id);
		$sql->execute();
		
		if ($sql->errorCode() != "00000") {
			//checkEntries falhou
		
		} else {
			if ($sql->rowCount() > 0){
				return true;
			
			} else {
				return false;
			}
		}
	}
	private function checkProducts($name)
	{
		$query = "SELECT * FROM products WHERE name = :name";
		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':name', $name);
		$sql->execute();
		
		if ($sql->errorCode() != "00000") {
			//checkProducts falhou
		
		} else {
			if ($sql->rowCount() > 0){
				return true;
			
			} else {
				return false;
			}
		}
	}

}
?>