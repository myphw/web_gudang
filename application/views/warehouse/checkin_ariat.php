<?php $sizes = ['6d','6_5d','7d','7_5d','8d','8_5d','9d','9_5d','10d','10_5d','11d','11_5d','12d','13d','14d','15d','16d']; 
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
                        <?php foreach ($sizes as $s): ?>
                            <th><?= strtoupper(str_replace('_', '.', str_replace('_d', 'D', $s))) ?></th>
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
                        <?php foreach ($sizes as $s): ?>
                            <td><?= $po['size_' . $s] ?? '-' ?></td>
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

<!-- Modal Check IN Ariat -->
<div class="modal fade" id="newCheckinModal" tabindex="-1" aria-labelledby="newCheckinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="newCheckinModalLabel">Add Material Check In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('warehouse/check_in_ariat'); ?>" method="post">
                <div class="modal-body">

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
                                <input type="text" name="brand" class="form-control" value="ARIAT" readonly>
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
                                <input type="number" name="qty" class="form-control" required min="0">
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


<!-------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------
 Modal Check IN SIZE RUN
 -------------------------------------------------------------------------------------------------------------
 -------------------------------------------------------------------------------------------------------------
 --------------------------------------------------------------------------------------------------------------->
<!-- Modal: Add Material Check In with SIZE (ARIAT) -->
<!-- New Checkin Modal -->
<div class="modal fade" id="newCheckinSIZEModal" tabindex="-1" aria-labelledby="newCheckinSIZEModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newCheckinSIZEModalLabel">Add Material Check In (ARIAT)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('warehouse/check_in_ariat'); ?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_transaksi">ID Transaksi</label>
                <input type="text" id="id_transaksi" name="id_transaksi" class="form-control" 
                       value="WG-<?= date('Y') . random_string('numeric', 8); ?>" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" class="form-control" value="ARIAT" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" class="form-control" value="CHECK IN" readonly>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="tanggal_masuk">Date Check IN</label>
            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control">
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_sj">No Surat Jalan</label>
                <input type="text" id="no_sj" name="no_sj" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="supplier">Supplier</label>
                <input type="text" id="supplier" name="supplier" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="po_number">PO Number</label>
            <input type="text" id="po_number" name="po_number" class="form-control">
          </div>

          <div class="form-group">
            <label for="art">Art</label>
            <input type="text" id="art" name="art" class="form-control">
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_material">Jenis Material</label>
                <input type="text" id="jenis_material" name="jenis_material" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_material">Kode Material</label>
                <input type="text" id="kode_material" name="kode_material" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="nama_material">Nama Material</label>
            <input type="text" id="nama_material" name="nama_material" class="form-control">
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" id="qty" name="qty" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" id="unit" name="unit" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="ket">XFD</label>
            <input type="text" id="ket" name="ket" class="form-control">
          </div>

          <hr>
          <center><strong>-- SIZE RUN --</strong></center><br>

          <?php
            $sizes = ['6D', '6TD', '7D', '7TD', '8D', '8TD', '9D', '9TD', '10D', '10TD', '11D', '11TD', '12D', '13D', '14D', '15D'];
            foreach (array_chunk($sizes, 4) as $rowSizes): ?>
              <div class="row">
                <?php foreach ($rowSizes as $size): 
                  $inputName = 's' . strtolower($size);
                ?>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="<?= $inputName ?>">Size <?= $size ?></label>
                      <input type="number" id="<?= $inputName ?>" name="<?= $inputName ?>" class="form-control">
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
          <?php endforeach; ?>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------
MODAL UNTUK CHECK OUT 
-----------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------- -->





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