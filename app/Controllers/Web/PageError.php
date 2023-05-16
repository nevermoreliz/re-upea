<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class PageError extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/errores/pageContruct');
    }
}
