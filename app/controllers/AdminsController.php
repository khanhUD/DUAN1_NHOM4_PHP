<?php

class AdminsController extends Controller
{

    public $data = [];

    public function __construct()
    {
       
    }

    public function login()
    {      
        $this->render('login/sing_in');
    }
    public function register()
    {      
        $this->render('login/sing_up');
    }
    
    public function forgot_password()
    {      
        $this->render('login/forgot_password');
    }
    public function change_password()
    {      
        $this->render('login/change_password');
    }
    
}
