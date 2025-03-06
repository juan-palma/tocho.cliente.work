<?php
helper('form');

// Datos de formulario GENERAL
$data_desc_global = [
    'name' => 'general[desc_global]',
    'value' => $generalDB->desc_global ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_team_fondo = [
    'name' => 'general0_fondo',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'data-cloneinfo' => 'general_fondo',
    'data-conteovalin' => 'general',
    'data-conteovalfin' => '_fondo',
    'data-conteoval' => 'name'
];
$data_general_telefono = [
    'name' => 'general[telefono]',
    'value' => $generalDB->telefono ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_correo = [
    'name' => 'general[correo]',
    'value' => $generalDB->correo ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_correo_pass = [
    'name' => 'general[correo_pass]',
    'value' => $generalDB->correo_pass ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_servicios = [
    'name' => 'general[servicios]',
    'value' => $generalDB->servicios ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_mapa = [
    'name' => 'general[mapa]',
    'value' => $generalDB->mapa ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_correo_form = [
    'name' => 'general[correo_form]',
    'value' => $generalDB->correo_form ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_direccion = [
    'name' => 'general[direccion]',
    'value' => $generalDB->direccion ?? '',
    'class' => 'validaciones vc form-control input-lg hl2',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_facebook = [
    'name' => 'general[facebook]',
    'value' => $generalDB->facebook ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_instagram = [
    'name' => 'general[instagram]',
    'value' => $generalDB->instagram ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_linkedin = [
    'name' => 'general[linkedin]',
    'value' => $generalDB->linkedin ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_behance = [
    'name' => 'general[behance]',
    'value' => $generalDB->behance ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_general_vimeo = [
    'name' => 'general[vimeo]',
    'value' => $generalDB->vimeo ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];

// Datos de formulario ALIANZAS
$data_alianza_titulo_general = [
    'name' => 'alianzas[titulo]',
    'value' => $alianzasDB->titulo_general ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_alianza_logo = [
    'name' => '',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'data-cloneinfo' => 'logoIMG',
    'data-conteovalin' => 'alianza',
    'data-conteovalfin' => '_logo',
    'data-conteoval' => 'name'
];

	$viewData = ['actual' => $actual];
?>


<?= $this->include('admin/saveControl') ?>

<div class="container area_scroll" data-page="<?= esc($actual) ?>">
    <!-- Elementos para clonar -->
    <div class="hiden boxClones">
        <?= form_upload($data_team_fondo) ?>
        <?php
        $imgBlockData = [
            'classAdd' => '',
            'propertyAdd' => 'data-conteovalin="general" data-conteovalfin="_fondo" data-conteoval="name"'
        ];
        echo view('admin/plantillas/img_block', $imgBlockData);
        ?>

        <!-- Clones para ALIANZAS -->
        <?= form_upload($data_alianza_logo) ?>

        <div class="registro" data-cloneinfo="logo">
            <input type="hidden" name="" class="conteo" data-conteovalin="alianzas[logos][" data-conteovalfin="]" data-conteoval="name">
            <label>logo: <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></label>
            <div class="controlCloneRegistro">
                <div class="clone menos"><i class="far fa-trash-alt"></i></div>
            </div>
            <div class="cleanBox" data-clonetype="logoIMG">
                <?= form_upload($data_alianza_logo) ?>
            </div>
        </div>
    </div>

    <!-- Sección de información General -->
    <div id="nosotros" class="row"><br/>
        <div class="card stacked-form col-md-12">
            <div class="card-header block">
                <h5 class="tituloBlock">Información general del sitio WEB:</h5>
                <hr class="colorgraph">
            </div>
            <div class="valueBox">
                <?php if (isset($generalDB)): ?>
                    <div class="registro">
                        <div class="row">
                            <div class="col -md-3">
                                <div class="general_desc_global">
                                    <label>Descripción breve para el header general del sitio web:</label>
                                    <?= form_input($data_desc_global) ?>
                                </div>
                                <div class="general_color_fondo">
                                    <label>Color de fondo:</label>
                                    <?php
                                    $data_general['name'] = 'general[color_fondo]';
                                    $data_general['value'] = $generalDB->color_fondo ?? '';
                                    echo form_input($data_general);
                                    ?>
                                </div>
                                <div class="body_fondo">
                                    <label>Fondo del sitio web:</label>
                                    <div class="cleanBox" data-clonetype="general_fondo">
                                        <?php if (property_exists($generalDB, 'fondo') && !empty($generalDB->fondo[0]->img)): ?>
                                            <?php
                                            $imgBlockData = [
                                                'img' => base_url('assets/public/img/general/' . $generalDB->fondo[0]->img),
                                                'name' => $generalDB->fondo[0]->img,
                                                'hname' => 'general0_fondo',
                                                'classAdd' => 'conteo',
                                                'propertyAdd' => 'data-conteovalin="general" data-conteovalfin="_fondo" data-conteoval="name"'
                                            ];
                                            echo view('admin/plantillas/img_block', $imgBlockData);
                                            ?>
                                        <?php else: ?>
                                            <?= form_upload($data_team_fondo) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="general_color_principal">
                                    <label>Color Principal para títulos y texto sobre el fondo: (use # al inicio del color)</label>
                                    <?php
                                    $data_general['name'] = 'general[color_principal]';
                                    $data_general['value'] = $generalDB->color_principal ?? '';
                                    echo form_input($data_general);
                                    ?>
                                </div>
                                <div class="general_color_contraste">
                                    <label>Color de contraste al color principal: (use # al inicio del color)</label>
                                    <?php
                                    $data_general['name'] = 'general[color_contraste]';
                                    $data_general['value'] = $generalDB->color_contraste ?? '';
                                    echo form_input($data_general);
                                    ?>
                                </div>
                            </div>

                            <div class="col -md-9">
                                <div class="general_telefono">
                                    <label>Teléfono:</label>
                                    <?= form_input($data_general_telefono) ?>
                                </div>
                                <div class="general_correo">
                                    <label>Correo:</label>
                                    <?= form_input($data_general_correo) ?>
                                </div>
                                <div class="general_correo_pass">
                                    <label>Contraseña del Correo:</label>
                                    <?= form_input($data_general_correo_pass) ?>
                                </div>
                                <div class="general_servicios">
                                    <label>Servicios para el formulario de cotización (separar por comas):</label>
                                    <?= form_input($data_general_servicios) ?>
                                </div>
                                <div class="team_correo_form">
                                    <label>Correo donde el formulario del sitio enviará la consulta:</label>
                                    <?= form_input($data_general_correo_form) ?>
                                </div>
                                <div class="team_nombre">
                                    <label>Liga de mapa:</label>
                                    <?= form_input($data_general_mapa) ?>
                                </div>
                                <div class="team_direccion">
                                    <label>Dirección:</label>
                                    <?= form_textarea($data_general_direccion) ?>
                                </div>
                                <div class="team_facebook">
                                    <label>Facebook</label>
                                    <?= form_input($data_general_facebook) ?>
                                </div>
                                <div class="team_instagram">
                                    <label>Instagram</label>
                                    <?= form_input($data_general_instagram) ?>
                                </div>
                                <div class="team_linkedin">
                                    <label>LinkedIn</label>
                                    <?= form_input($data_general_linkedin) ?>
                                </div>
                                <div class="team_behance">
                                    <label>Behance</label>
                                    <?= form_input($data_general_behance) ?>
                                </div>
                                <div class="team_vimeo">
                                    <label>Vimeo</label>
                                    <?= form_input($data_general_vimeo) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Sección de alianzas -->
    <div id="alianzas" class="row"><br/>
        <div class="card stacked-form col-md-12">
            <div class="card-header block">
                <h5 class="tituloBlock">Alianzas:</h5>
                <hr class="colorgraph">
            </div>
            <div class="valueBox">
                <label>Título de la sección:</label>
                <?= form_input($data_alianza_titulo_general) ?>

                <div class="boxRepeat">
                    <div class="boxMainClone">Agregar una alianza: <div id="alianzas_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
                    <div class="boxDrag">
                        <?php if (property_exists($alianzasDB, 'logos') && !empty($alianzasDB->logos)): ?>
                            <?php foreach ($alianzasDB->logos as $i => $v): ?>
                                <div class="registro">
                                    <input type="hidden" name="alianzas[logos][<?= $i ?>]" class="conteo" data-conteovalin="alianzas[logos][" data-conteovalfin="]" data-conteoval="name">
                                    <label>Logo: <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?= $i + 1 ?></span></label>
                                    <div class="controlCloneRegistro">
                                        <div class="clone menos"><i class="far fa-trash-alt"></i></div>
                                    </div>
                                    <div class="cleanBox" data-clonetype="logoIMG">
                                        <?php
                                        $imgBlockData = [
                                            'img' => base_url('assets/public/img/alianzas/' . $v->logo),
                                            'name' => $v->logo,
                                            'hname' => 'alianza' . $i . '_logo',
                                            'classAdd' => 'conteo',
                                            'propertyAdd' => 'data-conteovalin="alianza" data-conteovalfin="_logo" data-conteoval="name"'
                                        ];
                                        echo view('admin/plantillas/img_block', $imgBlockData);
                                        ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>