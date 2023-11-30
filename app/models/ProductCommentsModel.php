<?php

class ProductCommentsModel extends Model
{

    private $_table = 'product_comments';
    private $_field = '*';

    function tableFill()
    {
        return 'product_comments';
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
        $data = $this->db->select("product_comments.id AS comment_id, product_comments.user_id, product_comments.note, product_comments.status, product_comments.create_at, users.email, products.id AS products_id, products.name AS products_name")
            ->table($this->_table)
            ->join('users', 'product_comments.user_id = users.id')
            ->join('products', 'product_comments.product_id = products.id')
            ->where('products.id', '=', $id)
            ->get();

        return $data;

    }

    public function getComments()
    {
        $data = $this->db->select('product_comments.id, products.id AS products_id, products.name AS products_name, products.image AS products_img, COUNT(*) AS quantity')
            ->table($this->_table)
            ->join('products', 'product_comments.product_id = products.id')
            ->groupBy('product_comments.id, products_id, products_name, products_img')
            ->having('quantity', '>', 0)
            ->get();

        return $data;
    }


}