
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">

            <?= form_error('executive/stock','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            

                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col-lg-2">#</th>
                        <th scope="col-lg-2">PO Number</th>
                        <th scope="col-lg-2">XFD</th>
                        <th scope="col-lg-2">Brand Name</th>
                        <th scope="col-lg-2">Art&Color Name</th>
                        <th scope="col-lg-2">Total QTY</th>
                        <th scope="col-lg-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($spk as $po) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $po['po_number'];?></td>
                        <td><?= $po['xfd'];?></td>
                        <td><?= $po['brand_name'];?></td>
                        <td><?= $po['artcolor_name'];?></td>
                        <td><?= $po['total_qty'];?></td>
                        <td>
                            <a type="button" class="badge badge-success"  href="<?=base_url('executive/stock_spk_brand/'.$po['id_spk'])?>" name="btn_add" style="margin:auto;">Stock Material</a>
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