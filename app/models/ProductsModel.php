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
}
