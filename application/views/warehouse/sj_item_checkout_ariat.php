<?php
$sizes = ['6d','6_5d','7d','7_5d','8d','8_5d','9d','9_5d','10d','10_5d','11d','11_5d','12d','13d','14d','15d','16d']; 

// assign currently selected SJ
$current_sj = !empty($outsj) ? $outsj[0] : null;
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= form_error('form/sj_item_checkout_ariat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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

            <?php foreach($outsj as $sj): $sj = $outsj[0]; ?>
                    <div class="box-body">                        
                        <div class="form-group" style="display:inline-block;">
                            <label for="no_sj" style="width:73%;">NO. SJ</label>
                            <input type="text" name="no_sj" style="width:90%;margin-right: px;" class="form-control" id="no_sj" value="<?=$sj['no_sj']?>" readonly placeholder="No SJ">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="supplier_name" style="width:87%;margin-left: 0px;">From Department</label>
                            <input type="text" name="from" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="supplier_name" value="<?=$sj['from']?>" readonly placeholder="Supplier Name">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="no_plat" style="width:87%;margin-left: 0px;">TO Department</label>
                            <input type="text" name="no_plat" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="no_plat" value="<?=$sj['to_dept']?>" readonly placeholder="No Plat">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="tgl_checkin" style="width: 200px;%;margin-left: 0px;">Tanggal Checkout</label>
                            <input type="date" name="tgl_checkin" style="width: 110%;margin-right: 0px;margin-left: px;" class="form-control" id="tgl_checkin" value="<?=$sj['tgl_checkout']?>" readonly placeholder="">
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
                <?php endforeach; ?>
                <a type="button" class="badge badge-warning mb-3"  href="<?=base_url('warehouse/update_sj_checkout/'.$sj['id_spk'])?>" name="btn_add" style="margin:auto;">BACK</a>
            <!-- Buttons -->
                <a href="" class="badge badge-success mb-3" data-toggle="modal" data-target="#newSjItemModal">INPUT ITEM</a>
                <a href="" class="badge badge-success mb-3" data-toggle="modal" data-target="#newKeteranganModal">KETERANGAN</a>
                <a type="button" class="badge badge-primary mb-3"  href="<?=base_url('warehouse/update_spk_checkout_brand/'.$sj['id_spk'])?>" name="btn_add" style="margin:auto;">MASTER DATA</a>   
                <a href="<?= base_url('warehouse/export_sj_checkout_ariat_pdf/' . $sp['id_spk'] . '/' . $sj['id_sj']); ?>" class="badge badge-danger mb-3" target="_blank">PDF</a>
            
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
                                <a href="<?= base_url('warehouse/delete_sj_checkout_ariat/'.$po['id_bsj']. '/' .$po['id_bsj']) ?>" class="badge badge-danger">Delete</a>
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
                
            </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<!-- Modal -->
 <?php if (!empty($outsj)) : $sp = $outsj[0]; ?>
<div class="modal fade" id="newSjItemModal" tabindex="-1" aria-labelledby="newSjItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSjItemModalLabel">Add New Item ARIAT To Check OUT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('warehouse/sj_item_checkout_ariat/'.$sp['id_spk'] . '/' . $sp['id_sj']);?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="po_number" value="<?= $sp['po_number']; ?>">
                    <input type="hidden" name="xfd" value="<?= $sp['xfd']; ?>">
                    <input type="hidden" name="brand_name" value="<?= $sp['brand_name']; ?>">
                    <input type="hidden" name="artcolor_name" value="<?= $sp['artcolor_name']; ?>">
                    <input type="hidden" name="no_sj" value="<?= $sp['no_sj']; ?>">
                    <input type="hidden" name="from" value="<?= $sp['from']; ?>">
                    <input type="hidden" name="to_dept" value="<?= $sp['to_dept']; ?>">
                    <input type="hidden" name="tgl_checkout" value="<?= $sp['tgl_checkout']; ?>">
                    <input type="hidden" name="id_sj" value="<?= $sp['id_sj']; ?>">
                    <div class="form-group">
                        <select name="item_type" id="item_type" class="form-control" required>
                            <option value="">-- Select Type --</option>
                            <option value="GLOBAL">GLOBAL</option>
                            <option value="SIZERUN">SIZERUN</option>
                        </select>
                    </div>

                    <!-- Common Fields -->
                    <div id="common-fields">
                        <div class="form-group">
                        <select name="item_name" id="item_name" class="form-control" required>
                            <option value="">Select Item</option>
                            <?php foreach($uns as $c): ?>
                                <option value="<?= $c['item_name']; ?>" 
                                        data-unit="<?= $c['unit_name']; ?>">
                                    <?= $c['item_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
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
                            <?php foreach ($sizes as $s): ?>
                                <div class="col-2 mb-2">
                                <input type="text" name="size_<?= $s ?>" class="form-control" placeholder="<?= strtoupper(str_replace('_', '.', str_replace('_d', 'D', $s))) ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
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
            <form action="<?= base_url('warehouse/update_checkout_keterangan_ariat/' . $sp['id_spk'] . '/' . $sp['id_sj']); ?>" method="post">
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