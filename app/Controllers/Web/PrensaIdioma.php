<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class PrensaIdioma extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/prensa/idioma/index');
    }
}
