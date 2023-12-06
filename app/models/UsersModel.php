<?php

class UsersModel extends Model
{

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

    public function getDetail($id)
    {
        $data = $this->db->select('*')->table($this->_table)->where('id', '=', $id)->first();
        return $data;
    }

    public function updateUsers($data, $id)
    {
        $data = $this->db->table($this->_table)->where('id', '=', $id)->update($data);
        return $data;
    }

    public function addUsers($data)
    {
        $data = $this->db->table($this->_table)->insert($data);
        return $data;
    }
    public function deleteUsers($id)
    {
        $this->db->table($this->_table)->where('id', '=', $id)->delete();
    }
    public function checkUsers($email, $password)
    {
        $data = $this->db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'")->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function CountUsers()
    {
        $data = $this->db->query("SELECT COUNT(id) as total_customers FROM users;")->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function register($data) {
        $result = $this->db->table($this->tableName)->insert($data);
        return $result;
    }
    public function checkPassword($id)
    {
        $data = $this->db->query("SELECT * FROM users WHERE id = '$id' ")->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function checkMail($email)
    {
        $data = $this->db->query("SELECT COUNT(*) FROM users WHERE email = '$email' ")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function mailExisted($email) : bool{
        $result = $this->db->select('email')->table('users')->where('email', '=', $email)->first();
        return ($result > 1) ? true : false;
    }

    public function updatePassword($email, $password) {
        $result = $this->db->query("update users set password = '$password' where email='$email'");
        return $result;
    }
}
