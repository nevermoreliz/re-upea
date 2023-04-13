<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PersonaModel;

class Persona extends BaseController
{

    protected $configs;

    public function __construct()
    {
        $this->configs = config('Dri');
    }

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
        /* reglas */
        $reglas = [
            'nombre' => 'required|alpha_space|max_length[120]',
            'paterno' => 'alpha|max_length[120]',
            'materno' => 'alpha|max_length[120]',
            'ci' => 'required|is_unique[sic_persona.ci]|min_length[5]|max_length[20]|alpha_numeric',
            'telefono' => 'required|is_natural|is_unique[sic_persona.telefono]|min_length[8]|max_length[20]',
            'email' => 'required|valid_email|is_unique[sic_persona.email]',
            'cargo' => 'required|alpha_space|max_length[200]',
            'img' => 'max_size[img,1024]|mime_in[img,image/jpg,image/jpeg,image/png]'
        ];

        /* validacion de datos para guardar persona */
        if (!$this->validate($reglas)) {

            return $this->response->setJSON([
                'success' => false,
                'message' => 'verifique que los datos de la persona sean validas.',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $imgProfile = $this->request->getFile('img');

        if (!$imgProfile->isValid()) {
            $datos = [
                'nombre' => trim($this->request->getPost('nombre')),
                'paterno' => trim($this->request->getPost('paterno')),
                'materno' => trim($this->request->getPost('materno')),
                'ci' => trim($this->request->getPost('ci')),
                'telefono' => trim($this->request->getPost('telefono')),
                'email' => trim($this->request->getPost('email')),
                'cargo' => trim($this->request->getPost('cargo'))
            ];
        } else {
            $nameFile = $imgProfile->getRandomName();
            $datos = [
                'nombre' => trim($this->request->getPost('nombre')),
                'paterno' => trim($this->request->getPost('paterno')),
                'materno' => trim($this->request->getPost('materno')),
                'ci' => trim($this->request->getPost('ci')),
                'telefono' => trim($this->request->getPost('telefono')),
                'email' => trim($this->request->getPost('email')),
                'cargo' => trim($this->request->getPost('cargo')),
                'img' => 'assets/imgUsers/' . $nameFile,
            ];

            if (!is_dir($this->configs->pathPersonImg)) {
                // Si la carpeta no existe, crea la carpeta con los permisos 0777
                mkdir($this->configs->pathPersonImg, 0777, true);
            }

            /* mover la imagen al directorio */
            $imgProfile->move($this->configs->pathPersonImg, $nameFile);

        }


        $modelPersona = new PersonaModel();
        $modelPersona->insert($datos);


        return $this->response->setJSON([
            'success' => true,
            'message' => 'Se registro los datos de la persona al sistema correctamente.'
        ]);
    }
}
