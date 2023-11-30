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




    public function getComments()
    {
        $data = $this->db->select('*')
            ->table($this->_table)
            ->join('users', 'post_comments.user_id = users.id')
            ->join('posts ', 'post_comments.post_id = posts.id')
            ->get();

        return $data;

    }
    
}
