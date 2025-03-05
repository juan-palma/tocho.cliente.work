<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($titulo) ?> | IDA Sistema ADMIN</title>
    <meta name="description" content="IDA Sistema ADMIN | Sistema de administración, control y seguimiento de la información">
    <meta name="dcterms.audience" content="Global">
    <meta name="rating" content="General">

    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Anton&family=Fjalla+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="<?= base_url('assets/common/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/admin/css/light-bootstrap-dashboard.css?v=2.0.1') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/admin/css/main.css') ?>" rel="stylesheet">

    <meta name="msvalidate.01" content="ED387E3F99B5758EB607324E9928F951">
    <meta name="p:domain_verify" content="92115dc4d60becb13618274218b951f2">

    <style>
        <?php if (!empty($fondo)): ?>
            .theme-sistem {
                background-image: url(<?= esc(base_url('assets/admin/img/loginBackground/' . $fondo)) ?>);
            }
        <?php endif; ?>
    </style>

    <?php if (!empty($actual)): ?>
        <script>
            var pageActual = '<?= esc($actual) ?>';
            var baseDir = '<?= esc(base_url()) ?>';
        </script>
    <?php endif; ?>
</head>
<body itemscope="itemscope" itemtype="http://schema.org/WebPage" class="deep-space" data-theme="deep-space">
    <main id="<?= esc($actual ?? '') ?>" class="primaryContainer">
        <div class="wrapper">
            <div class="sidebar" data-color="black" data-image="<?= esc(base_url('assets/common/img/sideBack.jpg')) ?>">
                <div class="sidebar-wrapper">
                    <div class="branding">
                        <div class="sistemLogo">
                            <?php $img = !empty($adminLogo) ? 'assets/admin/img/' . $adminLogo : 'assets/admin/img/adminLogoBase.png'; ?>
                            <img src="<?= esc(base_url($img)) ?>" alt="Logo">
                        </div>
                    </div>
                    <div class="logo">
                        <a href="#" class="simple-text logo-mini">CMS</a>
                        <a href="#" class="simple-text logo-normal">Panel Control</a>
                    </div>
                    <div class="user">
                        <div class="photo">
                            <?php $img = !empty($userAvatar) ? 'assets/admin/img/' . $userAvatar : 'assets/admin/img/avatar_default.svg'; ?>
                            <img src="<?= esc(base_url($img)) ?>" alt="Avatar">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseProfile" class="collapsed">
                                <span><?= esc($userName ?? 'Usuario') ?></span>
                            </a>
                        </div>
                    </div>
                    <ul class="nav">
                        <?php foreach ($modulos ?? [] as $m): ?>
                            <?php
                            $colaps = !empty($m['permiso_sub']);
                            $sub = $colaps ? explode(':', $m['permiso_sub']) : [];
                            $label = $customModuleIcon[$m['permiso_modulo']]->label ?? str_replace('_', ' ', $m['permiso_modulo']);
                            $icono = $customModuleIcon[$m['permiso_modulo']]->icono ?? 'nc-icon nc-grid-45';
                            ?>
                            <?php if (!$colaps): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= esc(base_url('admin/' . $m['permiso_modulo'])) ?>">
                                        <i class="<?= esc($icono) ?>"></i>
                                        <p><?= esc($label) ?></p>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#modulo<?= esc($m['permiso_modulo']) ?>">
                                        <i class="nc-icon <?= esc($icono) ?>"></i>
                                        <p><?= esc($label) ?> <b class="caret"></b></p>
                                    </a>
                                    <div class="collapse" id="modulo<?= esc($m['permiso_modulo']) ?>">
                                        <ul class="nav">
                                            <?php foreach ($sub as $s): ?>
                                                <?php
                                                $subLabel = $customModuleIcon[$m['permiso_modulo']]->sub[$s]->label ?? str_replace('_', ' ', $s);
                                                $subIcono = $customModuleIcon[$m['permiso_modulo']]->sub[$s]->icono ?? 'nc-grid-45';
                                                ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= esc(base_url('admin/panel/' . $s)) ?>">
                                                        <span class="sidebar-mini"><?= esc(strtoupper(substr($subLabel, 0, 1))) ?></span>
                                                        <span class="sidebar-normal"><?= esc($subLabel) ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-minimize">
                                <button id="minimizeSidebar" class="btn btn-info btn-fill btn-round btn-icon d-none d-lg-block">
                                    <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                    <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                                </button>
                            </div>
                        </div>
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="nc-icon nc-bullet-list-67"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a href="<?= esc(base_url('admin/panel/out')) ?>" class="dropdown-item text-danger">
                                            <i class="nc-icon nc-button-power"></i> Salir
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">