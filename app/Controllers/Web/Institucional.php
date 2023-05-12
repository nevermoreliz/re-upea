<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class Institucional extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/institucional/index');
    }
}
