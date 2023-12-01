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

    public function getCommentDetails($productId)
    {
        $data = $this->db->select("product_comments.id AS comment_id, product_comments.user_id, product_comments.note, product_comments.status, product_comments.create_at, users.email, products.id AS product_id, products.name AS product_name, COUNT(*) AS quantity")
            ->table($this->_table)
            ->join('users', 'product_comments.user_id = users.id')
            ->join('products', 'product_comments.product_id = products.id')
            ->groupBy('product_comments.id, product_id, product_name, users.id')
            ->having('quantity', '>', 0)->orderBy('product_comments.id', 'DESC')
            ->where('products.id', '=', $productId)
            ->get();

        return $data;
    }

    public function getComments()
    {
        $data = $this->db->select(
            ' products.id AS id,
            products.name AS name,
            products.image AS image,
            products.status AS status,
            COUNT(product_comments.id) AS quantity'
        )
            ->table('products')
            ->join('product_comments', 'products.id = product_comments.product_id')
            ->where('product_comments.status', '!=', 'delete')
            ->groupBy('products.id', 'products.name', 'products.image', 'products.status')
            ->having('quantity', '>', '0')
            ->orderBy('products.id', 'DESC')
            ->get();


        return $data;
    }

    public function updateStatusComment($data, $commentId)
    {
        $data = $this->db->table($this->_table)->where('id', '=', $commentId)->update($data);
        return $data;
    }

    public function deleteCommentDetails($id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }
}
