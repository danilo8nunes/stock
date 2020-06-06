<?php

include_once "Entries.php";

class Payments extends Entries {
		
	public function addCart($id)
	{
		$id = addslashes($id);
        $query = "SELECT * FROM products WHERE id IN (".$id.") ORDER BY name";
        
        $sql = $this->pdo->query($query);
		
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

	public function getKartProducts()
	{
		$query = "SELECT * FROM products WHERE quantity > 0 ORDER BY name";

		$sql = $this->pdo->query($query);
		
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
	public function addExits($id_prod, $quantity, $date)
	{
	 	$query = "SELECT sale_price FROM Products WHERE id = :id_prod";
		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->execute();

		if ($sql->errorCode() != "00000") {
			return false;
		   
		} else {
			$price = $sql->fetch();
			$price = $price['sale_price'];
		}
				
		$query = "INSERT INTO exits (id_prod, sale_price, quantity, date) VALUES (:id_prod, :price, :quantity, :date)";
		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->bindValue(':price', $price);
		$sql->bindValue(':quantity', $quantity);
		$sql->bindValue(':date', $date);
		$sql->execute();
				
		if ($sql->errorCode() != "00000") {
		 	return false;
		}
	
		$update = $this->updateQuantity($id_prod, $quantity, false);

		if ($update == true){
		 	return true;
		
		} else {
			return false;
		}
	}

}
