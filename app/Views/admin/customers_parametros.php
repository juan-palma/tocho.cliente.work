<?php

	$idaMail_data = array();
	
	//Datos para el envio del correo.
	$idaMail_data['destino_mail'] = array();
	
	$idaMail_data['cc'] = array();
	
	$idaMail_data['bcc'] = array();
	$idaMail_data['bcc'][] = 'soporte@idalibre.com';
	//$idaMail_data['bcc'][] = '';
	
	$idaMail_data['origen_nombre'] = 'Contacto - Circulo de Imagen';
	$idaMail_data['origen_mail'] = 'informes@idalibre.com';
	$idaMail_data['reply_nombre'] = 'Sistema - Circulo de Imagen';
	$idaMail_data['reply_mail'] = 'informes@idalibre.com';
	$idaMail_data['organizacion'] = 'Circulo de Imagen';
	$idaMail_data['asunto'] = 'Nuevo contacto desde sitio tochon';
	
	$idaMail_data['priority'] = 3;
	$idaMail_data['encoding'] = 'quoted-printable';
	
	$idaMail_data['host'] = 'idalibre.com';
	$idaMail_data['port'] = 465;//587
	$idaMail_data['username'] = 'soporte@idalibre.com';
	$idaMail_data['password'] = 'gimqat-4worta-sottAq';
		
	
	$idaMail_data['texto_plano'] = '
		Circulo de Imagen:
		
		Nuevo contacto.
				
		* * * * * *

		
		[ fin ]
	';
?>