<?php

namespace App\Controllers\Web;
use App\Controllers\BaseController;

class Home extends BaseController
{

    public function __construct() {
        
    }
    
    public function index()
    {
        
        return $this->templater->viewWeb('web/principal/home');
        // return view('web/layout/index');

        // return view('welcome_message');
    }
}
