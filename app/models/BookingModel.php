<?php

class BookingModel extends Model {

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

    public function addBooking($data) {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }

}