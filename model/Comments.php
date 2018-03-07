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
		return $this->_commentsId;
	}
	public function getCommentsContent ()
	{
		return $this->_commentsContent;
	}
	public function getCommentAuthorsName ()
	{
		return $this->_commentsAuthorsName;
	}
	public function getCommentsDate ()
	{
		return $this->_commentsDate;
	}
	public function getCommentsPostsId ()
	{
		return $this->_commentsPostsId;
	}
	public function setComments_ID($commentsId)
	{
		$commentsId = (int) $commentsId;
		$this->_commentsId = $commentsId;
	}
	public function setComments_content($commentsContent)
	{
		if (is_string($commentsContent)) 
		{
			$this->_commentsContent = $commentsContent;
		}
	}
	public function setComments_authors_name($CommentAuthorsName)
	{
		if (is_string($CommentAuthorsName)) 
		{
			$this->_commentsAuthorsName = $CommentAuthorsName;
		}
	}
	public function setComments_date($commentsDate)
	{
		$this->_commentsDate = $commentsDate;
	}
    public function setComments_posts_ID($commentsPostsId)
    {
        $this->_commentsPostsId = $commentsPostsId;
	}
}