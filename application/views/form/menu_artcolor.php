
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>


        <div class="row">
                <div class="col-md-4">
                    <?= form_error('form/artcolor','<div class="alert alert-danger" role="alert">', '
                    </div>'); ?>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newArtModal">Add New Art</a>
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Art Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($a as $ac) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $ac['art_name']?></td>
                            <td>
                                <a href="<?= base_url('form/delete_art/'.$ac['id_art'])?>" name="btn-delete" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>

                <div class="col-md-4">
                    <?= form_error('form/artcolor','<div class="alert alert-danger" role="alert">', '
                    </div>'); ?>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newColorModal">Add New Color</a>
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Color Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($c as $ac) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $ac['color_name']?></td>
                            <td>
                                <a href="<?= base_url('form/delete_color/'.$ac['id_color'])?>" name="btn-delete" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
        
        

        
                <div class="col-md-4">

                <?= form_error('form/artcolor','<div class="alert alert-danger" role="alert">', '
                    </div>'); ?>

                    <?= $this->session->flashdata('message'); ?>
                
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newArtColorModal">Add New Art&Color</a>
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Art&Color Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($ca as $ac) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $ac['artcolor_name']?></td>
                            <td>
                                <a href="<?= base_url('form/delete_artcolor/'.$ac['id_ac'])?>" name="btn-delete" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newArtColorModal" tabindex="-1" aria-labelledby="newArtColorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newArtColorModalLabel">Add New Art&Color</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('form/artcolor');?>" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <select name="art_name" id="art_name" class="form-control">
                            <option value="">Select Art</option>
                            <?php foreach($a as $ac) : ?>
                                <option value="<?= $ac['art_name'];?>"><?= $ac['art_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="color_name" id="color_name" class="form-control">
                            <option value="">Select Color</option>
                            <?php foreach($c as $ac) : ?>
                                <option value="<?= $ac['color_name'];?>"><?= $ac['color_name'];?></option>
                            <?php endforeach; ?>
                        </select>
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
<div class="modal fade" id="newArtModal" tabindex="-1" aria-labelledby="newArtModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newArtModalLabel">Add New Art</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('form/art');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="art_name" name="art_name" placeholder="Art Name">
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
<div class="modal fade" id="newColorModal" tabindex="-1" aria-labelledby="newColorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newColorModalLabel">Add New Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('form/color');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="color_name" name="color_name" placeholder="Color Name">
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