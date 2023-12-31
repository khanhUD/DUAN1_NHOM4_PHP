<?php

class VouchersModel extends Model
{

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
        
        $data = $this->db->select($this->_field)->table($this->_table)->where('vouchers.status', '!=', 'delete')->orderBy('vouchers.id', 'Desc')->get();
        return $data;
    }
    public function addVouchers($data)
    {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }
    public function getDetail($id)
    {
        $data = $this->db->select('*')->table($this->_table)->where('id', '=', $id)->first();
        return $data;
    }
    public function updateVouchers($data, $id)
    {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data, $id);
        return $data;
    }
    public function delateVouchers($id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }
    public function getListHidden()
    {
        $data = $this->db->select($this->_field)
            ->table($this->_table)
            ->where('vouchers.status', '=', 'delete')
            ->orderBy('vouchers.id', 'Desc')
            ->get();
        return $data;
    }
    public function getListClient()
    {
        
        $data = $this->db->select($this->_field)->table($this->_table)->where('vouchers.status', '=', 'on')->orderBy('vouchers.id', 'Desc')->get();
        return $data;
    }
    public function checkVoucherByCode($code)
    {
        $data = $this->db->select('*')->table($this->_table)->where('code', '=', $code)->first();
        return $data;
    }
}
