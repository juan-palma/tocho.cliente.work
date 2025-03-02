<?php
//espacio para codigo PHP:

?>



<link href="<?php echo(base_url('assets/common/css/pick-a-color.min.css')) ?>" rel="stylesheet" type="text/css">
<!--
<script src="<?php echo(base_url('assets/common/js/librerias/tinycolor-0.9.15.min.js')) ?>"></script>
<script src="<?php echo(base_url('assets/common/js/librerias/pick-a-color.js')) ?>"></script>
-->


<div class="container area_scroll" data-page="<?php echo($actual); ?>">
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		
		
		<?php $baseName = "color"; $fotoName = "sombra"; ?>
		<div data-cloneinfo="<?php echo($fotoName); ?>">
		<?php
			$data_input_hidden  =  array ( 
				'name' => "sectores[$baseName][imgs][$fotoName][falso]",
				'type' => 'hidden',
				'class' => 'conteo',
				'data-conteovalin' => "sectores[$baseName][imgs][$fotoName]",
				'data-conteovalfin' => "[falso]",
				'data-conteoval' => "name"
			);
			$data_input =  array ( 
				'name' => "sectores_".$baseName."_imgs_".$fotoName,
				'value' => '',
				'class' => 'validaciones vc form-control input-lg conteo',
				'autocomplete' => 'off',
				'placeholder' => '',
				'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName,
				'data-conteovalfin' => "",
				'data-conteoval' => "name"
			);
		?>
		<?php
			echo form_input( $data_input_hidden );
			echo form_upload( $data_input );
		?>
		</div>


		
		<?php $baseName = "color"; $fotoName = "prenda"; ?>
		<div id="<?php echo($baseName); ?>_base" class="registro col3" data-cloneinfo="<?php echo($fotoName); ?>">
			<div class="valHead">
				<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
				<?php
					$data_input  =  array ( 
						'type' => 'hidden',
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
						'data-conteovalfin' => "][decontrol]",
						'data-conteoval' => "name"
					);
				?>
				<?php echo form_input( $data_input ); ?>
			</div>
			
			<div class="box2col">
			<?php
				$valor = 'color_name';
				$data_input  =  array ( 
					'name' => '',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<div>
				<label>Nombre del color:</label>
				<?php echo form_input( $data_input ); ?>
				</div>
			
			<?php
				$valor = 'color_valor';
				$data_input  =  array ( 
					'name' => '',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<div>
				<label>Colocar color en Hexadecimal:</label>
				<?php echo form_input( $data_input ); ?>
				</div>
			</div>
				
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Prenda del color:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
		</div>
		
		
		
		
		<?php $baseName = "estampados"; $fotoName = "portada"; $folder = "/$sexo/$nombrePrenda/frente/estampado"; ?>
		<div id="<?php echo($baseName); ?>_base" class="registro col3" data-cloneinfo="<?php echo($baseName); ?>">
			<div class="valHead">
				<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
				<?php
					$data_input  =  array ( 
						'type' => 'hidden',
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
						'data-conteovalfin' => "][decontrol]",
						'data-conteoval' => "name"
					);
				?>
				<?php echo form_input( $data_input ); ?>
			</div>
			
			<?php
				$valor = 'estampado_name';
				$data_input  =  array ( 
					'name' => '',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<label>Nombre de la colección:</label>
				<?php echo form_input( $data_input ); ?>
				
			
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Foto portada de la colección:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<div>
				<h3>Modelos:</h3>
			</div>
			<div class="box4col">
			<?php $fotoName = "model1"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen del modelo 1:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			<?php $fotoName = "model2"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen del modelo 2:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model3"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen del modelo 3:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model4"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen del modelo 4:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
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
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 1:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			<?php $fotoName = "model2p"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 2:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model3p"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 3:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model4p"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 4:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			</div>

			
		</div>
		
		
		
		
		
		
		
<!--
		------------------------------------------------------------------------
		:::  Clones para la vista lateral ::::
		------------------------------------------------------------------------
-->
		
		<?php $baseName = "lateral_color"; $fotoName = "sombra_lateral"; ?>
		<div data-cloneinfo="<?php echo($fotoName); ?>">
		<?php
			$data_input_hidden  =  array ( 
				'name' => "sectores[$baseName][imgs][$fotoName][falso]",
				'type' => 'hidden',
				'class' => 'conteo',
				'data-conteovalin' => "sectores[$baseName][imgs][$fotoName]",
				'data-conteovalfin' => "[falso]",
				'data-conteoval' => "name"
			);
			$data_input =  array ( 
				'name' => "sectores_".$baseName."_imgs_".$fotoName,
				'value' => '',
				'class' => 'validaciones vc form-control input-lg conteo',
				'autocomplete' => 'off',
				'placeholder' => '',
				'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName,
				'data-conteovalfin' => "",
				'data-conteoval' => "name"
			);
		?>
		<?php
			echo form_input( $data_input_hidden );
			echo form_upload( $data_input );
		?>
		</div>


		
		<?php $baseName = "lateral_color"; $fotoName = "prenda_lateral"; ?>
		<div id="<?php echo($baseName); ?>_base" class="registro col3" data-cloneinfo="<?php echo($fotoName); ?>">
			<div class="valHead">
				<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
				<?php
					$data_input  =  array ( 
						'type' => 'hidden',
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
						'data-conteovalfin' => "][decontrol]",
						'data-conteoval' => "name"
					);
				?>
				<?php echo form_input( $data_input ); ?>
			</div>
			
			<div class="box2col">
			<?php
				$valor = 'lateral_color_name';
				$data_input  =  array ( 
					'name' => '',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<div>
				<label>Nombre del color:</label>
				<?php echo form_input( $data_input ); ?>
				</div>
			
			</div>
				
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Prenda del color:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
		</div>
		
		
		
		
		<?php $baseName = "lateral_estampados"; $fotoName = "model1p_lateral"; $folder = "/$sexo/$nombrePrenda/lateral/estampado"; ?>
		<div id="<?php echo($baseName); ?>_base" class="registro col3" data-cloneinfo="<?php echo($baseName); ?>">
			<div class="valHead">
				<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
				<?php
					$data_input  =  array ( 
						'type' => 'hidden',
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
						'data-conteovalfin' => "][decontrol]",
						'data-conteoval' => "name"
					);
				?>
				<?php echo form_input( $data_input ); ?>
			</div>
			
			<?php
				$valor = 'lateral_estampado_name';
				$data_input  =  array ( 
					'name' => '',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<label>Nombre de la colección:</label>
				<?php echo form_input( $data_input ); ?>
							
			
			
			<div>
				<h3>Prendas de modelo:</h3>
			</div>
			<div class="box4col">
			<?php $fotoName = "model1p_lateral"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 1:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			<?php $fotoName = "model2p_lateral"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 2:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model3p_lateral"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 3:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model4p_lateral"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 4:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			</div>

			
		</div>
	
















<!--
		------------------------------------------------------------------------
		:::  Clones para la vista espalda ::::
		------------------------------------------------------------------------
-->
		
		<?php $baseName = "espalda_color"; $fotoName = "sombra_espalda"; ?>
		<div data-cloneinfo="<?php echo($fotoName); ?>">
		<?php
			$data_input_hidden  =  array ( 
				'name' => "sectores[$baseName][imgs][$fotoName][falso]",
				'type' => 'hidden',
				'class' => 'conteo',
				'data-conteovalin' => "sectores[$baseName][imgs][$fotoName]",
				'data-conteovalfin' => "[falso]",
				'data-conteoval' => "name"
			);
			$data_input =  array ( 
				'name' => "sectores_".$baseName."_imgs_".$fotoName,
				'value' => '',
				'class' => 'validaciones vc form-control input-lg conteo',
				'autocomplete' => 'off',
				'placeholder' => '',
				'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName,
				'data-conteovalfin' => "",
				'data-conteoval' => "name"
			);
		?>
		<?php
			echo form_input( $data_input_hidden );
			echo form_upload( $data_input );
		?>
		</div>


		
		<?php $baseName = "espalda_color"; $fotoName = "prenda_espalda"; ?>
		<div id="<?php echo($baseName); ?>_base" class="registro col3" data-cloneinfo="<?php echo($fotoName); ?>">
			<div class="valHead">
				<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
				<?php
					$data_input  =  array ( 
						'type' => 'hidden',
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
						'data-conteovalfin' => "][decontrol]",
						'data-conteoval' => "name"
					);
				?>
				<?php echo form_input( $data_input ); ?>
			</div>
			
			<div class="box2col">
			<?php
				$valor = 'espalda_color_name';
				$data_input  =  array ( 
					'name' => '',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<div>
				<label>Nombre del color:</label>
				<?php echo form_input( $data_input ); ?>
				</div>
			
		</div>

				
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Prenda del color:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
		</div>
		
		
		
		
		<?php $baseName = "espalda_estampados"; $fotoName = "model1p_espalda"; $folder = "/$sexo/$nombrePrenda/espalda/estampado"; ?>
		<div id="<?php echo($baseName); ?>_base" class="registro col3" data-cloneinfo="<?php echo($baseName); ?>">
			<div class="valHead">
				<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
				<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
				<?php
					$data_input  =  array ( 
						'type' => 'hidden',
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
						'data-conteovalfin' => "][decontrol]",
						'data-conteoval' => "name"
					);
				?>
				<?php echo form_input( $data_input ); ?>
			</div>
			
			<?php
				$valor = 'espalda_estampado_name';
				$data_input  =  array ( 
					'name' => '',
					'value' => '',
					'class' => 'validaciones vc form-control input-lg conteo',
					'autocomplete' => 'off',
					'placeholder' => '',
					'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
					'data-conteovalfin' => "][$valor]",
					'data-conteoval' => "name"
				);
			?>				
				<label>Nombre de la colección:</label>
				<?php echo form_input( $data_input ); ?>
							
			
			
			<div>
				<h3>Prendas de modelo:</h3>
			</div>
			<div class="box4col">
			<?php $fotoName = "model1p_espalda"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 1:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			<?php $fotoName = "model2p_espalda"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 2:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model3p_espalda"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 3:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			
			
			<?php $fotoName = "model4p_espalda"; ?>
			<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
			<div class="">
				<?php
					$data_input_hidden  =  array ( 
						'type' => 'hidden',
						'class' => 'conteo',
						'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
						'data-conteovalfin' => "][falso]",
						'data-conteoval' => "name"
					);
					$data_input =  array ( 
						'name' => '',
						'value' => '',
						'class' => 'validaciones vc form-control input-lg conteo',
						'autocomplete' => 'off',
						'placeholder' => '',
						'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
						'data-conteovalfin' => "",
						'data-conteoval' => "name"
					);
				?>
				<div class="bloque_imagen">
					<label>Imagen prenda del modelo 4:</label>
					<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen" data-cloneinfo="<?php echo($fotoName); ?>_imagen">
					<?php
					echo form_input( $data_input_hidden );
						echo form_upload( $data_input );
					?>
					</div>
				</div>
			</div>
			</div>

			
		</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
<!-- 	:::::  FIN.  cierre del div box para todos los clones	:::: -->
	</div>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

<!--
		------------------------------------------------------------------------
		:::  inicia los elementos visibles por el usuario ::::
		------------------------------------------------------------------------
-->

	
	<!-- 	Seccion de basees -->
	<?php $vDB = @$baseDB; $baseName = "base";?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock"><?php echo(idaConvertText('primera_mayuscula', $nombrePrenda)); ?> Generales:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox">
				<div class="">
					
					<?php
					if(isset($vDB)){
						?>
						<div class="registro col3">
							<div class="valHead">
							</div>
							
							<?php
								$valor = 'tipo_corte';
								$data_input  =  array ( 
									'name' => 'sectores['.$baseName.'][txts]['.$valor.']',
									'value' => @$vDB->{$valor},
									'class' => 'validaciones vc form-control input-lg',
									'autocomplete' => 'off',
									'placeholder' => '',
									'data-conteovalin' => "sectores[$baseName][txts]",
									'data-conteovalfin' => "[$valor]",
									'data-conteoval' => "name"
								);
							?>				
								<label>Tipo de corte:</label>
								<?php echo form_input( $data_input ); ?>
								
								
<!--
							<?php
								$valor = 'tipo_mangas';
								$data_input  =  array ( 
									'name' => 'sectores['.$baseName.'][txts]['.$valor.']',
									'value' => @$vDB->{$valor},
									'class' => 'validaciones vc form-control input-lg',
									'autocomplete' => 'off',
									'placeholder' => '',
									'data-conteovalin' => "sectores[$baseName][txts]",
									'data-conteovalfin' => "[$valor]",
									'data-conteoval' => "name"
								);
							?>				
								<label>Mangas:</label>
								<?php echo form_input( $data_input ); ?>
-->
								
								
								
							<?php
								$valor = 'tipo_ubicacion';
								$data_input  =  array ( 
									'name' => 'sectores['.$baseName.'][txts]['.$valor.']',
									'value' => @$vDB->{$valor},
									'class' => 'validaciones vc form-control input-lg',
									'autocomplete' => 'off',
									'placeholder' => '',
									'data-conteovalin' => "sectores[$baseName][txts]",
									'data-conteovalfin' => "[$valor]",
									'data-conteoval' => "name"
								);
							?>				
								<label>Ubicacion:</label>
								<?php echo form_input( $data_input ); ?>
								
															
						</div>
						<?php
					}
					?>
					
				</div>
				
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	<!-- 	Sección de prenda -->
	<?php $vDB = @$colorDB; $baseName = "color"; $fotoName = "sombra"; $folder = "/$sexo/$nombrePrenda/frente/color"; ?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgIndex]" value="prenda,sombra"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Frente <?php echo(idaConvertText('primera_mayuscula', $nombrePrenda)); ?> Color:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox"><div>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
				
				<div class="boxRepeat activeCol">
					<div class="prendaSombra">
						<?php $fotoName = "sombra"; ?>
						<?php
							$data_input_hidden  =  array ( 
								'name' => "sectores[$baseName][imgs][$fotoName][falso]",
								'type' => 'hidden',
								'class' => 'conteo',
								'data-conteovalin' => "sectores[$baseName][imgs][$fotoName]",
								'data-conteovalfin' => "[falso]",
								'data-conteoval' => "name"
							);
							$data_input =  array ( 
								'name' => "sectores_".$baseName."_imgs_".$fotoName,
								'value' => '',
								'class' => 'validaciones vc form-control input-lg conteo',
								'autocomplete' => 'off',
								'placeholder' => '',
								'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName,
								'data-conteovalfin' => "",
								'data-conteoval' => "name"
							);
						?>
						<div class="bloque_imagen">
							<label>Sombra de prenda:</label>
<!-- 							<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen"> -->
							<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>">
							<?php
								if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
									$v = "";
									
									if($vDB->imgs->{$fotoName} !== ""){
										$v = $vDB->imgs->{$fotoName};
									}
									if(is_array($vDB->imgs->{$fotoName})){
										if( count($vDB->imgs->{$fotoName}) > 0 ){
											$v = $vDB->imgs->{$fotoName}[0];
										} else{
											$v = "";
										}
									}
									
									if($v !== ""){
										$data = [];
										$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
										$data['name'] = $v;
										$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][name]';
										$data['classAdd'] = 'conteo';
										$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][" data-conteovalfin="][name]" data-conteoval="name"';
										$this->load->view('admin/plantillas/img_block', $data);
									} else{
										echo form_input( $data_input_hidden );
										echo form_upload( $data_input );
									}
								} else{
									echo form_input( $data_input_hidden );
									echo form_upload( $data_input );
								}
							?>
							</div>
						</div>
					</div>
					
					<div class="boxMainClone gridPanel">Agregar un color de prenda: <div id="<?php echo($baseName); ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
				
					<?php $fotoName = "prenda"; ?>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
					<?php
					if(isset($vDB)){
						if(property_exists($vDB, $fotoName)){
							foreach ($vDB->{$fotoName}->clone as $i=>$v) {
								?>
								<div class="registro col3">
									<div class="valHead">
										<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo((int)$i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
										<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
										<?php
											$data_input  =  array ( 
												'type' => 'hidden',
												'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.'][decontrol]',
												'value' => @$v->decontrol,
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
												'data-conteovalfin' => "][decontrol]",
												'data-conteoval' => "name"
											);
										?>
										<?php echo form_input( $data_input ); ?>
									</div>
									
									<div class="box2col">
									<?php
										$valor = 'color_name';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg pick-a-color form-control',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<div>
										<label>Nombre del color:</label>
										<?php echo form_input( $data_input ); ?>
										</div>
									<?php
										$valor = 'color_valor';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg pick-a-color form-control',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<div>
										<label>Colocar color en Hexadecimal:</label>
										<?php echo form_input( $data_input ); ?>
										</div>
									</div>
										
									
										
									<div class="box2col">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Prenda del color:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
								</div>
								<?php
							}
						}
					}
					?>
					
				</div>
				
			</div></div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	<!-- 	Seccion de estampado -->
	<?php $vDB = @$estampadosDB; $baseName = "estampados"; $fotoName = "portada"; $folder = "/$sexo/$nombrePrenda/frente/estampado"; ?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgIndex]" value="portada,model1,model2,model3,model4,model1p,model2p,model3p,model4p"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Frente Estampados:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox">
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un estampado: <div id="<?php echo($baseName); ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($vDB)){
						if(property_exists($vDB, $fotoName)){
							foreach ($vDB->{$fotoName}->clone as $i=>$v) {
								$fotoName = "portada";
								?>
								<div class="registro col3">
									<div class="valHead">
										<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo((int)$i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
										<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
										<?php
											$data_input  =  array ( 
												'type' => 'hidden',
												'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.'][decontrol]',
												'value' => @$v->decontrol,
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
												'data-conteovalfin' => "][decontrol]",
												'data-conteoval' => "name"
											);
										?>
										<?php echo form_input( $data_input ); ?>
									</div>
									
									<?php
										$valor = 'estampado_name';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<label>Nombre de la coleccion:</label>
										<?php echo form_input( $data_input ); ?>
										
									
									
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Foto portada para la colección:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
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
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen del modelo 1:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model2"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen del modelo 2:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model3"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen del modelo 3:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													//print_r($vDB->imgs->{$fotoName}->{$num});
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													//isset($vDB->imgs->{$fotoName}[(int)$i])
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model4"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen del modelo 4:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
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
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 1:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model2p"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 2:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model3p"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 3:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													//print_r($vDB->imgs->{$fotoName}->{$num});
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													//isset($vDB->imgs->{$fotoName}[(int)$i])
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model4p"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 4:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									</div>
									
								</div>
								<?php
							}
						}
					}
					?>
					
				</div>
				
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!--
	------------------------------------------------------------------------
	:::  vista lateral ::::
	------------------------------------------------------------------------
