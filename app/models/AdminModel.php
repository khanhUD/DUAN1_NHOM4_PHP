<?php

class AdminModel extends Model {
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

  
}