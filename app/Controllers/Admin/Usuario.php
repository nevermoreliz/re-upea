<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Usuario extends BaseController
{
    


    public function index()
    {
        $titleHeadPage = $data['titleHeadContent'] = 'Lista Usuario';

        /**======================
         *      mostrar lista de usuarios 
         *      sean activos o inhabilitado
         *========================**/



        /**=======================
         *     COMMENT BLOCK
         *  enviando el contenido en json
         *  con el resultado de lista
         *========================**/
        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/usuarios/index', $data);
        }

        $html = $this->templater->viewAdmin('admin/usuarios/index', $data);
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => $titleHeadPage
        ]);
        /*==== END OF SECTION ====*/
    }


    /*******************
     * LISTAR USUARIOS *
     *******************/
    public function usuarioLista()
    {

        $data = json_decode('
         {
            "draw": 1,
            "recordsTotal": 57,
            "recordsFiltered": 57,
            "data": [
              [
                "Airi",
                "Satou",
                "Accountant",
                "Tokyo",
                "28th Nov 08",
              ],
              [
                "Angelica",
                "Ramos",
                "Chief Executive Officer (CEO)",
                "London",
                "9th Oct 09",
              ]              
            ]
          }
         ');
    }
}
