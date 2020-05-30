<?php
require "products.php";

class Entries extends Connection 
{
	public function addEntries($id_prod, $price, $quantity, $date)
	{
		$query = "INSERT INTO entries (id_prod, purchase_price, quantity, date) VALUES (:id_prod, :price, :quantity, :date)";
		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->bindValue(':price', $price);
		$sql->bindValue(':quantity', $quantity);
		$sql->bindValue(':date', $date);
		$sql->execute();

		if ($sql->errorCode() == "00000") {
			return false;
		}
			
		$addQuatity = $this->updateQuantity($id_prod, $quantity, true);

		if ($addQuatity == true){
			return true;
		} else {
			return false;
		}
	}

	public function getEntries($search = null)
	{
		if ($search) {
			$query = "SELECT E.id, E.id_prod, E.purchase_price, E.quantity, E.date, P.name FROM entries AS E INNER JOIN products AS P ON E.id_prod = P.id WHERE name LIKE :search ORDER BY date DESC";

		} else {
			$query = "SELECT entries.id, entries.id_prod, entries.purchase_price, entries.quantity, entries.date, products.name FROM entries INNER JOIN products ON entries.id_prod = products.id ORDER BY date DESC";
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
	private function updateQuantity($id_prod, $quantity, $inject): bool
	{
		if ($inject) {
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
?>