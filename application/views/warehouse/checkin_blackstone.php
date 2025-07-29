
 <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-12">

            <!-- Form validation error messages (optional fix: loop over each field if needed) -->
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
            
            <!-- Action Buttons -->
            <a href="<?= base_url('warehouse/index_checkin'); ?>" class="btn btn-secondary mb-3">
                <i class="fas fa-reply"></i> BACK
            </a>

            <!-- Data Table -->
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th scope="col-lg-2">#</th>
                        <th scope="col-lg-2">Part</th>
                        <th scope="col-lg-2">Descriptions</th>
                        <th scope="col-lg-2">Colour</th>
                        <th scope="col-lg-2">Ukuran MTRL</th>
                        <th scope="col-lg-2">Unit</th>
                        <th scope="col-lg-2">QTY</th>
                        <th scope="col-lg-2">Total Cons Rate</th>
                        <th scope="col-lg-2">Checkin QTY</th>
                        <th scope="col-lg-2">Checkin Balance</th>
                        <th scope="col-lg-2">Checkout QTY</th>
                        <th scope="col-lg-2">Checkout Balance</th>
                        
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
                        <td><?= $po['qty']?></td>
                        <td><?= $po['total_consrate']?></td>
                        <td><?= $po['checkin_qty']?></td>
                        <td><?= $po['checkin_balance']?></td>
                        <td><?= $po['checkout_qty']?></td>
                        <td><?= $po['checkout_balance']?></td>
                        
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
<!-- Modal: Check IN Biasa -->
<div class="modal fade" id="newCheckinModal" tabindex="-1" role="dialog" aria-labelledby="newCheckinModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('warehouse/check_in_blackstone'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCheckinModalLabel">Add Material Check In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Row 1: ID Transaksi, Brand, Keterangan -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ID Transaksi</label>
                                <input type="text" name="id_transaksi" class="form-control" value="WG-<?= date("Y") . random_string('numeric', 8); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" name="brand" class="form-control" value="BLACKSTONE" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Check IN</label>
                                <input type="text" name="keterangan" class="form-control" value="CHECK IN" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <label>Date Check IN</label>
                        <input type="date" name="tanggal_masuk" class="form-control">
                    </div>

                    <!-- Row 2: No SJ, Supplier -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Surat Jalan</label>
                                <input type="text" name="no_sj" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier</label>
                                <input type="text" name="supplier" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- Row 3: Jenis & Kode Material -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Material</label>
                                <input type="text" name="jenis_material" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- Nama Material -->
                    <div class="form-group">
                        <label>Nama Material</label>
                        <input type="text" name="nama_material" class="form-control">
                    </div>

                    <!-- Row 4: Qty, Unit -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="qty" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unit</label>
                                <input type="text" name="unit" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!--Modal Check IN Biasa-->
