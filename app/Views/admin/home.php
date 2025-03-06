<?php
// INICIO
$data_inicio = [
    'name' => 'inicio[titulo]',
    'value' => $inicioDB->inicio_titulo ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_inicio_subtext = [
    'name' => 'inicio[subtexto]',
    'value' => $InicioDB->inicio_subtexto ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];

// QUIÉNES SOMOS
$data_somos_titulo = [
    'name' => 'somos[titulo]',
    'value' => $somosDB->titulo ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_somos_texto = [
    'name' => 'somos[texto]',
    'value' => $somosDB->texto ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_somos_textoBtn = [
    'name' => 'somos[textoBtn]',
    'value' => $somosDB->textoBtn ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];

// SERVICIOS
$data_servicio_tituloGeneral = [
    'name' => 'servicios[titulo]',
    'value' => $serviciosDB->titulo ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_servicio_icono = [
    'name' => '',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'placeholder' => '',
    'data-cloneinfo' => 'icono',
    'data-conteovalin' => 'servicio',
    'data-conteovalfin' => '_icono',
    'data-conteoval' => 'name'
];
$data_servicio_titulo = [
    'name' => '',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'placeholder' => '',
    'data-conteovalin' => 'servicios[servicio][',
    'data-conteovalfin' => '][titulo]',
    'data-conteoval' => 'name'
];
$data_servicio_textoBtn = [
    'name' => 'servicios[textoBtn]',
    'value' => $serviciosDB->textoBtn ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];

// PORTAFOLIOS
$data_portafolio_tituloGeneral = [
    'name' => 'portafolios[titulo]',
    'value' => $portafolioDB->titulo ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_portafolio_imagen = [
    'name' => '',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'placeholder' => '',
    'data-cloneinfo' => 'image',
    'data-conteovalin' => 'portafolio',
    'data-conteovalfin' => '_imagen',
    'data-conteoval' => 'name'
];
$data_portafolio_nombre = [
    'name' => '',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'placeholder' => '',
    'data-conteovalin' => 'portafolios[portafolio][',
    'data-conteovalfin' => '][nombre]',
    'data-conteoval' => 'name'
];
$data_portafolio_textoBtn = [
    'name' => 'portafolios[textoBtn]',
    'value' => $portafolioDB->textoBtn ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_portafolio_link = [
    'name' => '',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'placeholder' => '',
    'data-conteovalin' => 'portafolios[portafolio][',
    'data-conteovalfin' => '][enlace]',
    'data-conteoval' => 'name'
];

// CLIENTES
$data_cliente_titulo_general = [
    'name' => 'clientes[titulo]',
    'value' => $clientesDB->titulo_general ?? '',
    'class' => 'validaciones vc form-control input-lg',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_cliente_logo = [
    'name' => '',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'placeholder' => '',
    'data-cloneinfo' => 'logoIMG',
    'data-conteovalin' => 'cliente',
    'data-conteovalfin' => '_logo',
    'data-conteoval' => 'name'
];

	$viewData = ['actual' => $actual];
?>

<?= $this->include('admin/saveControl') ?>

<div class="container area_scroll" data-page="<?= esc($actual) ?>">
    <div class="hiden boxClones">
        <?= form_upload($data_servicio_icono) ?>
        <?php $data['classAdd'] = 'conteo'; $data['propertyAdd'] = ' data-conteovalin="servicio" data-conteovalfin="_icono" data-conteoval="name"'; ?>
        <?= $this->include('admin/plantillas/img_block') ?>

        <div id="servicio_base" class="registro" data-cloneinfo="formServicio">
            <div class="valHead">
                <h5>Servicio <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></h5>
                <div class="controlCloneRegistro">
                    <div class="clone menos"><i class="far fa-trash-alt"></i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="servicio_icono">
                        <label>Icono:</label>
                        <div class="cleanBox" data-clonetype="icono">
                            <?= form_upload($data_servicio_icono) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="servicio_titulo">
                        <label>Titulo del Servicio:</label>
                        <?= form_input($data_servicio_titulo) ?>
                    </div>
                </div>
            </div>
        </div>

        <?= form_upload($data_portafolio_imagen) ?>
        <?php $data['classAdd'] = 'conteo'; $data['propertyAdd'] = ' data-conteovalin="portafolio" data-conteovalfin="_imagen" data-conteoval="name"'; ?>
        <?= $this->include('admin/plantillas/img_block') ?>

        <div id="portafolio_base" class="registro" data-cloneinfo="formPortafolio">
            <div class="valHead">
                <h5>Portafolio <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></h5>
                <div class="controlCloneRegistro">
                    <div class="clone menos"><i class="far fa-trash-alt"></i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="portafolio_imagen">
                        <label>Imagen:</label>
                        <div class="cleanBox" data-clonetype="imagen">
                            <?= form_upload($data_portafolio_imagen) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="portafolio_nombre">
                        <label>Nombre del portafolio:</label>
                        <?= form_input($data_portafolio_nombre) ?>
                    </div>
                    <div class="portafolio_enlace">
                        <label>Enlace al portafolio completo:</label>
                        <?= form_input($data_portafolio_link) ?>
                    </div>
                </div>
            </div>
        </div>

        <?= form_upload($data_cliente_logo) ?>

        <div class="registro" data-cloneinfo="logo">
            <input type="hidden" name="" class="conteo" data-conteovalin="clientes[logos][" data-conteovalfin="]" data-conteoval="name">
            <label>logo: <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></label>
            <div class="controlCloneRegistro">
                <div class="clone menos"><i class="far fa-trash-alt"></i></div>
            </div>
            <div class="cleanBox" data-clonetype="logoIMG">
                <?= form_upload($data_cliente_logo) ?>
            </div>
        </div>
    </div>

    <!-- INICIO -->
    <div id="inicio" class="row"><br/>
        <div class="card stacked-form col-md-12">
            <div class="card-header block">
                <h5 class="tituloBlock">Inicio:</h5>
                <hr class="colorgraph">
            </div>
            <div class="valueBox">
                <label>Título de inicio:</label>
                <?= form_input($data_inicio) ?>
                <label>Subtexto de inicio:</label>
                <?= form_textarea($data_inicio_subtext) ?>
            </div>
        </div>
    </div>

    <!-- QUIÉNES SOMOS -->
    <div id="somos" class="row"><br/>
        <div class="card stacked-form col-md-12">
            <div class="card-header block">
                <h5 class="tituloBlock">Quienes Somos:</h5>
                <hr class="colorgraph">
            </div>
            <div class="valueBox">
                <label>Título de sección:</label>
                <?= form_input($data_somos_titulo) ?>
                <label>Texto de introducción:</label>
                <?= form_textarea($data_somos_texto) ?>
                <label>Texto del botón para ver más:</label>
                <?= form_input($data_somos_textoBtn) ?>
            </div>
        </div>
    </div>

    <!-- SERVICIOS -->
    <div id="servicios" class="row"><br/>
        <div class="card stacked-form col-md-12">
            <div class="card-header block">
                <h5 class="tituloBlock">Servicios:</h5>
                <hr class="colorgraph">
            </div>
            <div class="valueBox">
                <label>Título general de la sección:</label>
                <?= form_input($data_servicio_tituloGeneral) ?>
                <label>Texto del botón para ver más:</label>
                <?= form_input($data_servicio_textoBtn) ?>
                <div class="boxRepeat">
                    <div class="boxMainClone">Agregar un servicio: <div id="servicio_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
                    <div class="boxDrag">
                        <?php if (isset($serviciosDB->servicios) && !empty($serviciosDB->servicios)): ?>
                            <?php foreach ($serviciosDB->servicios as $i => $v): ?>
                                <div class="registro">
                                    <div class="boxShow">
                                        <div class="valHead">
                                            <h5>Servicio <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?= ($i + 1) . ' - ' . esc($v->titulo) ?></span></h5>
                                            <div class="controlCloneRegistro">
                                                <div class="clone menos"><i class="far fa-trash-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="boxHide">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="servicio_icono">
                                                    <label>Icono:</label>
                                                    <div class="cleanBox" data-clonetype="icono">
                                                        <?php if (isset($v->icono) && $v->icono !== ''): ?>
                                                            <?php
                                                            $data['img'] = base_url('assets/public/img/servicios/' . $v->icono);
                                                            $data['name'] = $v->icono;
                                                            $data['hname'] = 'servicio' . $i . '_icono';
                                                            $data['classAdd'] = 'conteo';
                                                            $data['propertyAdd'] = ' data-conteovalin="servicio" data-conteovalfin="_icono" data-conteoval="name"';
                                                            ?>
                                                            <?= $this->include('admin/plantillas/img_block') ?>
                                                        <?php else: ?>
                                                            <?php $data_servicio_icono['name'] = 'servicio' . $i . '_icono'; ?>
                                                            <?= form_upload($data_servicio_icono) ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="servicio_titulo">
                                                    <label>Título del Servicio:</label>
                                                    <?php
                                                    $data_servicio_titulo['name'] = 'servicios[servicio][' . $i . '][titulo]';
                                                    $data_servicio_titulo['value'] = $v->titulo ?? '';
                                                    ?>
                                                    <?= form_input($data_servicio_titulo) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PORTAFOLIOS -->
    <div id="portafolios" class="row"><br/>
        <div class="card stacked-form col-md-12">
            <div class="card-header block">
                <h5 class="tituloBlock">Portafolio:</h5>
                <hr class="colorgraph">
            </div>
            <div class="valueBox">
                <label>Título general de la sección:</label>
                <?= form_input($data_portafolio_tituloGeneral) ?>
                <label>Texto del botón para ver más:</label>
                <?= form_input($data_portafolio_textoBtn) ?>
                <div class="boxRepeat">
                    <div class="boxMainClone">Agregar un portafolio: <div id="portafolios_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
                    <div class="boxDrag">
                        <?php if (isset($portafolioDB->portafolios) && !empty($portafolioDB->portafolios)): ?>
                            <?php foreach ($portafolioDB->portafolios as $i => $v): ?>
                                <div class="registro">
                                    <div class="boxShow">
                                        <div class="valHead">
                                            <h5>Portafolio <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?= ($i + 1) . ' - ' . esc($v->nombre) ?></span></h5>
                                            <div class="controlCloneRegistro">
                                                <div class="clone menos"><i class="far fa-trash-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="boxHide">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="portafolio_imagen">
                                                    <label>Imagen:</label>
                                                    <div class="cleanBox" data-clonetype="imagen">
                                                        <?php if (isset($v->imagen) && $v->imagen !== ''): ?>
                                                            <?php
                                                            $data['img'] = base_url('assets/public/img/portafolios/' . $v->imagen);
                                                            $data['name'] = $v->imagen;
                                                            $data['hname'] = 'portafolio' . $i . '_imagen';
                                                            $data['classAdd'] = 'conteo';
                                                            $data['propertyAdd'] = ' data-conteovalin="portafolio" data-conteovalfin="_imagen" data-conteoval="name"';
                                                            ?>
                                                            <?= $this->include('admin/plantillas/img_block') ?>
                                                        <?php else: ?>
                                                            <?php $data_portafolio_imagen['name'] = 'portafolio' . $i . '_imagen'; ?>
                                                            <?= form_upload($data_portafolio_imagen) ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="portafolio_nombre">
                                                    <label>Nombre de Portafolio:</label>
                                                    <?php
                                                    $data_portafolio_nombre['name'] = 'portafolios[portafolio][' . $i . '][nombre]';
                                                    $data_portafolio_nombre['value'] = $v->nombre ?? '';
                                                    ?>
                                                    <?= form_input($data_portafolio_nombre) ?>
                                                </div>
                                                <div class="portafolio_enlace">
                                                    <label>Enlace al portafolio completo:</label>
                                                    <?php
                                                    $data_portafolio_link['name'] = 'portafolios[portafolio][' . $i . '][enlace]';
                                                    $data_portafolio_link['value'] = $v->enlace ?? '';
                                                    ?>
                                                    <?= form_input($data_portafolio_link) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CLIENTES -->
    <div id="clientes" class="row"><br/>
        <div class="card stacked-form col-md-12">
            <div class="card-header block">
                <h5 class="tituloBlock">Clientes:</h5>
                <hr class="colorgraph">
            </div>
            <div class="valueBox">
                <label>Título de la sección:</label>
                <?= form_input($data_cliente_titulo_general) ?>
                <div class="boxRepeat">
                    <div class="boxMainClone">Agregar un cliente: <div id="clientes_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
                    <div class="boxDrag">
                        <?php if (isset($clientesDB->logos) && !empty($clientesDB->logos)): ?>
                            <?php foreach ($clientesDB->logos as $i => $v): ?>
                                <div class="registro">
                                    <input type="hidden" name="clientes[logos][<?= $i ?>]" class="conteo" data-conteovalin="clientes[logos][" data-conteovalfin="]" data-conteoval="name">
                                    <label>logo: <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?= $i + 1 ?></span></label>
                                    <div class="controlCloneRegistro">
                                        <div class="clone menos"><i class="far fa-trash-alt"></i></div>
                                    </div>
                                    <div class="cleanBox" data-clonetype="logoIMG">
                                        <?php
                                        $data['img'] = base_url('assets/public/img/clientes/' . $v->logo);
                                        $data['name'] = $v->logo;
                                        $data['hname'] = 'cliente' . $i . '_logo';
                                        $data['classAdd'] = 'conteo';
                                        $data['propertyAdd'] = ' data-conteovalin="cliente" data-conteovalfin="_logo" data-conteoval="name"';
                                        ?>
                                        <?= $this->include('admin/plantillas/img_block') ?>
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