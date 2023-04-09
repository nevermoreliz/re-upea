<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use function PHPUnit\Framework\isFalse;

class Persona extends BaseController
{
    public function index()
    {
        //
    }

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

    public function store()
    {
        /* validacion de datos para guardar persona */
        if (!$this->validate([
            'nombre' => 'required|alpha_space|max_length[120]',
            'paterno' => 'alpha|max_length[120]',
            'materno' => 'alpha|max_length[120]',
            'ci' => 'required|is_unique[sic_persona.ci]',
            'telefono' => 'required|alpha_numeric|is_unique[sic_persona.telefono]',
            'email' => 'required|valid_email|is_unique[sic_persona.email]',
            'cargo' => 'required|alpha_space|max_length[200]'
        ])) {
            return redirect()
                ->back()
                ->withInput()
                ->with('msg', [
                    'type' => 'danger',
                    'body' => 'Tienes Campos Incorrectos'
                ]);
        }

        dd($this->request->getPost());
    }

}
