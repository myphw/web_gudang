
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-6">

            <?= form_error('form/unit','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newUnitModal">Add New</a>

                <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Unit Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($unit as $u) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $u['unit_name']?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#updateUnitModal<?= $u['id_unit'] ?>">Edit</a>
                            <a href="<?= base_url('form/delete_unit/'.$u['id_unit'])?>" name="btn-delete" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newUnitModal" tabindex="-1" aria-labelledby="newUnitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newUnitModalLabel">Add New Unit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?= base_url('form/unit');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="Unit Name">
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

<?php foreach($unit as $u) : ?>
<div class="modal fade" id="updateUnitModal<?= $u['id_unit'] ?>" tabindex="-1" aria-labelledby="updateUnitModalLabel<?= $u['id_unit'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateUnitModalLabel<?= $u['id_unit'] ?>">Update unit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?= base_url('form/update_unit/'.$u['id_unit'])?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_unit" value="<?= $u['id_unit']?>"> 
                    <div class="form-group">
                        <input type="text" class="form-control" id="unit_name<?= $u['id_unit'] ?>" name="unit_name" value="<?= $u['unit_name']?>" placeholder="Unit Name">
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
<?php endforeach; ?>