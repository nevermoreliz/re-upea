<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ConvenioModel;

class Dashboard extends BaseController
{

    /**======================
     *  redirecciona o recarga contenido
     *  panel principal
     *  si es por ajax o es recarga
     *========================**/
    public function index()

    {
        $titleHeadPage = $data['titleHeadContent'] = 'Panel Principal';
        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/dashboard/index', $data);
        }

        $html = $this->templater->viewAdmin('admin/dashboard/index', $data);
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => $titleHeadPage
        ]);
    }
}
