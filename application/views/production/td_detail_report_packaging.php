<?php
$sizesAriat = ['6d','6_5d','7d','7_5d','8d','8_5d','9d','9_5d','10d','10_5d','11d','11_5d','12d','13d','14d','15d','16d']; 
$sizesRossi = ['3', '3t', '4', '4t', '5', '5t', '6', '6t', '7', '7t', '8', '8t', '9', '9t', '10', '10t', '11', '11t', '12', '13', '14', '15'];
?>

 <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-12">

            <!-- Form validation error messages (optional fix: loop over each field if needed) -->
            <?= $this->session->flashdata('message'); ?>

            <?php $sp = $spk; ?>
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
                <a href="<?= base_url('production/export_packaging_pdf/' . $sp['id_spk']) ?>" class="btn btn-danger mb-3" target="_blank">Export PDF</a>
                <a href="<?= base_url('production/pr_detail_item/'.$sp['id_spk']); ?>" class="btn btn-secondary mb-3">
                    <i class="fas fa-reply"></i> BACK
                </a>
            <?php if ($sp['brand_name'] == 'BLACK STONE'): ?>
            <h5 class="font-weight-bold mb-2">Size Run SPK - BLACK STONE</h5>
            <div class="table-responsive mb-5">
                <table class="table table-bordered text-center">
                    <thead class="thead-light">
                        <tr>
                            <?php for ($s = 36; $s <= 50; $s++): ?>
                                <th><?= $s ?></th>
                            <?php endfor; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($size as $po): ?>
                            <?php if ($po['id_spk'] == $sp['id_spk']): ?>
                                <tr>
                                    <?php for ($s = 36; $s <= 50; $s++): ?>
                                        <td><?= $po['size_' . $s] ?></td>
                                    <?php endfor; ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Action Buttons -->

            <!-- Data Table -->
             <h5 class="font-weight-bold mb-2">Total Production</h5>
        <div class="table-responsive mb-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>QTY</th>
                        <?php for ($s = 36; $s <= 50; $s++): ?>
                            <th><?= $s ?></th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($spkitem as $po): ?>
                    <?php if ($po['id_spk'] == $sp['id_spk'] && $po['id_dept'] == $dept['id_dept']): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $po['qty'] ?></td>
                            <?php for ($s = 36; $s <= 50; $s++): ?>
                                <td><?= $po['size_' . $s] ?? 0 ?></td>
                            <?php endfor; ?>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h5 class="font-weight-bold mb-2">Production Record</h5>
        <div class="table-responsive mb-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TGL</th>
                        <th>QTY</th>
                        <?php for ($s = 36; $s <= 50; $s++): ?>
                            <th><?= $s ?></th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($item as $po): ?>
                    <?php if ($po['id_spk'] == $sp['id_spk'] && $po['id_dept'] == $dept['id_dept']): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $po['tgl_pr'] ?></td>
                            <td><?= $po['qty'] ?></td>
                            <?php for ($s = 36; $s <= 50; $s++): ?>
                                <td><?= $po['size_' . $s] ?? 0 ?></td>
                            <?php endfor; ?>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>

<?php elseif ($sp['brand_name'] == 'ROSSI'): ?>
            <h5 class="font-weight-bold mb-2">Size Run SPK - ROSSI</h5>
            <div class="table-responsive mb-5">
                <table class="table table-bordered text-center">
                    <thead class="thead-light">
                        <tr>
                            <?php foreach ($sizesRossi as $label): ?>
                            <th><?= strtoupper($label) ?></th>
                        <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sizeRossi as $po): ?>
                            <?php if ($po['id_spk'] == $sp['id_spk']): ?>
                                <tr>
                                    <?php foreach ($sizesRossi as $label): ?>
                                <td><?= $po['size_' . $label] ?? '-' ?></td>
                            <?php endforeach; ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Action Buttons -->

            <!-- Data Table -->
             <h5 class="font-weight-bold mb-2">Total Production</h5>
        <div class="table-responsive mb-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>QTY</th>
                        <?php foreach ($sizesRossi as $label): ?>
                            <th><?= strtoupper($label) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($spkitemRossi as $po): ?>
                    <?php if ($po['id_spk'] == $sp['id_spk'] && $po['id_dept'] == $dept['id_dept']): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $po['qty'] ?></td>
                            <?php foreach ($sizesRossi as $label): ?>
                                <td><?= $po['size_' . $label] ?? '-' ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h5 class="font-weight-bold mb-2">Production Record</h5>
        <div class="table-responsive mb-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TGL</th>
                        <th>QTY</th>
                        <?php foreach ($sizesRossi as $label): ?>
                            <th><?= strtoupper($label) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($itemRossi as $po): ?>
                    <?php if ($po['id_spk'] == $sp['id_spk'] && $po['id_dept'] == $dept['id_dept']): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $po['tgl_pr'] ?></td>
                            <td><?= $po['qty'] ?></td>
                            <?php foreach ($sizesRossi as $label): ?>
                                <td><?= $po['size_' . $label] ?? '-' ?></td>
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
<!-- /.container-fluid -->
</div>

<?php elseif ($sp['brand_name'] == 'ARIAT'): ?>
            <h5 class="font-weight-bold mb-2">Size Run SPK - ARIAT</h5>
            <div class="table-responsive mb-5">
                <table class="table table-bordered text-center">
                    <thead class="thead-light">
                        <tr>
                            <?php foreach ($sizesAriat as $s): ?>
                                <th><?= strtoupper(str_replace('_', '.', str_replace('_d', 'D', $s))) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sizeAriat as $po): ?>
                            <?php if ($po['id_spk'] == $sp['id_spk']): ?>
                                <tr>
                                    <?php foreach ($sizesAriat as $s): ?>
                                        <td><?= $po['size_' . $s] ?? '-' ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Action Buttons -->

            <!-- Data Table -->
             <h5 class="font-weight-bold mb-2">Total Production</h5>
        <div class="table-responsive mb-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>QTY</th>
                        <?php foreach ($sizesAriat as $s): ?>
                            <th><?= strtoupper(str_replace('_', '.', str_replace('_d', 'D', $s))) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($spkitemAriat as $po): ?>
                    <?php if ($po['id_spk'] == $sp['id_spk'] && $po['id_dept'] == $dept['id_dept']): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $po['qty'] ?></td>
                            <?php foreach ($sizesAriat as $s): ?>
                                <td><?= $po['size_' . $s] ?? '-' ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h5 class="font-weight-bold mb-2">Production Record</h5>
        <div class="table-responsive mb-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TGL</th>
                        <th>QTY</th>
                        <?php foreach ($sizesAriat as $s): ?>
                            <th><?= strtoupper(str_replace('_', '.', str_replace('_d', 'D', $s))) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($itemAriat as $po): ?>
                    <?php if ($po['id_spk'] == $sp['id_spk'] && $po['id_dept'] == $dept['id_dept']): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $po['tgl_pr'] ?></td>
                            <td><?= $po['qty'] ?></td>
                            <?php foreach ($sizesAriat as $s): ?>
                                <td><?= $po['size_' . $s] ?? '-' ?></td>
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
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
 <?php endif; ?>