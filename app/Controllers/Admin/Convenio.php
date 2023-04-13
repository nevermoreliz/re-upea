<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Convenio extends BaseController
{
    public function indexNacional()
    {
         return $this->templater->viewAdmin('admin/convenios/index');
    }

    public function indexInternacional()
    {
         return $this->templater->viewAdmin('admin/convenios/index');
    }
}
