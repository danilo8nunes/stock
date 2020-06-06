<?php
include_once "connection.php";

class Entries extends Connection 
{	
	/**
	 * Adiciona entradas de produtos
	 *
	 * @param  int $id_prod
	 * @param  float $price
	 * @param  int $quantity
	 * @param  string $date
	 * @return bool
	 */
	public function addEntries($id_prod, $price, $quantity, $date)
	{
		$query = "INSERT INTO entries (id_prod, purchase_price, quantity, date) VALUES (:id_prod, :price, :quantity, :date)";
		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->bindValue(':price', $price);
		$sql->bindValue(':quantity', $quantity);
		$sql->bindValue(':date', $date);
		$sql->execute();

		 if ($sql->errorCode() != "00000") {
		 	return false;
		}
	
		$update = $this->updateQuantity($id_prod, $quantity, true);

		if ($update == true){
		 	return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Consulta entradas de produtos
	 *
	 * @param  string $search (null = pesquisa todas as entradas)
	 * @return array
	 */
	public function getEntries($search = null)
	{
		if ($search) {
			$query = "SELECT E.id, E.id_prod, E.purchase_price, E.quantity, E.date, P.name FROM entries AS E INNER JOIN products AS P ON E.id_prod = P.id WHERE name LIKE :search ORDER BY date DESC";

		} else {
			$query = "SELECT E.id, E.id_prod, E.purchase_price, E.quantity, E.date, P.name FROM entries AS E INNER JOIN products AS P ON E.id_prod = P.id ORDER BY date DESC";
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
	 * Apaga registro de entrada de produtos
	 *
	 * @param  int $id
	 * @param  int $id_prod
	 * @param  int $quantity
	 * @return bool
	 */
	public function delEntries($id, $id_prod, $quantity)
	{
		$query = "DELETE FROM entries WHERE id = :id";
		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':id', $id);
		$sql->execute();
		
		if ($sql->errorCode() != "00000") {
			return false;
		}

		$update = $this->updateQuantity($id_prod, $quantity, false);
		
		if ($update == false) {
			return false;
		} 

		return true;
	}
		
	/**
	 * Altera a quantidade de produtos
	 *
	 * @param  int $id_prod
	 * @param  int $quantity
	 * @param  bool $inject (true = incremento, false = decremento)
	 * @return bool
	 */
	protected function updateQuantity($id_prod, $quantity, $inject)
	{
		if ($inject == true) {
			$query = "UPDATE products SET quantity = quantity + :quantity WHERE id = :id_prod";	
		} else {
			$query = "UPDATE products SET quantity = quantity - :quantity WHERE id = :id_prod";	
		}

		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':quantity', $quantity);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->execute();

		if ($sql->errorCode() != "00000") {
			return false;
		}

		return true;
	}
	
}
