<?php
// Definición de variables para reutilización
$cssPath = base_url('assets/common/css/pick-a-color.min.css');
//$cssPath = base_url('assets/common/js/librerias/tinycolor-0.9.15.min.js');
//$cssPath = base_url('assets/common/js/librerias/pick-a-color.js');

// Definición de inputs reutilizables para la sección de clones
$data_sombra_hidden = [
    'type' => 'hidden',
    'class' => 'conteo',
    'data-conteovalin' => '',
    'data-conteovalfin' => '[falso]',
    'data-conteoval' => 'name'
];
$data_upload_base = [
    'value' => '',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'placeholder' => ''
];
$data_input_clone = [
    'type' => 'hidden',
    'value' => '',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'placeholder' => '',
    'data-conteoval' => 'name'
];
$data_text_input = [
    'value' => '',
    'class' => 'validaciones vc form-control input-lg conteo',
    'autocomplete' => 'off',
    'placeholder' => '',
    'data-conteoval' => 'name'
];


$viewData = ['actual' => $actual];
?>

<?= $this->include('admin/saveControl') ?>

<link href="<?= esc($cssPath) ?>" rel="stylesheet" type="text/css">

<div class="container area_scroll" data-page="<?= esc($actual) ?>">
    <!-- Elementos para clonar en el código -->
    <div class="hiden boxClones">
        <!-- Sombra (color) -->
        <?php 
        $baseName = "color"; 
        $fotoName = "sombra";
        $data_sombra_hidden['name'] = "sectores[$baseName][imgs][$fotoName][falso]";
        $data_sombra_hidden['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName]";
        $data_upload_sombra = array_merge($data_upload_base, [
            'name' => "sectores_{$baseName}_imgs_{$fotoName}",
            'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}",
            'data-conteovalfin' => ''
        ]);
        ?>
        <div data-cloneinfo="<?= esc($fotoName) ?>">
            <?= form_input($data_sombra_hidden) ?>
            <?= form_upload($data_upload_sombra) ?>
        </div>

        <!-- Prenda (color) -->
        <?php 
        $baseName = "color"; 
        $fotoName = "prenda";
        $data_input_clone['name'] = '';
        $data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
        $data_input_clone['data-conteovalfin'] = "][decontrol]";
        ?>
        <div id="<?= esc($baseName) ?>_base" class="registro col3" data-cloneinfo="<?= esc($fotoName) ?>">
            <div class="valHead">
                <h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
                <div class="controlCloneRegistro">
                    <div class="clone menos"><i class="far fa-trash-alt"></i></div>
                </div>
                <?= form_input($data_input_clone) ?>
            </div>
            <div class="box2col">
                <?php 
                $valor = 'color_name';
                $data_text_input['name'] = '';
                $data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
                $data_text_input['data-conteovalfin'] = "][$valor]";
                ?>
                <div>
                    <label>Nombre del color:</label>
                    <?= form_input($data_text_input) ?>
                </div>
                <?php 
                $valor = 'color_valor';
                $data_text_input['data-conteovalfin'] = "][$valor]";
                ?>
                <div>
                    <label>Colocar color en Hexadecimal:</label>
                    <?= form_input($data_text_input) ?>
                </div>
            </div>
            <div class="">
                <?php 
                $data_sombra_hidden['name'] = "sectores[$baseName][imgs][$fotoName][clone][falso]";
                $data_sombra_hidden['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
                $data_upload_prenda = array_merge($data_upload_base, [
                    'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
                    'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
                    'data-conteovalfin' => ''
                ]);
                ?>
                <div class="bloque_imagen">
                    <label>Prenda del color:</label>
                    <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                        <?= form_input($data_sombra_hidden) ?>
                        <?= form_upload($data_upload_prenda) ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estampados -->
        <?php 
        $baseName = "estampados"; 
        $fotoName = "portada"; 
        $folder = "/$sexo/$nombrePrenda/frente/estampado";
        $data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
        $data_input_clone['data-conteovalfin'] = "][decontrol]";
        ?>
        <div id="<?= esc($baseName) ?>_base" class="registro col3" data-cloneinfo="<?= esc($baseName) ?>">
            <div class="valHead">
                <h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
                <div class="controlCloneRegistro">
                    <div class="clone menos"><i class="far fa-trash-alt"></i></div>
                </div>
                <?= form_input($data_input_clone) ?>
            </div>
            <?php 
            $valor = 'estampado_name';
            $data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
            $data_text_input['data-conteovalfin'] = "][$valor]";
            ?>
            <label>Nombre de la colección:</label>
            <?= form_input($data_text_input) ?>
            <div class="">
                <?php 
                $data_sombra_hidden['name'] = "sectores[$baseName][imgs][$fotoName][clone][falso]";
                $data_sombra_hidden['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
                $data_upload_portada = array_merge($data_upload_base, [
                    'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
                    'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
                    'data-conteovalfin' => ''
                ]);
                ?>
                <div class="bloque_imagen">
                    <label>Foto portada de la colección:</label>
                    <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                        <?= form_input($data_sombra_hidden) ?>
                        <?= form_upload($data_upload_portada) ?>
                    </div>
                </div>
            </div>
			
            <div>
                <h3>Modelos:</h3>
            </div>
            <div class="box4col">
                <?php 
                $fotoName = "model1";
                $data_sombra_hidden['name'] = "sectores[$baseName][imgs][$fotoName][clone][falso]";
                $data_sombra_hidden['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
                $data_upload_model = array_merge($data_upload_base, [
                    'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
                    'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
                    'data-conteovalfin' => ''
                ]);
                ?>
                <input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
                <div class="">
                    <div class="bloque_imagen">
                        <label>Imagen del modelo 1:</label>
                        <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                            <?= form_input($data_sombra_hidden) ?>
                            <?= form_upload($data_upload_model) ?>
                        </div>
                    </div>
                </div>
                <?php $fotoName = "model2"; ?>
                <input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
                <div class="">
                    <div class="bloque_imagen">
                        <label>Imagen del modelo 2:</label>
                        <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                            <?= form_input($data_sombra_hidden) ?>
                            <?= form_upload($data_upload_model) ?>
                        </div>
                    </div>
                </div>
                <?php $fotoName = "model3"; ?>
                <input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
                <div class="">
                    <div class="bloque_imagen">
                        <label>Imagen del modelo 3:</label>
                        <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                            <?= form_input($data_sombra_hidden) ?>
                            <?= form_upload($data_upload_model) ?>
                        </div>
                    </div>
                </div>
                <?php $fotoName = "model4"; ?>
                <input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
                <div class="">
                    <div class="bloque_imagen">
                        <label>Imagen del modelo 4:</label>
                        <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                            <?= form_input($data_sombra_hidden) ?>
                            <?= form_upload($data_upload_model) ?>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <h3>Prendas de modelo:</h3>
            </div>
            <div class="box4col">
                <?php $fotoName = "model1p"; ?>
                <input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
                <div class="">
                    <div class="bloque_imagen">
                        <label>Imagen prenda del modelo 1:</label>
                        <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                            <?= form_input($data_sombra_hidden) ?>
                            <?= form_upload($data_upload_model) ?>
                        </div>
                    </div>
                </div>
                <?php $fotoName = "model2p"; ?>
                <input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
                <div class="">
                    <div class="bloque_imagen">
                        <label>Imagen prenda del modelo 2:</label>
                        <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                            <?= form_input($data_sombra_hidden) ?>
                            <?= form_upload($data_upload_model) ?>
                        </div>
                    </div>
                </div>
                <?php $fotoName = "model3p"; ?>
                <input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
                <div class="">
                    <div class="bloque_imagen">
                        <label>Imagen prenda del modelo 3:</label>
                        <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                            <?= form_input($data_sombra_hidden) ?>
                            <?= form_upload($data_upload_model) ?>
                        </div>
                    </div>
                </div>
                <?php $fotoName = "model4p"; ?>
                <input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
                <div class="">
                    <div class="bloque_imagen">
                        <label>Imagen prenda del modelo 4:</label>
                        <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                            <?= form_input($data_sombra_hidden) ?>
                            <?= form_upload($data_upload_model) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clones para la vista lateral -->
        <?php 
        $baseName = "lateral_color"; 
        $fotoName = "sombra_lateral";
        $data_sombra_hidden['name'] = "sectores[$baseName][imgs][$fotoName][falso]";
        $data_sombra_hidden['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName]";
        $data_upload_sombra_lateral = array_merge($data_upload_base, [
            'name' => "sectores_{$baseName}_imgs_{$fotoName}",
            'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}",
            'data-conteovalfin' => ''
        ]);
        ?>
        <div data-cloneinfo="<?= esc($fotoName) ?>">
            <?= form_input($data_sombra_hidden) ?>
            <?= form_upload($data_upload_sombra_lateral) ?>
        </div>

        <?php 
        $fotoName = "prenda_lateral";
        $data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
        $data_input_clone['data-conteovalfin'] = "][decontrol]";
        ?>
        <div id="<?= esc($baseName) ?>_base" class="registro col3" data-cloneinfo="<?= esc($fotoName) ?>">
            <div class="valHead">
                <h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
                <div class="controlCloneRegistro">
                    <div class="clone menos"><i class="far fa-trash-alt"></i></div>
                </div>
                <?= form_input($data_input_clone) ?>
            </div>
            <div class="box2col">
                <?php 
                $valor = 'lateral_color_name';
                $data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
                $data_text_input['data-conteovalfin'] = "][$valor]";
                ?>
                <div>
                    <label>Nombre del color:</label>
                    <?= form_input($data_text_input) ?>
                </div>
            </div>
            <div class="">
                <?php 
                $data_sombra_hidden['name'] = "sectores[$baseName][imgs][$fotoName][clone][falso]";
                $data_sombra_hidden['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
                $data_upload_prenda_lateral = array_merge($data_upload_base, [
                    'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
                    'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
                    'data-conteovalfin' => ''
                ]);
                ?>
                <div class="bloque_imagen">
                    <label>Prenda del color:</label>
                    <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                        <?= form_input($data_sombra_hidden) ?>
                        <?= form_upload($data_upload_prenda_lateral) ?>
                    </div>
                </div>
            </div>
        </div>

        <?php 
        $baseName = "lateral_estampados"; 
        $fotoName = "model1p_lateral"; 
        $folder = "/$sexo/$nombrePrenda/lateral/estampado";
        $data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
        $data_input_clone['data-conteovalfin'] = "][decontrol]";
        ?>
        <div id="<?= esc($baseName) ?>_base" class="registro col3" data-cloneinfo="<?= esc($baseName) ?>">
            <div class="valHead">
                <h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
                <div class="controlCloneRegistro">
                    <div class="clone menos"><i class="far fa-trash-alt"></i></div>
                </div>
                <?= form_input($data_input_clone) ?>
            </div>
            <?php 
            $valor = 'lateral_estampado_name';
            $data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
            $data_text_input['data-conteovalfin'] = "][$valor]";
            ?>
            <label>Nombre de la colección:</label>
            <?= form_input($data_text_input) ?>
            <div>
                <h3>Prendas de modelo:</h3>
            </div>
            <div class="box4col">
                <input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
                <div class="">
                    <?php 
                    $data_sombra_hidden['name'] = "sectores[$baseName][imgs][$fotoName][clone][falso]";
                    $data_sombra_hidden['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
                    $data_upload_model_lateral = array_merge($data_upload_base, [
                        'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
                        'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
                        'data-conteovalfin' => ''
                    ]);
                    ?>
                    <div class="bloque_imagen">
                        <label>Imagen prenda del modelo 1:</label>
                        <div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
                            <?= form_input($data_sombra_hidden) ?>
                            <?= form_upload($data_upload_model_lateral) ?>
                        </div>
                    </div>
                </div>
				
				<?php
				// Definición de arrays reutilizables
				$data_hidden_base = [
					'type' => 'hidden',
					'class' => 'conteo',
					'data-conteoval' => 'name'
				];
				$data_upload_base = [
					'value' => '',
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteoval' => 'name'
				];
				$data_input_clone = [
					'type' => 'hidden',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteoval' => 'name'
				];
				$data_text_input = [
					'value' => '',
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteoval' => 'name'
				];
				?>

				<!-- Continuación de lateral_estampados -->
				<?php $baseName = "lateral_estampados"; $folder = "/$sexo/$nombrePrenda/lateral/estampado"; ?>
				<?php $fotoName = "model2p_lateral"; ?>
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<div class="">
					<?php
					$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][falso]";
					$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
					$data_hidden_base['data-conteovalfin'] = "][falso]";
					$data_upload_model = array_merge($data_upload_base, [
						'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
						'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
						'data-conteovalfin' => ''
					]);
					?>
					<div class="bloque_imagen">
						<label>Imagen prenda del modelo 2:</label>
						<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
							<?= form_input($data_hidden_base) ?>
							<?= form_upload($data_upload_model) ?>
						</div>
					</div>
				</div>

				<?php $fotoName = "model3p_lateral"; ?>
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<div class="">
					<div class="bloque_imagen">
						<label>Imagen prenda del modelo 3:</label>
						<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
							<?= form_input($data_hidden_base) ?>
							<?= form_upload($data_upload_model) ?>
						</div>
					</div>
				</div>

				<?php $fotoName = "model4p_lateral"; ?>
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<div class="">
					<div class="bloque_imagen">
						<label>Imagen prenda del modelo 4:</label>
						<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
							<?= form_input($data_hidden_base) ?>
							<?= form_upload($data_upload_model) ?>
						</div>
					</div>
				</div>
			</div> <!-- Cierre de box4col -->
		</div> <!-- Cierre de lateral_estampados -->

		<!-- Clones para la vista espalda -->
		<?php $baseName = "espalda_color"; $fotoName = "sombra_espalda"; ?>
		<div data-cloneinfo="<?= esc($fotoName) ?>">
			<?php
			$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][falso]";
			$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName]";
			$data_hidden_base['data-conteovalfin'] = "[falso]";
			$data_upload_sombra = array_merge($data_upload_base, [
				'name' => "sectores_{$baseName}_imgs_{$fotoName}",
				'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}",
				'data-conteovalfin' => ''
			]);
			?>
			<?= form_input($data_hidden_base) ?>
			<?= form_upload($data_upload_sombra) ?>
		</div>

		<?php $fotoName = "prenda_espalda"; ?>
		<div id="<?= esc($baseName) ?>_base" class="registro col3" data-cloneinfo="<?= esc($fotoName) ?>">
			<div class="valHead">
				<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<?php
				$data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
				$data_input_clone['data-conteovalfin'] = "][decontrol]";
				?>
				<?= form_input($data_input_clone) ?>
			</div>
			<div class="box2col">
				<?php
				$valor = 'espalda_color_name';
				$data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
				$data_text_input['data-conteovalfin'] = "][$valor]";
				?>
				<div>
					<label>Nombre del color:</label>
					<?= form_input($data_text_input) ?>
				</div>
			</div>
			<div class="">
				<?php
				$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][falso]";
				$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
				$data_upload_prenda = array_merge($data_upload_base, [
					'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
					'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
					'data-conteovalfin' => ''
				]);
				?>
				<div class="bloque_imagen">
					<label>Prenda del color:</label>
					<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
						<?= form_input($data_hidden_base) ?>
						<?= form_upload($data_upload_prenda) ?>
					</div>
				</div>
			</div>
		</div>

		<?php $baseName = "espalda_estampados"; $fotoName = "model1p_espalda"; $folder = "/$sexo/$nombrePrenda/espalda/estampado"; ?>
		<div id="<?= esc($baseName) ?>_base" class="registro col3" data-cloneinfo="<?= esc($baseName) ?>">
			<div class="valHead">
				<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<?php
				$data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
				$data_input_clone['data-conteovalfin'] = "][decontrol]";
				?>
				<?= form_input($data_input_clone) ?>
			</div>
			<?php
			$valor = 'espalda_estampado_name';
			$data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
			$data_text_input['data-conteovalfin'] = "][$valor]";
			?>
			<label>Nombre de la colección:</label>
			<?= form_input($data_text_input) ?>
			<div>
				<h3>Prendas de modelo:</h3>
			</div>
			<div class="box4col">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<div class="">
					<?php
					$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][falso]";
					$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
					$data_upload_model = array_merge($data_upload_base, [
						'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
						'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
						'data-conteovalfin' => ''
					]);
					?>
					<div class="bloque_imagen">
						<label>Imagen prenda del modelo 1:</label>
						<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
							<?= form_input($data_hidden_base) ?>
							<?= form_upload($data_upload_model) ?>
						</div>
					</div>
				</div>
				<?php $fotoName = "model2p_espalda"; ?>
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<div class="">
					<div class="bloque_imagen">
						<label>Imagen prenda del modelo 2:</label>
						<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
							<?= form_input($data_hidden_base) ?>
							<?= form_upload($data_upload_model) ?>
						</div>
					</div>
				</div>
				<?php $fotoName = "model3p_espalda"; ?>
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<div class="">
					<div class="bloque_imagen">
						<label>Imagen prenda del modelo 3:</label>
						<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
							<?= form_input($data_hidden_base) ?>
							<?= form_upload($data_upload_model) ?>
						</div>
					</div>
				</div>
				<?php $fotoName = "model4p_espalda"; ?>
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<div class="">
					<div class="bloque_imagen">
						<label>Imagen prenda del modelo 4:</label>
						<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen" data-cloneinfo="<?= esc($fotoName) ?>_imagen">
							<?= form_input($data_hidden_base) ?>
							<?= form_upload($data_upload_model) ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- Cierre de boxClones -->
	</div>

	<!-- Elementos visibles por el usuario -->
	<?php $vDB = @$baseDB; $baseName = "base"; ?>
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][baseName]" value="<?= esc($baseName) ?>">
	<div id="<?= esc($baseName) ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock"><?= esc(idaConvertText('primera_mayuscula', $nombrePrenda)) ?> Generales:</h5>
				<hr class="colorgraph">
			</div>
			<div class="valueBox">
				<div class="">
					<?php if (isset($vDB)): ?>
						<div class="registro col3">
							<div class="valHead"></div>
							<?php
							$valor = 'tipo_corte';
							$data_text_input['name'] = "sectores[$baseName][txts][$valor]";
							$data_text_input['value'] = $vDB->$valor ?? '';
							$data_text_input['class'] = 'validaciones vc form-control input-lg';
							$data_text_input['data-conteovalin'] = "sectores[$baseName][txts]";
							$data_text_input['data-conteovalfin'] = "[$valor]";
							?>
							<label>Tipo de corte:</label>
							<?= form_input($data_text_input) ?>

							<?php
							$valor = 'tipo_ubicacion';
							$data_text_input['name'] = "sectores[$baseName][txts][$valor]";
							$data_text_input['value'] = $vDB->$valor ?? '';
							$data_text_input['data-conteovalfin'] = "[$valor]";
							?>
							<label>Ubicación:</label>
							<?= form_input($data_text_input) ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php $vDB = @$colorDB; $baseName = "color"; $fotoName = "sombra"; $folder = "/$sexo/$nombrePrenda/frente/color"; ?>
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][baseName]" value="<?= esc($baseName) ?>">
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgIndex]" value="prenda,sombra">
	<div id="<?= esc($baseName) ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Frente <?= esc(idaConvertText('primera_mayuscula', $nombrePrenda)) ?> Color:</h5>
				<hr class="colorgraph">
			</div>
			<div class="valueBox"><div>
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][max]" value="1024">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][overwrite]" value="true">
				<div class="boxRepeat activeCol">
					<div class="prendaSombra">
						<?php
						$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][falso]";
						$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName]";
						$data_hidden_base['data-conteovalfin'] = "[falso]";
						$data_upload_sombra = array_merge($data_upload_base, [
							'name' => "sectores_{$baseName}_imgs_{$fotoName}",
							'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}",
							'data-conteovalfin' => ''
						]);
						?>
						<div class="bloque_imagen">
							<label>Sombra de prenda:</label>
							<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>">
								<?php
								if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
									$v = is_string($vDB->imgs->$fotoName) && $vDB->imgs->$fotoName !== "" ? $vDB->imgs->$fotoName : 
										(is_array($vDB->imgs->$fotoName) && count($vDB->imgs->$fotoName) > 0 ? $vDB->imgs->$fotoName[0] : "");
									if ($v !== "") {
										$data = [
											'img' => base_url("assets/public/img{$folder}/{$v}"),
											'name' => $v,
											'hname' => "sectores[$baseName][imgs][$fotoName][name]",
											'classAdd' => 'conteo',
											'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
										];
										echo view('admin/plantillas/img_block', $data);
									} else {
										echo form_input($data_hidden_base);
										echo form_upload($data_upload_sombra);
									}
								} else {
									echo form_input($data_hidden_base);
									echo form_upload($data_upload_sombra);
								}
								?>
							</div>
						</div>
					</div>
					<div class="boxMainClone gridPanel">Agregar un color de prenda: <div id="<?= esc($baseName) ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<?php $fotoName = "prenda"; ?>
					<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
					<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][max]" value="1024">
					<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][overwrite]" value="true">
					<?php if (isset($vDB) && property_exists($vDB, $fotoName)): ?>
						<?php foreach ($vDB->$fotoName->clone as $i => $v): ?>
							<div class="registro col3">
								<div class="valHead">
									<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?= esc((int)$i + 1) ?></span></h5>
									<div class="controlCloneRegistro">
										<div class="clone menos"><i class="far fa-trash-alt"></i></div>
									</div>
									<?php
									$data_input_clone['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][decontrol]";
									$data_input_clone['value'] = $v->decontrol ?? '';
									$data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
									$data_input_clone['data-conteovalfin'] = "][decontrol]";
									?>
									<?= form_input($data_input_clone) ?>
								</div>
								<div class="box2col">
									<?php
									$valor = 'color_name';
									$data_text_input['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][$valor]";
									$data_text_input['value'] = $v->$valor ?? '';
									$data_text_input['class'] = 'validaciones vc form-control input-lg pick-a-color form-control';
									$data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
									$data_text_input['data-conteovalfin'] = "][$valor]";
									?>
									<div>
										<label>Nombre del color:</label>
										<?= form_input($data_text_input) ?>
									</div>
									<?php
									$valor = 'color_valor';
									$data_text_input['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][$valor]";
									$data_text_input['value'] = $v->$valor ?? '';
									$data_text_input['data-conteovalfin'] = "][$valor]";
									?>
									<div>
										<label>Colocar color en Hexadecimal:</label>
										<?= form_input($data_text_input) ?>
									</div>
								</div>										
										
											
								<?php
								// Arrays base reutilizables (definidos previamente, pero repetidos aquí para contexto)
								$data_hidden_base = [
									'type' => 'hidden',
									'class' => 'conteo',
									'data-conteoval' => 'name'
								];
								$data_upload_base = [
									'value' => '',
									'class' => 'validaciones vc form-control input-lg conteo',
									'autocomplete' => 'off',
									'placeholder' => '',
									'data-conteoval' => 'name'
								];
								$data_input_clone = [
									'type' => 'hidden',
									'value' => '',
									'class' => 'validaciones vc form-control input-lg conteo',
									'autocomplete' => 'off',
									'placeholder' => '',
									'data-conteoval' => 'name'
								];
								$data_text_input = [
									'value' => '',
									'class' => 'validaciones vc form-control input-lg conteo',
									'autocomplete' => 'off',
									'placeholder' => '',
									'data-conteoval' => 'name'
								];
								?>

								<!-- Continuación de la sección "color" -->
								<?php $baseName = "color"; $fotoName = "prenda"; $folder = "/$sexo/$nombrePrenda/frente/color"; ?>
								<div class="box2col">
									<?php
									$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][falso]";
									$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
									$data_hidden_base['data-conteovalfin'] = "][falso]";
									$data_upload_prenda = array_merge($data_upload_base, [
										'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone" . $i,
										'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
										'data-conteovalfin' => ''
									]);
									?>
									<div class="bloque_imagen">
										<label>Prenda del color:</label>
										<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
											<?php
											if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
												$v = "";
												if (is_object($vDB->imgs->$fotoName)) {
													$num = strval($i + 1);
													if (isset($vDB->imgs->$fotoName->$num)) {
														$v = $vDB->imgs->$fotoName->$num;
													}
												} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
													$v = $vDB->imgs->$fotoName[(int)$i];
												}
												if ($v !== "") {
													$data = [
														'img' => base_url("assets/public/img{$folder}/{$v}"),
														'name' => $v,
														'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
														'classAdd' => 'conteo',
														'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
													];
													echo view('admin/plantillas/img_block', $data);
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_prenda);
												}
											} else {
												echo form_input($data_hidden_base);
												echo form_upload($data_upload_prenda);
											}
											?>
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

	<!-- Sección de estampados -->
	<?php $vDB = @$estampadosDB; $baseName = "estampados"; $fotoName = "portada"; $folder = "/$sexo/$nombrePrenda/frente/estampado"; ?>
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][baseName]" value="<?= esc($baseName) ?>">
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgIndex]" value="portada,model1,model2,model3,model4,model1p,model2p,model3p,model4p">
	<div id="<?= esc($baseName) ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Frente Estampados:</h5>
				<hr class="colorgraph">
			</div>
			<div class="valueBox">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][max]" value="1024">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][overwrite]" value="true">
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un estampado: <div id="<?= esc($baseName) ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<?php if (isset($vDB) && property_exists($vDB, $fotoName)): ?>
						<?php foreach ($vDB->$fotoName->clone as $i => $v): ?>
							<div class="registro col3">
								<div class="valHead">
									<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?= esc((int)$i + 1) ?></span></h5>
									<div class="controlCloneRegistro">
										<div class="clone menos"><i class="far fa-trash-alt"></i></div>
									</div>
									<?php
									$data_input_clone['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][decontrol]";
									$data_input_clone['value'] = $v->decontrol ?? '';
									$data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
									$data_input_clone['data-conteovalfin'] = "][decontrol]";
									?>
									<?= form_input($data_input_clone) ?>
								</div>
								<?php
								$valor = 'estampado_name';
								$data_text_input['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][$valor]";
								$data_text_input['value'] = $v->$valor ?? '';
								$data_text_input['class'] = 'validaciones vc form-control input-lg';
								$data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
								$data_text_input['data-conteovalfin'] = "][$valor]";
								?>
								<label>Nombre de la colección:</label>
								<?= form_input($data_text_input) ?>
								<div class="">
									<?php
									$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][falso]";
									$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
									$data_hidden_base['data-conteovalfin'] = "][falso]";
									$data_upload_portada = array_merge($data_upload_base, [
										'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone" . $i,
										'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
										'data-conteovalfin' => ''
									]);
									?>
									<div class="bloque_imagen">
										<label>Foto portada para la colección:</label>
										<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
											<?php
											if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
												$vImg = "";
												if (is_object($vDB->imgs->$fotoName)) {
													$num = strval($i + 1);
													if (isset($vDB->imgs->$fotoName->$num)) {
														$vImg = $vDB->imgs->$fotoName->$num;
													}
												} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
													$vImg = $vDB->imgs->$fotoName[(int)$i];
												}
												if ($vImg !== "") {
													$data = [
														'img' => base_url("assets/public/img{$folder}/{$vImg}"),
														'name' => $vImg,
														'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
														'classAdd' => 'conteo',
														'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
													];
													echo view('admin/plantillas/img_block', $data);
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_portada);
												}
											} else {
												echo form_input($data_hidden_base);
												echo form_upload($data_upload_portada);
											}
											?>
										</div>
									</div>
								</div>
								<div>
									<h3>Modelos:</h3>
								</div>
								<div class="box4col">
									<?php $fotoName = "model1"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<?php
										$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][falso]";
										$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
										$data_upload_model = array_merge($data_upload_base, [
											'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone" . $i,
											'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
											'data-conteovalfin' => ''
										]);
										?>
										<div class="bloque_imagen">
											<label>Imagen del modelo 1:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
									<?php $fotoName = "model2"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen del modelo 2:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
									<?php $fotoName = "model3"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen del modelo 3:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
									<?php $fotoName = "model4"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen del modelo 4:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
								</div>
								<div>
									<h3>Prendas de modelo:</h3>
								</div>
								<div class="box4col">
									<?php $fotoName = "model1p"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 1:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
									<?php $fotoName = "model2p"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 2:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>									
										
									<?php
									// Arrays base reutilizables (definidos previamente, repetidos para contexto)
									$data_hidden_base = [
										'type' => 'hidden',
										'class' => 'conteo',
										'data-conteoval' => 'name'
									];
									$data_upload_base = [
										'value' => '',
										'class' => 'validaciones vc form-control input-lg conteo',
										'autocomplete' => 'off',
										'placeholder' => '',
										'data-conteoval' => 'name'
									];
									$data_input_clone = [
										'type' => 'hidden',
										'value' => '',
										'class' => 'validaciones vc form-control input-lg conteo',
										'autocomplete' => 'off',
										'placeholder' => '',
										'data-conteoval' => 'name'
									];
									$data_text_input = [
										'value' => '',
										'class' => 'validaciones vc form-control input-lg conteo',
										'autocomplete' => 'off',
										'placeholder' => '',
										'data-conteoval' => 'name'
									];
									?>

									<!-- Continuación de la sección "estampados" -->
									<?php $baseName = "estampados"; $folder = "/$sexo/$nombrePrenda/frente/estampado"; ?>
									<?php $fotoName = "model3p"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<?php
										$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][falso]";
										$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
										$data_hidden_base['data-conteovalfin'] = "][falso]";
										$data_upload_model = array_merge($data_upload_base, [
											'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone" . $i,
											'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
											'data-conteovalfin' => ''
										]);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 3:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>

									<?php $fotoName = "model4p"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 4:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
								</div> <!-- Cierre de box4col -->
							</div> <!-- Cierre de registro col3 -->
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Vista lateral: Sección de prenda -->
	<?php $vDB = @$lateral_colorDB; $baseName = "lateral_color"; $fotoName = "sombra_lateral"; $folder = "/$sexo/$nombrePrenda/lateral/color"; ?>
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][baseName]" value="<?= esc($baseName) ?>">
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgIndex]" value="prenda_lateral,sombra_lateral">
	<div id="<?= esc($baseName) ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Lateral <?= esc(idaConvertText('primera_mayuscula', $nombrePrenda)) ?> Color:</h5>
				<hr class="colorgraph">
			</div>
			<div class="valueBox"><div>
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][max]" value="1024">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][overwrite]" value="true">
				<div class="boxRepeat activeCol">
					<div class="prendaSombra">
						<?php
						$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][falso]";
						$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName]";
						$data_hidden_base['data-conteovalfin'] = "[falso]";
						$data_upload_sombra = array_merge($data_upload_base, [
							'name' => "sectores_{$baseName}_imgs_{$fotoName}",
							'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}",
							'data-conteovalfin' => ''
						]);
						?>
						<div class="bloque_imagen">
							<label>Sombra de prenda:</label>
							<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>">
								<?php
								if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
									$v = is_string($vDB->imgs->$fotoName) && $vDB->imgs->$fotoName !== "" ? $vDB->imgs->$fotoName : 
										(is_array($vDB->imgs->$fotoName) && count($vDB->imgs->$fotoName) > 0 ? $vDB->imgs->$fotoName[0] : "");
									if ($v !== "") {
										$data = [
											'img' => base_url("assets/public/img{$folder}/{$v}"),
											'name' => $v,
											'hname' => "sectores[$baseName][imgs][$fotoName][name]",
											'classAdd' => 'conteo',
											'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
										];
										echo view('admin/plantillas/img_block', $data);
									} else {
										echo form_input($data_hidden_base);
										echo form_upload($data_upload_sombra);
									}
								} else {
									echo form_input($data_hidden_base);
									echo form_upload($data_upload_sombra);
								}
								?>
							</div>
						</div>
					</div>
					<div class="boxMainClone gridPanel">Agregar un color de prenda: <div id="<?= esc($baseName) ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<?php $fotoName = "prenda_lateral"; ?>
					<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
					<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][max]" value="1024">
					<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][overwrite]" value="true">
					<?php if (isset($vDB) && property_exists($vDB, $fotoName)): ?>
						<?php foreach ($vDB->$fotoName->clone as $i => $v): ?>
							<div class="registro col3">
								<div class="valHead">
									<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?= esc((int)$i + 1) ?></span></h5>
									<div class="controlCloneRegistro">
										<div class="clone menos"><i class="far fa-trash-alt"></i></div>
									</div>
									<?php
									$data_input_clone['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][decontrol]";
									$data_input_clone['value'] = $v->decontrol ?? '';
									$data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
									$data_input_clone['data-conteovalfin'] = "][decontrol]";
									?>
									<?= form_input($data_input_clone) ?>
								</div>
								<div class="box2col">
									<?php
									$valor = 'lateral_color_name';
									$data_text_input['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][$valor]";
									$data_text_input['value'] = $v->$valor ?? '';
									$data_text_input['class'] = 'validaciones vc form-control input-lg pick-a-color form-control';
									$data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
									$data_text_input['data-conteovalfin'] = "][$valor]";
									?>
									<div>
										<label>Nombre del color:</label>
										<?= form_input($data_text_input) ?>
									</div>
								</div>
								<div class="box2col">
									<?php
									$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][falso]";
									$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
									$data_upload_prenda = array_merge($data_upload_base, [
										'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone" . $i,
										'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
										'data-conteovalfin' => ''
									]);
									?>
									<div class="bloque_imagen">
										<label>Prenda del color:</label>
										<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
											<?php
											if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
												$vImg = "";
												if (is_object($vDB->imgs->$fotoName)) {
													$num = strval($i + 1);
													if (isset($vDB->imgs->$fotoName->$num)) {
														$vImg = $vDB->imgs->$fotoName->$num;
													}
												} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
													$vImg = $vDB->imgs->$fotoName[(int)$i];
												}
												if ($vImg !== "") {
													$data = [
														'img' => base_url("assets/public/img{$folder}/{$vImg}"),
														'name' => $vImg,
														'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
														'classAdd' => 'conteo',
														'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
													];
													echo view('admin/plantillas/img_block', $data);
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_prenda);
												}
											} else {
												echo form_input($data_hidden_base);
												echo form_upload($data_upload_prenda);
											}
											?>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div></div>
		</div>
	</div>

	<!-- Vista lateral: Sección de estampados -->
	<?php $vDB = @$lateral_estampadosDB; $baseName = "lateral_estampados"; $fotoName = "model1p_lateral"; $folder = "/$sexo/$nombrePrenda/lateral/estampado"; ?>
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][baseName]" value="<?= esc($baseName) ?>">
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgIndex]" value="model1p_lateral,model2p_lateral,model3p_lateral,model4p_lateral">
	<div id="<?= esc($baseName) ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Lateral Estampados:</h5>
				<hr class="colorgraph">
			</div>
			<div class="valueBox">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][max]" value="1024">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][overwrite]" value="true">
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un estampado: <div id="<?= esc($baseName) ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<?php if (isset($vDB) && property_exists($vDB, $fotoName)): ?>
						<?php foreach ($vDB->$fotoName->clone as $i => $v): ?>
							<div class="registro col3">
								<div class="valHead">
									<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?= esc((int)$i + 1) ?></span></h5>
									<div class="controlCloneRegistro">
										<div class="clone menos"><i class="far fa-trash-alt"></i></div>
									</div>
									<?php
									$data_input_clone['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][decontrol]";
									$data_input_clone['value'] = $v->decontrol ?? '';
									$data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
									$data_input_clone['data-conteovalfin'] = "][decontrol]";
									?>
									<?= form_input($data_input_clone) ?>
								</div>
								<?php
								$valor = 'lateral_estampado_name';
								$data_text_input['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][$valor]";
								$data_text_input['value'] = $v->$valor ?? '';
								$data_text_input['class'] = 'validaciones vc form-control input-lg';
								$data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
								$data_text_input['data-conteovalfin'] = "][$valor]";
								?>
								<label>Nombre de la colección:</label>
								<?= form_input($data_text_input) ?>
								<div>
									<h3>Prendas de modelo:</h3>
								</div>
								<div class="box4col">
									<?php $fotoName = "model1p_lateral"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<?php
										$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][falso]";
										$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
										$data_upload_model = array_merge($data_upload_base, [
											'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone" . $i,
											'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
											'data-conteovalfin' => ''
										]);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 1:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
									<?php $fotoName = "model2p_lateral"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 2:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
									<?php $fotoName = "model3p_lateral"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 3:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
									<?php $fotoName = "model4p_lateral"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 4:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
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




	<?php
	// Arrays base reutilizables (definidos previamente, repetidos para contexto)
	$data_hidden_base = [
		'type' => 'hidden',
		'class' => 'conteo',
		'data-conteoval' => 'name'
	];
	$data_upload_base = [
		'value' => '',
		'class' => 'validaciones vc form-control input-lg conteo',
		'autocomplete' => 'off',
		'placeholder' => '',
		'data-conteoval' => 'name'
	];
	$data_input_clone = [
		'type' => 'hidden',
		'value' => '',
		'class' => 'validaciones vc form-control input-lg conteo',
		'autocomplete' => 'off',
		'placeholder' => '',
		'data-conteoval' => 'name'
	];
	$data_text_input = [
		'value' => '',
		'class' => 'validaciones vc form-control input-lg conteo',
		'autocomplete' => 'off',
		'placeholder' => '',
		'data-conteoval' => 'name'
	];
	?>

	<!-- Vista espalda: Sección de prenda -->
	<?php $vDB = @$espalda_colorDB; $baseName = "espalda_color"; $fotoName = "sombra_espalda"; $folder = "/$sexo/$nombrePrenda/espalda/color"; ?>
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][baseName]" value="<?= esc($baseName) ?>">
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgIndex]" value="prenda_espalda,sombra_espalda">
	<div id="<?= esc($baseName) ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Espalda <?= esc(idaConvertText('primera_mayuscula', $nombrePrenda)) ?> Color:</h5>
				<hr class="colorgraph">
			</div>
			<div class="valueBox"><div>
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][max]" value="1024">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][overwrite]" value="true">
				<div class="boxRepeat activeCol">
					<div class="prendaSombra">
						<?php
						$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][falso]";
						$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName]";
						$data_hidden_base['data-conteovalfin'] = "[falso]";
						$data_upload_sombra = array_merge($data_upload_base, [
							'name' => "sectores_{$baseName}_imgs_{$fotoName}",
							'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}",
							'data-conteovalfin' => ''
						]);
						?>
						<div class="bloque_imagen">
							<label>Sombra de prenda:</label>
							<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>">
								<?php
								if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
									$v = is_string($vDB->imgs->$fotoName) && $vDB->imgs->$fotoName !== "" ? $vDB->imgs->$fotoName : 
										(is_array($vDB->imgs->$fotoName) && count($vDB->imgs->$fotoName) > 0 ? $vDB->imgs->$fotoName[0] : "");
									if ($v !== "") {
										$data = [
											'img' => base_url("assets/public/img{$folder}/{$v}"),
											'name' => $v,
											'hname' => "sectores[$baseName][imgs][$fotoName][name]",
											'classAdd' => 'conteo',
											'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
										];
										echo view('admin/plantillas/img_block', $data);
									} else {
										echo form_input($data_hidden_base);
										echo form_upload($data_upload_sombra);
									}
								} else {
									echo form_input($data_hidden_base);
									echo form_upload($data_upload_sombra);
								}
								?>
							</div>
						</div>
					</div>
					<div class="boxMainClone gridPanel">Agregar un color de prenda: <div id="<?= esc($baseName) ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<?php $fotoName = "prenda_espalda"; ?>
					<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
					<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][max]" value="1024">
					<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][overwrite]" value="true">
					<?php if (isset($vDB) && property_exists($vDB, $fotoName)): ?>
						<?php foreach ($vDB->$fotoName->clone as $i => $v): ?>
							<div class="registro col3">
								<div class="valHead">
									<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?= esc((int)$i + 1) ?></span></h5>
									<div class="controlCloneRegistro">
										<div class="clone menos"><i class="far fa-trash-alt"></i></div>
									</div>
									<?php
									$data_input_clone['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][decontrol]";
									$data_input_clone['value'] = $v->decontrol ?? '';
									$data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
									$data_input_clone['data-conteovalfin'] = "][decontrol]";
									?>
									<?= form_input($data_input_clone) ?>
								</div>
								<div class="box2col">
									<?php
									$valor = 'espalda_color_name';
									$data_text_input['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][$valor]";
									$data_text_input['value'] = $v->$valor ?? '';
									$data_text_input['class'] = 'validaciones vc form-control input-lg pick-a-color form-control';
									$data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
									$data_text_input['data-conteovalfin'] = "][$valor]";
									?>
									<div>
										<label>Nombre del color:</label>
										<?= form_input($data_text_input) ?>
									</div>
								</div>
								<div class="box2col">
									<?php
									$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][falso]";
									$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
									$data_hidden_base['data-conteovalfin'] = "][falso]";
									$data_upload_prenda = array_merge($data_upload_base, [
										'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone" . $i,
										'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
										'data-conteovalfin' => ''
									]);
									?>
									<div class="bloque_imagen">
										<label>Prenda del color:</label>
										<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
											<?php
											if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
												$vImg = "";
												if (is_object($vDB->imgs->$fotoName)) {
													$num = strval($i + 1);
													if (isset($vDB->imgs->$fotoName->$num)) {
														$vImg = $vDB->imgs->$fotoName->$num;
													}
												} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
													$vImg = $vDB->imgs->$fotoName[(int)$i];
												}
												if ($vImg !== "") {
													$data = [
														'img' => base_url("assets/public/img{$folder}/{$vImg}"),
														'name' => $vImg,
														'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
														'classAdd' => 'conteo',
														'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
													];
													echo view('admin/plantillas/img_block', $data);
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_prenda);
												}
											} else {
												echo form_input($data_hidden_base);
												echo form_upload($data_upload_prenda);
											}
											?>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div></div>
		</div>
	</div>

	<!-- Vista espalda: Sección de estampados -->
	<?php $vDB = @$espalda_estampadosDB; $baseName = "espalda_estampados"; $fotoName = "model1p_espalda"; $folder = "/$sexo/$nombrePrenda/espalda/estampado"; ?>
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][baseName]" value="<?= esc($baseName) ?>">
	<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgIndex]" value="model1p_espalda,model2p_espalda,model3p_espalda,model4p_espalda">
	<div id="<?= esc($baseName) ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Espalda Estampados:</h5>
				<hr class="colorgraph">
			</div>
			<div class="valueBox">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][max]" value="1024">
				<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][overwrite]" value="true">
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un estampado: <div id="<?= esc($baseName) ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<?php if (isset($vDB) && property_exists($vDB, $fotoName)): ?>
						<?php foreach ($vDB->$fotoName->clone as $i => $v): ?>
							<div class="registro col3">
								<div class="valHead">
									<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?= esc((int)$i + 1) ?></span></h5>
									<div class="controlCloneRegistro">
										<div class="clone menos"><i class="far fa-trash-alt"></i></div>
									</div>
									<?php
									$data_input_clone['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][decontrol]";
									$data_input_clone['value'] = $v->decontrol ?? '';
									$data_input_clone['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
									$data_input_clone['data-conteovalfin'] = "][decontrol]";
									?>
									<?= form_input($data_input_clone) ?>
								</div>
								<?php
								$valor = 'espalda_estampado_name';
								$data_text_input['name'] = "sectores[$baseName][txts][$fotoName][clone][" . (int)$i . "][$valor]";
								$data_text_input['value'] = $v->$valor ?? '';
								$data_text_input['class'] = 'validaciones vc form-control input-lg';
								$data_text_input['data-conteovalin'] = "sectores[$baseName][txts][$fotoName][clone][";
								$data_text_input['data-conteovalfin'] = "][$valor]";
								?>
								<label>Nombre de la colección:</label>
								<?= form_input($data_text_input) ?>
								<div>
									<h3>Prendas de modelo:</h3>
								</div>
								<div class="box4col">
									<?php $fotoName = "model1p_espalda"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<?php
										$data_hidden_base['name'] = "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][falso]";
										$data_hidden_base['data-conteovalin'] = "sectores[$baseName][imgs][$fotoName][clone][";
										$data_upload_model = array_merge($data_upload_base, [
											'name' => "sectores_{$baseName}_imgs_{$fotoName}_clone" . $i,
											'data-conteovalin' => "sectores_{$baseName}_imgs_{$fotoName}_clone",
											'data-conteovalfin' => ''
										]);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 1:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
									<?php $fotoName = "model2p_espalda"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 2:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
									<?php $fotoName = "model3p_espalda"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 3:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
											</div>
										</div>
									</div>
									<?php $fotoName = "model4p_espalda"; ?>
									<input type="hidden" name="sectores[<?= esc($baseName) ?>][imgs][<?= esc($fotoName) ?>][folder]" value="<?= esc($folder) ?>">
									<div class="">
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 4:</label>
											<div class="cleanBox" data-clonetype="<?= esc($fotoName) ?>_imagen">
												<?php
												if (property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName) && isset($vDB->imgs->$fotoName)) {
													$vImg = "";
													if (is_object($vDB->imgs->$fotoName)) {
														$num = strval($i + 1);
														if (isset($vDB->imgs->$fotoName->$num)) {
															$vImg = $vDB->imgs->$fotoName->$num;
														}
													} elseif (is_array($vDB->imgs->$fotoName) && isset($vDB->imgs->$fotoName[(int)$i])) {
														$vImg = $vDB->imgs->$fotoName[(int)$i];
													}
													if ($vImg !== "") {
														$data = [
															'img' => base_url("assets/public/img{$folder}/{$vImg}"),
															'name' => $vImg,
															'hname' => "sectores[$baseName][imgs][$fotoName][clone][" . (int)$i . "][name]",
															'classAdd' => 'conteo',
															'propertyAdd' => "data-conteovalin=\"sectores[$baseName][imgs][$fotoName][clone][\" data-conteovalfin=\"][name]\" data-conteoval=\"name\""
														];
														echo view('admin/plantillas/img_block', $data);
													} else {
														echo form_input($data_hidden_base);
														echo form_upload($data_upload_model);
													}
												} else {
													echo form_input($data_hidden_base);
													echo form_upload($data_upload_model);
												}
												?>
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
</form>