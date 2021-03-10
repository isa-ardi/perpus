<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Belajar CI <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $(document).on('click', '.badge.badge-success.edit', function() {
        const id = $(this).data("id");
        const menu = $(this).data("menu");
        $('form#update').attr('action', '<?= base_url('menu/update_menu'); ?>/' + id);
        $('input#menu').val(menu);
    });
</script>

<script>
    $(document).on('click', '.badge.badge-success.edits', function() {
        const id = $(this).data("id");
        $('form#updates').attr('action', '<?= base_url('menu/update_submenu'); ?>/' + id);
        // console.log(id);
        $.ajax({
            url: "<?= base_url() ?>/Menu/getSubMenuById",
            data: {
                id: id
            },
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('input[name=title]').val(data[0].title);
                $('input[name=url]').val(data[0].url);
                $('select[name=menu_id]').val(data[0].menu_id);
                $('input[name=icon]').val(data[0].icon)
                if (data[0].is_active == 1) {
                    $('input[name=is_active]').attr('checked', '');
                } else {
                    $('input[name=is_active]').removeAttr('checked')
                }

            }
        });
    });
</script>

</body>

</html>