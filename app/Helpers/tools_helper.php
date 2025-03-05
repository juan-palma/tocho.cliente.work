<?php
// app/Helpers/tools_helper.php

use CodeIgniter\HTTP\RedirectResponse;

if (!function_exists('uuid')) {
    /**
     * Genera una cadena de valor único irrepetible (UUID).
     *
     * @return string
     */
    function uuid()
    {
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        }

        mt_srand((double)microtime() * 10000); // Semilla para compatibilidad con versiones antiguas
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45); // "-"
        $uuid = substr($charid, 0, 8) . $hyphen
              . substr($charid, 8, 4) . $hyphen
              . substr($charid, 12, 4) . $hyphen
              . substr($charid, 16, 4) . $hyphen
              . substr($charid, 20, 12);

        return $uuid;
    }
}

if (!function_exists('readCSV')) {
    /**
     * Lee un archivo CSV y devuelve estadísticas y datos.
     *
     * @param string $filePath Ruta al archivo CSV
     * @param array  $opt      Opciones (expMatch, breakCaracter)
     * @return object
     */
    function readCSV($filePath, $opt = [])
    {
        $expMatch = $opt['expMatch'] ?? '/[\w\d]/';
        $breakCaracter = $opt['breakCaracter'] ?? "\t";

        $obj = new stdClass();
        $obj->errorObj = [];

        $row = 0;
        $numAllData = 0;
        $machData = [];
        $numMachData = 0;
        $titulosReg = [];
        $numNoMachData = 0;
        $noMachData = [];

        if ($handle = @fopen($filePath, 'r')) {
            while (($data = fgetcsv($handle, 0)) !== false) {
                $campos = (count($data) <= 1) ? explode($breakCaracter, $data[0]) : $data;

                if ($row == 0) {
                    $titulosReg = $campos;
                } else {
                    $numAllData++;
                    if (preg_match($expMatch, $data[0])) {
                        $numMachData++;
                        $machData[] = $campos;
                    } else {
                        $numNoMachData++;
                        $noMachData[] = $campos;
                        $obj->errorObj[] = "En la línea $row existen caracteres no válidos según expMatch.";
                    }
                }
                $row++;
            }
            fclose($handle);
        } else {
            $obj->errorObj[] = "No se pudo abrir el archivo CSV: $filePath.";
        }

        $obj->numReg = $numAllData;
        $obj->matchReg = $machData;
        $obj->numMatchReg = $numMachData;
        $obj->noMatchReg = $noMachData;
        $obj->numNoMatchReg = $numNoMachData;
        $obj->titulosReg = $titulosReg;

        return $obj;
    }
}

if (!function_exists('popFlash')) {
    /**
     * Genera un mensaje emergente con datos flash de sesión (SweetAlert).
     *
     * @param string $tipo  Tipo de mensaje (success, error)
     * @param array  $flash Datos flash
     * @return string       Código JS para mostrar el mensaje
     */
    function popFlash($tipo, $flash)
    {
        $linea = implode(' ', $flash);
        $titulo = ($tipo === 'success') ? 'Good job!' : 'UPS...!';
        $class = ($tipo === 'success') ? 'success' : 'warning';

        return "<script type='text/javascript'>
            console.info('" . esc($linea) . "');
            swal('" . esc($titulo) . "', '" . esc($linea) . "', '" . esc($class) . "');
        </script>";
    }
}

if (!function_exists('vcard')) {
    /**
     * Genera un archivo vCard como texto.
     *
     * @return string
     */
    function vcard()
    {
        return utf8_encode("BEGIN:VCARD
            N:Inmotion
            TEL:(55) 5393 8627
            EMAIL:info@inmotion.com.mx
            URL:https://inmotion.com.mx
            ADR:Monte Elbruz 132, Lomas de Chapultepec Miguel Hidalgo, CDMX, México
            ORG:Inmotion Communications
            NOTE:
            VERSION:3.0
            END:VCARD");
    }
}

if (!function_exists('idaConvertText')) {
    /**
     * Convierte texto según el modo especificado.
     *
     * @param string $modo Modo de conversión (ej. 'primera_mayuscula')
     * @param string $text Texto a convertir
     * @return string
     */
    function idaConvertText($modo, $text)
    {
        if ($modo === 'primera_mayuscula') {
            preg_match('/^\w{1}/u', $text, $match);
            return preg_replace('/^\w{1}/u', mb_convert_case($match[0], MB_CASE_UPPER, 'UTF-8'), $text);
        }
        return $text; // Devolver texto sin cambios si el modo no coincide
    }
}