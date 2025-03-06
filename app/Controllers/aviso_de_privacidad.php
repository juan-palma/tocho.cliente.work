<?php
namespace App\Controllers;

use App\Models\BasicModel;
use CodeIgniter\Controller;

class aviso_de_privacidad extends Controller
{
    protected $basic_model; // Corregí el nombre a "basic_model" para consistencia

    public function __construct()
    {
        $this->basic_model = new BasicModel();
    }

    public function index()
    {
        $encontrar = ["\r\n", "\n", "\r"];
        $remplazar = '';

        // Consulta - GENERAL
        $generalModel = new BasicModel();
        $respuesta = $generalModel->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'general'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $data['generalDB'] = json_decode($clean) ?: new \stdClass();

        // Consulta - HOME-SERVICIOS
        $serviciosModel = new BasicModel();
        $respuesta = $serviciosModel->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'home', 'contenido_seccion' => 'servicios'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $data['serviciosDB'] = json_decode($clean) ?: new \stdClass();

        $data['titulo'] = "Políticas de Privacidad";
        $data['actual'] = "politicas";
        $data['desc'] = "Conoce nuestras políticas de privacidad - INMOTION";

        return view('templates/header', $data)
            . view('public/aviso_de_privacidad', $data)
            . view('templates/footer', $data);
    }

    public function articulo($peticion = '')
    {
        // Implementar lógica de artículo si es necesario
        // Por ahora, devolvemos una vista vacía o redirigimos
        return redirect()->to(base_url('aviso_de_privacidad'));
    }

    public function clean()
    {
        session()->remove('formData');
        return redirect()->to(base_url('inicio'));
    }
}