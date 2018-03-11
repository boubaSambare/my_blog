<?php
/**
* 
*/
class Posts 
{
	private $_postsId ;
	private	$_postsTitle;
	private	$_postsContent;
	private	$_postsDate;
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
	public function getPostsId ()
	{
		return $this->_postsId;
	}
	public function getPostsTitle ()
	{
		return $this->_postsTitle;
	}
	public function getPostsContent ()
	{
		return $this->_postsContent;
	}
	public function getPostsDate ()
	{
		return $this->_postsDate;
	}
	public function setPosts_ID($postsId)
	{
		$postsId = (int) $postsId;
		$this->_postsId = $postsId;
	}
	public function setPosts_title($postsTilte)
	{
		if (is_string($postsTilte)) 
		{
			$this->_postsTitle = $postsTilte;
		}
	}
	public function setPosts_content($postsContent)
	{
		if (is_string($postsContent)) 
		{
			$this->_postsContent = $postsContent;
		}
	}
	public function setPosts_date($postsDate)
	{
		$this->_postsDate = $postsDate;
	}
}