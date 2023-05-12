<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class PrensaNoticia extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/prensa/noticia/index');
    }
}
