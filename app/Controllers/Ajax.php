<?php

namespace App\Controllers;

use App\Models\BasicModel;
use CodeIgniter\Controller;

class Ajax extends Controller {
    protected $basic_modal;

    public function __construct(){
        $this->basic_modal = new BasicModel();
        helper(['url', 'form', 'mail']);
    }
    
    public function index(){
        // Método vacío
    }
    
    public function footerForm()
    {
        $json = array();
        $json['status'] = 'ok';
        $json['valores'] = array();
        $json['errores'] = array();

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

        require(APPPATH . 'Views/admin/customers_parametros.php');

        $idaMail_data['destino_mail'][] = $cleanObjecDB->correo;
        $idaMail_data['origen_mail'] = $cleanObjecDB->correo_form;
        $idaMail_data['reply_mail'] = $cleanObjecDB->correo;
        $idaMail_data['username'] = $cleanObjecDB->correo_form;
        $idaMail_data['password'] = $cleanObjecDB->correo_pass;

        $idaMail_data['destino_mail'][] = "soporte@idalibre.com";
        $idaMail_data['origen_mail'] = "soporte@idalibre.com";
        $idaMail_data['reply_mail'] = "soporte@idalibre.com";
        $idaMail_data['username'] = "soporte@idalibre.com";
        $idaMail_data['password'] = 'Soporte.libre';

        $template = FCPATH . 'assets/public/template/contactoForm.php';
        $info = array();
        $info['nombre'] = $this->request->getPost('nombre');
        $info['mail'] = $this->request->getPost('correo');
        $info['tel'] = $this->request->getPost('telefono');
        $info['mensaje'] = $this->request->getPost('servicio');
        $info['mensaje'] = $this->request->getPost('mensaje');
        $info['logo'] = base_url('assets/public/img/logo_ci@2x.png');
        $info['empresa'] = 'Circulo Imagen';
        $info['sitio'] = base_url();

        if ($this->request->getPost('nombre') !== '' && $this->request->getPost('correo') !== '' && $this->request->getPost('telefono')) {
            $respMail = ida_sendMail($template, $info, $idaMail_data);
            if ($respMail) {
                $json['valores'][] = 'Se envió el correo de manera correcta.';
            } else {
                $json['status'] = 'error';
                $json['errores'][] = 'Error interno al enviar el correo';
            }
        } else {
            $json['status'] = 'error';
            $json['errores'][] = 'Es necesario que todos los campos tengan un valor.';
        }

        echo json_encode($json);
    }
    
    public function downloadVcard(){
        header('Content-Type: text/x-vcard');  
        header('Content-Disposition: inline; filename="inmotion.vcf"');
        echo vcard();
    }
    
    public function clean(){
        session()->remove('formData');
        return redirect()->to(base_url('inicio'));
    }
}



