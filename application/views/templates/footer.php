<!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Web Gudang <?= date('Y'); ?></span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>

    <script>
        $('.form-check-input').on('click', function(){
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function(){
                    document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                }     
            });
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const itemType = document.getElementById('item_type');
        const globalFields = document.getElementById('global-fields');
        const sizerunFields = document.getElementById('sizerun-fields');

        itemType.addEventListener('change', function () {
            const type = this.value;
            if (type === 'GLOBAL') {
                globalFields.style.display = 'block';
                sizerunFields.style.display = 'none';
            } else if (type === 'SIZERUN') {
                sizerunFields.style.display = 'block';
                globalFields.style.display = 'none';
            } else {
                globalFields.style.display = 'none';
                sizerunFields.style.display = 'none';
            }
        });
    });
</script>

<script>
$(document).ready(function() {
    $('#item_name').on('change', function() {
        var selectedOption = $(this).find('option:selected');
        var unit = selectedOption.data('unit') || '';
        var rate = selectedOption.data('rate') || '';
        $('#unit_name').val(unit);
        $('#cons_rate').val(rate);
    });
});
</script>

<!-- JavaScript to handle unit_name and cons_rate updates -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const itemSelect = document.getElementById('item_name');
    const unitInput = document.getElementById('unit_name');
    const consRateInput = document.getElementById('cons_rate');

    itemSelect.addEventListener('change', function() {
        const selectedOption = itemSelect.options[itemSelect.selectedIndex];
        unitInput.value = selectedOption.dataset.unit || '';
        consRateInput.value = selectedOption.dataset.rate || '';
    });
});
</>


</body>

</html>