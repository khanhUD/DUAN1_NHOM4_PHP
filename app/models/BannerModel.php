<?php

class BannerModel extends Model {

    private $_table = 'banner';
    private $_field = '*';

    function tableFill()
    {
        return 'banner';
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

    public function updateBanner($data, $id) {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }
    
    public function addBanner($data) {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }
    public function deleteBanner($id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();

    }

}