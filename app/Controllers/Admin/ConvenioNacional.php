<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\TableLib;
use App\Libraries\TableLibNormal;
use App\Models\ConvenioModel;
use App\Models\EnlaceConvenioModel;
use App\Models\EnlaceModel;
use App\Models\TipoConvenioModel;
use CodeIgniter\HTTP\ResponseInterface;

class ConvenioNacional extends BaseController
{
    public function __construct()
    {
        $this->configs = config('Dri');
    }

    public function index()
    {
        $titleHeadPage = $data['titleHeadContent'] = 'Convenios - Nacionales';

        if (!$this->request->isAJAX()) {
            return redirect()->route('/admin')->back();
        }

        $html = $this->templater->viewAdmin('admin/convenios/nacional/index', $data);

        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => $titleHeadPage
        ]);
    }

    public function list()
    {
        $order = $this->request->getVar('order');
        $order = array_shift($order);


        $column_map = [
            'id_convenios',
            'id_detalle_grupo',
            'id_tipo_convenio',
            'nombre_convenio',
            'objetivo_convenio',
            'img_convenio',
            'pdf_convenio',
            'fecha_firma',
            'fecha_finalizacion',
            'tiempo_duracion',
            'fecha_publicacion',
            'direccion_convenio',
            'entidad',
            'telefono_convenio',
            'email',
            'estado_convenio',
            'id_enlace',
            'orden',
            'url_enlace',
            'links_enlace',
            'nombre_enlace',
            'tipo_enlace',
            'telefono',
            'fax',
            'fecha',
            'id_dato_enlace',
            'direccion',
            'correo',
            'inicio_convenio_enlace',
            'fin_convenio_enlace',
            'id_pais',
            'pais',
            'capital',
            'continente',
            'codigo_pais',
            'iso',
            'estado'
        ];


        $lib = new TableLibNormal('re_vista_convenio_nacional', $column_map);

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

        $modelTipoConvenio = new TipoConvenioModel();
        $modelEnlace = new EnlaceModel();

        $data = [
            'tiposConvenio' => $modelTipoConvenio->findAll(),
            'enlaces' => $modelEnlace->getFindAllVistaEnlace()
        ];

        if (!$this->request->isAJAX()) {
            return redirect()->route('/admin')->back();
        }

        $html = $this->templater->viewAdmin('admin/convenios/nacional/viewFormConvenioNacional', $data);
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Nuevo Convenio Nacional'
        ]);
    }

    /* controlador de funcion para select 2 para llamar pocos
        registros de instituciones */
    public function ajaxSearch()
    {
        $db = \Config\Database::connect();
        $searchTerm = $this->request->getVar('search');
        $page = $this->request->getVar('page');
        $perPage = 50; // Cantidad de resultados por página
        $offset = ($page - 1) * $perPage;

        $data = []; // Inicializamos la variable de datos

        // Query para obtener los datos paginados y filtrados
        $query = $db->table('re_vista_enlace')
            ->orlike('nombre_enlace', $searchTerm)
            ->orlike('id_enlace', $searchTerm)
            ->limit($perPage, $offset)
            ->get();

        // Obtenemos la cantidad total de resultados para la paginación
        $total = $db->table('re_vista_enlace')
            ->orlike('nombre_enlace', $searchTerm)
            ->orlike('id_enlace', $searchTerm)
            ->countAllResults();

        // Iteramos sobre los resultados para armar el array de datos
        foreach ($query->getResultArray() as $row) {
            $data[] = ['id' => $row['id_enlace'], 'text' => '[Codigo: ' . $row['id_enlace'] . ' ] - ' . $row['nombre_enlace'] . ' - ' . $row['departamento'] . ' - ' . $row['ciudad'] . ' - ' . $row['direccion']];
        }

        // Devolvemos los resultados en formato JSON
        return $this->response->setJSON(
            [
                'a' => $offset,
                'b' => $page,
                'c' => $total,
                'results' => $data,
                'pagination' => ['more' => ($offset + $perPage) < $total]
            ]);
    }

    public function store()
    {
        $reglas = [
            'id_enlace' => 'required|is_not_unique[enlace.id_enlace]',
            'id_tipo_convenio' => 'required|is_not_unique[sic_tipo_convenio.id_tipo_convenio]',
            'nombre_convenio' => 'required|regex_match[/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ\- \s]+$/]',
            'objetivo_convenio' => 'required',
            'img_convenio' => 'uploaded[img_convenio]|max_size[img_convenio,' . $this->configs->tamañoServidor . ']|mime_in[img_convenio,image/jpg,image/jpeg,image/png]',
            'pdf_convenio' => 'uploaded[pdf_convenio]|max_size[pdf_convenio,' . $this->configs->tamañoServidor . ']|mime_in[pdf_convenio,application/pdf]',
            'fecha_firma' => 'required|valid_date[Y-m-d]',
            'fecha_finalizacion' => 'required|valid_date[Y-m-d]',
            'estado' => 'required|in_list[Inactivo,Activo,Concluido]'
        ];

//        /* validacion de datos para guardar persona */
        if (!$this->validate($reglas)) {

            return $this->response->setJSON([
                'success' => false,
                'message' => 'verifique que los datos sean validas.',
                'errors' => $this->validator->getErrors()
            ]);
        }

        /* obteniendo archivos img y pdf del formulario */
        $imgConvenio = $this->request->getFile('img_convenio');
        $pdfConvenio = $this->request->getFile('pdf_convenio');

        if (!$imgConvenio->isValid() && !$pdfConvenio->isValid()) {
            $datos = [
                'id_enlace' => trim($this->request->getPost('id_enlace')),
                'id_tipo_convenio' => trim($this->request->getPost('id_tipo_convenio')),
                'nombre_convenio' => trim($this->request->getPost('nombre_convenio')),
                'objetivo_convenio' => trim($this->request->getPost('objetivo_convenio')),
                'img_convenio' => trim($this->request->getPost('img_convenio')),
                'pdf_convenio' => trim($this->request->getPost('pdf_convenio')),
                'fecha_firma' => trim($this->request->getPost('fecha_firma')),
                'fecha_finalizacion' => trim($this->request->getPost('fecha_finalizacion')),
                'estado' => trim($this->request->getPost('estado'))
            ];

        } else {
            /* obteniendo nombres random para los archivos */
            $nameFileImgConvenio = $imgConvenio->getRandomName();
            $nameFilePdfConvenio = $pdfConvenio->getRandomName();

            $datos = [
                'id_enlace' => trim($this->request->getPost('id_enlace')),
                'id_tipo_convenio' => trim($this->request->getPost('id_tipo_convenio')),
                'nombre_convenio' => trim($this->request->getPost('nombre_convenio')),
                'objetivo_convenio' => trim($this->request->getPost('objetivo_convenio')),
                'img_convenio' => 'assets/imgConvenios/' . $nameFileImgConvenio,
                'pdf_convenio' => 'assets/conveniosPdf/' . $nameFilePdfConvenio,
                'fecha_firma' => trim($this->request->getPost('fecha_firma')),
                'fecha_finalizacion' => trim($this->request->getPost('fecha_finalizacion')),
                'estado' => trim($this->request->getPost('estado'))
            ];

            /* directorio */
            $directorioImgConvenio = $this->configs->pathConvenioImg;
            $directorioPdfConvenio = $this->configs->pathConvenioPdf;

            if (!is_dir($directorioImgConvenio)) {
                mkdir($directorioImgConvenio, 0777, true);
            }

            if (!is_dir($directorioPdfConvenio)) {
                mkdir($directorioPdfConvenio, 0777, true);
            }

            /* mover la imagen y pdf a sus directorio */
            $imgConvenio->move($directorioImgConvenio, $nameFileImgConvenio);
            $pdfConvenio->move($directorioPdfConvenio, $nameFilePdfConvenio);

        }


        $modelConvenio = new ConvenioModel();

        try {

            $idConvenio = $modelConvenio->insert($datos);

        } catch (\ReflectionException $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'no se inserto al modelo convenio con los datos de $datos',
                'error' => $e
            ]);
        }

        $modelEnlaceConvenio = new EnlaceConvenioModel();

        /* agregar el id_enlace que genero al insertar la tabla enlace */
        $datos['id_convenios'] = $idConvenio;

        try {

            $modelEnlaceConvenio->insert($datos);

        } catch (\ReflectionException $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'no se inserto en la tabla de enlace convenios.',
                'error' => $e
            ]);
        }

        /* respuesta para el ajax de tupo json */
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Se registro los datos al sistema correctamente.',
        ]);
    }

    public function edit()
    {
        $id = $this->request->getGet('param');


        $model = new ConvenioModel();
        $dataView = $model->getFindVistaConvenioNacional($id);


        $modelTipoConvenio = new TipoConvenioModel();
        $modelEnlace = new EnlaceModel();

        $data = [
            'tiposConvenio' => $modelTipoConvenio->findAll(),
            'enlaces' => $modelEnlace->getFindAllVistaEnlace()
        ];

        if (!$this->request->isAJAX()) {
            return redirect()->route('/admin')->back();
        }

        $html = $this->templater->viewAdmin('admin/convenios/nacional/viewFormConvenioNacional', $data);

        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Modificar ConvenioNacional',
            'data' => $dataView
        ]);

    }

    public function update()
    {
        /* inicialicar el modelo */
        $model = new ConvenioModel();
        $hiddenId = $this->request->getPost('id_convenios');
        $id_convenios = base64_decode($hiddenId);
        $registroConvenio = $model->find($id_convenios);


        $reglas = [
            'id_enlace' => 'required|is_not_unique[enlace.id_enlace]',
            'id_tipo_convenio' => 'required|is_not_unique[sic_tipo_convenio.id_tipo_convenio]',
            'nombre_convenio' => 'required|regex_match[/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ\- \s]+$/]',
            'objetivo_convenio' => 'required',
//            'img_convenio' => 'uploaded[img_convenio]|max_size[img_convenio,' . $this->configs->tamañoServidor . ']|mime_in[img_convenio,image/jpg,image/jpeg,image/png]',
//            'pdf_convenio' => 'uploaded[pdf_convenio]|max_size[pdf_convenio,' . $this->configs->tamañoServidor . ']|mime_in[pdf_convenio,application/pdf]',
            'fecha_firma' => 'required|valid_date[Y-m-d]',
            'fecha_finalizacion' => 'required|valid_date[Y-m-d]',
            'estado' => 'required|in_list[Inactivo,Activo,Concluido]'
        ];
        if ($registroConvenio->img_convenio == null || $registroConvenio->img_convenio == '') {
            $reglas['img_convenio'] = 'uploaded[img_convenio]|max_size[img_convenio,' . $this->configs->tamañoServidor . ']|mime_in[img_convenio,image/jpg,image/jpeg,image/png]';
        }

        if ($registroConvenio->pdf_convenio == null || $registroConvenio->pdf_convenio == '') {
            $reglas['pdf_convenio'] = 'uploaded[pdf_convenio]|max_size[pdf_convenio,' . $this->configs->tamañoServidor . ']|mime_in[pdf_convenio,application/pdf]';
        }


        if (!$this->validate($reglas)) {

            return $this->response->setJSON([
                'success' => false,
                'message' => 'verifique que los datos sean validas.',
                'errors' => $this->validator->getErrors()
            ]);
        }

        /* obteniendo archivos img y pdf del formulario */
        $imgConvenio = $this->request->getFile('img_convenio');
        $pdfConvenio = $this->request->getFile('pdf_convenio');

        if (!$imgConvenio->isValid() && !$pdfConvenio->isValid()) {
            $datos = [
                'id_enlace' => trim($this->request->getPost('id_enlace')),
                'id_tipo_convenio' => trim($this->request->getPost('id_tipo_convenio')),
                'nombre_convenio' => trim($this->request->getPost('nombre_convenio')),
                'objetivo_convenio' => trim($this->request->getPost('objetivo_convenio')),
                //                'img_convenio' => trim($this->request->getPost('img_convenio')),
                //                'pdf_convenio' => trim($this->request->getPost('pdf_convenio')),
                'fecha_firma' => trim($this->request->getPost('fecha_firma')),
                'fecha_finalizacion' => trim($this->request->getPost('fecha_finalizacion')),
                'estado' => trim($this->request->getPost('estado'))
            ];
        } else {

            /* obteniendo nombres random para los archivos */
            $nameFileImgConvenio = $imgConvenio->getRandomName();
            $nameFilePdfConvenio = $pdfConvenio->getRandomName();

            $datos = [
                'id_enlace' => trim($this->request->getPost('id_enlace')),
                'id_tipo_convenio' => trim($this->request->getPost('id_tipo_convenio')),
                'nombre_convenio' => trim($this->request->getPost('nombre_convenio')),
                'objetivo_convenio' => trim($this->request->getPost('objetivo_convenio')),
//                'img_convenio' => 'assets/imgConvenios/' . $nameFileImgConvenio,
//                'pdf_convenio' => 'assets/conveniosPdf/' . $nameFilePdfConvenio,
                'fecha_firma' => trim($this->request->getPost('fecha_firma')),
                'fecha_finalizacion' => trim($this->request->getPost('fecha_finalizacion')),
                'estado' => trim($this->request->getPost('estado'))
            ];

            /* directorio */
            $directorioImgConvenio = $this->configs->pathConvenioImg;
            $directorioPdfConvenio = $this->configs->pathConvenioPdf;

            if (!is_dir($directorioImgConvenio)) {
                mkdir($directorioImgConvenio, 0777, true);
            }

            if (!is_dir($directorioPdfConvenio)) {
                mkdir($directorioPdfConvenio, 0777, true);
            }

            /* Archivo Img */
            if ($imgConvenio->isValid()) {
                $datos['img_convenio'] = 'assets/imgConvenios/' . $nameFileImgConvenio;

                /* mover la imagen y pdf a sus directorio */
                if ($registroConvenio->img_convenio == null || $registroConvenio->img_convenio == '') {
                    cargarArchivo($imgConvenio, $directorioImgConvenio, $nameFileImgConvenio);
                } else {
                    cargarArchivo($imgConvenio, $directorioImgConvenio, $nameFileImgConvenio);
                    borrarArchivo($registroConvenio->img_convenio);
                }
            }

            /* Archivo Pdf */
            if ($pdfConvenio->isValid()) {
                $datos['pdf_convenio'] = 'assets/conveniosPdf/' . $nameFilePdfConvenio;

                /* mover la imagen y pdf a sus directorio */
                if ($registroConvenio->pdf_convenio == null || $registroConvenio->pdf_convenio == '') {
                    cargarArchivo($pdfConvenio, $directorioPdfConvenio, $nameFilePdfConvenio);
                } else {
                    borrarArchivo($registroConvenio->pdf_convenio);
                    cargarArchivo($pdfConvenio, $directorioPdfConvenio, $nameFilePdfConvenio);
                }
            }

        }

        try {

            $model->update($id_convenios, $datos);

        } catch (\ReflectionException $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'no se actualizo en convenio',
                'error' => $e
            ]);
        }

        /* instanciando un modelo dato_enlace */
        $modelEnlaceConvenio = new EnlaceConvenioModel();

        try {
            $registroEnlaceConvenio = $modelEnlaceConvenio->where('id_convenios', $id_convenios)->first();

            $modelEnlaceConvenio->update($registroEnlaceConvenio->id_enlace_convenio, $datos);

        } catch (\ReflectionException $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'no se inserto en la tabla de "enlace convenio"',
                'error' => $e
            ]);
        }


        return $this->response->setJSON([
            'success' => true,
            'message' => 'Se actualizo los datos al sistema correctamente.',
            'a' => $datos
        ]);

    }
}
