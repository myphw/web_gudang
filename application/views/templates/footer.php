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


    <!-- DataTables core -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Semantic UI -->
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui/dist/semantic.min.js"></script>

    <!-- DataTables Semantic UI integration -->
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.semanticui.min.js"></script>

    <!-- Your DataTable init -->
    <script>
    $(document).ready(function () {
        $('#myTable').DataTable({
        // optional: enable Semantic UI styling
        "pagingType": "full_numbers"
        });
    });
    </script>


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
</script>

<script>
$(document).ready(function() {

    // When PO is selected
    $('#po_number').on('change', function() {
        var selectedOption = $(this).find(':selected');
        var brand = selectedOption.data('brand');
        var totalQty = selectedOption.data('total_qty');
        var idSpk = selectedOption.data('id_spk');

        $('#brand_name').val(brand);
        $('#total_qty').val(totalQty);
        $('input[name="id_spk"]').val(idSpk);
    });

    // When From Departement is selected
    $('#dept_name1').on('change', function() {
        var selectedOption = $(this).find(':selected');
        var deptName2 = selectedOption.data('dept_name2');
        var idDept = selectedOption.data('id_dept');

        $('#dept_name2').val(deptName2);
        $('input[name="id_dept"]').val(idDept);
    });

});
</script>
<script>
$(document).ready(function() {
    $('#item_name').on('change', function() {
        let unit = $(this).find(':selected').data('unit');
        $('#unit_name').val(unit || '');
    });

    $('#item_type').on('change', function() {
        let type = $(this).val();
        if (type === 'GLOBAL') {
            $('#global-fields').show();
            $('#sizerun-fields').hide();
        } else if (type === 'SIZERUN') {
            $('#global-fields').hide();
            $('#sizerun-fields').show();
        } else {
            $('#global-fields').hide();
            $('#sizerun-fields').hide();
        }
    });
});
</script>
<script>
    $(document).on('click', '.item-option', function (e) {
        e.preventDefault();

        const itemName = $(this).data('value');
        const unitName = $(this).data('unit');
        const consRate = $(this).data('rate');

        // Fill input
        $('#item_name_input').val(itemName);
        $('#item_name_hidden').val(itemName);

        // If you have dependent fields like unit_name or cons_rate:
        $('#unit_name').val(unitName);
        $('#cons_rate').val(consRate);
    });
</script>

</body>

</html>