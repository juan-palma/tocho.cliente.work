<?php
helper('form');

$formPrefix = '<div class="form-error-msn">';
$formPrefixTerminos = '<div class="form-error-msn terminos">';
$formSubfix = '</div>';

$data = [
    'id' => 'formulario',
    'class' => 'ev',
    'role' => 'form',
	'method'=>'post'
];

$hidden = [
    'pagina' => $actual,
    'userID' => session()->get('userID')
];
?>

<?= form_open_multipart(current_url() . '/do_upload', $data, $hidden) ?>

<div id="nav_save_control">
    <div class="row">
        <div class="col -md-12">
            <span class="pageTitulo">Datos de <?= esc($titulo) ?>:</span>
            <input id="boton_c" type="button" class="btn btn-default" value="Cancelar" onclick="location.reload();">
            <input id="boton_r" type="submit" class="btn btn-info" value="Guardar">
        </div>
    </div>
</div>
<div id="nav_save_spacefin"></div>