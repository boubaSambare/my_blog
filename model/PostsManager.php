<?php
/**
* 
*/

class PostsManager extends Dbase
{
	 
	
   public function createPosts(Posts $post)
   {
   			$req = $this->bd->prepare("INSERT INTO posts(posts_title, posts_content, posts_date) values (:posts_title,:posts_content,NOW())");
   			$req->execute(array(
   								"posts_title"=>$post->getPostsTitle(),
   								"posts_content"=>$post->getPostsContent(),
   							  )
   						);
   			return $req;
   }
   //to get all the posts in table Posts


   public function readAllPosts()
   {
   			$query = $this->bd->prepare("SELECT * FROM posts");
   			$query->execute();

   		    $result= $query->fetchAll();
   		    $posts= [];
   		    foreach ($result as $data) 
   		    {
   		    	$arrPosts = new Posts($data);
   		    	$posts[] = $arrPosts;
   		    }
   		    return $posts;
   }


   public function readById($postsId)
   {
   		$sql = "SELECT posts_id, posts_title, posts_content, posts_date FROM posts WHERE posts_ID = :posts_ID ";
        $query = $this->bd->prepare($sql);
        $parameters = array(':posts_ID' => $postsId);
        $query->execute($parameters);
        $result = $query->fetch();
        //var_dump($result);
         return new Posts($result);
   }

   public function deletePosts($postsId)
   {
   		$sql = "DELETE FROM posts WHERE posts_id = :posts_id";
        $query = $this->bd->prepare($sql);
        $parameters = array(':posts_id' => $postsId);
        $query->execute($parameters);
   }
   // to adapte posts
   /**
   *@param 
   */
   public function udaptePost(Posts $posts)
   {
   		$sql = "UPDATE Posts SET posts_title =:posts_title, posts_content=:posts_content WHERE posts_id=:posts_id";
   		$query = $this->bd->prepare($sql);
   		$query ->bindValue(':posts_title', $posts->getPostsTitle(), PDO::PARAM_STR);
        $query ->bindValue(':posts_content', $posts->getPostsContent(), PDO::PARAM_STR);
        $query ->bindValue(':posts_id', $posts->getPostsId(), PDO::PARAM_INT);
        return $query ->execute();
   }

}
