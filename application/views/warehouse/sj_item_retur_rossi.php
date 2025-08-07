<?php
$sizes = ['3', '3t', '4', '4t', '5', '5t', '6', '6t', '7', '7t', '8', '8t', '9', '9t', '10', '10t', '11', '11t', '12', '13', '14', '15'];
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-12">

            <?= form_error('production/td_item_blackstone', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <?php foreach ($spk as $sp): ?>
                <div class="box-body border rounded p-3 mb-3">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>PO Number</label>
                            <input type="text" class="form-control" name="po_number" id="po_number" value="<?= $sp['po_number'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>No Tanda Terima</label>
                            <input type="text" class="form-control" name="no_ir" id="no_ir" value="<?= $sp['no_ir'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Brand</label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name" value="<?= $sp['brand_name'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Total QTY</label>
                            <input type="text" class="form-control" name="total_qty" id="total_qty" value="<?= $sp['total_qty'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>From</label>
                            <input type="text" class="form-control" name="dept_name1" id="dept_name1" value="<?= $sp['dept_name1'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>To </label>
                            <input type="text" class="form-control" name="to" id="to" value="<?= $sp['to'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tanggal Dibuat</label>
                            <input type="datetime-local" class="form-control" name="created_at" id="created_at" value="<?= date('Y-m-d\TH:i', strtotime($sp['created_at'])) ?>" readonly>
                        </div>
                    </div>
                </div>
                <?php if (!empty($sp['keterangan'])): ?>
                        <div class="form-group" style="margin-top: 10px;">
                            <label for="keterangan">Keterangan</label>
                            <div class="alert alert-info" id="keterangan">
                                <?= nl2br(htmlspecialchars($sp['keterangan'])) ?>
                            </div>
                        </div>  
                        <?php endif; ?>
                <a href="<?= base_url('warehouse/export_retur_rossi/' . $sp['id_ir']) ?>" class="badge badge-danger mb-3" target="_blank">Export PDF</a>
            <?php endforeach; ?>

            <a href="<?= base_url('warehouse/retur') ?>" class="badge badge-warning mb-3">BACK TO SJ</a>
            <a href="#" class="badge badge-success mb-3" data-toggle="modal" data-target="#newTdItemModal">INPUT ITEM</a>
            <a href="" class="badge badge-primary mb-3" data-toggle="modal" data-target="#newKeteranganModal">ADD KETERANGAN</a>

            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ITEM</th>
                        <th>UNIT</th>
                        <th>QTY</th>
                        <?php foreach ($sizes as $label): ?>
                            <th><?= strtoupper($label) ?></th>
                        <?php endforeach; ?>
                        <th>KETERANGAN</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($in as $po): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $po['item_name'] ?></td>
                            <td><?= $po['unit_name'] ?></td>
                            <td><?= $po['qty_return'] ?></td>
                            <?php foreach ($sizes as $label): ?>
                                <td><?= $po['size_' . $label] ?? '-' ?></td>
                            <?php endforeach; ?>
                            <td><?= $po['keterangan'] ?></td>
                            <td>
                                <a href="<?= base_url('warehouse/delete_retur_rossi/' . $po['id_iritem']) ?>" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Modal for New SJ Item -->
<?php if (!empty($spk)) :
    $sp = end($spk); // take the last one
?>
<div class="modal fade" id="newTdItemModal" tabindex="-1" aria-labelledby="newTdItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="<?= base_url('warehouse/sj_item_retur_rossi/' . $sp['id_ir']); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="newTdItemModalLabel">Add New SPK Item</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">

                    <!-- Hidden Fields -->
                    <input type="hidden" name="id_spk" value="<?= $sp['id_spk'] ?>">
                    <input type="hidden" name="id_ir" value="<?= $sp['id_ir'] ?>">
                    <input type="hidden" name="po_number" value="<?= $sp['po_number'] ?>">
                    <input type="hidden" name="no_ir" value="<?= $sp['no_ir'] ?>">
                    <input type="hidden" name="brand_name" value="<?= $sp['brand_name'] ?>">
                    <input type="hidden" name="dept_name1" value="<?= $sp['dept_name1'] ?>">
                    <input type="hidden" name="to" value="<?= $sp['to'] ?>">
                    <input type="hidden" name="total_qty" value="<?= $sp['total_qty'] ?>">

                    <div class="form-group">
                        <select name="item_type" id="item_type" class="form-control" required>
                            <option value="">-- Select Type --</option>
                            <option value="GLOBAL">GLOBAL</option>
                            <option value="SIZERUN">SIZERUN</option>
                        </select>
                    </div>

                    <div id="common-fields">
                        <div class="form-group">
                        <div class="ui fluid search selection dropdown" id="item_name_dropdown">
                            <input type="hidden" name="item_name">
                            <i class="dropdown icon"></i>
                            <div class="default text">Select Item</div>
                            <div class="menu">
                                <?php foreach ($uns as $c): ?>
                                <div class="item" 
                                    data-value="<?= $c['item_name'] ?>"
                                    data-unit="<?= $c['unit_name'] ?>"
                                    data-rate="<?= $c['cons_rate'] ?>">
                                    <?= $c['item_name'] ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="Unit Name" readonly>
                    </div>
                    </div>

                    <!-- GLOBAL Fields -->
                    <div id="global-fields" style="display: none;">
                        <div class="form-group">
                            <label>Qty</label>
                            <input type="text" name="qty" class="form-control">
                        </div>
                    </div>

                    <!-- SIZERUN Fields -->
                    <div id="sizerun-fields" style="display: none;">
                        <label>Size Run:</label>
                        <div class="row">
                            <?php foreach ($sizes as $label): ?>
                                <div class="col-2 mb-2">
                                    <input type="text" name="size_<?= $label ?>" class="form-control" placeholder="<?= strtoupper($label) ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>   

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Modal for Keterangan -->
<?php if (!empty($spk)) : $sp = $spk[0]; ?>
<div class="modal fade" id="newKeteranganModal" tabindex="-1" aria-labelledby="newKeteranganModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('warehouse/update_keterangan_return_rossi/' . $sp['id_ir']); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="newKeteranganModalLabel">Keterangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea name="keterangan" class="form-control" placeholder="Masukkan keterangan"><?= isset($sp['keterangan']) ? $sp['keterangan'] : '' ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>


<script>
$(document).ready(function() {
    $('#item_name_dropdown').dropdown();
});
$('#item_name_dropdown').dropdown({
    onChange: function(value, text, $selectedItem) {
        let unit = $selectedItem.data('unit');
        let rate = $selectedItem.data('rate');

        $('#unit_name').val(unit);
        $('#cons_rate').val(rate);
        // you can also use `rate` if needed
    }
});
</script>