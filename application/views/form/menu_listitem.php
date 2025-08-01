
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-6">

            <?= form_error('form/listitem','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newListItemModal">Add New</a>

                <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Unit Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($listitem as $li) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $li['item_name']?></td>
                        <td><?= $li['unit_name']?></td>
                        <td>
                            <a href="<?= base_url('form/delete_listitem/'.$li['id_listitem'])?>" name="btn-delete" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newListItemModal" tabindex="-1" aria-labelledby="newListItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newListItemModalLabel">Add New List Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?= base_url('form/listitem');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name">
                    </div>
                    <div class="form-group">
                        <select name="unit_name" id="unit_name" class="form-control">
                            <option value="">Select Unit</option>
                            <?php foreach($unit as $li) : ?>
                                <option value="<?= $li['unit_name'];?>"><?= $li['unit_name'];?></option>
                            <?php endforeach; ?>
                        </select>
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