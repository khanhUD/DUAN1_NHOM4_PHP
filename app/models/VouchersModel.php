<?php

class VouchersModel extends Model {

    private $_table = 'vouchers';
    private $_field = '*';

    function tableFill()
    {
        return 'vouchers';
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

  

}