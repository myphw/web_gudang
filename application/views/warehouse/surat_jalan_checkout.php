
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">

            <?= form_error('form','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>PO Number</th>
                        <th>Art & Color</th>
                        <th>Brand</th>
                        <th>Tgl Checkout</th>
                        <th>TO Dept</th>
                        <th>Realtime  Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($sj_checkout as $co) : ?>
                    <tr>
                        <th><?= $i; ?></th>
                        <td><?= $co['no_sj']?></td>
                        <td><?= $co['po_number']?></td>
                        <td><?= $co['artcolor_name']?></td>
                        <td><?= $co['brand_name']?></td>
                        <td><?= $co['tgl_checkout']?></td>
                        <td><?= $co['to_dept']?></td>
                        <td><?= $co['created_at']?></td>
                        <td>
                            
                            <a href="<?= base_url('warehouse/sj_detail_item_checkout/' . $co['id_spk'] . '/' . $co['id_sj']) ?>" class="badge badge-success">Detail</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
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
<div class="modal fade" id="newCheckinModal" tabindex="-1" aria-labelledby="newCheckinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newCheckinModalLabel">Add Material Check In</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?= base_url('warehouse');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_transaksi">ID Transaksi</label>
                        <input type="text" name="id_transaksi" class="form-control" value="WG-<?=date("Y");?><?=random_string('numeric', 8);?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Date Check IN</label>
                        <input type="date" name="tanggal_masuk" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="no_sj">No Surat Jalan</label>
                        <input type="text" name="no_sj" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <input type="text" name="supplier" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="po_number">PO Number</label>
                        <input type="text" name="po_number" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="art">Art</label>
                        <input type="text" name="art" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="kode_material">Kode Material</label>
                        <input type="text" name="kode_material" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="nama_material">Nama Material</label>
                        <input type="text" name="nama_material" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="text" name="qty" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <input type="text" name="ket" class="form-control" >
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