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

        $data = $this->db->select('posts.id AS posts_id,
        posts.title AS title,
        posts.image AS image,
        posts.status AS status,
        COUNT(post_comments.id) AS quantity')
            ->table('posts')
            ->join('post_comments', 'posts.id = post_comments.post_id')
            ->groupBy('posts.id, posts.title, posts.image, posts.status')
            ->having('quantity', '>', 0)
            ->where('post_comments.status', '!=', 'delete')
            ->orderBy('posts.id', 'DESC')
            ->get();


        return $data;
    }
    public function updateStatusComment($data, $id)
    {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }
    public function delateCommentDetails($id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }

    public function getPostComment($id)
    {
        $data = $this->db->select("post_comments.id AS comment_id, post_comments.user_id, post_comments.note, post_comments.status, post_comments.create_at, users.full_name, users.image, posts.id AS posts_id, posts.title AS posts_title, COUNT(*) AS quantity")
            ->table($this->_table)
            ->join('users', 'post_comments.user_id = users.id')
            ->join('posts', 'post_comments.post_id = posts.id')
            ->groupBy('post_comments.id, posts_id, posts_title, users.id')
            ->having('quantity', '>', 0)
            ->where('post_comments.status', '=', 'on')
            ->andWhere('posts.id', '=', $id)
            ->get();

        return $data;
    }

    public function submitPostComment($data)
    {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }
}
