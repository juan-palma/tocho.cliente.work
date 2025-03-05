<?php

namespace App\Controllers;


class Pass extends BaseController {
    public function index(){
        $idaProtect = new \App\Libraries\IdaProtect();
        $valor = $idaProtect->encrypt('libre');
        echo $valor;
        //return view($valor);

        // echo $idaProtect->encrypt_decrypt('decrypt', $result[0]->user_pass);
        // echo('<br />');
        // echo uuid();
    }
}