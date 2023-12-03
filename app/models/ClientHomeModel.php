<?php

class ClientHomeModel extends Model {

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


    public function getBanner()
    {
        $data = $this->db->query("SELECT * FROM banner ORDER BY id DESC LIMIT 1")->get();
        return $data;
    }

}