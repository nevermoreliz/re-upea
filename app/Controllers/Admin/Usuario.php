<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\TableLib;
use App\Models\UserModel;

class Usuario extends BaseController
{


    public function index()
    {
        $titleHeadPage = $data['titleHeadContent'] = 'Lista Usuario';

        /* mostrar lista de usuarios sean activos o inhabilitado */


        /* enviando el contenido en json con el resultado de lista */

        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/usuarios/index', $data);
        }

        $html = $this->templater->viewAdmin('admin/usuarios/index', $data);
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => $titleHeadPage
        ]);

    }


    /*******************
     * LISTAR USUARIOS *
     *******************/
    public function usuarioLista()
    {
        /*****************************************************************
         * SACAMOS LA VARIABLE ORDER DEL DATATABLE QUE NOS ENVIA POR GET *
         *****************************************************************/
        $order = $this->request->getVar('order');

        /****************************************
         * ELIMINA EL PRIMER ELEMENTO DEL ARRAY *
         ****************************************/
        $order = array_shift($order);


        $model = new UserModel();

        /*************************************************
         * MAPEAR COLUMNAS PARA PARA MOSTRAR EN LA TABLA *
         *              DE LA BASE DE DATOS              *
         *************************************************/
        $column_map = [
            'id_usuario',
            'id_persona',
            'usuario',
            'password',
            'fecha_registro',
            'estado'
        ];

        $lib = new TableLib($model, 'gp1', $column_map);

        $response = $lib->getResponse([
            'draw' => $this->request->getVar('draw'),
            'length' => $this->request->getVar('length'),
            'start' => $this->request->getVar('start'),
            'order' => $order['column'],
            'direction' => $order['dir'],
            'search' => $this->request->getVar('search')['value']
        ]);

        return $this->response->setJSON($response);
        // return $this->respond($data);
    }


    public function formUser()
    {
        /**=======================
         *     COMMENT BLOCK
         *  enviando el contenido en json
         *  con el resultado de lista
         *========================**/
        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/usuarios/viewFormUser');
        }

        $html = $this->templater->viewAdmin('admin/usuarios/viewFormUser');
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Nuevo Usuario'
        ]);
        /*==== END OF SECTION ====*/
    }
}
