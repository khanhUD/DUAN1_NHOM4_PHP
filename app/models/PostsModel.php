<?php
class PostsModel extends Model
{
    private $_table = 'posts';
    private $_field = '*';

    function tableFill()
    {
        return 'posts';
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
    public function getDetail($id)
    {
        $data = $this->db->select('*')->table($this->_table)->where('id', '=', $id)->first();
        return $data;
    }
}
