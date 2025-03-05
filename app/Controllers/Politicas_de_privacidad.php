<?php

namespace App\Controllers;

use App\Models\BasicModel;
use CodeIgniter\Controller;

class Politicas_de_privacidad extends Controller {
    protected $basic_modal;

    public function __construct(){
        $this->basic_modal = new BasicModel();
    }
    
    public function index()
    {
        $encontrar = array("\r\n", "\n", "\r");
        $remplazar = '';

        // Consulta - GENERAL
        $respuesta = $this->basic_modal->clean()
            ->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'general'])
            ->genericSelect('sistema');
        $consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
        $clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $cleanObjecDB = (is_object(json_decode($clean))) ? json_decode($clean) : new \stdClass();
        $data['generalDB'] = $cleanObjecDB;

        // Consulta - HOME-SERVICIOS
        $isServicio = $this->basic_modal->clean()
            ->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'home', 'contenido_seccion' => 'servicios'])
            ->genericSelect('sistema');
        $consulta = (is_array($isServicio) && count($isServicio) > 0) ? $isServicio[0] : '';
        $nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $valoresDB = (is_object(json_decode($nuevoValor))) ? json_decode($nuevoValor) : new \stdClass();
        $data['serviciosDB'] = $valoresDB;

        $data['titulo'] = "Políticas de Privacidad";
        $data['actual'] = "politicas";
        $data['desc'] = "Conoce nuestras políticas de privacidad - INMOTION";

        echo view('public/head', $data);
        echo view('public/politicas_privacidad', $data);
        echo view('public/footer', $data);
    }
    
    public function articulo($peticion = ''){
        // Implementar lógica de artículo si es necesario
    }
    
    public function clean(){
        session()->remove('formData');
        return redirect()->to(base_url('inicio'));
    }
}



