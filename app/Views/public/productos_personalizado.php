<?php
// Lista de prendas para iterar y reducir redundancia
$prendas = ['body', 'licra', 'short', 'playera', 'sudadera'];
?>

<div class="mainbox bl1">
    <div id="headSec">
        <img src="<?= base_url("assets/public/img/productos/productos_" . esc($genero) . "_" . esc($area) . "_head.png") ?>" alt="Header <?= esc($genero) ?> <?= esc($area) ?>" />
    </div>
    <div class="ligaRapida">
        <a href="<?= base_url() ?>">home &gt; </a>
        <a href="<?= base_url("productos/" . esc($genero)) ?>"><?= esc($genero) ?> &gt; </a>
        <span><?= esc($area) ?></span>
    </div>
</div>

<div class="mainbox bl2 bl2p">
    <?php foreach ($prendas as $prenda): ?>
        <div class="basicoP">
            <img src="<?= base_url("assets/public/img/productos/productos_" . esc($genero) . "_" . esc($area) . "_" . esc($prenda) . ".png") ?>" alt="<?= esc($prenda) ?> <?= esc($genero) ?>" />
            <a href="<?= base_url("productos/" . esc($genero) . "/" . esc($area) . "/" . esc($prenda)) ?>">
                <div class="btnVerMas">Personalizar</div>
            </a>
        </div>
    <?php endforeach; ?>
</div>