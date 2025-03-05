<?php
// app/Helpers/mail_helper.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Asegúrate de que vendor/autoload.php esté cargado globalmente en public/index.php

if (!function_exists('idaf_sendMail')) {
    /**
     * Envía un correo con formato HTML usando PHPMailer.
     *
     * @param string $template Ruta al archivo de plantilla HTML
     * @param array  $info     Información adicional (no usada actualmente)
     * @param array  $idaMail_data Configuración del correo
     * @return bool|string Verdadero si se envió, mensaje de error si falla
     */
    function idaf_sendMail($template, $info, $idaMail_data)
    {
        require $template; // Carga la plantilla HTML

        $mail = new PHPMailer(true);

        try {
            $mail->CharSet = 'UTF-8';
            $mail->Priority = $idaMail_data['Priority'] ?? 3; // Valor por defecto si no está definido
            $mail->Encoding = $idaMail_data['Encoding'] ?? 'base64';

            if (!empty($idaMail_data['Username'])) {
                $mail->isSMTP();
                $mail->Host = $idaMail_data['Host'];
                $mail->Port = $idaMail_data['Port'];
                $mail->SMTPAuth = true;
                $mail->Username = $idaMail_data['Username'];
                $mail->Password = $idaMail_data['Password'];
            }

            $mail->setFrom($idaMail_data['origen_mail'], $idaMail_data['origen_nombre']);
            $mail->addReplyTo($idaMail_data['reply_mail'], $idaMail_data['reply_nombre']);
            $mail->Subject = $idaMail_data['asunto'];

            foreach ($idaMail_data['destino_mail'] as $recipient) {
                $mail->addAddress($recipient);
            }
            foreach ($idaMail_data['bcc'] as $bcc) {
                $mail->addBCC($bcc);
            }

            $mail->isHTML(true);
            $mail->Body = $GLOBALS['ida_mail_templateHTML']; // Variable definida en la plantilla
            $mail->AltBody = $idaMail_data['texto_plano'] ?? 'Este es un mensaje en texto plano.';
            $mail->WordWrap = 0;

            return $mail->send();
        } catch (Exception $e) {
            log_message('error', "Error al enviar correo: {$mail->ErrorInfo}");
            return "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
        }
    }
}

if (!function_exists('idaf_sendMail_ical')) {
    /**
     * Envía un correo con un evento iCalendar.
     *
     * @param array $info Datos del evento
     * @return bool|string Verdadero si se envió, mensaje de error si falla
     */
    function idaf_sendMail_ical($info)
    {
        $idaMail_data = $GLOBALS['idaMail_data'] ?? []; // Usar global si está definido, o array vacío

        $mail = new PHPMailer(true);

        try {
            if (!empty($idaMail_data['Username'])) {
                $mail->isSMTP();
                $mail->Host = $idaMail_data['Host'];
                $mail->Port = $idaMail_data['Port'];
                $mail->SMTPAuth = true;
                $mail->Username = $idaMail_data['Username'];
                $mail->Password = $idaMail_data['Password'];
            }

            $mail->isHTML(true);
            $mail->setFrom($idaMail_data['origen_mail'], $idaMail_data['origen_nombre']);
            $mail->addReplyTo($idaMail_data['reply_mail'], $idaMail_data['reply_nombre']);
            foreach ($idaMail_data['destino_mail'] as $recipient) {
                $mail->addAddress($recipient);
            }
            foreach ($idaMail_data['bcc'] as $bcc) {
                $mail->addBCC($bcc);
            }
            $mail->Subject = $idaMail_data['asunto'];

            // Generar iCalendar
            $ical = "BEGIN:VCALENDAR\r\n" .
                    "PRODID:-//AMEX16DT1//AMX//ES\r\n" .
                    "VERSION:2.0\r\n" .
                    "CALSCALE:GREGORIAN\r\n" .
                    "METHOD:REQUEST\r\n" .
                    "BEGIN:VEVENT\r\n" .
                    "TRANSP:OPAQUE\r\n" .
                    "DTSTART:{$info['fechaStart']}T{$info['horaStart']}\r\n" .
                    "DTEND:{$info['fechaEnd']}T{$info['horaEnd']}\r\n" .
                    "DTSTAMP:America/Mexico_City:" . date('Ymd') . "T" . date('His') . "\r\n" .
                    "ORGANIZER;CN={$info['clNombre']}:mailto:{$info['clMail']}\r\n" .
                    "UID:20160310IDA172000EV_sistemas@amexempresas.com.mx\r\n" .
                    "ATTENDEE;CUTYPE=INDIVIDUAL;PARTSTAT=ACCEPTED;CN={$info['ejcName']}:MAILTO:{$info['ejcMail']}\r\n" .
                    "CREATED:" . date('Ymd') . "T" . date('His') . "\r\n" .
                    "DESCRIPTION:" . str_replace(["\r\n", "\n"], '\n', $info['vcalendar']) . "\r\n" .
                    "SEQUENCE:0\r\n" .
                    "STATUS:CONFIRMED\r\n" .
                    "SUMMARY:{$info['invTitulo']}\r\n" .
                    "BEGIN:VALARM\r\n" .
                    "X-WR-ALARMUID:06F15B7F-4753-43EB-82EF-BA82A55FCEB6\r\n" .
                    "UID:06F15B7F-4753-43EB-82EF-BA82A55FCEB6\r\n" .
                    "TRIGGER:-PT30M\r\n" .
                    "DESCRIPTION:Recordatorio de eventos\r\n" .
                    "ACTION:DISPLAY\r\n" .
                    "END:VALARM\r\n" .
                    "END:VEVENT\r\n" .
                    "END:VCALENDAR";

            require $info['template'];

            $mail->Body = $GLOBALS['ida_mail_templateHTML'];
            $mail->AltBody = $idaMail_data['texto_plano'] ?? 'Evento en texto plano';
            $mail->Ical = $ical;

            return $mail->send();
        } catch (Exception $e) {
            log_message('error', "Error al enviar iCalendar: {$mail->ErrorInfo}");
            return "No se pudo enviar el correo iCalendar. Error: {$mail->ErrorInfo}";
        }
    }
}

