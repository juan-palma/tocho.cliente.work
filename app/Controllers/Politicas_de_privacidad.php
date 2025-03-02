<?php

namespace App\Controllers;

use App\Models\BasicModel;
use CodeIgniter\Controller;

class Politicas_de_privacidad extends Controller {
    protected $basic_modal;

    public function __construct(){
        $this->basic_modal = new BasicModel();
    }
    
    public function index(){
        $encontrar = array("\r\n", "\n", "\r");
        $remplazar = '';
        
        //Consulta - GENERAL
        $this->basic_modal->clean();
        $this->basic_modal->tabla = 'contenido';
        $this->basic_modal->campos = 'contenido_info';
        $this->basic_modal->condicion = array( "contenido_pagina" => 'general' );
        
        $respuesta = $this->basic_modal->genericSelect('sistema');
        $consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
        $clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new \stdClass();
        $data['generalDB'] = $cleanObjecDB;
        
        //Consulta - HOME-SERVICIOS
        $this->basic_modal->clean();
        $this->basic_modal->tabla = 'contenido';
        $this->basic_modal->campos = 'contenido_info';
        $this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'servicios' );
        
        $isServicio = $this->basic_modal->genericSelect('sistema');
        $consulta = (is_array($isServicio) && count($isServicio) > 0) ? $isServicio[0] : '';
        $nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new \stdClass();
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



