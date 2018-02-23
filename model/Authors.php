<?php
/**
* 
*/
class Authors
{
	private $_authorsId;
	private $_authorsName;
	private $_authorsLogin;
	private $_authorsPassword;
	public function __construct (array $data)
	{
		$this->hydrate($data);
	}
	public function hydrate (array $data)
	{
			foreach ($data as $key => $value)
	  	{ 
		    $method = 'set'.ucfirst($key);
		        
		    if (method_exists($this, $method))
		    {
		      $this->$method($value);
		    }
   		}
	}
	public function getAuthorsId ()
	{
		return this->_authorsId;
	}
	public function getAuthorsName ()
	{
		return this->_authorsName;
	}
	public function getAuthorsLogin ()
	{
		return this->_authorsLogin;
	}
	public function getAuthorsPassword ()
	{
		return this->_authorsPassword;
	}
	
	public function setAuthorsId($authorsId)
	{
		$authorsId = (int) $authorsId;
		this->_authorsId = $authorsId;
	}
	public function setAuthorsName($authorsName)
	{
		if (is_string($authorsName)) 
		{
			this->_authorsName = $authorsName;
		}
	}
	public function setAuthorsLogin($authorsLogin)
	{
		if (is_string($authorsLogin)) 
		{
			this->_authorsLogin = $authorsLogin;
		}
	}
	public function setAuthorsPassword($authorsPassword)
	{
		$lenghPassword = strlen($authorsPassword);
		if (is_string($authorsPassword) AND $lenghPassword <= 20) {
			this->_authorsPassword = $authorsPassword;
		}
		
	}

}