-->	
	
	<!-- 	Seccion de prenda -->
	<?php $vDB = @$lateral_colorDB; $baseName = "lateral_color"; $fotoName = "sombra_lateral"; $folder = "/$sexo/$nombrePrenda/lateral/color"; ?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgIndex]" value="prenda_lateral,sombra_lateral"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Lateral <?php echo(idaConvertText('primera_mayuscula', $nombrePrenda)); ?> Color:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox"><div>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
				
				<div class="boxRepeat activeCol">
					<div class="prendaSombra">
						<?php $fotoName = "sombra_lateral"; ?>
						<?php
							$data_input_hidden  =  array ( 
								'name' => "sectores[$baseName][imgs][$fotoName][falso]",
								'type' => 'hidden',
								'class' => 'conteo',
								'data-conteovalin' => "sectores[$baseName][imgs][$fotoName]",
								'data-conteovalfin' => "[falso]",
								'data-conteoval' => "name"
							);
							$data_input =  array ( 
								'name' => "sectores_".$baseName."_imgs_".$fotoName,
								'value' => '',
								'class' => 'validaciones vc form-control input-lg conteo',
								'autocomplete' => 'off',
								'placeholder' => '',
								'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName,
								'data-conteovalfin' => "",
								'data-conteoval' => "name"
							);
						?>
						<div class="bloque_imagen">
							<label>Sombra de prenda:</label>
