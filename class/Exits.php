<?php

include_once "Connection.php";

class Exits extends Connection
{
    public function getExits($search = null)
    {
        if ($search) {
			$query = "SELECT E.id, E.id_prod, E.sale_price, E.quantity, E.date, P.name FROM exits AS E INNER JOIN products AS P ON E.id_prod = P.id WHERE name LIKE :search ORDER BY date DESC";

		} else {
			$query = "SELECT E.id, E.id_prod, E.sale_price, E.quantity, E.date, P.name FROM exits AS E INNER JOIN products AS P ON E.id_prod = P.id ORDER BY date DESC";
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