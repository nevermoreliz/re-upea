<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Dri extends BaseConfig
{

    public $keySecret = 'dri-VkYp3s6v';

    /* tamaño en KB limite para subir una imagen */
    public $tamañoServidor = '10000';

    /* variables de rutas para uploads */
    public $pathPersonImg = '../public/uploads/assets/imgUsers';
    public $pathEnlaceImg = '../public/uploads/assets/img_enlace';
    public $pathConvenioImg = '../public/uploads/assets/imgConvenios/';
    public $pathConvenioPdf = '../public/uploads/assets/conveniosPdf/';
    public $pathPublicacionImg = '';
    public $pathGaleriaImg = '';
}