<!-- 							<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen"> -->
							<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>">
							<?php
								if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
									$v = "";
									
									if($vDB->imgs->{$fotoName} !== ""){
										$v = $vDB->imgs->{$fotoName};
									}
									if(is_array($vDB->imgs->{$fotoName})){
										if( count($vDB->imgs->{$fotoName}) > 0 ){
											$v = $vDB->imgs->{$fotoName}[0];
										} else{
											$v = "";
										}
									}
									
									if($v !== ""){
										$data = [];
										$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
										$data['name'] = $v;
										$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][name]';
										$data['classAdd'] = 'conteo';
										$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][" data-conteovalfin="][name]" data-conteoval="name"';
										$this->load->view('admin/plantillas/img_block', $data);
									} else{
										echo form_input( $data_input_hidden );
										echo form_upload( $data_input );
									}
								} else{
									echo form_input( $data_input_hidden );
									echo form_upload( $data_input );
								}
							?>
							</div>
						</div>
					</div>
					
					<div class="boxMainClone gridPanel">Agregar un color de prenda: <div id="<?php echo($baseName); ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
				
					<?php $fotoName = "prenda_lateral"; ?>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
					<?php
					if(isset($vDB)){
						if(property_exists($vDB, $fotoName)){
							foreach ($vDB->{$fotoName}->clone as $i=>$v) {
								?>
								<div class="registro col3">
									<div class="valHead">
										<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo((int)$i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
										<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
										<?php
											$data_input  =  array ( 
												'type' => 'hidden',
												'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.'][decontrol]',
												'value' => @$v->decontrol,
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
												'data-conteovalfin' => "][decontrol]",
												'data-conteoval' => "name"
											);
										?>
										<?php echo form_input( $data_input ); ?>
									</div>
									
									<div class="box2col">
									<?php
										$valor = 'lateral_color_name';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg pick-a-color form-control',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<div>
										<label>Nombre del color:</label>
										<?php echo form_input( $data_input ); ?>
										</div>
										
									</div>

										
									
										
									<div class="box2col">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Prenda del color:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
								</div>
								<?php
							}
						}
					}
					?>
					
				</div>
				
			</div></div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	<!-- 	Seccion de estampdos -->
	<?php $vDB = @$lateral_estampadosDB; $baseName = "lateral_estampados"; $fotoName = "model1p_lateral"; $folder = "/$sexo/$nombrePrenda/lateral/estampado"; ?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgIndex]" value="model1p_lateral,model2p_lateral,model3p_lateral,model4p_lateral"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Lateral Estampados:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox">
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un estampado: <div id="<?php echo($baseName); ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($vDB)){
						if(property_exists($vDB, $fotoName)){
							foreach ($vDB->{$fotoName}->clone as $i=>$v) {
								$fotoName = "model1p_lateral";
								?>
								<div class="registro col3">
									<div class="valHead">
										<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo((int)$i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
										<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
										<?php
											$data_input  =  array ( 
												'type' => 'hidden',
												'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.'][decontrol]',
												'value' => @$v->decontrol,
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
												'data-conteovalfin' => "][decontrol]",
												'data-conteoval' => "name"
											);
										?>
										<?php echo form_input( $data_input ); ?>
									</div>
									
									<?php
										$valor = 'lateral_estampado_name';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<label>Nombre de la coleccion:</label>
										<?php echo form_input( $data_input ); ?>
										
									
									
									
									<div>
										<h3>Prendas de modelo:</h3>
									</div>
									<div class="box4col">
										
									<?php $fotoName = "model1p_lateral"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 1:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model2p_lateral"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 2:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model3p_lateral"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 3:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													//print_r($vDB->imgs->{$fotoName}->{$num});
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													//isset($vDB->imgs->{$fotoName}[(int)$i])
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model4p_lateral"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 4:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									</div>
									
								</div>
								<?php
							}
						}
					}
					?>
					
				</div>
				
			</div>
		</div>
	</div>
	





















