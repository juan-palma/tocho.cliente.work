<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Traits\PanelTrait;

class Panel extends BaseController
{
    use PanelTrait;

    public function __construct()
    {
        $this->initPanel();
    }

    public function index()
    {
        if ($redir = isNoLogged()) {
            return redirect()->to(base_url($redir));
        }

        $moduleName = $this->getModuleName();
        $data = $this->getPanelData($moduleName);
        return $this->renderPanelView('admin/' . strtolower($moduleName), $data);
    }
}



//Array (
//    [titulo] => Panel
//    [actual] => Panel
//    [varFlash] => flashPanel
//    [userAvatar] => 
//    [userName] => Juan A. Palma
//    [modulos] => Array (
//        [0] => Array (
//            [id_permisos] => 5
//            [permiso_user] => 1
//            [permiso_modulo] => general
//            [permiso_orden] => 0
//            [permiso_accion] => R:1,W:1,E:1
//            [permiso_exclusion] => 
//            [permiso_sub] => 
//            [permiso_status] => 1
//            [permiso_stamp] => 2019-08-12 15:24:42
//        )
//        [1] => Array (
//            [id_permisos] => 17
//            [permiso_user] => 1
//            [permiso_modulo] => hombres_sudadera
//            [permiso_orden] => 1
//            [permiso_accion] => R:1,W:1,E:1
//            [permiso_exclusion] => 
//            [permiso_sub] => 
//            [permiso_status] => 1
//            [permiso_stamp] => 2020-12-22 19:34:45
//        )
//    )
//    [adminLogo] => 
//    [customModuleIcon] => Array (
//        [general] => stdClass Object (
//            [label] => General
//            [icono] => fas fa-window-maximize
//        )
//        [home] => stdClass Object (
//            [label] => Home
//            [icono] => fa fa-home
//        )
//        [portafolios] => stdClass Object (
//            [label] => Portafolios
//            [icono] => fas fa-suitcase
//        )
//        [servicios] => stdClass Object (
//            [label] => Servicios
//            [icono] => fas fa-briefcase
//        )
//        [vacantes] => stdClass Object (
//            [label] => Vacantes
//            [icono] => fas fa-newspaper
//        )
//    )
//)