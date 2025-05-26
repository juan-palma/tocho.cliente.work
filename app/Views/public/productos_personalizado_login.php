<?php
	//Consulta - HOME-SECCIONES
	// $this->basic_modal->clean();
	// $this->basic_modal->tabla = 'usuarios';
	// $this->basic_modal->campos = 'id_user';
	// //$this->basic_modal->condicion = array( "contenido_pagina" => $pageMain, "contenido_seccion" => $sector['baseName'] );
	// 
	// $usuarioDB = $this->basic_modal->genericSelect('sistema');
	// print_r($usuarioDB);



// Acceso a la sesión con el servicio de CI4
$session = \Config\Services::session();
$userMailTemp = $session->get('userMailTemp') ?? '';
$userEquipoTemp = $session->get('userEquipoTemp') ?? '';
$userLigaTemp = $session->get('userLigaTemp') ?? '';
$idUser = $session->get('idUser');
$userMail = $session->get('userMail') ?? '';

// Determinar si el campo de correo debe estar deshabilitado
$mailDisabled = ($idUser && $userMail) ? 'disabled' : '';
$userMail = $idUser && $userMail ? $userMail : $userMailTemp;

// Nota: La asignación de 'urlPeticion' se movió al controlador
?>

<div id="mainLoginCustom">
    <form id="formLoginCustom" action="<?= base_url('productos/login') ?>" method="post">
        <input type="email" name="correo" placeholder="Email" required <?= $mailDisabled ?> value="<?= esc($userMail) ?>" />
        <input type="text" name="equipo" placeholder="Nombre de equipo" value="<?= esc($userEquipoTemp) ?>" required />
        <input type="text" name="liga" placeholder="Nombre de liga" value="<?= esc($userLigaTemp) ?>" required />
        <input type="submit" value="Continuar" />
    </form>
</div>