<!--
	------------------------------------------------------------------------
	:::  vista ESPALDA ::::
	------------------------------------------------------------------------
-->	
	
	<!-- 	Seccion de prenda -->
	<?php $vDB = @$espalda_colorDB; $baseName = "espalda_color"; $fotoName = "sombra_espalda"; $folder = "/$sexo/$nombrePrenda/espalda/color"; ?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgIndex]" value="prenda_espalda,sombra_espalda"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Espalda <?php echo(idaConvertText('primera_mayuscula', $nombrePrenda)); ?> Color:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox"><div>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
				
				<div class="boxRepeat activeCol">
					<div class="prendaSombra">
						<?php $fotoName = "sombra_espalda"; ?>
						<?php
							$data_input_hidden  =  array ( 
								'name' => "sectores[$baseName][imgs][$fotoName][falso]",
								'type' => 'hidden',
								'class' => 'conteo',
								'data-conteovalin' => "sectores[$baseName][imgs][$fotoName]",
								'data-conteovalfin' => "[falso]",
								'data-conteoval' => "name"
							);
							$data_input =  array ( 
								'name' => "sectores_".$baseName."_imgs_".$fotoName,
								'value' => '',
								'class' => 'validaciones vc form-control input-lg conteo',
								'autocomplete' => 'off',
								'placeholder' => '',
								'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName,
								'data-conteovalfin' => "",
								'data-conteoval' => "name"
							);
						?>
						<div class="bloque_imagen">
							<label>Sombra de prenda:</label>
