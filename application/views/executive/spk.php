
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">

            <?= form_error('executive','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            
                <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PO Number</th>
                        <th>XFD</th>
                        <th>Brand Name</th>
                        <th>Art&Color Name</th>
                        <th>Total QTY</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($spk as $po): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $po['po_number']; ?></td>
                        <td><?= $po['xfd']; ?></td>
                        <td><?= $po['brand_name']; ?></td>
                        <td><?= $po['artcolor_name']; ?></td>
                        <td><?= $po['total_qty']; ?></td>
                        <td>
                            <a class="badge badge-success" href="<?= base_url('executive/view_spk_size_brand/'.$po['id_spk']) ?>">VIEW SIZE</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




