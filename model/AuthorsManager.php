<?php
/**
* 
*/
class AuthorsManager extends Dbase
{
	
   public function isLogged($name,$password)
   {
   		$sql = "SELECT 	*  FROM authors WHERE authors_name = :authors_name AND authors_passwords = :authors_passwords LIMIT 1";
        $query = $this->bd->prepare($sql);
        $parameters = array(':authors_name' => $name,
                            ':authors_passwords' => $password,
                            );
        $query->execute($parameters);
        $result=$query->fetch();
        if ($result)
        {
            $authors =  new Authors($result);
            var_dump($authors);
            return $authors;
        }else{
            return $result;
        }

   }
}