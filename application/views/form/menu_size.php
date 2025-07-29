
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-6">

            <?= form_error('form/size','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSizeModal">Add New Brand</a>

                <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Size Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($size as $s) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $s['size_name']?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#updateSizeModal<?= $s['id_size'] ?>">Edit</a>
                            <a href="<?= base_url('form/delete_size/'.$s['id_size'])?>" name="btn-delete" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newSizeModal" tabindex="-1" aria-labelledby="newSizeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newUnitModalLabel">Add New Size</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?= base_url('form/size');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="size_name" name="size_name" placeholder="Size Name">
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

<?php foreach($size as $s) : ?>
<div class="modal fade" id="updateSizeModal<?= $s['id_size'] ?>" tabindex="-1" aria-labelledby="updateSizeModalLabel<?= $s['id_size'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateSizeModalLabel<?= $s['id_size'] ?>">Update Size</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?= base_url('form/update_size/'.$s['id_size'])?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_unit" value="<?= $s['id_size']?>"> 
                    <div class="form-group">
                        <input type="text" class="form-control" id="size_name<?= $s['id_size'] ?>" name="size_name" value="<?= $s['size_name']?>" placeholder="Size Name">
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