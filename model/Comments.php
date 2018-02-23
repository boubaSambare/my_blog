<?php
/**
* 
*/

class Comments
{
	private $_commentsId;
	private	$_commentsContent;
	private	$_commentsAuthorsName;
	private	$_commentsDate;
	private $_commentsPostsId;
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
	public function getCommentsId ()
	{
		return this->_commentsId;
	}
	public function getCommentsContent ()
	{
		return this->_commentsContent;
	}
	public function getCommentAuthorsName ()
	{
		return this->_commentsAuthorsName;
	}
	public function getCommentsDate ()
	{
		return this->_commentsDate;
	}
	public function getCommentsPostsId ()
	{
		return this->_commentsPostsId;
	}
	public function setCommentsId($commentsId)
	{
		$commentsId = (int) $commentsId;
		this->_commentsId = $commentsId;
	}
	public function setCommentsContent($commentsContent)
	{
		if (is_string($commentsContent)) 
		{
			this->_commentsContent = $commentsContent;
		}
	}
	public function setCommentAuthorsName($CommentAuthorsName)
	{
		if (is_string($CommentAuthorsName)) 
		{
			this->_commentsAuthorsName = $CommentAuthorsName;
		}
	}
	public function setCommentsDate($commentsDate)
	{
		this->_commentsDate = $commentsDate;
	}
}