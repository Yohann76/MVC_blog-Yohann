<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        return $comment;
    }

    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id = ? AND verified = "true"  ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
    // Suppression des commentaires lié a l'article
    public function deleteCommentFromArticle($articleId)
    {
        $sql = 'DELETE FROM comment WHERE article_id = ?';
        $this->createQuery($sql, [$articleId]   );
    }


    // Ajouter un commentaire
    public function addComment($post)
    {
        $sql = 'INSERT INTO comment (pseudo,content,article_id,users_id,createdAt) VALUES (?, ?, ?, ? , NOW() )';
        $this->createQuery($sql,[ $post->get('pseudo'), $post->get('content') ,$post->get('article_id') ,$post->get('users_id') ]  );
    }


    public function getListCommentNotVerified()
    {
        $sql = 'SELECT * FROM comment WHERE verified = "false" ';
        $result = $this->createQuery($sql);

        $listCommentNotVerified = [];
        foreach ($result as $row){
            $listCommentNotVerifiedId = $row['id'];
            $listCommentNotVerified[$listCommentNotVerifiedId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $listCommentNotVerified;
    }

    public function getListCommentVerified()
    {
        $sql = 'SELECT * FROM comment WHERE verified = "true" ';
        $result = $this->createQuery($sql);

        $listCommentVerified = [];
        foreach ($result as $row){
            $listCommentVerifiedId = $row['id'];
            $listCommentVerified[$listCommentVerifiedId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $listCommentVerified;

    }

    public function verifiedComment($post){
       $sql = 'UPDATE comment SET verified = "true"  WHERE id=?;';
       $this->createQuery($sql, [$post]   );
    }

    public function deleteComment($post){
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->createQuery($sql, [$post]   );
    }
}