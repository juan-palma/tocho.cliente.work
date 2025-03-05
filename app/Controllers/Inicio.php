<?php
namespace App\Controllers;

use App\Models\BasicModel;
use CodeIgniter\Controller;

class Inicio extends Controller
{
    protected $basic_model;

    public function __construct()
    {
        $this->basic_model = new BasicModel();
    }

    public function index()
    {
        $encontrar = array("\r\n", "\n", "\r");
        $remplazar = '';

        // Consulta - GENERAL
        $model = new BasicModel();
        $respuesta = $model->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'general'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $cleanObjecDB = (is_object(json_decode($clean))) ? json_decode($clean) : new \stdClass();
        $data['generalDB'] = $cleanObjecDB;

        // Consulta - HOME-INICIO
        $model = new BasicModel();
        $respuesta = $model->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'home', 'contenido_seccion' => 'inicio'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $valoresDB = (is_object(json_decode($clean))) ? json_decode($clean) : new \stdClass();
        $data['inicioDB'] = $valoresDB;

        // Consulta - HOME-QUINES SOMOS
        $model = new BasicModel();
        $respuesta = $model->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'home', 'contenido_seccion' => 'somos'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $valoresDB = (is_object(json_decode($clean))) ? json_decode($clean) : new \stdClass();
        $data['somosDB'] = $valoresDB;

        // Consulta - HOME-SERVICIOS
        $model = new BasicModel();
        $respuesta = $model->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'home', 'contenido_seccion' => 'servicios'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $valoresDB = (is_object(json_decode($clean))) ? json_decode($clean) : new \stdClass();
        $data['serviciosDB'] = $valoresDB;

        // Consulta - HOME-PORTAFOLIOS
        $model = new BasicModel();
        $respuesta = $model->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'home', 'contenido_seccion' => 'portafolio'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $valoresDB = (is_object(json_decode($clean))) ? json_decode($clean) : new \stdClass();
        $data['portafolioDB'] = $valoresDB;

        // Consulta - HOME-CLIENTES
        $model = new BasicModel();
        $respuesta = $model->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'home', 'contenido_seccion' => 'clientes'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $cleanClientesDB = (is_object(json_decode($clean))) ? json_decode($clean) : new \stdClass();
        $data['clientesDB'] = $cleanClientesDB;

        // Consulta - FOOTER-ALIANZAS
        $model = new BasicModel();
        $respuesta = $model->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'footer', 'contenido_seccion' => 'alianzas'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $cleanAlianzasDB = (is_object(json_decode($clean))) ? json_decode($clean) : new \stdClass();
        $data['alianzasDB'] = $cleanAlianzasDB;

        $data['titulo'] = "Home";
        $data['actual'] = "home";
        $data['desc'] = "Uniformes Deportivos";

        echo view('templates/header', $data);
        echo view('public/home', $data);
        echo view('templates/footer', $data);
    }

    public function send()
    {
        // Implementar lógica de envío si es necesario
    }

    public function clean()
    {
        session()->remove('formData');
        return redirect()->to(base_url('inicio'));
    }
}