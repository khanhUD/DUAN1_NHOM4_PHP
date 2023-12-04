<?php

class UsersModel extends Model {

    private $_table = 'users';
    private $_field = '*';

    function tableFill()
    {
        return 'users';
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

    public function updateUsers($data, $id) {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }
    
    public function addUsers($data) {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }
    public function deleteUsers($id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();

    }
    public function checkUsers($email,$password){
        $data = $this->db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'")->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

}