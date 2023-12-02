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
        $data = $this->db->select("orders.id AS id, users.full_name AS full_name, users.email AS email,
         orders.address AS address, users.phone AS phone, orders.created_at AS created_at, orders.total_money AS total_money,
          orders.status AS status")->orderBy('orders.id','Desc')
        ->table('orders')
        ->join('users', 'orders.user_id = users.id')->where('orders.status', '!=', 'delate')
        ->get();
        return $data;
    }  public function getListHidden()
    {
        $data = $this->db->select("orders.id AS id, users.full_name AS full_name, users.email AS email,
         orders.address AS address, users.phone AS phone, orders.created_at AS created_at, orders.total_money AS total_money,
          orders.status AS status")->orderBy('orders.id','Desc')
        ->table('orders')
        ->join('users', 'orders.user_id = users.id')->where('orders.status', '=', 'delate')
        ->get();
        return $data;
    }
    public function getProducts($id)
    { 
        $data = $this->db->select(" products.name AS name, products.image AS image,
        order_details.quantity AS quantity, products.price AS price")
        ->table('order_details')
        ->join('products', 'order_details.product_id = products.id')
        ->join('orders ', 'order_details.order_id = orders.id')->where('orders.id', '=', $id)
        ->get();
        return $data;
     
     
    }
    public function updateStatus($data,$id){
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }
}
