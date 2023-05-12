<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class Convenio extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/convenios/index');
    }
}
