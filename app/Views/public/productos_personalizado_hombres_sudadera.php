<?php
// Procesamiento de datos de prenda
$prenda = new stdClass();

// Cortes
$prenda->corte = isset($baseDB->tipo_corte) ? array_map('trim', explode(',', $baseDB->tipo_corte)) : [];

// Estampados (frente)
$prenda->estampados = [];
if (isset($estampadosDB->portada)) {
    foreach ($estampadosDB->portada->clone as $i => $v) {
        $estampado = new stdClass();
        $estampado->titulo = $v->estampado_name ?? '';
        $val = $estampadosDB->imgs->portada[$i] ?? '';
        $estampado->portada = $val ? base_url("assets/public/img/{$genero}/{$valorA}/frente/estampado/{$val}") : '';

        $estampado->modelos = [];
        for ($im = 1; $im <= 4; $im++) {
            $fotoName = "model{$im}";
            $val = $estampadosDB->imgs->$fotoName[$i] ?? '';
            if ($val) {
                $modelo = new stdClass();
                $modelo->titulo = "Modelo {$im}";
                $modelo->imagen = base_url("assets/public/img/{$genero}/{$valorA}/frente/estampado/{$val}");
                $estampado->modelos[] = $modelo;
            }
        }
        $prenda->estampados[] = $estampado;
    }
}

// Estampados (lateral)
$prenda->estampados_lateral = [];
if (isset($lateral_estampadosDB->model1p_lateral)) {
    foreach ($lateral_estampadosDB->model1p_lateral->clone as $i => $v) {
        $estampado = new stdClass();
        $estampado->modelosP = [];
        for ($im = 1; $im <= 4; $im++) {
            $fotoName = "model{$im}p_lateral";
            $val = $lateral_estampadosDB->imgs->$fotoName[$i] ?? '';
            if ($val) {
                $modeloP = new stdClass();
                $modeloP->titulo = "Prenda del Modelo {$im}";
                $modeloP->imagen = base_url("assets/public/img/{$genero}/{$valorA}/lateral/estampado/{$val}");
                $estampado->modelosP[] = $modeloP;
            }
        }
        $prenda->estampados_lateral[] = $estampado;
    }
}

// Estampados (espalda)
$prenda->estampados_espalda = [];
if (isset($espalda_estampadosDB->model1p_espalda)) {
    foreach ($espalda_estampadosDB->model1p_espalda->clone as $i => $v) {
        $estampado = new stdClass();
        $estampado->modelosP = [];
        for ($im = 1; $im <= 4; $im++) {
            $fotoName = "model{$im}p_espalda";
            $val = $espalda_estampadosDB->imgs->$fotoName[$i] ?? '';
            if ($val) {
                $modeloP = new stdClass();
                $modeloP->titulo = "Prenda del Modelo {$im}";
                $modeloP->imagen = base_url("assets/public/img/{$genero}/{$valorA}/espalda/estampado/{$val}");
                $estampado->modelosP[] = $modeloP;
            }
        }
        $prenda->estampados_espalda[] = $estampado;
    }
}

// Colores (frente)
$prenda->sombra = isset($colorDB->imgs->sombra) ? base_url("assets/public/img/{$genero}/{$valorA}/frente/color/{$colorDB->imgs->sombra}") : '';
$prenda->color = [];
if (isset($colorDB->prenda)) {
    foreach ($colorDB->prenda->clone as $i => $v) {
        $prendacolor = new stdClass();
        $prendacolor->nombre = $v->color_name ?? '';
        $prendacolor->color = $v->color_valor ?? '';
        $prendacolor->imagen = isset($colorDB->imgs->prenda[$i]) ? base_url("assets/public/img/{$genero}/{$valorA}/frente/color/{$colorDB->imgs->prenda[$i]}") : '';
        $prenda->color[] = $prendacolor;
    }
}

// Colores (lateral)
$prenda->sombra_lateral = isset($lateral_colorDB->imgs->sombra_lateral) ? base_url("assets/public/img/{$genero}/{$valorA}/lateral/color/{$lateral_colorDB->imgs->sombra_lateral}") : '';
$prenda->color_lateral = [];
if (isset($lateral_colorDB->prenda_lateral)) {
    foreach ($lateral_colorDB->prenda_lateral->clone as $i => $v) {
        $prendacolor = new stdClass();
        $prendacolor->nombre = $v->lateral_color_name ?? '';
        $prendacolor->imagen = isset($lateral_colorDB->imgs->prenda_lateral[$i]) ? base_url("assets/public/img/{$genero}/{$valorA}/lateral/color/{$lateral_colorDB->imgs->prenda_lateral[$i]}") : '';
        $prenda->color_lateral[] = $prendacolor;
    }
}

// Colores (espalda)
$prenda->sombra_espalda = isset($espalda_colorDB->imgs->sombra_espalda) ? base_url("assets/public/img/{$genero}/{$valorA}/espalda/color/{$espalda_colorDB->imgs->sombra_espalda}") : '';
$prenda->color_espalda = [];
if (isset($espalda_colorDB->prenda_espalda)) {
    foreach ($espalda_colorDB->prenda_espalda->clone as $i => $v) {
        $prendacolor = new stdClass();
        $prendacolor->nombre = $v->espalda_color_name ?? '';
        $prendacolor->imagen = isset($espalda_colorDB->imgs->prenda_espalda[$i]) ? base_url("assets/public/img/{$genero}/{$valorA}/espalda/color/{$espalda_colorDB->imgs->prenda_espalda[$i]}") : '';
        $prenda->color_espalda[] = $prendacolor;
    }
}

// Ubicación
$prenda->ubicacion = isset($baseDB->tipo_ubicacion) ? array_map('trim', explode(',', $baseDB->tipo_ubicacion)) : [];

