<?php

namespace App\Controllers;

use App\Models\BasicModel;
use CodeIgniter\Controller;

class Inicio extends Controller {
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
        
        //Consulta - HOME-INICIO
        $this->basic_modal->clean();
        $this->basic_modal->tabla = 'contenido';
        $this->basic_modal->campos = 'contenido_info';
        $this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'inicio' );
        
        $isInicio = $this->basic_modal->genericSelect('sistema');
        $consulta = (is_array($isInicio) && count($isInicio) > 0) ? $isInicio[0] : '';
        $nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new \stdClass();
        $data['inicioDB'] = $valoresDB;
        
        //Consulta - HOME-QUINES SOMOS
        $this->basic_modal->clean();
        $this->basic_modal->tabla = 'contenido';
        $this->basic_modal->campos = 'contenido_info';
        $this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'somos' );
        
        $isSomos = $this->basic_modal->genericSelect('sistema');
        $consulta = (is_array($isSomos) && count($isSomos) > 0) ? $isSomos[0] : '';
        $nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new \stdClass();
        $data['somosDB'] = $valoresDB;

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

        //Consulta - HOME-PORTAFOLIOS
        $this->basic_modal->clean();
        $this->basic_modal->tabla = 'contenido';
        $this->basic_modal->campos = 'contenido_info';
        $this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'portafolio' );
        
        $isPortafolio = $this->basic_modal->genericSelect('sistema');
        $consulta = (is_array($isPortafolio) && count($isPortafolio) > 0) ? $isPortafolio[0] : '';
        $nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new \stdClass();
        $data['portafolioDB'] = $valoresDB;

        //Consulta - HOME-CLIENTES
        $this->basic_modal->clean();
        $this->basic_modal->tabla = 'contenido';
        $this->basic_modal->campos = 'contenido_info';
        $this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'clientes' );
        
        $respuesta = $this->basic_modal->genericSelect('sistema');
        $consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
        $clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $cleanClientesDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new \stdClass();
        $data['clientesDB'] = $cleanClientesDB;

        //Consulta - FOOTER-ALIANZAS
        $this->basic_modal->clean();
        $this->basic_modal->tabla = 'contenido';
        $this->basic_modal->campos = 'contenido_info';
        $this->basic_modal->condicion = array( "contenido_pagina" => 'footer', "contenido_seccion" => 'alianzas' );
        
        $respuesta = $this->basic_modal->genericSelect('sistema');
        $consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
        $clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $cleanAlianzasDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new \stdClass();
        $data['alianzasDB'] = $cleanAlianzasDB;

        $data['titulo'] = "Home";
        $data['actual'] = "home";
        $data['desc'] = "Uniformes Deportivos";
        
        echo view('templates/header', $data);
        echo view('public/home', $data);
        echo view('templates/footer', $data);
    }
    
    public function send(){
        // Implementar lógica de envío si es necesario
    }
    
    public function clean(){
        session()->remove('formData');
        return redirect()->to(base_url('inicio'));
    }
}