
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">

            <?= form_error('form/update_spk_item','<div class="alert alert-danger" role="alert">', '
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
                <a type="button" class="badge badge-warning"  href="<?=base_url('form/update_spk_size_brand/'.$sp['id_spk'])?>" name="btn_add" style="margin:auto;">BACK</a>
                <a type="button" class="badge badge-danger"  href="<?=base_url('form/view_report_spk_brand/'.$sp['id_spk'])?>" name="btn_add" style="margin:auto;">REPORT</a>
                <?php endforeach; ?>
                <a href="" class="badge badge-success" data-toggle="modal" data-target="#newSpkItemModal">INPUT ITEM</a>                   
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col-lg-2">#</th>
                        <th scope="col-lg-2">Part</th>
                        <th scope="col-lg-2">Descriptions</th>
                        <th scope="col-lg-2">Colour</th>
                        <th scope="col-lg-2">Ukuran MTRL</th>
                        <th scope="col-lg-2">Unit</th>
                        <th scope="col-lg-2">Cons Rate</th>
                        <th scope="col-lg-2">Total Cons Rate</th>
                        <th scope="col-lg-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($spkitem as $po) : ?>
                         <?php if ($po['id_spk'] == $sp['id_spk']): ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $po['part_name']?></td>
                        <td><?= $po['item_name']?></td>
                        <td><?= $po['color_name']?></td>
                        <td><?= $po['mtrl_name']?></td>
                        <td><?= $po['unit_name']?></td>
                        <td><?= $po['cons_rate']?></td>
                        <td><?= $po['total_consrate']?></td>
                        <td>
                            <a href="<?= base_url('form/delete_spk_item/'.$po['id_spkitem'])?>" name="btn-delete" class="badge badge-danger">delete</a>
                            
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
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
 <?php foreach($spk as $sp) : ?>
<div class="modal fade" id="newSpkItemModal" tabindex="-1" aria-labelledby="newSpkItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSpkItemModalLabel">Add New SPK Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('form/update_spk_item/'.$sp['id_spk']);?>" method="post">
                <div class="modal-body">
                <input type="hidden" name="id_spk" value="<?= $sp['id_spk']; ?>">
                <input type="hidden" name="po_number" value="<?= $sp['po_number']; ?>">
                <input type="hidden" name="xfd" value="<?= $sp['xfd']; ?>">
                <input type="hidden" name="brand_name" value="<?= $sp['brand_name']; ?>">
                <input type="hidden" name="artcolor_name" value="<?= $sp['artcolor_name']; ?>">
                <div class="form-group">
                        <input type="text" class="form-control" id="part_name" name="part_name" placeholder="Part Name">
                    </div>
                    <div class="form-group">
                        <select name="item_name" id="item_name" class="form-control" required>
                            <option value="">Select Item</option>
                            <?php foreach($item as $c): ?>
                                <option value="<?= $c['item_name']; ?>" 
                                        data-unit="<?= $c['unit_name']; ?>" 
                                        data-rate="<?= $c['cons_rate']; ?>">
                                    <?= $c['item_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="color_name" name="color_name" placeholder="Colour Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mtrl_name" name="mtrl_name" placeholder="MTRL Size">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="Unit Name" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="cons_rate" name="cons_rate" placeholder="Cons Rate" readonly>
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
<?php endforeach; ?>

     