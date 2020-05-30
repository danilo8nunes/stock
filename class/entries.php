<?php
require "products.php";

class Entries extends Connection{

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
		 
		} else {
			$inject = true;
			$addQuatity = $this->updateQuantity($id_prod, $quantity, $inject);

			if ($addQuatity == true){
				return true;
			
			} else {
				return false;
			}
		}
	}
	public function getEntries($search = "")
	{
		if ($search == ""){
			$query = "SELECT entries.id, entries.id_prod, entries.purchase_price, entries.quantity, entries.date, products.name FROM entries INNER JOIN products ON entries.id_prod = products.id ORDER BY date DESC";
		
		} else {
			$query = "SELECT entries.id, entries.id_prod, entries.purchase_price, entries.quantity, entries.date, products.name FROM entries INNER JOIN products ON entries.id_prod = products.id WHERE name LIKE :search ORDER BY date DESC";
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
		 
		} else {
			$inject = false;
			$update = $this->updateQuantity($id_prod, $quantity, $inject);
			
			if ($update == false){
				return false;
			
			} else {
				return true;
			}
		}
	}
	private function updateQuantity($id_prod, $quantity, $inject)
	{
		if ($inject == true){
			$query = "UPDATE products SET quantity = quantity + :quantity WHERE id = :id_prod;";	
		}
		else {
			$query = "UPDATE products SET quantity = quantity - :quantity WHERE id = :id_prod;";	
		}
		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':quantity', $quantity);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->execute();

		if ($sql->errorCode() != "00000") {
			return false;
		 
		} else {
			return true;	

		}	
	}
	
}
?>