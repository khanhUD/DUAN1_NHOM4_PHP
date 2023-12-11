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
          orders.status AS status")->orderBy('orders.id', 'Desc')
            ->table('orders')
            ->join('users', 'orders.user_id = users.id')->where('orders.status', '!=', 'delate')
            ->get();
        return $data;
    }
    public function getOrderById($id)
    {
        $data = $this->db->select("orders.id AS id, users.full_name AS full_name, users.email AS email,
             orders.address AS address, users.phone AS phone, orders.created_at AS created_at, orders.total_money AS total_money,
              orders.status AS status")->orderBy('orders.id', 'Desc')
            ->table('orders')
            ->join('users', 'orders.user_id = users.id')
            ->where('orders.id', '=', $id)
            ->get(); // Sử dụng first để chỉ lấy một bản ghi đầu tiên
        return $data;
    }
    public function getListHidden()
    {
        $data = $this->db->select("orders.id AS id, users.full_name AS full_name, users.email AS email,
         orders.address AS address, users.phone AS phone, orders.created_at AS created_at, orders.total_money AS total_money,
          orders.status AS status")->orderBy('orders.id', 'Desc')
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
    public function updateStatus($data, $id)
    {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }
    public function getListDetail($id)
    {
        $data = $this->db
            ->select('products.name as name, products.image as image, order_details.quantity as quantity , products.price as price  ')
            ->table('order_details')
            ->join('products', 'order_details.product_id = products.id')
            ->where('order_details.order_id', '=', $id)
            ->get();

        return $data;
    }

    public function insertOrders($data)
    {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }

    public function getLastInsertID()
    {
        $data = $this->db->table($this->_table)->lastId();
        return $data;
    }

    public function getInfoUsers($id, $user_id)
    {
        $data = $this->db->select("orders.id AS id, orders.full_name AS full_name, users.email AS email,
         orders.address AS address, orders.note AS note, orders.phone AS phone, orders.total_money AS total_money")
            ->table('orders')
            ->join('users', 'orders.user_id = users.id')->where('orders.id', '=', $id)->where('orders.user_id', '=', $user_id)
            ->first();
        return $data;
    }

    public function getOrderManagerById($id)
    {
        $data = $this->db->select("orders.id AS id, users.full_name AS full_name, users.email AS email,
             orders.address AS address, users.phone AS phone, orders.created_at AS created_at, orders.total_money AS total_money,
              orders.status AS status")->orderBy('orders.id', 'Desc')
            ->table('orders')
            ->join('users', 'orders.user_id = users.id')
            ->where('users.id', '=', $id)
            ->get(); // Sử dụng first để chỉ lấy một bản ghi đầu tiên
        return $data;
    }
}
