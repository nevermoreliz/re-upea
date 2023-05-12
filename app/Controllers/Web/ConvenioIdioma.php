<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class ConvenioIdioma extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/convenios/idioma/index');
    }
}
