<?php
/**
 *
 */
class CommentsManager extends Dbase
{

    public function createComments(Comments $comments)
    {
        $req =$this->bd->prepare("INSERT INTO comments(comments_content, comments_authors_name, 	comments_date,comments_posts_ID) values (:comments_content,:comments_authors_name,	comments_date, comments_posts_ID)");
        $req->excute(array(
                "posts_title"=>$comments->getCommentsContent (),
                "comments_authors_name"=>$comments->getCommentAuthorsName(),
                "comments_date"=>$comments->getCommentsDate(),
                "comments_posts_ID"=>$comments->getCommentsPostsId()
            )
        );
        return $req;
    }


    public function readCommentsByPost($postsId)
    {
        $query = $this->bd->prepare("SELECT * FROM comments WHERE comments_posts_ID= :comments_posts_ID");
        $parameters = array(':comments_posts_ID' => $postsId);
        $query->execute($parameters);
        while ($result = $query->fetch(PDO::FETCH_ASSOC))
        {
            $comment = new Comments($result);
            $comments[] = $comment;
        }
        //var_dump($comments);
        return $comments;

    }


    public function deleteComments($commentsId)
    {
        $sql = "DELETE FROM comments WHERE comments_id = :comments_id";
        $query = $this->bd->prepare($sql);
        $parameters = array(':comments_id' => $commentsId);
        $query->execute($parameters);
    }
}