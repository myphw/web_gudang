<?php
// assign currently selected SJ
$current_sj = !empty($outsj) ? $outsj[0] : null;
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">

            <?= form_error('form/sj_item_checkout_blackstone','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>

                <?php foreach($spk as $sp): ?>
                    <div class="box-body">
                        <div class="form-group" style="display:inline-block;">
                            <input type="hidden" name="id_spk" value="<?=$sp['id_spk']?>">
                            <label for="po_number" style="width:87%;margin-left: 0px;">PO number</label>
                            <input type="text" name="po_number" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="po_number" value="<?=$sp['po_number']?>" readonly placeholder="PO Number">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="xfd" style="width:73%;">XFD</label>
                            <input type="date" name="xfd" style="width:90%;margin-right: px;" class="form-control" id="xfd" value="<?=$sp['xfd']?>" readonly placeholder="XFD">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="brand_name" style="width:87%;margin-left: 0px;">Brand</label>
                            <input type="text" name="brand_name" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="brand_name" value="<?=$sp['brand_name']?>" readonly placeholder="Brand">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="artcolor_name" style="width:87%;margin-left: 0px;">Art & Color</label>
                            <input type="text" name="artcolor_name" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="artcolor_name" value="<?=$sp['artcolor_name']?>" readonly placeholder="Art & Color">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="qty_total" style="width:87%;margin-left: 0px;">Total QTY</label>
                            <input type="text" name="total_qty" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="total_qty" value="<?=$sp['total_qty']?>" readonly placeholder="">
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
                    <a type="button" class="badge badge-warning mb-3"  href="<?=base_url('warehouse/update_sj_checkout/'.$sj['id_spk'])?>" name="btn_add" style="margin:auto;">BACK</a>  
                <?php endforeach; ?>
                <a href="" class="badge badge-success mb-3" data-toggle="modal" data-target="#newSjItemModal">INPUT ITEM</a>
                <a type="button" class="badge badge-primary mb-3"  href="<?=base_url('warehouse/update_spk_checkout_brand/'.$sp['id_spk'])?>" name="btn_add" style="margin:auto;">MASTER DATA</a>   
                <a href="<?= base_url('warehouse/export_sj_checkout_blackstone_pdf/' . $sp['id_spk'] . '/' . $sj['id_sj']); ?>" class="badge badge-danger mb-3" target="_blank">PDF</a>                
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col-lg-2">#</th>
                        <th scope="col-lg-2">Item name</th>
                        <th scope="col-lg-2">Unit</th>
                        <th scope="col-lg-2">QTY</th>
                        <?php for ($s = 36; $s <= 50; $s++): ?>
                            <th><?= $s ?></th>
                        <?php endfor; ?>
                        <th scope="col-lg-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($spkitem as $po) : ?>
                         <?php if ($po['id_sj'] == $current_sj['id_sj']): ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $po['item_name']?></td>
                        <td><?= $po['unit_name']?></td>
                        <td><?= $po['qty']?></td>
                        <?php for ($s = 36; $s <= 50; $s++): ?>
                                    <td><?= $po['size_' . $s] ?></td>
                                <?php endfor; ?>
                        <td>
                            <a href="<?= base_url('warehouse/delete_sj_checkout_blackstone/'.$po['id_bsj']. '/' .$po['id_sj'])?>" name="btn-delete" class="badge badge-danger">delete</a>
                            
                        </td>
                    </tr>
                    <?php $i++; ?>
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
                <h5 class="modal-title" id="newSjItemModalLabel">Add New SPK Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('warehouse/sj_item_checkout_blackstone/'.$sp['id_spk'] . '/' . $sp['id_sj']);?>" method="post">
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
                            <?php for ($i = 36; $i <= 50; $i++): ?>
                                <div class="col-2 mb-2">
                                    <input type="text" name="size_<?= $i ?>" class="form-control" placeholder="<?= $i ?>">
                                </div>
                            <?php endfor; ?>
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

     