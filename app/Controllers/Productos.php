<?php

namespace App\Controllers;

use App\Models\BasicModel;
use CodeIgniter\Controller;

class Productos extends Controller {
    protected $basic_modal;

    public function __construct(){
        $this->basic_modal = new BasicModel();
        helper(['url', 'form']);
    }

    public $mainPage = 'home';
    public $mainPageName = 'Home';
    public $seccionesInternas = ['base', 'color', 'estampados','lateral_color', 'lateral_estampados','espalda_color', 'espalda_estampados'];

    public $varFlash = 'flashCultura';
    public $success = [];
    public $error = [];

    public $status = [];
    public $valores = [];
    public $errores = [];

    public function index(){
        $encontrar = array("\r\n", "\n", "\r");
        $remplazar = '';

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

        $data['titulo'] = $this->mainPageName;
        $data['actual'] = $this->mainPage;
        $data['varFlash'] = $this->varFlash;
        echo view('public/head', $data);
        echo view('public/home', $data);
        echo view('public/footer', $data);
    }

    public function hombres(){
        $encontrar = array("\r\n", "\n", "\r");
        $remplazar = '';

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

        // Recorrido carga de datos
        $actualMainPage = "hombres_".$this->request->uri->getSegment(4,0);
        $modulosRecorrido = $this->seccionesInternas;
        foreach($modulosRecorrido as $s){
            $this->basic_modal->clean();
            $this->basic_modal->tabla = 'contenido';
            $this->basic_modal->campos = 'contenido_info';
            $this->basic_modal->condicion = array( "contenido_pagina" => $actualMainPage, "contenido_seccion" => $s );

            $respuesta = $this->basic_modal->genericSelect('sistema');
            $consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
            $clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
            $cleanDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new \stdClass();
            $data[$s.'DB'] = $cleanDB;
        }

        $data['genero'] = $this->request->uri->getSegment(2, 0);
        $data['area'] = $this->request->uri->getSegment(3, 0);
        $data['valorA'] = $this->request->uri->getSegment(4,0);

        if($data['area'] !== 0 && $data['valorA'] !== 0){
            if($data['area'] !== 'basico'){
                if(!isNoLoggedCustom() || !isLoggedNoDataCustom() ){
                    return redirect()->to(base_url('productos/'.$data['genero']."/".$data['area']));
                } else{
                    $carga = "public/productos_".$data['area']."_$actualMainPage";
                }
            } else{
                $carga = "public/productos_".$data['area']."_$actualMainPage";
            }
        } else if($data['area'] !== 0){
            if($data['area'] !== 'basico'){
                if(!isNoLoggedCustom()){
                    $carga = "public/productos_".$data['area']."_login";
                } else if(!isLoggedNoDataCustom()){
                    $carga = "public/productos_".$data['area']."_login";
                } else{
                    $carga = "public/productos_".$data['area']."_elegir";
                };
            } else{
                $carga = "public/productos_".$data['area'];
            }
        } else{
            $carga = "public/productos";
        }

        $data['titulo'] = "Productos";
        $data['actual'] = "productos";
        $data['desc'] = "Productos | Uniformes Deportivos";
        $data['varFlash'] = $this->varFlash;
        echo view('public/head', $data);
        echo view($carga, $data);
        echo view('public/footer', $data);
    }

    public function mujeres(){
        $encontrar = array("\r\n", "\n", "\r");
        $remplazar = '';

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

        // Recorrido carga de datos
        $actualMainPage = "mujeres_".$this->request->uri->getSegment(4,0);
        $modulosRecorrido = $this->seccionesInternas;
        foreach($modulosRecorrido as $s){
            $this->basic_modal->clean();
            $this->basic_modal->tabla = 'contenido';
            $this->basic_modal->campos = 'contenido_info';
            $this->basic_modal->condicion = array( "contenido_pagina" => $actualMainPage, "contenido_seccion" => $s );

            $respuesta = $this->basic_modal->genericSelect('sistema');
            $consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
            $clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
            $cleanDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new \stdClass();
            $data[$s.'DB'] = $cleanDB;
        }

        $data['genero'] = "mujeres";
        $data['area'] = $this->request->uri->getSegment(3, 0);
        $data['valorA'] = $this->request->uri->getSegment(4,0);

        $data['titulo'] = $this->mainPageName;
        $data['actual'] = $this->mainPage;
        $data['desc'] = "Productos | Uniformes Deportivos";
        $data['varFlash'] = $this->varFlash;
        echo view('public/head', $data);
        echo view('public/productos', $data);
        echo view('public/footer', $data);
    }

