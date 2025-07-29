
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">

            <?= form_error('form/spk','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSpkModal">Add New</a>

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
                            <a type="button" class="badge badge-success"  href="<?=base_url('form/update_spk_size_brand/'.$po['id_spk'])?>" name="btn_add" style="margin:auto;">EDIT</a>
                            <a href="<?= base_url('form/delete_spk/'.$po['id_spk'])?>" name="btn-delete" class="badge badge-danger">DELETE</a>
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
<div class="modal fade" id="newSpkModal" tabindex="-1" aria-labelledby="newSpkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSpkModalLabel">Add New SPK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('form/spk');?>" method="post">
                <div class="modal-body">    
                    <div class="form-group">
                        <input type="text" class="form-control" id="po_number" name="po_number" placeholder="PO Number">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="xfd" name="xfd" placeholder="XFD">
                    </div>
                    <div class="form-group">
                        <select name="brand_name" id="brand_name" class="form-control">
                            <option value="">Select Brand</option>
                            <?php foreach($brand as $b) : ?>
                                <option value="<?= $b['brand_name'];?>"><?= $b['brand_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="artcolor_name" id="artcolor_name" class="form-control">
                            <option value="">Select Color</option>
                            <?php foreach($artcolor as $ac) : ?>
                                <option value="<?= $ac['artcolor_name'];?>"><?= $ac['artcolor_name'];?></option>
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

<?php foreach($spk as $sk) : ?>
<div class="modal fade" id="updateSPKModal<?= $sk['id_spk'] ?>" tabindex="-1" aria-labelledby="updateSPKModalLabel<?= $sk['id_spk'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSPKModalLabel<?= $sk['id_spk'] ?>">Edit SPK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('form/update_spk/'.$sk['id_spk']);?>" method="post">
                <div class="modal-body">  
                    <input type="hidden" name="id_unit" value="<?= $sk['id_spk'];?>">  
                    <div class="form-group">
                        <input type="text" class="form-control" id="po_number<?= $sk['id_spk'];?>" name="po_number" value="<?= $sk['po_number'];?>" placeholder="PO Number">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="xfd" name="xfd" value="<?= $sk['xfd'];?>" placeholder="XFD">
                    </div>
                    <div class="form-group">
                        <select name="brand_name" id="brand_name" class="form-control">
                            <option value="<?= $sk['brand_name'];?>"><?= $sk['brand_name'];?></option>
                            <?php foreach($brand as $b) : ?>
                                <option value="<?= $b['brand_name'];?>"><?= $b['brand_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="artcolor_name" id="artcolor_name" class="form-control">
                            <option value="<?= $sk['artcolor_name'];?>"><?= $sk['artcolor_name'];?></option>
                            <?php foreach($artcolor as $ac) : ?>
                                <option value="<?= $ac['artcolor_name'];?>"><?= $ac['artcolor_name'];?></option>
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
<?php endforeach; ?>