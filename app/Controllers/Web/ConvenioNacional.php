<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class ConvenioNacional extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/convenios/nacional/index');
    }

    public function show()
    {
        return $this->templater->viewWeb('web/convenios/nacional/showSingle');
    }
}
