<?php

namespace App\Controllers\Public;

use CodeIgniter\Controller;

class Ajax extends Controller {
    public function __construct(){
        helper('url');
        session();
    }
    
    public function index(){
        echo('hola mundo');
    }
        
    public function footerForm(){
        $json = array();
        $json['status'] = 'ok';
        $json['valores'] = array();
        $json['errores']  = array();
        
        echo json_encode($json);
    }
    
    public function send(){
        // Implementar lógica de envío
    }
        
    public function clean(){
        session()->remove('formData');
        return redirect()->to(base_url('inicio'));
    }
}



