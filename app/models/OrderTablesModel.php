<?php
class OrderTablesModel extends Model
{
    private $_table = 'orders_table';
    private $_field = '*';

    function tableFill()
    {
        return 'orders_table';
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
        $data = $this->db->select("*, orders_table.status as status_orderTables")
            ->table($this->_table)
            ->join('users', 'orders_table.user_id = users.id')
            ->get();    
        return $data;
    }

    public function getDetail($id)
    {
        $data = $this->db->select('*')->table($this->_table)->where('id', '=', $id)->first();
        return $data;
    } 
    
    public function updateStatus($data, $id) {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }

    public function deleteOrderTables($id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }
}
