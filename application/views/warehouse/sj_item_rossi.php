<?php
$sizes = ['3', '3t', '4', '4t', '5', '5t', '6', '6t', '7', '7t',
              '8', '8t', '9', '9t', '10', '10t', '11', '11t', '12','12t', '13','13t', '14', '15'];

// assign currently selected SJ
$current_sj = !empty($insj) ? $insj[0] : null;
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= form_error('form/sj_item_rossi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <?php foreach ($spk as $sp): ?>
                <div class="box-body">
                    <div class="form-group d-inline-block">
                        <label>PO Number</label>
                        <input type="text" class="form-control" value="<?= $sp['po_number'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block">
                        <label>XFD</label>
                        <input type="date" class="form-control" value="<?= $sp['xfd'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block">
                        <label>Brand</label>
                        <input type="text" class="form-control" value="<?= $sp['brand_name'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block">
                        <label>Art & Color</label>
                        <input type="text" class="form-control" value="<?= $sp['artcolor_name'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block">
                        <label>Total QTY</label>
                        <input type="text" class="form-control" value="<?= $sp['total_qty'] ?>" readonly>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if (!empty($insj)): $sj = $insj[0]; ?>
    <!-- show only selected SJ -->
                <div class="box-body">
                    <div class="form-group d-inline-block">
                        <label>No DO</label>
                        <input type="text" class="form-control" value="<?= $sj['no_do'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block">
                        <label>No SJ</label>
                        <input type="text" class="form-control" value="<?= $sj['no_sj'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block">
                        <label>Supplier Name</label>
                        <input type="text" class="form-control" value="<?= $sj['supplier_name'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block">
                        <label>No Plat</label>
                        <input type="text" class="form-control" value="<?= $sj['no_plat'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block">
                        <label>Tanggal Checkin</label>
                        <input type="date" class="form-control" value="<?= $sj['tgl_checkin'] ?>" readonly>
                    </div>
                </div>
                <?php if (!empty($sj['keterangan'])): ?>
                        <div class="form-group" style="margin-top: 10px;">
                            <label for="keterangan">Keterangan</label>
                            <div class="alert alert-info" id="keterangan">
                                <?= nl2br(htmlspecialchars($sj['keterangan'])) ?>
                            </div>
                        </div>  
                        <?php endif; ?>
                <a href="<?= base_url('warehouse/update_sj_item/' . $sj['id_spk']) ?>" class="badge badge-warning mb-3">BACK</a>
            <?php endif; ?>

            <!-- Buttons -->
            <a href="#" class="badge badge-success mb-3" data-toggle="modal" data-target="#newSjItemModal">INPUT ITEM</a>
            <a href="" class="badge badge-success mb-3" data-toggle="modal" data-target="#newKeteranganModal">KETERANGAN</a>
            <a type="button" class="badge badge-primary"  href="<?=base_url('warehouse/update_spk_checkin_brand/'.$sp['id_spk'])?>" name="btn_add" style="margin:auto;">MASTER DATA</a>
            <a href="<?= base_url('warehouse/export_sj_rossi/'.$sp['id_spk']. '/' . $sj['id_sj']) ?>" class="badge badge-danger mb-3" target="_blank">PDF</a>

            <!-- Table -->
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item name</th>
                        <th>Unit</th>
                        <th>QTY</th>
                        <?php foreach ($sizes as $label): ?>
                            <th><?= strtoupper($label) ?></th>
                        <?php endforeach; ?>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spkitem as $po): ?>
                    <?php if ($po['id_sj'] == $current_sj['id_sj']): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $po['item_name'] ?></td>
                            <td><?= $po['unit_name'] ?></td>
                            <td><?= $po['qty'] ?></td>
                            <?php foreach ($sizes as $label): ?>
                                <td><?= $po['size_' . $label] ?? '-' ?></td>
                            <?php endforeach; ?>
                            <td>
                                <a href="<?= base_url('warehouse/delete_sj_rossi/'.$po['id_bsj']) ?>" class="badge badge-danger">Delete</a>
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

<!-- Modal -->
<?php if (!empty($insj)) : $sp = $insj[0]; ?>
<div class="modal fade" id="newSjItemModal" tabindex="-1" aria-labelledby="newSjItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('warehouse/sj_item_rossi/'.$current_sj['id_spk'].'/'.$current_sj['id_sj']) ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Add New SPK Item</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_sj" value="<?= $sj['id_sj'] ?>">
                    <?php
                    $hiddenFields = ['po_number','xfd','brand_name','artcolor_name','no_do','no_sj','supplier_name','no_plat','tgl_checkin','id_sj'];
                    foreach ($hiddenFields as $field):
                    ?>
                        <input type="hidden" name="<?= $field ?>" value="<?= $sp[$field] ?>">
                    <?php endforeach; ?>

                    <div class="form-group">
                        <label>Item Type</label>
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

                    <div id="global-fields" style="display: none;">
                        <label>Qty</label>
                        <input type="text" name="qty" class="form-control">
                    </div>

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
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if (!empty($insj)) : $sp = $insj[0]; ?>
<div class="modal fade" id="newKeteranganModal" tabindex="-1" aria-labelledby="newKeteranganModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('warehouse/update_keterangan_rossi/' . $sp['id_spk'] . '/' . $sp['id_sj']); ?>" method="post">
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