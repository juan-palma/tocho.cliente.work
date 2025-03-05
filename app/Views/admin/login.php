<table class="center2">
    <tr>
        <td>
            <div class="content -dark -without-sidebar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col -lg-12">
                            <div class="panel -dark -focused -radical">
                                <div class="ida-row">
                                    <div id="adminLogo" class="col -md-8">
                                        <table class="center2">
                                            <tr>
                                                <td>
                                                    <div class="boxLogo">
                                                        <?php $img = (!empty($db->adminLogo)) ? 'assets/admin/img/' . $db->adminLogo : 'assets/admin/img/adminLogoBase.png'; ?>
                                                        <img src="<?= base_url($img) ?>" />
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-heading -dark -with-icon-lg col -md-4 login-panel">
                                        <i class="pe pe-angle-down-circle"></i>
                                        <h3>Iniciar sesión</h3>
                                        <span>Enter your account</span>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <?php
                                        $formPrefix = '<div class="form-error-msn">';
                                        $formPrefixTerminos = '<div class="form-error-msn terminos">';
                                        $formSubfix = '</div>';
                                    ?>
                                    <form action="<?= current_url() ?>" class="form -dark" data-toggle="validator" id="form-login" method="post" name="form-login">
                                        <!-- Form Group-->
                                        <div class="form-group">
                                            <label class="form-label" for="form-login-username">Usuario</label>
                                            <?php if (isset($validation) && $validation->hasError('username')): ?>
                                                <?= $formPrefix . esc($validation->getError('username')) . $formSubfix ?>
                                            <?php endif; ?>
                                            <input class="form-control" id="form-login-username" name="username" placeholder="Username" required="required" type="text" autocomplete="off" value="<?= old('username') ?>">
                                        </div>
                                        <!-- /Form Group--><!-- Form Group-->
                                        <div class="form-group">
                                            <label for="form-login-password">Contraseña</label>
                                            <?php if (isset($validation) && $validation->hasError('password')): ?>
                                                <?= $formPrefix . esc($validation->getError('password')) . $formSubfix ?>
                                            <?php endif; ?>
                                            <input class="form-control" id="form-login-password" name="password" placeholder="Password" required="required" type="password" autocomplete="off" value="">
                                            <!-- <a class="form-text _text-muted _text-right" href="#/forgotpassword"><small>Olvido su contraseña?</small></a> -->
                                        </div>
                                        <!-- /Form Group--><!-- Form Group-->
                                        <div class="form-group _margin-top-2x _margin-bottom-none">
                                            <div class="form-check -checkbox">
                                                <?php if (isset($validation) && $validation->hasError('terminos')): ?>
                                                    <?= $formPrefixTerminos . esc($validation->getError('terminos')) . $formSubfix ?>
                                                <?php endif; ?>
                                                <button id="btnLogin" class="btn -primary _pull-right" name="btnLogin" type="submit">Entrar</button>
                                            </div>
                                        </div>
                                        <!-- /Form Group-->
                                    </form>
                                </div>

                                <p class="_text-center">
                                    CMS Panel - <?= esc($_SERVER['SERVER_NAME']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>