<!-- 							<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen"> -->
							<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>">
							<?php
								if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
									$v = "";
									
									if($vDB->imgs->{$fotoName} !== ""){
										$v = $vDB->imgs->{$fotoName};
									}
									if(is_array($vDB->imgs->{$fotoName})){
										if( count($vDB->imgs->{$fotoName}) > 0 ){
											$v = $vDB->imgs->{$fotoName}[0];
										} else{
											$v = "";
										}
									}
									
									if($v !== ""){
										$data = [];
										$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
										$data['name'] = $v;
										$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][name]';
										$data['classAdd'] = 'conteo';
										$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][" data-conteovalfin="][name]" data-conteoval="name"';
										$this->load->view('admin/plantillas/img_block', $data);
									} else{
										echo form_input( $data_input_hidden );
										echo form_upload( $data_input );
									}
								} else{
									echo form_input( $data_input_hidden );
									echo form_upload( $data_input );
								}
							?>
							</div>
						</div>
					</div>
					
					<div class="boxMainClone gridPanel">Agregar un color de prenda: <div id="<?php echo($baseName); ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
				
					<?php $fotoName = "prenda_espalda"; ?>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
					<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
					<?php
					if(isset($vDB)){
						if(property_exists($vDB, $fotoName)){
							foreach ($vDB->{$fotoName}->clone as $i=>$v) {
								?>
								<div class="registro col3">
									<div class="valHead">
										<h5>Color <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo((int)$i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
										<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
										<?php
											$data_input  =  array ( 
												'type' => 'hidden',
												'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.'][decontrol]',
												'value' => @$v->decontrol,
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
												'data-conteovalfin' => "][decontrol]",
												'data-conteoval' => "name"
											);
										?>
										<?php echo form_input( $data_input ); ?>
									</div>
									
									<div class="box2col">
									<?php
										$valor = 'espalda_color_name';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg pick-a-color form-control',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<div>
										<label>Nombre del color:</label>
										<?php echo form_input( $data_input ); ?>
										</div>
										
									</div>

										
									
										
									<div class="box2col">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Prenda del color:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
								</div>
								<?php
							}
						}
					}
					?>
					
				</div>
				
			</div></div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	<!-- 	Seccion de estampados -->
	<?php $vDB = @$espalda_estampadosDB; $baseName = "espalda_estampados"; $fotoName = "model1p_espalda"; $folder = "/$sexo/$nombrePrenda/espalda/estampado"; ?>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][baseName]" value="<?php echo($baseName); ?>"></input>
	<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgIndex]" value="model1p_espalda,model2p_espalda,model3p_espalda,model4p_espalda"></input>
	
	<div id="<?php echo($baseName); ?>" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Espalda Estampados:</h5>
				<hr class="colorgraph">
			</div>
			
			
			<div class="valueBox">
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][max]" value="1024"></input>
				<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][overwrite]" value="true"></input>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un estampado: <div id="<?php echo($baseName); ?>_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($vDB)){
						if(property_exists($vDB, $fotoName)){
							foreach ($vDB->{$fotoName}->clone as $i=>$v) {
								$fotoName = "model1p_espalda";
								?>
								<div class="registro col3">
									<div class="valHead">
										<h5>Estampado <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo((int)$i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
										<!-- Este registro es solo de control por si el bloque de clone solo fuera de imágenes y no contuviera texto para crear la división. -->
										<?php
											$data_input  =  array ( 
												'type' => 'hidden',
												'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.'][decontrol]',
												'value' => @$v->decontrol,
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
												'data-conteovalfin' => "][decontrol]",
												'data-conteoval' => "name"
											);
										?>
										<?php echo form_input( $data_input ); ?>
									</div>
									
									<?php
										$valor = 'espalda_estampado_name';
										$data_input  =  array ( 
											'name' => 'sectores['.$baseName.'][txts]['.$fotoName.'][clone]['.(int)$i.']['.$valor.']',
											'value' => @$v->{$valor},
											'class' => 'validaciones vc form-control input-lg',
											'autocomplete' => 'off',
											'placeholder' => '',
											'data-conteovalin' => "sectores[$baseName][txts][$fotoName][clone][",
											'data-conteovalfin' => "][$valor]",
											'data-conteoval' => "name"
										);
									?>				
										<label>Nombre de la coleccion:</label>
										<?php echo form_input( $data_input ); ?>
										
									
																		
									
									<div>
										<h3>Prendas de modelo:</h3>
									</div>
									<div class="box4col">
										
									<?php $fotoName = "model1p_espalda"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 1:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model2p_espalda"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 2:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model3p_espalda"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 3:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													//print_r($vDB->imgs->{$fotoName}->{$num});
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													//isset($vDB->imgs->{$fotoName}[(int)$i])
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									
									
									<?php $fotoName = "model4p_espalda"; ?>
									<input type="hidden" name="sectores[<?php echo($baseName); ?>][imgs][<?php echo($fotoName); ?>][folder]" value="<?php echo($folder); ?>"></input>
									<div class="">
										<?php
											$data_input_hidden  =  array ( 
												'name' => "sectores[$baseName][imgs][$fotoName][clone][".(int)$i."][falso]",
												'type' => 'hidden',
												'class' => 'conteo',
												'data-conteovalin' => "sectores[$baseName][imgs][$fotoName][clone][",
												'data-conteovalfin' => "][falso]",
												'data-conteoval' => "name"
											);
											$data_input =  array ( 
												'name' => "sectores_".$baseName."_imgs_".$fotoName."_clone".$i,
												'value' => '',
												'class' => 'validaciones vc form-control input-lg conteo',
												'autocomplete' => 'off',
												'placeholder' => '',
												'data-conteovalin' => "sectores_".$baseName."_imgs_".$fotoName."_clone",
												'data-conteovalfin' => "",
												'data-conteoval' => "name"
											);
										?>
										<div class="bloque_imagen">
											<label>Imagen prenda del modelo 4:</label>
											<div class="cleanBox" data-clonetype="<?php echo($fotoName); ?>_imagen">
											<?php
												if(property_exists($vDB, "imgs") && property_exists($vDB->imgs, $fotoName)  && isset($vDB->imgs->{$fotoName})){
													$v = "";
													if(is_object($vDB->imgs->{$fotoName})){
														$num = strval($i+1);
														if(isset($vDB->imgs->{$fotoName}->{$num})){
															$v = $vDB->imgs->{$fotoName}->{$num};
														}
													}
													if(is_array($vDB->imgs->{$fotoName})){
														if(isset($vDB->imgs->{$fotoName}[(int)$i])){
															$v = $vDB->imgs->{$fotoName}[(int)$i];
														}
													}
													if($v !== ""){
														$data = [];
														$data['img'] = base_url('assets/public/img'.$folder.'/'.$v);
														$data['name'] = $v;
														$data['hname'] = 'sectores['.$baseName.'][imgs]['.$fotoName.'][clone]['.(int)$i.'][name]';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = 'data-conteovalin="sectores['.$baseName.'][imgs]['.$fotoName.'][clone][" data-conteovalfin="][name]" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														echo form_input( $data_input_hidden );
														echo form_upload( $data_input );
													}
												} else{
													echo form_input( $data_input_hidden );
													echo form_upload( $data_input );
												}
											?>
											</div>
										</div>
									</div>
									</div>
									
								</div>
								<?php
							}
						}
					}
					?>
					
				</div>
				
			</div>
		</div>
	</div>






	

</form>