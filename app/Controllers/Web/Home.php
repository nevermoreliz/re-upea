<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\PublicacionModel;

class Home extends BaseController
{

    public function __construct()
    {

    }

    public function index()
    {

        $modelPublicaciones = new PublicacionModel();

        $data = [
            'publicaciones' => $modelPublicaciones->getPublicacion('Publicaciones'),
            'noticia' => $modelPublicaciones->where('tipo_publicaciones', 'Noticias')->orderBy('id_publicaciones', 'desc')->first(),
        ];

        return $this->templater->viewWeb('web/principal/home', $data);
        // return view('web/layout/index');

        // return view('welcome_message');
    }
}
