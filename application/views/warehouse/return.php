
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">


                <?= $this->session->flashdata('message'); ?>

                <a href="" class="badge badge-success mb-3" data-toggle="modal" data-target="#newSjPrModal">INPUT ITEM</a>
                                   
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col-lg-2">#</th>
                        <th scope="col-lg-2">NO. TANDA TERIMA</th>
                        <th scope="col-lg-2">NO.PO</th>
                        <th scope="col-lg-2">BRAND</th>
                        <th scope="col-lg-2">TOTAL QTY</th>
                        <th scope="col-lg-2">FROM</th>
                        <th scope="col-lg-2">TO</th>
                        <th scope="col-lg-2">CREATED AT</th>
                        <th scope="col-lg-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($report as $po) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $po['no_ir']?></td>
                        <td><?= $po['po_number']?></td>
                        <td><?= $po['brand_name']?></td>
                        <td><?= $po['total_qty']?></td>
                        <td><?= $po['dept_name1']?></td>
                        <td><?= $po['to']?></td>
                        <td><?= $po['created_at']?></td>
                        <td>
                            <a href="<?= base_url('warehouse/sj_retur_item/' . $po['id_ir']) ?>" class="badge badge-info">View</a>
                            <a href="<?= base_url('warehouse/delete_sj_retur/'.$po['id_ir'])?>" name="btn-delete" class="badge badge-danger">delete</a>
                            
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    
                </tbody>
                </table>
</div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newSjPrModal" tabindex="-1" aria-labelledby="newSjPrModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSjPrModalLabel">NEW ITEM TO RETURN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('warehouse/retur');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="po_number" id="po_number" class="form-control" required>
                            <option value="">Select PO</option>
                            <?php foreach($spk as $c): ?>
                                <option value="<?= $c['po_number']; ?>" 
                                        data-id_spk="<?= $c['id_spk']; ?>"
                                        data-brand="<?= $c['brand_name']; ?>"
                                        data-total_qty="<?= $c['total_qty']; ?>">
                                    <?= $c['po_number']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="hidden" name="id_spk">
                    <div class="form-group">
                        <label for="brand_name">Brand</label>
                        <input type="text" name="brand_name" class="form-control" id="brand_name" readonly placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="total_qty">Total QTY</label>
                        <input type="text" name="total_qty" class="form-control" id="total_qty" readonly placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <label for="dept_name1">From Departement</label>
                        <input type="text" name="dept_name1" class="form-control" id="dept_name1" readonly value="WAREHOUSE" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="to">TO</label>
                        <select name="to" id="to" class="form-control" required>
                            <option value="">-- Select --</option>
                            <option value="MANGUL JAYA">MANGUL JAYA</option>
                        </select>
                    </div>
                        
                        <div class="form-group">
                            <label for="no_ir" >NO. Tanda Terima</label>
                            <input type="text" name="no_ir" class="form-control" id="no_ir" value="<?= $datanoir;?>" readonly placeholder="">
                        </div>
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

     