<!--Modal Check IN SIZE RUN-->
<!-- Modal: Check IN with SIZE Run -->
<div class="modal fade" id="newCheckinSIZEModal" tabindex="-1" aria-labelledby="newCheckinSIZEModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('warehouse/check_in_blackstone'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCheckinSIZEModalLabel">Add Material Check In (SIZE Run)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Row: ID, Brand, Keterangan -->
                    <div class="row">
                        <div class="col-md-4">
                            <label>ID Transaksi</label>
                            <input type="text" name="id_transaksi" class="form-control" value="WG-<?= date("Y") . random_string('numeric', 8); ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label>Check IN</label>
                            <input type="text" name="keterangan" class="form-control" value="CHECK IN" readonly>
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="form-group mt-3">
                        <label>Date Check IN</label>
                        <input type="date" name="tanggal_masuk" class="form-control" required>
                    </div>

                    <!-- Row: No SJ & Supplier -->
                    <div class="row">
                        <div class="col-md-6">
                            <label>No Surat Jalan</label>
                            <input type="text" name="no_sj" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Supplier</label>
                            <input type="text" name="supplier" class="form-control" required>
                        </div>
                    </div>

                    <!-- Row: Jenis & Kode Material -->
                    <div class="row">
                        <div class="col-md-6">
                            <label>Jenis Material</label>
                            <input type="text" name="jenis_material" class="form-control">
                        </div>
                    </div>

                    <!-- Nama Material -->
                    <div class="form-group mt-3">
                        <label>Nama Material</label>
                        <input type="text" name="nama_material" class="form-control">
                    </div>

                    <!-- Qty & Unit -->
                    <div class="row">
                        <div class="col-md-6">
                            <label>Quantity</label>
                            <input type="number" name="qty" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Unit</label>
                            <input type="text" name="unit" class="form-control">
                        </div>
                    </div>

                    <!-- SIZE RUN Section -->
                    <hr>
                    <div class="text-center mb-2"><strong>-- SIZE RUN --</strong></div>
                    <div class="row">
                        <?php
                        for ($i = 36; $i <= 50; $i++) {
                            echo '<div class="col-md-3 mb-2">
                                    <label for="s' . $i . '">Size ' . $i . '</label>
                                    <input type="number" name="s' . $i . '" class="form-control" min="0">
                                  </div>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal Check IN SIZE RUN-->
<!--MODAL UNTUK CHECK OUT-->
<?php foreach($in as $ci) : ?>
<div class="modal fade" id="CheckoutMaterialModalBiasa<?= $ci['id_transaksi'] ?>" tabindex="-1">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('warehouse/update_checkout_blackstone/'.$ci['id_transaksi']) ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="CheckoutMaterialModalBiasa<?= $ci['id_transaksi'] ?>">Check OUT Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id_checkin" value="<?= $ci['id_checkin'] ?>">

                    <div class="row">
                        <div class="col-md-4">
                            <label>ID Transaksi</label>
                            <input type="text" class="form-control" value="<?= $ci['id_transaksi'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label>Check OUT</label>
                            <input type="text" name="keterangan" class="form-control" value="CHECK OUT" readonly>
                        </div>
                        <div class="col-md-4">
                            <label>No Surat Jalan</label>
                            <input type="text" name="no_sj" class="form-control" value="<?= $ci['no_sj'] ?>" readonly>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Supplier</label>
                            <input type="text" name="supplier" class="form-control" value="<?= $ci['supplier'] ?>" readonly>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Date Check IN</label>
                            <input type="text" name="tanggal_masuk" class="form-control" value="<?= $ci['tanggal_masuk'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label>Date Check OUT</label>
                            <input type="date" name="tanggal_keluar" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>TO Department</label>
                            <select class="form-control" name="dept_tujuan" required>
                                <option value="">-- Send TO --</option>
                                <option value="CUTTING">CUTTING</option>
                                <option value="SEWING">SEWING</option>
                                <option value="SEMI WH">SEMI WH</option>
                                <option value="LASTING">LASTING</option>
                                <option value="FINISHING">FINISHING</option>
                                <option value="PACKING">PACKING</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Jenis Material</label>
                            <input type="text" name="jenis_material" class="form-control" value="<?= $ci['jenis_material'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Material</label>
                        <input type="text" name="nama_material" class="form-control" value="<?= $ci['nama_material'] ?>" readonly>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Quantity</label>
                            <input type="number" name="qty" class="form-control" value="<?= $ci['qty'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>Unit</label>
                            <input type="text" name="unit" class="form-control" value="<?= $ci['unit'] ?>" readonly>
                        </div>
                    </div>

                    <!-- Size Run Section -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning"><b>! CHECK OUT !</b></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php foreach($in as $ci) : ?>
<div class="modal fade" id="CheckoutMaterialModalSize<?= $ci['id_transaksi'] ?>" tabindex="-1" aria-labelledby="CheckoutMaterialModalSize<?= $ci['id_transaksi'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('warehouse/update_checkout_blackstone/'.$ci['id_transaksi']) ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="CheckoutMaterialModalSize<?= $ci['id_transaksi'] ?>">Check OUT Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id_transaksi" value="<?= $ci['id_transaksi'] ?>">

                    <div class="row">
                        <div class="col-md-4">
                            <label>ID Transaksi</label>
                            <input type="text" class="form-control" value="<?= $ci['id_transaksi'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label>Check OUT</label>
                            <input type="text" name="keterangan" class="form-control" value="CHECK OUT" readonly>
                        </div>
                        <div class="col-md-4">
                            <label>No Surat Jalan</label>
                            <input type="text" name="no_sj" class="form-control" value="<?= $ci['no_sj'] ?>" readonly>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Supplier</label>
                            <input type="text" name="supplier" class="form-control" value="<?= $ci['supplier'] ?>" readonly>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Date Check IN</label>
                            <input type="text" name="tanggal_masuk" class="form-control" value="<?= $ci['tanggal_masuk'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label>Date Check OUT</label>
                            <input type="date" name="tanggal_keluar" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>TO Department</label>
                            <select class="form-control" name="dept_tujuan" required>
                                <option value="">-- Send TO --</option>
                                <option value="CUTTING">CUTTING</option>
                                <option value="SEWING">SEWING</option>
                                <option value="SEMI WH">SEMI WH</option>
                                <option value="LASTING">LASTING</option>
                                <option value="FINISHING">FINISHING</option>
                                <option value="PACKING">PACKING</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Jenis Material</label>
                            <input type="text" name="jenis_material" class="form-control" value="<?= $ci['jenis_material'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Material</label>
                        <input type="text" name="nama_material" class="form-control" value="<?= $ci['nama_material'] ?>" readonly>
                    </div>

                    <!-- Size Run Section -->
                    <hr>
                    <div class="text-center mb-3"><strong>-- SIZE RUN --</strong></div>
                    <div class="row">
                        <?php for ($i = 36; $i <= 50; $i++) : ?>
                            <div class="col-md-3 mb-2">
                                <label>Size <?= $i ?></label>
                                <input type="number" name="s<?= $i ?>" class="form-control" value="<?= $ci['s'.$i] ?? 0 ?>">
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning"><b>! CHECK OUT !</b></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>


<!--MODAL UNTUK CHECK OUT-->
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