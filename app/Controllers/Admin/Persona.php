<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Persona extends BaseController
{
    public function index()
    {
        //
    }

    /* formulario de persona*/
    public function formPerson()
    {
        /**=======================
         *     COMMENT BLOCK
         *  enviando el contenido en json
         *  con el resultado de lista
         *========================**/
        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/personas/viewFormPerson');
        }

        $html = $this->templater->viewAdmin('admin/personas/viewFormPerson');
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Registrar Persona'
        ]);
        /*==== END OF SECTION ====*/
    }
}
