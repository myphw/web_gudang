<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-12">

            <?= form_error('form/update_spk_item', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="box-body">
                <div class="form-group" style="display:inline-block;">
                    <input type="hidden" name="id_spk" value="<?= $spk['id_spk'] ?>">
                    <label for="po_number" style="width:87%;">PO number</label>
                    <input type="text" name="po_number" class="form-control" style="width:90%;" id="po_number" value="<?= $spk['po_number'] ?>" readonly>
                </div>
                <div class="form-group" style="display:inline-block;">
                    <label for="xfd" style="width:73%;">XFD</label>
                    <input type="date" name="xfd" class="form-control" style="width:90%;" id="xfd" value="<?= $spk['xfd'] ?>" readonly>
                </div>
                <div class="form-group" style="display:inline-block;">
                    <label for="brand_name" style="width:87%;">Brand</label>
                    <input type="text" name="brand_name" class="form-control" style="width:90%;" id="brand_name" value="<?= $spk['brand_name'] ?>" readonly>
                </div>
                <div class="form-group" style="display:inline-block;">
                    <label for="artcolor_name" style="width:87%;">Art & Color</label>
                    <input type="text" name="artcolor_name" class="form-control" style="width:90%;" id="artcolor_name" value="<?= $spk['artcolor_name'] ?>" readonly>
                </div>
                <div class="form-group" style="display:inline-block;">
                    <label for="qty_total" style="width:87%;">Total QTY</label>
                    <input type="text" name="total_qty" class="form-control" style="width:90%;" id="total_qty" value="<?= $spk['total_qty'] ?>" readonly>
                </div>
            </div>

            <a class="badge badge-warning" href="<?= base_url('form/update_spk_size_brand/' . $spk['id_spk']) ?>">BACK</a>
            <a class="badge badge-danger" href="<?= base_url('form/view_report_spk_brand/' . $spk['id_spk']) ?>">REPORT</a>
            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#newSpkItemModal">INPUT ITEM</a>

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Part</th>
                        <th>Descriptions</th>
                        <th>Colour</th>
                        <th>Ukuran MTRL</th>
                        <th>Unit</th>
                        <th>Cons Rate</th>
                        <th>Total Cons Rate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spkitem as $po): ?>
                        <?php if ($po['id_spk'] == $spk['id_spk']): ?>
                            <tr>
                                <th><?= $i++ ?></th>
                                <td><?= $po['part_name'] ?></td>
                                <td><?= $po['item_name'] ?></td>
                                <td><?= $po['color_name'] ?></td>
                                <td><?= $po['mtrl_name'] ?></td>
                                <td><?= $po['unit_name'] ?></td>
                                <td><?= $po['cons_rate'] ?></td>
                                <td><?= $po['total_consrate'] ?></td>
                                <td>
                                    <a href="<?= base_url('form/delete_spk_item/' . $po['id_spkitem']) ?>" class="badge badge-danger">delete</a>
                                </td>
                            </tr>
                            <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
</div>
        </div>
    </div>

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newSpkItemModal" tabindex="-1" aria-labelledby="newSpkItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('form/update_spk_item/' . $spk['id_spk']) ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSpkItemModalLabel">Add New SPK Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id_spk" value="<?= $spk['id_spk'] ?>">
                    <input type="hidden" name="po_number" value="<?= $spk['po_number'] ?>">
                    <input type="hidden" name="xfd" value="<?= $spk['xfd'] ?>">
                    <input type="hidden" name="brand_name" value="<?= $spk['brand_name'] ?>">
                    <input type="hidden" name="artcolor_name" value="<?= $spk['artcolor_name'] ?>">

                    <div class="form-group">
                        <input type="text" class="form-control" name="part_name" placeholder="Part Name">
                    </div>

                    <div class="form-group">
                        <select name="item_name" id="item_name" class="form-control" required>
                            <option value="">Select Item</option>
                            <?php if (!empty($item)) : ?>
                                <?php foreach ($item as $c): ?>
                                    <option value="<?= $c['item_name'] ?>" 
                                            data-unit="<?= $c['unit_name'] ?>" 
                                            data-rate="<?= $c['cons_rate'] ?>">
                                        <?= $c['item_name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">No items found for this ArtColor</option>
                            <?php endif; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control" name="color_name" placeholder="Colour Name">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="mtrl_name" placeholder="MTRL Size">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="Unit Name" readonly>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="cons_rate" name="cons_rate" placeholder="Cons Rate" readonly>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
$('#artcolor_name').on('change', function () {
    let selectedColor = $(this).val();

    if (selectedColor !== '') {
        $.ajax({
            url: '<?= base_url("Form/get_items_by_color"); ?>',
            type: 'POST',
            data: { artcolor_name: selectedColor },
            dataType: 'json',
            success: function (response) {
                let options = '<option value="">Select Item</option>';
                $.each(response, function (i, item) {
                    options += `<option value="${item.item_name}" data-unit="${item.unit_name}" data-rate="${item.cons_rate}">${item.item_name}</option>`;
                });
                $('#item_name').html(options);
            },
            error: function () {
                alert("Terjadi kesalahan saat mengambil item.");
            }
        });
    } else {
        $('#item_name').html('<option value="">Select Item</option>');
    }
});

$('#item_name').on('change', function () {
    let unit = $(this).find(':selected').data('unit');
    let rate = $(this).find(':selected').data('rate');

    $('#unit_name').val(unit || '');
    $('#cons_rate').val(rate || '');
});
</script>