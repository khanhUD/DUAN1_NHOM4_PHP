<?php

class ProductCategoriesModel extends Model {

    private $_table = 'product_categories';
    private $_field = '*';

    function tableFill()
    {
        return 'product_categories';
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
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getDetail($id) {
        $data = $this->db->select('*')->table($this->_table)->where('id', '=', $id)->first();
        return $data;
    }

    public function updateProductCategories($data, $id) {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }
    
    public function addProductCategories($data) {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }
    public function deleteProductCategories($id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();

    }

}