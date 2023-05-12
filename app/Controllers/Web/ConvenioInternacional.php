<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class ConvenioInternacional extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/convenios/internacional/index');
    }
}
