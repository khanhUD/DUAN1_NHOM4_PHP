<?php

class ProductsModel extends Model
{
    private $_table = 'products';
    private $_field = '*';

    function tableFill()
    {
        return 'products';
    }

    function fieldFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 'id';
    }

    public function getList()
    {
        $data = $this->db->select($this->_field)
            ->table($this->_table)
            ->where('products.status', '!=', 'delete')
            ->orderBy('products.create_at', 'Desc')
            ->get();
        return $data;
    }
    public function getListHidden()
    {
        $data = $this->db->select($this->_field)
            ->table($this->_table)
            ->where('products.status', '=', 'delete')
            ->orderBy('products.create_at', 'Desc')
            ->get();
        return $data;
    }
    public function getDetail($id)
    {
        $data = $this->db->select($this->_field)
            ->table($this->_table)
            ->where('products.id', '=', $id)
            ->first();
        return $data;
    }

    public function addProducts($data)
    {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }
    public function updateProducts($data, $id)
    {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }

    public function getListProductClient()
    {
        $data = $this->db->select($this->_field)
            ->table($this->_table)
            ->where('products.status', '=', 'on')
            ->orderBy('products.create_at', 'Desc')
            ->get();
        return $data;
    }

    public function getListProductHomeClient()
    {
        $data = $this->db->select($this->_field)
            ->table($this->_table)
            ->where('products.status', '=', 'on')
            ->orderBy('products.create_at', 'Desc')
            ->limit(8)
            ->get();
        return $data;
    }

    public function getListClientByCategory($id)
    {
        $data = $this->db->select($this->_field)->table($this->_table)->where('products.status', '=', 'on')->andWhere('products.product_categories_id', '=', $id)->get();
        return $data;
    }

    public function getProductDetailById($id)
    {
        $data = $this->db->select($this->_field)->table($this->_table)->join('product_categories', 'products.product_categories_id = product_categories.id')->where('products.status', '=', 'on')->andWhere('products.product_categories_id', '=', $id)->first();
        return $data;
    }

    public function getListClientByKey($key)
    {
        $data = $this->db->query("
            SELECT 
                products.name AS name, 
                products.id AS id,
                products.image, 
                products.status, 
                products.price, 
                product_categories.name as product_categories_name, 
                products.product_categories_id, 
                product_categories.id AS product_categories_id   
            FROM products
            JOIN product_categories ON product_categories.id = products.product_categories_id
            WHERE 
                (products.name LIKE '%$key%' OR product_categories.name LIKE '%$key%')
                AND products.status = 'on'
                ")->fetchAll(PDO::FETCH_ASSOC);

        // $data = $this->db->select($this->_field)->table($this->_table)->join('product_categories', 'products.product_categories_id = product_categories.id')->where('products.status', '=', 'on')->andWhere('products.product_categories_id', '=', $id)->get();
        return $data;
    }
}