if (!function_exists('ida_sendMail')) {
    /**
     * Envía un correo con formato HTML usando PHPMailer (versión simplificada).
     *
     * @param string $template Ruta al archivo de plantilla HTML
     * @param array  $info     Información adicional (no usada actualmente)
     * @param array  $idaMail_data Configuración del correo
     * @return bool|string Verdadero si se envió, mensaje de error si falla
     */
    function ida_sendMail($template, $info, $idaMail_data)
    {
        require $template;
        $mail = new PHPMailer(true);

        try {
            $mail->CharSet = 'UTF-8';
            $mail->Priority = $idaMail_data['priority'] ?? 3;
            $mail->Encoding = $idaMail_data['encoding'] ?? 'base64';

            $mail->setFrom($idaMail_data['origen_mail'], $idaMail_data['origen_nombre']);
            $mail->addReplyTo($idaMail_data['reply_mail'], $idaMail_data['reply_nombre']);
            foreach ($idaMail_data['destino_mail'] as $recipient) {
                $mail->addAddress($recipient);
            }
            foreach ($idaMail_data['cc'] ?? [] as $cc) {
                $mail->addCC($cc);
            }
            foreach ($idaMail_data['bcc'] ?? [] as $bcc) {
                $mail->addBCC($bcc);
            }

            $mail->isHTML(true);
            $mail->Subject = $idaMail_data['asunto'];
            $mail->Body = $GLOBALS['ida_mail_templateHTML'];
            $mail->AltBody = $idaMail_data['texto_plano'] ?? 'Mensaje en texto plano';
            $mail->WordWrap = 0;

            return $mail->send();
        } catch (Exception $e) {
            log_message('error', "Error al enviar correo: {$mail->ErrorInfo}");
            return "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
        }
    }
}

if (!function_exists('ida_sendMail2')) {
    /**
     * Envía un correo específico de contacto desde el sitio web.
     *
     * @param string $template Ruta al archivo de plantilla HTML
     * @param array  $info     Información del contacto
     * @param array  $idaMail_data Configuración del correo (no usada aquí)
     * @return bool|string Verdadero si se envió, mensaje de error si falla
     */
    function ida_sendMail2($template, $info, $idaMail_data)
    {
        require $template;
        $mail = new PHPMailer(true);

        try {
            $mail->setFrom('info@inmotion.com', 'INMOTION');
            $mail->addAddress('juan.palma@me.com', 'INMOTION');
            $mail->addReplyTo('info@inmotion.com', 'INMOTION');
            $mail->addCC('monserrat@radicaltesta.com');
            $mail->addBCC('soporte@idalibre.com');

            $cuerpoTxt = "El siguiente usuario envió el siguiente mensaje:\n" .
                         "Nombre: {$info['nombre']}\n" .
                         "Correo: {$info['mail']}\n" .
                         "Teléfono: {$info['tel']}\n" .
                         "Mensaje: {$info['mensaje']}";

            $mail->isHTML(true);
            $mail->Subject = 'Nuevo contacto desde sitio web INMOTION';
            $mail->Body = $GLOBALS['ida_mail_templateHTML'];
            $mail->AltBody = $cuerpoTxt;

            return $mail->send();
        } catch (Exception $e) {
            log_message('error', "Error al enviar correo de contacto: {$mail->ErrorInfo}");
            return "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
        }
    }
}