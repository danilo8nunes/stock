<?php
require "mysql.php";

class Appetizer extends Mysql{

	public function addAppetizer($id_prod, $price, $amount, $date)
	{
		$query = "INSERT INTO  appetizer (id_prod, price_p, amount, date) VALUES (:id_prod, :price, :amount, :date)";
		$sql = $this->pdo->prepare($query);
		$sql->bindValue(':id_prod', $id_prod);
		$sql->bindValue(':price', $price);
		$sql->bindValue(':amount', $amount);
		$sql->bindValue(':date', $date);
		$sql->execute();

		if ($sql->errorCode() != "00000") {
			return false;
		 
		} else {
			return true;
		}
	}
	public function getAppetizer($search = "")
	{
		if ($search == ""){
			$query = "SELECT * FROM appetizer ORDER BY id_prod";
		
		} else {
			$query = "SELECT * FROM appetizer WHERE name LIKE :search ORDER BY id_prod";
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

}
?>