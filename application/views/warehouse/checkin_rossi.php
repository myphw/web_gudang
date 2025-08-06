<?php
$sizes = ['3', '3t', '4', '4t', '5', '5t', '6', '6t', '7', '7t', '8', '8t', '9', '9t', '10', '10t', '11', '11t', '12', '13', '14', '15'];

// assign currently selected SJ
$current_sj = !empty($insj) ? $insj[0] : null;
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">

            <?= form_error('form','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

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
                <a href="<?= base_url('warehouse/update_sj_item/'.$sp['id_spk']); ?>" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i> SURAT JALAN
                </a>
            <?php endforeach; ?>
                <a href="<?= base_url().'warehouse/index_checkin';?>" class="btn btn-secondary mb-3" ><i class="fas fa-reply"></i> BACK</a>
                <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th scope="col-lg-2">#</th>
                        <th scope="col-lg-2">Part</th>
                        <th scope="col-lg-2">Descriptions</th>
                        <th scope="col-lg-2">Colour</th>
                        <th scope="col-lg-2">Ukuran MTRL</th>
                        <th scope="col-lg-2">Unit</th>
                        <th scope="col-lg-2">Total Cons Rate</th>
                        <th scope="col-lg-2">Checkin QTY</th>
                        <th scope="col-lg-2">Checkout QTY</th>
                        <th scope="col-lg-2">Total Stock</th>
                        <?php foreach ($sizes as $label): ?>
                            <th><?= strtoupper($label) ?></th>
                        <?php endforeach; ?>
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
                        <td><?= $po['total_consrate']?></td>
                        <td><?= $po['checkin_qty']?></td>
                        <td><?= $po['checkout_qty']?></td>
                        <td><?= $po['qty']?></td>
                        <?php foreach ($sizes as $label): ?>
                                <td><?= $po['size_' . $label] ?? '-' ?></td>
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


<!-- Modal Check IN Biasa -->
<div class="modal fade" id="newCheckinModal" tabindex="-1" aria-labelledby="newCheckinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="newCheckinModalLabel">Add Material Check In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('warehouse/check_in_rossi'); ?>" method="post">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_transaksi">ID Transaksi</label>
                                <input type="text" name="id_transaksi" class="form-control" value="WG-<?= date('Y'); ?><?= random_string('numeric', 8); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <input type="text" name="brand" class="form-control" value="ROSSI" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan">Check IN</label>
                                <input type="text" name="keterangan" class="form-control" value="CHECK IN" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Date Check IN</label>
                        <input type="date" name="tanggal_masuk" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_sj">No Surat Jalan</label>
                                <input type="text" name="no_sj" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <input type="text" name="supplier" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="po_number">PO Number</label>
                        <input type="text" name="po_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="art">Art</label>
                        <input type="text" name="art" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_material">Jenis Material</label>
                                <input type="text" name="jenis_material" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_material">Kode Material</label>
                                <input type="text" name="kode_material" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_material">Nama Material</label>
                        <input type="text" name="nama_material" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" step="any" name="qty" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" name="unit" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ket">XFD</label>
                        <input type="text" name="ket" class="form-control">
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

<!-- Modal Check IN SIZE -->
<div class="modal fade" id="newCheckinSIZEModal" tabindex="-1" aria-labelledby="newCheckinSIZEModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="newCheckinSIZEModalLabel">Add Material Check In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('warehouse/check_in_rossi'); ?>" method="post">
                <div class="modal-body">

                    <!-- Basic Info -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_transaksi">ID Transaksi</label>
                                <input type="text" name="id_transaksi" class="form-control" value="WG-<?= date("Y"); ?><?= random_string('numeric', 8); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <input type="text" name="brand" class="form-control" value="ROSSI" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan">Check IN</label>
                                <input type="text" name="keterangan" class="form-control" value="CHECK IN" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Date Check IN</label>
                        <input type="date" name="tanggal_masuk" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_sj">No Surat Jalan</label>
                                <input type="text" name="no_sj" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <input type="text" name="supplier" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="po_number">PO Number</label>
                        <input type="text" name="po_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="art">Art</label>
                        <input type="text" name="art" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_material">Jenis Material</label>
                                <input type="text" name="jenis_material" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_material">Kode Material</label>
                                <input type="text" name="kode_material" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_material">Nama Material</label>
                        <input type="text" name="nama_material" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" name="qty" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" name="unit" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ket">XFD</label>
                        <input type="text" name="ket" class="form-control">
                    </div>

                    <!-- Size Run -->
                    <hr>
                    <center><p><strong>-- SIZE RUN --</strong></p></center>
                    <div class="row">
                        <?php
                        $sizes = [
                            's3' => 'Size 3', 's3t' => 'Size 3T',
                            's4' => 'Size 4', 's4t' => 'Size 4T',
                            's5' => 'Size 5', 's5t' => 'Size 5T',
                            's6' => 'Size 6', 's6t' => 'Size 6T',
                            's7' => 'Size 7', 's7t' => 'Size 7T',
                            's8' => 'Size 8', 's8t' => 'Size 8T',
                            's9' => 'Size 9', 's9t' => 'Size 9T',
                            's10' => 'Size 10', 's10t' => 'Size 10T',
                            's11' => 'Size 11', 's11t' => 'Size 11T',
                            's12' => 'Size 12', 's13' => 'Size 13',
                            's14' => 'Size 14', 's15' => 'Size 15'
                        ];
                        foreach ($sizes as $name => $label): ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="<?= $name ?>"><?= $label ?></label>
                                    <input type="number" name="<?= $name ?>" class="form-control" min="0">
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



<script>

  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  });

</script>