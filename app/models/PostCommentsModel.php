<?php

class PostCommentsModel extends Model
{

    private $_table = 'post_comments';
    private $_field = '*';

    function tableFill()
    {
        return 'post_comments';
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'id';
    }

    public function getCommentDetails($id)
    {
        $data = $this->db->select("post_comments.id AS comment_id, post_comments.user_id, post_comments.note, post_comments.status, post_comments.create_at, users.email, posts.id AS posts_id, posts.title AS posts_title, COUNT(*) AS quantity")
            ->table($this->_table)
            ->join('users', 'post_comments.user_id = users.id')
            ->join('posts', 'post_comments.post_id = posts.id')
            ->groupBy('post_comments.id, posts_id, posts_title, users.id')
            ->having('quantity', '>', 0)
            ->where('posts.id', '=', $id)
            ->get();

        return $data;

    }

    public function getComments()
    {
        $data = $this->db->select('post_comments.id, posts.id AS posts_id, posts.title AS posts_title, posts.image AS posts_img, COUNT(*) AS quantity')
            ->table($this->_table)
            ->join('posts', 'post_comments.post_id = posts.id')
            ->groupBy('post_comments.id, posts_id, posts_title, posts_img')
            ->having('quantity', '>', 0)
            ->get();

        return $data;
    }


}
