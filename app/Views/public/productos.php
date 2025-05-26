<div class="mainbox bl1">
    <div id="headSec">
        <img src="<?= base_url("assets/public/img/productos/productos_" . esc($genero) . "_head.png") ?>" alt="Header <?= esc($genero) ?>" />
    </div>
</div>

<div class="mainbox bl2">
    <div class="basicoR">
        <img src="<?= base_url("assets/public/img/productos/productos_" . esc($genero) . "_basico.jpg") ?>" alt="Producto básico <?= esc($genero) ?>" />
        <img class="over3 oculto" id="overBasico" src="<?= base_url("assets/public/img/productos/productos_" . esc($genero) . "_basico_over.jpg") ?>" alt="Producto básico hover <?= esc($genero) ?>" />
        <a id="btnBasico" href="<?= base_url("productos/" . esc($genero) . "/basico") ?>">
            <div class="btnVerMas">Ver más</div>
        </a>
    </div>
    <div class="basicoR">
        <img src="<?= base_url("assets/public/img/productos/productos_" . esc($genero) . "_personalizado.jpg") ?>" alt="Producto personalizado <?= esc($genero) ?>" />
        <img class="over3 oculto" id="overPersonalizado" src="<?= base_url("assets/public/img/productos/productos_" . esc($genero) . "_personalizado_over.jpg") ?>" alt="Producto personalizado hover <?= esc($genero) ?>" />
        <a id="btnPersonalizado" href="<?= base_url("productos/" . esc($genero) . "/personalizado") ?>">
            <div class="btnVerMas">Ver más</div>
        </a>
    </div>
</div>

<script type="text/javascript">
    let overGeneros = true;
</script>