<?php
// app/Helpers/login_helper.php

use CodeIgniter\HTTP\RedirectResponse;

if (!function_exists('isLogged')) {
    /**
     * Checa si el usuario está logueado y redirige al panel si es así.
     *
     * @return RedirectResponse|null
     */
    function isLogged()
    {
        $session = session();
        if ($session->has('userID') && !empty($session->get('userID')) && 
            $session->has('finger') && !empty($session->get('finger'))) {
            return redirect()->to(base_url('admin/panel'));
        }
        return null; // No redirige si no está logueado
    }
}

if (!function_exists('isNoLogged')) {
    /**
     * Checa si el usuario no está logueado, destruye la sesión y redirige al login.
     *
     * @return RedirectResponse|null
     */
    function isNoLogged()
    {
        $session = session();
        if (!$session->has('userID') || empty($session->get('userID')) || 
            !$session->has('finger') || empty($session->get('finger'))) {
            $session->destroy();
            return 'admin/login';
        }
        return null; // No redirige si está logueado
    }
}

if (!function_exists('isNoLoggedCustom')) {
    /**
     * Verifica si el usuario está logueado para personalización.
     *
     * @return bool
     */
    function isNoLoggedCustom()
    {
        $session = session();
        return $session->has('idUser') && !empty($session->get('idUser'));
    }
}

if (!function_exists('isLoggedNoDataCustom')) {
    /**
     * Verifica si el usuario tiene datos de equipo y liga en la sesión.
     *
     * @return bool
     */
    function isLoggedNoDataCustom()
    {
        $session = session();
        return $session->has('userEquipo') && !empty($session->get('userEquipo')) && 
               $session->has('userLiga') && !empty($session->get('userLiga'));
    }
}

if (!function_exists('isNoLoggedProfile')) {
    /**
     * Checa si el usuario no tiene datos de perfil, destruye la sesión y redirige al login.
     *
     * @return RedirectResponse|null
     */
    function isNoLoggedProfile()
    {
        $session = session();
        if (!$session->has('userIDProfile') || empty($session->get('userIDProfile')) || 
            !$session->has('fingerProfile') || empty($session->get('fingerProfile'))) {
            $session->destroy();
            return redirect()->to(base_url('portafolio/login'));
        }
        return null; // No redirige si tiene datos de perfil
    }
}