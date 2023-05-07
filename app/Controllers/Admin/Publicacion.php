<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\TableLibWhere;
use App\Models\PublicacionArchivoModel;
use App\Models\PublicacionModel;

class Publicacion extends BaseController
{

    protected $configs;

    public function __construct()
    {
        $this->configs = config('Dri');
    }

    /**======================
     *  redirecciona o recarga contenido
     *  Publicaciones
     *  si es por ajax o es recarga
     *========================**/

    public function index()
    {
        $titleHeadPage = $data['titleHeadContent'] = 'Publicaciones';

        if (!$this->request->isAJAX()) {
            return redirect()->route('/admin')->back();
        }

        $html = $this->templater->viewAdmin('admin/publicaciones/index', $data);
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => $titleHeadPage
        ]);
    }

    public function listCat()
    {
        $param = $this->request->getGet('param');
        $titleHeadPage = $data['titleHeadContent'] = 'Lista de ' . $param;

        if (!$this->request->isAJAX()) {
            return redirect()->route('/admin')->back();
        }
        $data['param'] = $param;

        $html = $this->templater->viewAdmin('admin/publicaciones/listaCategory', $data);
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'param' => $param,
            'title' => $titleHeadPage,
            'as' => $this->request->getPostGet()
        ]);
    }

    public function list()
    {
        $order = $this->request->getVar('order');
        $order = array_shift($order);

        $model = new PublicacionModel();

        $arrayWhere = [
            'tipo_publicaciones' => $this->request->getGet('param')
        ];

        $column_map = [
            'id_publicaciones',
            'titulo',
            'descripcion',
            'correlativo',
            'subtitulo',
            'url',
            'links',
            'tipo_publicaciones',
            'fecha',
            'estado'
        ];

        $lib = new TableLibWhere($model, 'gp1', $column_map, $arrayWhere);

        $response = $lib->getResponse([
            'draw' => $this->request->getVar('draw'),
            'length' => $this->request->getVar('length'),
            'start' => $this->request->getVar('start'),
            'order' => $order['column'],
            'direction' => $order['dir'],
            'search' => $this->request->getVar('search')['value']
        ]);

        return $this->response->setJSON($response);
    }


    public function create()
    {

//        $tipoEnlaceModel = new TipoEnlaceModel();
//        $paisesModel = new PaisModel();
//
//        $data = [
//            'tiposEnlace' => $tipoEnlaceModel->findAll(),
//            'paises' => $paisesModel->where('estado', 1)->findAll()
//        ];
        $param = $this->request->getGet('param');
        $titleHeadPage = $data['titleHeadContent'] = 'Crear nuevas ' . $param;

        if (!$this->request->isAJAX()) {
            return redirect()->route('/admin')->back();
        }

        $html = $this->templater->viewAdmin('admin/publicaciones/viewFormPublicacion', $data);
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => $titleHeadPage
        ]);
    }

    public function store()
    {

        $tieneFilePub = false;

        /* ejemplo de multples archivos validacion */
        // uploaded[miArchivo,required]|max_size[miArchivo,10240,permit_multiple]|ext_in[miArchivo,png,jpg,jpeg]',
        $reglas = [
//            'titulo' => 'required|min_length[1]|max_length[250]',
//            'descripcion' => 'required',
//            'correlativo' => 'min_length[1]|max_length[50]',
//            'subtitulo' => 'min_length[1]|max_length[350]',
//            'url' => 'uploaded[url]|max_size[url,' . $this->configs->tamañoServidor . ']|mime_in[url,image/jpg,image/jpeg,image/png]',
//            'links' => 'min_length[1]|max_length[250]',
//            'tipo_publicaciones' => 'required|in_list[Publicaciones,Noticias,Idiomas,Becas,Pasantias]',
//            'estado' => 'required|in_list[0,1]',
//            'estado_archivo' => 'required|in_list[0,1]',
        ];

        /* obteniendo archivos img y archivo del formulario */
        $imgPublicacion = $this->request->getFile('url');
//        $filePublicacion = $this->request->getFile('nombre_archivo');
        $filePublicacion = $this->request->getFiles()['nombre_archivo'];

        $array=[];
        foreach ($filePublicacion as $archivo) {
            // Obtener el nombre del archivo
            $array[] = $archivo->getName();

        }


        return $this->response->setJSON([
            'success' => true,
            'message' => 'Se registro los datos al sistema correctamente.11',
            'fileImg' => $imgPublicacion,
            'filesPubIsValid' => $filePublicacion[0]->isValid(),
            'filesPub' => $filePublicacion,
            'nameFilePub' => $array
        ]);

        if ($filePublicacion[0]->isValid()) {
            $reglas['nombre_archivo'] = 'uploaded[nombre_archivo]|max_size[nombre_archivo,' . $this->configs->tamañoServidor . ']|mime_in[nombre_archivo,application/pdf]';
            $tieneFilePub = true;
        }


        /* validacion de datos para guardar persona */
        if (!$this->validate($reglas)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'verifique que los datos sean validas.',
                'errors' => $this->validator->getErrors()
            ]);
        }


        if (!$imgPublicacion->isValid() && !$filePublicacion[0]->isValid()) {

            $datos = [
                'titulo' => trim($this->request->getPost('titulo')),
                'descripcion' => trim($this->request->getPost('descripcion')),
                'correlativo' => trim($this->request->getPost('correlativo')),
                'subtitulo' => trim($this->request->getPost('subtitulo')),
//                'url'=>'assets/img_publicaciones/',
                'links' => trim($this->request->getPost('links')),
                'tipo_publicaciones' => trim($this->request->getPost('tipo_publicaciones')),
                'fecha' => trim(date('Y-m-d')),
                'estado' => trim($this->request->getPost('estado')),
//                'nombre_archivo'=>'assets/img_publicaciones/',
                'estado_archivo' => trim(1)
            ];

        } else {

            /* obteniendo nombres random para los archivos */
            $nameFileImgPublicacion = $imgPublicacion->getRandomName();
            $nameFilePublicacion = $filePublicacion->getRandomName();

            $datos = [
                'titulo' => trim($this->request->getPost('titulo')),
                'descripcion' => trim($this->request->getPost('descripcion')),
                'correlativo' => trim($this->request->getPost('correlativo')),
                'subtitulo' => trim($this->request->getPost('subtitulo')),
                'url' => 'assets/img_publicaciones/' . $nameFileImgPublicacion,
                'links' => trim($this->request->getPost('links')),
                'tipo_publicaciones' => trim($this->request->getPost('tipo_publicaciones')),
                'fecha' => trim(date('Y-m-d')),
                'estado' => trim($this->request->getPost('estado')),
//                'nombre_archivo'=>'assets/img_publicaciones/'.$nameFilePublicacion,
                'estado_archivo' => trim(1)
            ];

            /* directorio publicaciones*/
            $directorio = $this->configs->pathPublicacionImg;
            $dirFilePub = $this->configs->pathPublicacionArchivo;

            /* mover la imagen al directorio */
            cargarArchivo($imgPublicacion, $directorio, $nameFileImgPublicacion);

            /* Archivo de la publicacion */
            if ($tieneFilePub) {
                $datos['nombre_archivo'] = 'assets/img_publicaciones/archivos/' . $nameFilePublicacion;

                /* mover la imagen y pdf a sus directorio */
                cargarArchivo($filePublicacion, $dirFilePub, $nameFilePublicacion);
            }

        }

        $modelPublicacion = new PublicacionModel();
        try {

            $idPublicacion = $modelPublicacion->insert($datos);

        } catch (\ReflectionException $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'no se inserto al modelo publicacion con los datos de $datos',
                'error' => $e
            ]);
        }


        /* si hay un archivo para la publicacion insertar en la tabla */
        if ($tieneFilePub) {
            /* agregar el id_enlace que genero al insertar la tabla enlace */
            $datos['id_publicaciones'] = $idPublicacion;

            $modelPubArchivo = new PublicacionArchivoModel();

            try {

                $midPubArchivo = $modelPubArchivo->insert($datos);

            } catch (\ReflectionException $e) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'no se inserto a la en tabala publicacion de "publicacion".',
                    'error' => $e
                ]);
            }
        }


        return $this->response->setJSON([
            'success' => true,
            'message' => 'Se registro los datos al sistema correctamente.',
        ]);
    }

    public function edit()
    {
        $id = $this->request->getGet('param');
        $param = $this->request->getGet('param2');


        $model = new PublicacionModel();
        $modelPublicacionArchivo = new PublicacionArchivoModel();

        $data = [
            'publicacion' => $model->where('tipo_publicaciones', $param)->find($id),
            'archivosPublicacion' => $modelPublicacionArchivo->where('id_publicaciones', $id)->findAll()
        ];

        if (!$this->request->isAJAX()) {
            return redirect()->route('/admin')->back();
        }

        $html = $this->templater->viewAdmin('admin/publicaciones/viewFormPublicacion', $data);

        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Modificar ConvenioNacional',
            'data' => $data
        ]);

    }
}
