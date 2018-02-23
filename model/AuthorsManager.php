<?php
/**
* 
*/
class AuthorsManager extends Dbase
{
	
   public function readById($authorsId)
   {
   		$sql = "SELECT 	authors_ID, authors_name, 	authors_login, authors_passwords FROM authors WHERE authors_ID = :authors_ID LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':authors_ID' => $authorsId);
        $query->execute($parameters);
        $result = $query->fetch();
         return new Athors($result);
   }
}