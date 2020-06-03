<?php
include_once "Connection.php";

class Products extends Connection{
		
	/**
	 * Adiciona um novo produto
	 *
	 * @param  string $name
	 * @param  float $price (preço de revenda)
	 * @return bool
	 */
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
	
	/**
	 * Consulta produtos cadastrados
	 *
	 * @param  string $search (null = pesquisa todos os produtos)
	 * @return array
	 */
	public function getProducts($search = null)
	{
		if ($search){
			$query = "SELECT * FROM products WHERE name LIKE :search ORDER BY id";
		} else {
			$query = "SELECT * FROM products ORDER BY id";			
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
	
	/**
	 * Deleta Produto caso não haja entrada para o produto
	 *
	 * @param  int $id
	 * @return bool
	 */
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
	
	/**
	 * Verifica se há entrada(s) para o produto
	 *
	 * @param  mixed $id
	 * @return bool
	 */
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
	/**
	 * Verifica se o produto já está cadastrado
	 *
	 * @param  mixed $name
	 * @return bool
	 */
	private function checkProducts($name)
	{
		$query = "SELECT * FROM products WHERE name = :name";
		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':name', $name);
		$sql->execute();
		
		if ($sql->errorCode() != "00000") {
			exit;
		
		} else {
			if ($sql->rowCount() > 0){
				return true;
			
			} else {
				return false;
			}
		}
	}

}
