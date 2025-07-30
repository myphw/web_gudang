
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-6">

            <?= form_error('production/dept','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDeptModal">New Departement</a>
                
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">From Departement</th>
                        <th scope="col">To Departement</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($dept as $b) : ?>
                    <tr>
                        <th scope="dept"><?= $i; ?></th>
                        <td><?= $b['dept_name1']?></td>
                        <td><?= $b['dept_name2']?></td>
                        <td>
                            <a href="<?= base_url('production/delete_dept/'.$b['id_dept'])?>" name="btn-delete" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newDeptModal" tabindex="-1" aria-labelledby="newDeptModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newDeptModalLabel">New Departement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="<?= base_url('production/dept');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="dept_name1" name="dept_name1" placeholder="From Departement">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="dept_name2" name="dept_name2" placeholder="To Departement">
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