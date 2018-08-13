<?php
/**
 *
 */
class CommentsManager extends Dbase
{

    public function createComments(Comments $comments)
    {
        $req =$this->bd->prepare("INSERT INTO comments(comments_content, comments_authors_name, 	comments_date,comments_posts_ID) values (:comments_content,:comments_authors_name,NOW(), :comments_posts_ID)");
        $req->execute(array(
                "comments_content"=>$comments->getCommentsContent (),
                "comments_authors_name"=>$comments->getCommentAuthorsName(),
                "comments_posts_ID"=>$comments->getCommentsPostsId(),

            )
        );
        return $req;
    }


    public function readCommentsByPost($postsId)
    {
        $query = $this->bd->prepare("SELECT * FROM comments WHERE comments_posts_ID= :comments_posts_ID ORDER BY comments_ID  DESC");
        $parameters = array(':comments_posts_ID' => $postsId);
        $query->execute($parameters);
        $comments = array();
        while ($result = $query->fetch(PDO::FETCH_ASSOC))
        {
            $comment = new Comments($result);
            $comments[] = $comment;
        }
        //var_dump($comments);
        return $comments;

    }


    /**
     * @param $commentsId
     */
    public function deleteComments($commentsId)
    {
        $sql = "DELETE FROM comments WHERE comments_ID = :comments_ID";
        $query = $this->bd->prepare($sql);
        $parameters = array(':comments_ID' => $commentsId);
        $query->execute($parameters);
    }
    public function signalComments(Comments $comments)
    {
        $sql = "UPDATE Comments SET comments_signal = :comments_signal WHERE comments_ID=:comments_ID";
        $query = $this->bd->prepare($sql);
        $query ->bindValue(':comments_signal', $comments->getCommentsSignal(), PDO::PARAM_STR);
        $query ->bindValue(':comments_ID', $comments->getCommentsId(), PDO::PARAM_INT);

        return $query ->execute();
    }

    public function moderateComments(Comments $comments)
    {
        //var_dump($comments);
        $sql = "UPDATE comments SET comments_signal = :comments_signal,comments_content = :comments_content WHERE comments_ID=:comments_ID";
        $query = $this->bd->prepare($sql);
        $query ->bindValue(':comments_signal', $comments->getCommentsSignal(), PDO::PARAM_STR);
        $query ->bindValue(':comments_content', $comments->getCommentsContent(), PDO::PARAM_STR);
        $query ->bindValue(':comments_ID', $comments->getCommentsId(), PDO::PARAM_INT);

        return $query ->execute();
    }

    public function readCommentsSignal()
    {
        $query = $this->bd->prepare("SELECT * FROM comments WHERE comments_signal = 'signaled' ");

        $query->execute();

        $result= $query->fetchAll();
        $comments= [];
        foreach ($result as $data)
        {
            $arrPosts = new Comments($data);
            $comments[] = $arrPosts;
        }
        return $comments;
    }
    public function readSingleComment($commentsId)
    {
        $query = $this->bd->prepare("SELECT comments_ID, comments_content FROM comments WHERE comments_ID = :comments_ID ");
        $parameters = array(':comments_ID' => $commentsId);
        $query->execute($parameters);
        $comments = $query->fetch();
        return new Comments($comments);

    }
}