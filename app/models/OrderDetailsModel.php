<?php

class OrderDetailsModel extends Model
{

    private $_table = 'order_details';
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

    public function insertOrderDetails($data){
        $data = $this->db->table($this->_table)->insert($data);
        return $data;   
    }
    
    public function getOrderClient($id) {
        $data = $this->db
            ->select('products.name as name, products.image as image, order_details.quantity as quantity, products.price as price, 
                       orders.id as order_id, orders.total_money as total_money, orders.full_name as full_name, 
                       orders.address as address, orders.note as note, orders.phone as phone, order_details.total_money as total_price_product')
            ->table('order_details')
            ->join('products', 'order_details.product_id = products.id')
            ->join('orders', 'order_details.order_id = orders.id')
            ->where('order_details.order_id', '=', $id)
            ->get();
    
        return $data;
    }
}
