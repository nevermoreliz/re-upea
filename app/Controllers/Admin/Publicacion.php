<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Publicacion extends BaseController
{

    /**======================
     *  redirecciona o recarga contenido
     *  Publicaciones
     *  si es por ajax o es recarga
     *========================**/

    public function index()
    {

        $titleHeadPage = $data['titleHeadContent'] = 'Publicaciones';

        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/publicaciones/index', $data);
        }

        $html = view('admin/publicaciones/index', $data);
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => $titleHeadPage
        ]);
    }
}
