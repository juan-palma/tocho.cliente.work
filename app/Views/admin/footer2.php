</div>
                </div>
                <footer class="footer">
                    <div class="container">
                        <nav>
                            <p class="copyright text-center">
                                © <script>document.write(new Date().getFullYear())</script>
                                <a href="javascript:void(0);">Todos los derechos reservados</a>: Powered by:
                                <a href="http://idalibre.com" target="_blank">ID.A libre</a>
                            </p>
                        </nav>
                    </div>
                </footer>
            </div>
        </div>
    </main>
</body>

<!-- Scripts optimizados -->
<script src="<?= esc(base_url('assets/common/js/librerias/jquery.3.2.1.min.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/popper.min.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/bootstrap.min.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/bootstrap-switch.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/chartist.min.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/bootstrap-notify.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/jquery-jvectormap.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/moment.min.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/bootstrap-datetimepicker.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/sweetalert2.min.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/bootstrap-tagsinput.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/nouislider.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/bootstrap-selectpicker.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/jquery.bootstrap-wizard.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/bootstrap-table.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/jquery.dataTables.min.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/plugins/fullcalendar.min.js')) ?>"></script>
<script src="<?= esc(base_url('assets/admin/js/owner/light-bootstrap-dashboard.js?v=2.0.1')) ?>"></script>

<!-- IDA -->
<script src="<?= esc(base_url('assets/common/js/librerias/mootools-core.js')) ?>"></script>
<script src="<?= esc(base_url('assets/common/js/librerias/mootools-more.js')) ?>"></script>
<script src="<?= esc(base_url('assets/admin/js/owner/main.js')) ?>"></script>

<?php if (!empty($varFlash)): ?>
    <?php
    $errors = session()->getFlashdata($varFlash . 'Error');
    $success = session()->getFlashdata($varFlash . 'Success');
    if (!empty($errors)): ?>
        <?= popFlash('error', $errors) ?>
    <?php elseif (!empty($success)): ?>
        <?= popFlash('success', $success) ?>
    <?php endif; ?>
<?php endif; ?>

</html>