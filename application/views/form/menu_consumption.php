
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">

            <?= form_error('form/consumption','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newConsumptionModal">Add New</a>

                <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Art&Color Name</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Unit Name</th>
                        <th scope="col">Cons rate</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($consumption as $c) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $c['artcolor_name']?></td>
                        <td><?= $c['item_name']?></td>
                        <td><?= $c['unit_name']?></td>
                        <td><?= $c['cons_rate']?></td>
                        <td>
                            <!-- <a href="" class="badge badge-success" data-toggle="modal" data-target="#updateConsumptionModal<?= $c['id_consrate']?>">Edit</a> -->
                            <a href="<?= base_url('form/delete_consumption/'.$c['id_consrate'])?>" name="btn-delete" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newConsumptionModal" tabindex="-1" aria-labelledby="newConsumptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newConsumptionModalLabel">Add New Consumption Rate</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('form/consumption');?>" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <select name="artcolor_name" id="artcolor_name" class="form-control">
                            <option value="">Select Art & Color</option>
                            <?php foreach($artcolor as $ac) : ?>
                                <option value="<?= $ac['artcolor_name'];?>"><?= $ac['artcolor_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="item_name" id="item_name" class="form-control" required>
                            <option value="">Select Item</option>
                            <?php foreach($listitem as $c): ?>
                                <option value="<?= $c['item_name']; ?>" 
                                        data-unit="<?= $c['unit_name']; ?>">
                                    <?= $c['item_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="Unit Name" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="cons_rate" name="cons_rate" placeholder="Cons Rate">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach($consumption as $c) : ?>
<div class="modal fade" id="updateConsumptionModal<?= $c['id_consrate'] ?>" tabindex="-1" aria-labelledby="updateConsumptionModalLabel<?= $c['id_consrate'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateConsumptionModalLabel<?= $c['id_consrate'] ?>">Update List Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('form/update_consumption/'.$c['id_consrate'])?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_consrate" value="<?= $c['id_consrate']?>"> 
                    <div class="form-group">
                        <select name="artcolor_name" id="artcolor_name" class="form-control">
                            <option value=""><?= $c['artcolor_name']?></option>
                            <?php foreach($artcolor as $ac) : ?>
                                <option value="<?= $ac['artcolor_name'];?>"><?= $ac['artcolor_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $c['item_name']?>" placeholder="Item Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="unit_name" name="unit_name" value="<?= $c['unit_name']?>" placeholder="Unit Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="cons_rate" name="cons_rate" value="<?= $c['cons_rate']?>" placeholder="Cons Rate">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>        