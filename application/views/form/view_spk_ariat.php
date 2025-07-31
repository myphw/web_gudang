
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

    <div class="row">
        <div class="col-lg-12">

            <?= form_error('form/view_spk_ariat','<div class="alert alert-danger" role="alert">', '
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
                    <a type="button" class="badge badge-success"  href="<?=base_url('form/update_spk_item/'.$sp['id_spk'])?>" name="btn_add" style="margin:auto;">ITEM</a>
                <?php endforeach; ?>
                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#newSpkSizeModal">INPUT SIZE</a>
                <a type="button" class="badge badge-warning"  href="<?=base_url('form/spk')?>" name="btn_add" style="margin:auto;">BACK</a>                   
                
                <div class="table-responsive mb-5">
                    <table class="table table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <?php
                                $sizes = ['6d','6_5d','7d','7_5d','8d','8_5d','9d','9_5d','10d','10_5d','11d','11_5d','12d','13d','14d','15d','16d'];
                                foreach ($sizes as $s) {
                                    echo "<th>" . strtoupper(str_replace('_', '.', str_replace('_d', 'D', $s))) . "</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($spkall as $po): ?>
                                <?php if ($po['id_spk'] == $sp['id_spk']): ?>
                                    <tr>
                                        <?php foreach ($sizes as $s): ?>
                                            <td><?= $po['size_' . $s] ?></td>
                                        <?php endforeach; ?>
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


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<?php if (!empty($spk)) : ?>
<?php $sp = $spk[0]; ?>
<div class="modal fade" id="newSpkSizeModal" tabindex="-1" aria-labelledby="newSpkSizeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <form action="<?= base_url('form/view_spk_ariat/' . $sp['id_spk']) ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSpkSizeModalLabel">Add New SPK Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id_spk" value="<?= $sp['id_spk'] ?>">
                    <input type="hidden" name="po_number" value="<?= $sp['po_number'] ?>">
                    <input type="hidden" name="xfd" value="<?= $sp['xfd'] ?>">
                    <input type="hidden" name="brand_name" value="<?= $sp['brand_name'] ?>">
                    <input type="hidden" name="artcolor_name" value="<?= $sp['artcolor_name'] ?>">
                    <div class="row">
                    <?php
                    foreach ($sizes as $s):
                        $label = strtoupper(str_replace('_', '.', str_replace('_d', 'D', $s)));
                    ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="size_<?= $s ?>" placeholder="<?= $label ?>">
                            <?= form_error('size_' . $s, '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
<?php endif; ?>

     