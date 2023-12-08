<?php

class ProductCategoriesModel extends Model
{

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
        $data = $this->db->select($this->_field)->table($this->_table)->orderBy('product_categories.id', 'Desc')->get();
        return $data;
    }

    public function getDetail($id)
    {
        $data = $this->db->select('*')->table($this->_table)->where('id', '=', $id)->first();
        return $data;
    }

    public function updateProductCategories($data, $id)
    {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }

    public function addProductCategories($data)
    {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }
    public function deleteProductCategories($id)
    {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->delete();
        return $data;
    }
    public function getProductCountByCategoryId($categoryId)
    {
        $data = $this->db->select('COUNT(*) as count')
            ->table('products')
            ->where('product_categories_id', '=', $categoryId)
            ->first();

        return $data['count'] ;
    }

    public function getListCategoriesClient()
    {
        $data= $this->db->select($this->_field)->table($this->_table)->where('status', '=' , 'on')->get();
        return $data;
    }
}
