<?php

class PostCategoriesModel extends Model
{

    private $_table = 'post_categories';
    private $_field = '*';

    function tableFill()
    {
        return 'post_categories';
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

    public function getListPostCategoriesClient()
    {
        $data= $this->db->select($this->_field)->table($this->_table)->where('status', '=' , 'on')->get();
        return $data;
    }

    public function getDetail($id) {
        $data = $this->db->select('*')->table($this->_table)->where('id', '=', $id)->first();
        return $data;
    }

    public function updatePostCategories($data, $id)
    {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }

    public function addPostCategories($data)
    {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }
    public function getPostCountByCategoryId($categoryId)
    {
        $data = $this->db->select('COUNT(*) as count')
            ->table('posts')
            ->where('post_category_id', '=', $categoryId)
            ->first();

        return $data['count'];
    }
    public function deletePostCategories($id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }

}
