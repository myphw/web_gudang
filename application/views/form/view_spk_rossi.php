
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-12">

            <?= form_error('form/view_spk_rossi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

                <?php foreach ($spk as $sp): ?>
                <div class="box-body mb-4">
                    <input type="hidden" name="id_spk" value="<?= $sp['id_spk'] ?>">
                    <div class="form-group d-inline-block" style="width: 18%;">
                        <label for="po_number">PO Number</label>
                        <input type="text" name="po_number" class="form-control" value="<?= $sp['po_number'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block" style="width: 18%;">
                        <label for="xfd">XFD</label>
                        <input type="date" name="xfd" class="form-control" value="<?= $sp['xfd'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block" style="width: 18%;">
                        <label for="brand_name">Brand</label>
                        <input type="text" name="brand_name" class="form-control" value="<?= $sp['brand_name'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block" style="width: 18%;">
                        <label for="artcolor_name">Art & Color</label>
                        <input type="text" name="artcolor_name" class="form-control" value="<?= $sp['artcolor_name'] ?>" readonly>
                    </div>
                    <div class="form-group d-inline-block" style="width: 18%;">
                        <label for="qty_total">Total QTY</label>
                        <input type="text" name="total_qty" class="form-control" value="<?= $sp['total_qty'] ?>" readonly>
                    </div>
                </div>
                <a class="badge badge-success mb-3" href="<?= base_url('form/update_spk_item/' . $sp['id_spk']) ?>">ITEM</a>
            <?php endforeach; ?>
            <a class="badge badge-primary mb-3" data-toggle="modal" data-target="#newSpkSizeModal">INPUT SIZE</a>
            <a class="badge badge-warning mb-3" href="<?= base_url('form/spk') ?>">BACK</a>                  
                
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <?php 
                            $sizes = ['3','3T','4','4T','5','5T','6','6T','7','7T','8','8T','9','9T','10','10T','11','11T','12','13','14','15'];
                            foreach($sizes as $sz) echo "<th>$sz</th>";
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spkall as $po): ?>
                        <?php if ($po['id_spk'] == $sp['id_spk']): ?>
                            <tr>
                                <?php foreach($sizes as $sz): ?>
                                    <td><?= $po['size_' . strtolower($sz)] ?></td>
                                <?php endforeach; ?>
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
 <!-- Modal -->
<?php if (!empty($spk)): $sp = $spk[0]; ?>
<div class="modal fade" id="newSpkSizeModal" tabindex="-1" aria-labelledby="newSpkSizeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('form/view_spk_rossi/' . $sp['id_spk']) ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Add New SPK Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                    <?php
                    $hidden_fields = ['id_spk', 'po_number', 'xfd', 'brand_name', 'artcolor_name'];
                    foreach ($hidden_fields as $field) {
                        echo '<input type="hidden" name="' . $field . '" value="' . $sp[$field] . '">';
                    }
                    
                    foreach ($sizes as $sz): ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="size_<?= strtolower($sz) ?>" name="size_<?= strtolower($sz) ?>" placeholder="<?= $sz ?>">
                                <?= form_error('size_' . strtolower($sz), '<small class="text-danger pl-3">', '</small>'); ?>
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

     