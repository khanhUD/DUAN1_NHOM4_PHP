<?php

class AdminModel extends Model {
    public $tableName = 'users';

    public function primaryKey()
    {
        return '';
    }

    public function fieldFill()
    {
        return '';
    }

    public function tableFill()
    {
        return '';
    }

    public function register($data) {
        $result = $this->db->table($this->tableName)->insert($data);
        return $result;
    }
}