// Valores estáticos
$prenda->equipo = ["Equipo 1", "Equipo 2", "Equipo 3", "Equipo 4", "Equipo 5"];
$prenda->liga = ["Liga 1", "Liga 2", "Liga 3", "Liga 4", "Liga 5"];
$prenda->tipografia = ["Arial", "serif", "Dreamwalker", "Leto"];
?>

<div id="prenda_inter_fondo" style="background-image: url(<?= base_url('assets/public/img/productos/prendas_fondo.jpg') ?>)">
    <div class="mainbox bl1 bl1pi">
        <h1><?= esc($valorA) ?></h1>
    </div>

    <div class="mainbox bl3 bl3pi">
        <div id="prendaI">
            <div id="prendaVistas">
                <div id="vistaFrente">Frente</div>
                <div id="vistaLateral">Lateral</div>
                <div id="vistaEspalda">Espalda</div>
            </div>

            <div class="boxAllEffect">
                <div id="prendaBaseColor" class="prendaSuperPuesta"></div>
                <div id="prendaEstampado" class="prendaSuperPuesta"></div>
                <div id="prendaLogo" class="prendaSuperPuesta"></div>
                <div id="prendaNumero" class="prendaSuperPuesta">
                    <div class="posCentro"><span></span></div>
                    <div class="posDerecha"><span></span></div>
                    <div class="posIzquierda"><span></span></div>
                </div>
                <div id="prendaNombre" class="prendaSuperPuesta">
                    <div class="posCentro"><span></span></div>
                    <div class="posDerecha"><span></span></div>
                    <div class="posIzquierda"><span></span></div>
                </div>
                <div id="prendaSombra">
                    <img src="<?= esc($prenda->sombra) ?>" alt="Sombra de prenda" />
                </div>
            </div>
        </div>

        <div id="prendaV">
            <div id="prendaVDinamica"></div>
            <div id="prendaVFija">
                <div class="mainBoxOptionCorte">
                    <div class="optionTitulo">Tipo de Corte</div>
                    <div class="optionBoxMainValores">
                        <?php foreach ($prenda->corte as $corte): ?>
                            <div><span class="optionValue"><?= esc($corte) ?></span></div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="mainBoxOptionColor">
                    <div class="optionTitulo">Color</div>
                    <div class="optionBoxMainValores">
                        <?php foreach ($prenda->color as $color): ?>
                            <div class="miniBoxColor" data-color="<?= esc($color->nombre) ?>">
                                <div class="circuloColor" style="background-color: <?= esc($color->color) ?>;"></div>
                                <span class="optionValue optionColor"><?= esc($color->nombre) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
				<div class="mainBoxOptionEstampado">
                    <div class="optionTitulo">Estampados</div>
                    <div class="optionBoxColValores">
                        <div id="sinEstampado">
                            <div class="prendaBoxColeccion">
                                <div class="btnPrendaColec">
                                    <div class="prendaColeccionImg" style="background-image: url(<?= base_url("assets/public/img/{$genero}/{$valorA}/frente/estampado/sinColeccion.png") ?>)"></div>
                                    <div class="prendaColeccionTitulo">Sin colección</div>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($prenda->estampados as $estampado): ?>
                            <div class="prendaBoxColeccion">
                                <div class="btnPrendaColec">
                                    <div class="prendaColeccionImg" style="background-image: url(<?= esc($estampado->portada) ?>)"></div>
                                    <div class="prendaColeccionTitulo"><?= esc($estampado->titulo) ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="valoresBoxColeccionModelos"></div>
                </div>

                <div class="mainBoxOptionCol">
                    <div class="bl bl1">
                        <div class="mainBoxOption">
                            <div class="optionTitulo">Nombre</div>
                            <div class="optionBoxMainValores">
                                <input type="text" name="nombre" />
                            </div>
                        </div>
                        <div class="mainBoxOption">
                            <div class="optionTitulo">Número</div>
                            <div class="optionBoxMainValores">
                                <input type="text" name="numero" />
                            </div>
                        </div>
                        <div class="mainBoxOption">
                            <div class="optionTitulo">Tipografía</div>
                            <div class="optionBoxMainValores">
                                <select name="tipografia">
                                    <?php foreach ($prenda->tipografia as $tipo): ?>
                                        <option value="<?= esc($tipo) ?>"><?= esc($tipo) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="bl bl1">
                        <div class="mainBoxOption">
                            <div class="optionTitulo">Logo</div>
                            <div class="optionBoxMainValores">
                                <input type="file" name="logo" />
                            </div>
                        </div>
                        <div class="mainBoxOption">
                            <div class="optionTitulo">Ubicación</div>
                            <div class="optionBoxMainValores">
                                <select name="ubicacion">
                                    <?php foreach ($prenda->ubicacion as $ubic): ?>
                                        <option value="<?= esc($ubic) ?>"><?= esc($ubic) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mainBoxOption">
                    <div class="optionBoxMainValores">
                        <select name="Equipo">
                            <?php foreach ($prenda->equipo as $equipo): ?>
                                <option value="<?= esc($equipo) ?>"><?= esc($equipo) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="optionBoxMainValores">
                        <select name="liga">
                            <?php foreach ($prenda->liga as $liga): ?>
                                <option value="<?= esc($liga) ?>"><?= esc($liga) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="optionBoxMainValores">
                        <input type="submit" value="Guardar" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var prendaSi = true;
    var genero = "<?= esc($genero) ?>";
    var area = "<?= esc($area) ?>";
    var valorA = "<?= esc($valorA) ?>";
    var prenda = <?= json_encode($prenda) ?>;
</script>