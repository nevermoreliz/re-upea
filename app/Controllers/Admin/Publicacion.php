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
            'titulo' => 'required|min_length[1]|max_length[250]',
            'descripcion' => 'required',
            'correlativo' => 'max_length[50]',
            'subtitulo' => 'min_length[1]|max_length[350]',
            'url' => 'uploaded[url]|max_size[url,' . $this->configs->tamañoServidor . ']|mime_in[url,image/jpg,image/jpeg,image/png]',
            'links' => 'max_length[250]',
            'tipo_publicaciones' => 'required|in_list[Publicaciones,Noticias,Idiomas,Becas,Pasantias]',
            'estado' => 'required|in_list[0,1]',
//            'estado_archivo' => 'required|in_list[0,1]',
        ];

        /* obteniendo archivos img y archivo del formulario */
        $imgPublicacion = $this->request->getFile('url');
        //$filePublicacion = $this->request->getFile('nombre_archivo');
        $filePublicacion = $this->request->getFiles()['nombre_archivo'];


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


            /* mover la imagen al directorio */
            cargarArchivo($imgPublicacion, $directorio, $nameFileImgPublicacion);

        }


        try {
            /* inicializar modelo de publicaciones */
            $modelPublicacion = new PublicacionModel();

            /* insertar datos en la tabla de publicaciones */
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

            /* inicializar modelo publicacion archivo */
            $modelPubArchivo = new PublicacionArchivoModel();

            try {
                /* extenciones permitidas */
                $allowedExtensions = ['pdf', 'docx'];

                $dirFilePub = $this->configs->pathPublicacionArchivo;


                /* recorrer archivos*/
                foreach ($filePublicacion as $archivo) {


                    if (!$archivo->isValid()) {

                        return $this->response->setStatusCode(400)->setJSON([
                            'success' => false,
                            'message' => 'no se inserto a la en tabala publicacion de "publicacion".',
                            'error' => 'Archivo inválido'
                        ]);
                    }

                    $ext = $archivo->getClientExtension();
                    if (!in_array($ext, $allowedExtensions)) {
                        return $this->response->setStatusCode(400)->setJSON([
                            'success' => false,
                            'message' => 'no se inserto a la en tabala publicacion de "publicacion".',
                            'error' => 'Extensión no permitida'
                        ]);
                    }

                    /* obtener nombre aleatorio para archivos de publicacion */
                    $nameFilePublicacion = $archivo->getRandomName();

                    /* Archivo de la publicacion */
                    $datos['nombre_archivo'] = 'assets/img_publicaciones/archivos/' . $nameFilePublicacion;

                    /* mover la imagen y pdf a sus directorio */
                    cargarArchivo($archivo, $dirFilePub, $nameFilePublicacion);

                    /* insertar a la tabla de "publicaciones_archivo" */
                    $midPubArchivo = $modelPubArchivo->insert($datos);

                }

                $arrayMensajeArchivos = [
                    'success' => false,
                    'message' => 'Archivos subidos con éxito".',
                ];


            } catch (\ReflectionException $e) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'no se inserto a la en tabla publicacion de "publicacion".',
                    'error' => $e
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Se registro los datos al sistema correctamente.',
            'messagePorgressBar' => $tieneFilePub ? $arrayMensajeArchivos : null
        ]);

    }

    public function edit()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->route('/admin')->back();
        }

        $id = $this->request->getGet('param');
        $param = $this->request->getGet('param2');
        $titleHeadPage = 'Modificar ' . $param;

        $model = new PublicacionModel();
        $modelPublicacionArchivo = new PublicacionArchivoModel();

        $data = [
            'titleHeadContent' => 'Modificar ' . $param,
            'publicacion' => $model->where('tipo_publicaciones', $param)->find($id),
            'archivosPublicacion' => $modelPublicacionArchivo->where('id_publicaciones', $id)->findAll()
        ];

        $html = $this->templater->viewAdmin('admin/publicaciones/viewFormPublicacion', $data);

        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => $titleHeadPage,
            'data' => $data
        ]);

    }

    public function update()
    {

        $tieneFilePub = false;
        $tieneImgPub = false;


        /* inicialicar el modelo */
        $model = new PublicacionModel();
        $hiddenId = $this->request->getPost('id_publicaciones');
        $id_publicaciones = base64_decode($hiddenId);
        $registroPublicacion = $model->find($id_publicaciones);

        $modelPublicacionArchivo = new PublicacionArchivoModel();
        $registroPublicacionArchivo = $modelPublicacionArchivo->where('id_publicaciones', $id_publicaciones)->findAll();


        $reglas = [
            'titulo' => 'required|min_length[1]|max_length[250]',
            'descripcion' => 'required',
            'correlativo' => 'max_length[50]',
            'subtitulo' => 'min_length[1]|max_length[350]',
//            'url' => 'uploaded[url]|max_size[url,' . $this->configs->tamañoServidor . ']|mime_in[url,image/jpg,image/jpeg,image/png]',
            'links' => 'max_length[250]',
            'tipo_publicaciones' => 'required|in_list[Publicaciones,Noticias,Idiomas,Becas,Pasantias]',
            'estado' => 'required|in_list[0,1]',
//            'estado_archivo' => 'required|in_list[0,1]',
        ];


        /* obteniendo archivos img y archivo del formulario */
        $imgPublicacion = $this->request->getFile('url');
        if ($registroPublicacion->url == null || $registroPublicacion->url == '') {
            $reglas['url'] = 'uploaded[url]|max_size[url,' . $this->configs->tamañoServidor . ']|mime_in[url,image/jpg,image/jpeg,image/png]';
            $tieneImgPub = true;
        } elseif ($imgPublicacion->isValid()) {
            $reglas['url'] = 'uploaded[url]|max_size[url,' . $this->configs->tamañoServidor . ']|mime_in[url,image/jpg,image/jpeg,image/png]';
            $tieneImgPub = true;
        }


        $filePublicacion = $this->request->getFiles()['nombre_archivo'];

        if ($filePublicacion[0]->isValid()) {
            $reglas['nombre_archivo'] = 'uploaded[nombre_archivo]|max_size[nombre_archivo,' . $this->configs->tamañoServidor . ']|mime_in[nombre_archivo,application/pdf]';
            $tieneFilePub = true;
        }

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

            /* actualizar la tabla */
            try {

                $model->update($id_publicaciones, $datos);
            } catch (\ReflectionException $e) {

                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'no se actualizo tabla publicacion sin imagenes.',
                    'error' => $e
                ]);

            }

        } else {


//            $nameFilePdfConvenio = $pdfConvenio->getRandomName();

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

            if ($tieneImgPub) {
                /* obteniendo nombres random para los archivos */
                $nameFileImgConvenio = $imgPublicacion->getRandomName();
                /* Img de la publicacion */
                $datos['url'] = 'assets/img_publicaciones/' . $nameFileImgConvenio;

                /* directorio */
                $directorio = $this->configs->pathPublicacionImg;
//                $directorioPdfConvenio = $this->configs->pathConvenioPdf;

                if ($registroPublicacion->url == null || $registroPublicacion->url == '') {
                    /* mover la imagen al directorio */
                    cargarArchivo($imgPublicacion, $directorio, $nameFileImgConvenio);
                } else {
                    cargarArchivo($imgPublicacion, $directorio, $nameFileImgConvenio);
                    borrarArchivo($registroPublicacion->url);
                }

                /* insertar img publicacion*/
                try {
                    $model->update($id_publicaciones, $datos);
                } catch (\ReflectionException $e) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'no se actualizo en publicaciones',
                        'error' => $e
                    ]);
                }
            }

        }

        /* actualizar a la tabla publicaciones */

        /* si hay un archivo para la publicacion insertar en la tabla publicacion archivos */
        if ($tieneFilePub) {

            try {
                /* extenciones permitidas */
                $allowedExtensions = ['pdf', 'docx'];

                $dirFilePub = $this->configs->pathPublicacionArchivo;

//                $datos['id_publicaciones'] = $registroPublicacionArchivo->id_publicaciones_archivo;
                $datos['id_publicaciones'] = $id_publicaciones;
                /* recorrer archivos*/
                foreach ($filePublicacion as $archivo) {


                    if (!$archivo->isValid()) {

                        return $this->response->setStatusCode(400)->setJSON([
                            'success' => false,
                            'message' => 'no se inserto a la en tabala publicacion de "publicacion".',
                            'error' => 'Archivo inválido'
                        ]);
                    }

                    $ext = $archivo->getClientExtension();
                    if (!in_array($ext, $allowedExtensions)) {
                        return $this->response->setStatusCode(400)->setJSON([
                            'success' => false,
                            'message' => 'no se inserto a la en tabala publicacion de "publicacion".',
                            'error' => 'Extensión no permitida'
                        ]);
                    }

                    /* obtener nombre aleatorio para archivos de publicacion */
                    $nameFilePublicacion = $archivo->getRandomName();

                    /* Archivo de la publicacion */
                    $datos['nombre_archivo'] = 'assets/img_publicaciones/archivos/' . $nameFilePublicacion;

                    /* mover la imagen y pdf a sus directorio */
                    cargarArchivo($archivo, $dirFilePub, $nameFilePublicacion);

                    /* insertar datos a la tabla publicaciones_archivo */
                    $modelPublicacionArchivo->insert($datos);

                }

                $arrayMensajeArchivos = [
                    'success' => false,
                    'message' => 'Archivos subidos con éxito".',
                ];

            } catch (\ReflectionException $e) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'no se inserto a la en tabla publicacion de "publicacion".',
                    'error' => $e
                ]);
            }

        }


        return $this->response->setJSON([
            'success' => true,
            'message' => 'Se actualizo los datos al sistema correctamente.',
            'messagePorgressBar' => $tieneFilePub ? $arrayMensajeArchivos : null
//            'a' => $datos
        ]);

    }

    public function delete()
    {
        try {
            // Código que puede generar una excepción
            $id = $this->request->getPost('param');

            $model = new PublicacionModel();
            $registro = $model->find($id);


            if ($registro->estado == 1) {
                $model->update($id, ['estado' => 0]);
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Se Deshabilito el registro correctamente.'
                ]);
            } elseif ($registro->estado == 0) {
                $model->update($id, ['estado' => 1]);
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Se Habilito el registro correctamente.'
                ]);
            }
        } catch (\Exception $e) {
            // Manejar la excepción
            // echo "Se produjo una excepción: " . $e->getMessage();
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /* CRUD PARA LA TABLA DE ARCHIVOS DE PUBLICACION */
    public function listPublicacionArchivos()
    {
        $order = $this->request->getVar('order');
        $order = array_shift($order);

        $model = new PublicacionArchivoModel();
//
        $arrayWhere = [
            'id_publicaciones' => base64_decode($this->request->getGet('param')),
            'estado_archivo' => 1
        ];

        $column_map = [
            'id_publicaciones_archivo',
            'id_publicaciones',
            'nombre_archivo',
            'estado_archivo',
            'fecha',
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

    public function listPublicacionEdit()
    {
        $id = $this->request->getGet('param');

        $model = new PublicacionArchivoModel();
        $registro = $model->find($id);

        $data = [
            'publicacionArchivo' => $registro,
        ];

        if (!$this->request->isAJAX()) {
            return redirect()->route('/admin')->back();
        }

        $html = $this->templater->viewAdmin('admin/publicaciones/viewFormFilePublicacion', $data);

        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Modificar Archivo Publicación',
            'data' => $registro
        ]);

    }

    public function listPubArchivoUpdate()
    {
        /* inicialicar el modelo */
        $model = new PublicacionArchivoModel();
        $hiddenId = $this->request->getPost('id_publicaciones_archivo');
        $id_publicaciones_archivo = base64_decode($hiddenId);
        $registroArchivoPublicacion = $model->find($id_publicaciones_archivo);

        /* obteniendo archivos img y archivo del formulario */
        $filePublicacion = $this->request->getFile('nombre_archivo_publicacion');

        if (!$filePublicacion->isValid()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'No Actualizo El Archivo por que no se selecciono ningun archivo.',
            ]);
        } else {

            $reglas = [
                'nombre_archivo_publicacion' => 'uploaded[nombre_archivo_publicacion]|max_size[nombre_archivo_publicacion,' . $this->configs->tamañoServidor . ']|mime_in[nombre_archivo_publicacion,application/pdf]'
            ];

            if (!$this->validate($reglas)) {

                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'verifique que los datos sean validas.',
                    'errors' => $this->validator->getErrors()
                ]);
            }

            /* obtener nombre aleatorio para archivos de publicacion */
            $nameFilePublicacion = $filePublicacion->getRandomName();
            $dirFilePub = $this->configs->pathPublicacionArchivo;
            $datos = [
                'nombre_archivo' => 'assets/img_publicaciones/archivos/' . $nameFilePublicacion,
                'fecha' => trim(date('Y-m-d')),
            ];

            if ($registroArchivoPublicacion->nombre_archivo == null || $registroArchivoPublicacion->nombre_archivo == '') {
                /* mover la imagen al directorio */
                cargarArchivo($filePublicacion, $dirFilePub, $nameFilePublicacion);
            } else {
                cargarArchivo($filePublicacion, $dirFilePub, $nameFilePublicacion);
                borrarArchivo($registroArchivoPublicacion->nombre_archivo);
            }

            /* insertar img publicacion*/
            try {
                $model->update($id_publicaciones_archivo, $datos);
            } catch (\ReflectionException $e) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'no se actualizo en publicaciones',
                    'error' => $e
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Se actualizo los datos al sistema correctamente.',
            ]);

        }

    }

    public function listPubArchivoDelete()
    {
        try {
            // Código que puede generar una excepción
            $id = $this->request->getPost('param');

            $model = new PublicacionArchivoModel();
            $registro = $model->find($id);

            $datos = [
                'nombre_archivo' => 'eliminado',
                'estado_archivo' => 0,
                'fecha' => trim(date('Y-m-d'))
            ];

            /* borar del servidor el archivo*/
            borrarArchivo($registro->nombre_archivo);

            /* actualizar estado a eliminado*/
            $model->update($id, $datos);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Se Elimino El Archivo Del Servidor.'
            ]);


        } catch (\Exception $e) {
            // Manejar la excepción
            // echo "Se produjo una excepción: " . $e->getMessage();
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
}
