<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class PrensaPublicacion extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/prensa/publicacion/index');
    }
}
