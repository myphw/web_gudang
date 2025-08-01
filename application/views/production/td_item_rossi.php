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
                            <input type="text" class="form-control" name="no_pr" id="no_pr" value="<?= $sp['no_pr'] ?>" readonly>
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
                            <label>From Departement</label>
                            <input type="text" class="form-control" name="dept_name1" id="dept_name1" value="<?= $sp['dept_name1'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>To Departement</label>
                            <input type="text" class="form-control" name="dept_name2" id="dept_name2" value="<?= $sp['dept_name2'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tanggal Dibuat</label>
                            <input type="datetime-local" class="form-control" name="created_at" id="created_at" value="<?= date('Y-m-d\TH:i', strtotime($sp['created_at'])) ?>" readonly>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('production/export_progress_rossi/' . $sp['id_pr']) ?>" class="badge badge-danger mb-3" target="_blank">Export PDF</a>
            <?php endforeach; ?>

            <a href="<?= base_url('production/progress') ?>" class="badge badge-warning mb-3">BACK TO SJ</a>
            <a href="#" class="badge badge-success mb-3" data-toggle="modal" data-target="#newTdItemModal">INPUT ITEM</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>QTY</th>
                        <?php foreach ($sizes as $label): ?>
                            <th><?= strtoupper($label) ?></th>
                        <?php endforeach; ?>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($in as $po): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $po['qty'] ?></td>
                            <?php foreach ($sizes as $label): ?>
                                <td><?= $po['size_' . $label] ?? '-' ?></td>
                            <?php endforeach; ?>
                            <td>
                                <a href="<?= base_url('warehouse/delete_sj_blackstone/' . $po['id_pritem']) ?>" class="badge badge-danger">Delete</a>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="<?= base_url('production/td_item_rossi/' . $sp['id_pr']); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="newTdItemModalLabel">Add New SPK Item</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">

                    <!-- Hidden Fields -->
                    <input type="hidden" name="id_spk" value="<?= $sp['id_spk'] ?>">
                    <input type="hidden" name="id_pr" value="<?= $sp['id_pr'] ?>">
                    <input type="hidden" name="id_dept" value="<?= $sp['id_dept'] ?>">
                    <input type="hidden" name="po_number" value="<?= $sp['po_number'] ?>">
                    <input type="hidden" name="no_pr" value="<?= $sp['no_pr'] ?>">
                    <input type="hidden" name="brand_name" value="<?= $sp['brand_name'] ?>">
                    <input type="hidden" name="dept_name1" value="<?= $sp['dept_name1'] ?>">
                    <input type="hidden" name="dept_name2" value="<?= $sp['dept_name2'] ?>">
                    <input type="hidden" name="total_qty" value="<?= $sp['total_qty'] ?>">

                    <!-- Size Run Fields -->
                    <div class="form-group">
                        <label>Size Run:</label>
                        <div class="row">
                            <?php foreach ($sizes as $label): ?>
                                <div class="col-2 mb-2">
                                    <input type="number" name="size_<?= $label ?>" class="form-control" placeholder="<?= strtoupper($label) ?>">
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

