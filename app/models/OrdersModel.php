<?php

class OrdersModel extends Model
{

    private $_table = 'orders';
    private $_field = '*';



    function tableFill()
    {
        return 'orders';
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
        $data = $this->db->select("orders.id AS id, users.full_name AS full_name, users.email AS email, orders.address AS address, users.phone AS phone, orders.created_at AS created_at, orders.total_money AS total_money, orders.status AS status")
        ->table('orders')
        ->join('users', 'orders.user_id = users.id')
        ->get();
        return $data;
    }
    public function updateStatus($data, $id)
    {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }
}
