
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-6">

            <?= form_error('form','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newBrandModal">Add New</a>

                <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($brand as $b) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $b['brand_name']?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#updateBrandModal<?= $b['id_brand'] ?>">Edit</a>
                            <a href="<?= base_url('form/delete_brand/'.$b['id_brand'])?>" name="btn-delete" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newBrandModal" tabindex="-1" aria-labelledby="newBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newBrandModalLabel">Add New Brand</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?= base_url('form');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Brand Name">
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

<?php foreach($brand as $b) : ?>
<div class="modal fade" id="updateBrandModal<?= $b['id_brand'] ?>" tabindex="-1" aria-labelledby="updateBrandModalLabel<?= $b['id_brand'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateBrandModalLabel<?= $b['id_brand'] ?>">Update Brand</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?= base_url('form/update_brand/'.$b['id_brand'])?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_brand" value="<?= $b['id_brand']?>"> 
                    <div class="form-group">
                        <input type="text" class="form-control" id="brand_name<?= $b['id_brand'] ?>" name="brand_name" value="<?= $b['brand_name']?>" placeholder="Brand Name">
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