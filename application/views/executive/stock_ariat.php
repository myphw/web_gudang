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
            <?php endforeach; ?>
                <a href="<?= base_url().'executive/stock';?>" class="btn btn-secondary mb-3" ><i class="fas fa-reply"></i> BACK</a>
                <table id="myTable" class="table table-bordered table-responsive">
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
                        <td><?= $po['qty']?></td>
                        <td><?= $po['total_consrate']?></td>
                        <td><?= $po['checkin_qty']?></td>
                        <td><?= $po['checkin_balance']?></td>
                        <td><?= $po['checkout_qty']?></td>
                        <td><?= $po['checkout_balance']?></td>
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