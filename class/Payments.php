<?php

include_once "Connection.php";

class Payments extends Connection{
		
	public function getShop($id)
	{
        $query = "SELECT * FROM products WHERE id IN (".$id.")";
        
        $sql = $this->pdo->query($query);
		// $sql = $this->pdo->prepare($query);
		// $sql->bindValue(':id', $id);
		// $sql->execute();

		// if ($sql->errorCode() != "00000") {
		// 	return false;
		 
		// } else {
			if ($sql->rowCount() > 0){
				return $sql->fetchAll(); 
			
			} else {
				return array();
			}
	// 	}
    }
}