    public function ninos(){
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
        $this->basic_modal->condicion = array( "contenido_pagina" => 'productos', "contenido_seccion" => 'inicio' );

        $isInicio = $this->basic_modal->genericSelect('sistema');
        $consulta = (is_array($isInicio) && count($isInicio) > 0) ? $isInicio[0] : '';
        $nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new \stdClass();
        $data['productosDB'] = $valoresDB;

        $data['genero'] = "ninos";
        $data['area'] = $this->request->uri->getSegment(3, 0);
        $data['valorA'] = $this->request->uri->getSegment(4,0);

        $data['titulo'] = "Productos";
        $data['actual'] = "productos";
        $data['desc'] = "Productos | Uniformes Deportivos";

        echo view('public/head', $data);
        echo view('public/productos', $data);
        echo view('public/footer', $data);
    }

    public function send(){
        // Implementar lógica de envío si es necesario
    }

    public function login(){
        $procesoValido = true;
        session()->set('userAlerts', "");

        if($this->request->getPost('correo')){
            $userMail = $this->request->getPost('correo');
        } else if(session()->get('userMail') !== ''){
            $userMail = session()->get('userMail');
        } else{
            $userMail = "";
        }

        $userMail = filter_var(filter_var($userMail, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
        if($userMail){
            session()->set('userMailTemp', $userMail);
        } else{
            session()->set('userAlerts', session()->get('userAlerts')."El correo no es valido \n\r");
            $procesoValido = false;
        }
        $userEquipo = $this->request->getPost('equipo');
        $userEquipo = filter_var($userEquipo, FILTER_SANITIZE_STRING);
        if($userEquipo !== ''){
            session()->set('userEquipoTemp', $userEquipo);
        } else{
            session()->set('userAlerts', session()->get('userAlerts')."El texto no es valido o tiene caracteres no permitidos \n\r");
            $procesoValido = false;
        }
        $userLiga = $this->request->getPost('liga');
        $userLiga = filter_var($userLiga, FILTER_SANITIZE_STRING);
        if($userLiga !== ''){
            session()->set('userLigaTemp', $userLiga);
        } else{
            session()->set('userAlerts', session()->get('userAlerts')."El texto no es valido o tiene caracteres no permitidos \n\r");
            $procesoValido = false;
        }

        if(!$procesoValido){
            return redirect()->to(base_url(session()->get('urlPeticion')));
        } else{
            //Consulta - usuarios - registro existente
            $this->basic_modal->clean();
            $this->basic_modal->tabla = 'usuarios';
            $this->basic_modal->campos = 'id_user';
            $this->basic_modal->condicion = array( "u_mail" => $userMail );

            $usuarioDB = $this->basic_modal->genericSelect('sistema');
            if(count($usuarioDB) > 0){
                session()->set('idUser', $usuarioDB[0]->id_user);
                session()->set('userMail', $userMail);
                session()->set('userEquipo', $userEquipo);
                session()->set('userLiga', $userLiga);
            } else{
                //Insertar los valores en la base de datos
                //Usuario
                $this->basic_modal->clean();
                $this->basic_modal->tabla = 'usuarios';
                $valores = array( 'u_mail' => $userMail);
                $insert = $this->basic_modal->genericInsert('sistema', $valores);
                if($insert){
                    session()->set('idUser', $insert);
                    session()->set('userMail', $userMail);
                    session()->set('userEquipo', $userEquipo);
                    session()->set('userLiga', $userLiga);
                }
            }

            session()->remove(['userMailTemp', 'userEquipoTemp', 'userLigaTemp']);
            session()->set('userAlerts', "");
            return redirect()->to(base_url(session()->get('urlPeticion')));
        }
    }

    public function clean(){
        session()->remove('formData');
        return redirect()->to(base_url('inicio'));
    }
}



