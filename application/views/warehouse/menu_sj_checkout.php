<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>



    <div class="row">
        <div class="col-lg-12">

            <?= form_error('form/update_sj_CHECKOUT', '<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <?php foreach ($spk as $sp): ?>
                <div class="box-body">
                    <div class="form-group" style="display:inline-block;">
                        <input type="hidden" name="id_spk" value="<?= $sp['id_spk'] ?>">
                        <label for="po_number" style="width:87%;margin-left: 0px;">PO number</label>
                        <input type="text" name="po_number" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="po_number" value="<?= $sp['po_number'] ?>" readonly placeholder="PO Number">
                    </div>
                    <div class="form-group" style="display:inline-block;">
                        <label for="xfd" style="width:73%;">XFD</label>
                        <input type="date" name="xfd" style="width:90%;margin-right: px;" class="form-control" id="xfd" value="<?= $sp['xfd'] ?>" readonly placeholder="XFD">
                    </div>
                    <div class="form-group" style="display:inline-block;">
                        <label for="brand_name" style="width:87%;margin-left: 0px;">Brand</label>
                        <input type="text" name="brand_name" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="brand_name" value="<?= $sp['brand_name'] ?>" readonly placeholder="Brand">
                    </div>
                    <div class="form-group" style="display:inline-block;">
                        <label for="artcolor_name" style="width:87%;margin-left: 0px;">Art & Color</label>
                        <input type="text" name="artcolor_name" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="artcolor_name" value="<?= $sp['artcolor_name'] ?>" readonly placeholder="Art & Color">
                    </div>
                    <div class="form-group" style="display:inline-block;">
                        <label for="qty_total" style="width:87%;margin-left: 0px;">Total QTY</label>
                        <input type="text" name="total_qty" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="total_qty" value="<?= $sp['total_qty'] ?>" readonly placeholder="">
                    </div>
                </div>

            <?php endforeach; ?>
            <a href="" class="badge badge-success mb-3" data-toggle="modal" data-target="#newSpkItemModal">INPUT SURAT PENGELUARAN</a>
            <a type="button" class="badge badge-warning mb-3" href="<?= base_url('warehouse/index_checkout') ?>" name="btn_add" style="margin:auto;">BACK</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col-lg-2">#</th>
                        <th scope="col-lg-2">NO. SJ</th>
                        <th scope="col-lg-2">Tanggal CheckOUT</th>
                        <th scope="col-lg-2">From</th>
                        <th scope="col-lg-2">TO Department</th>
                        <th scope="col-lg-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spkitem as $po) : ?>
                        <?php if ($po['id_spk'] == $sp['id_spk']): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $po['no_sj'] ?></td>
                                <td><?= $po['tgl_checkout'] ?></td>
                                <td><?= $po['from'] ?></td>
                                <td><?= $po['to_dept'] ?></td>
                                <td>
                                    <a class="badge badge-primary mb-3" href="<?= base_url('warehouse/sj_detail_item_checkout/' . $po['id_spk'] . '/' . $po['id_sj']) ?>" name="btn_add" style="margin:auto;">View SJ</a>
                                    <!-- <a href="<?= base_url('warehouse/delete_sj_checkout/' . $po['id_sj']) ?>" name="btn-delete" class="badge badge-danger">delete</a> -->

                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endif; ?>
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
<?php foreach ($spk as $sp) : ?>
    <div class="modal fade" id="newSpkItemModal" tabindex="-1" aria-labelledby="newSpkItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSpkItemModalLabel">Add New SJ Check OUT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('warehouse/update_sj_checkout/' . $sp['id_spk']); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_spk" value="<?= $sp['id_spk']; ?>">
                        <input type="hidden" name="po_number" value="<?= $sp['po_number']; ?>">
                        <input type="hidden" name="xfd" value="<?= $sp['xfd']; ?>">
                        <input type="hidden" name="brand_name" value="<?= $sp['brand_name']; ?>">
                        <input type="hidden" name="artcolor_name" value="<?= $sp['artcolor_name']; ?>">
                        <div class="form-group">
                            <label for="no_sj">No. SJ</label>
                            <input type="text" name="no_sj" class="form-control" id="no_sj" placeholder="NO SJ" value="<?= $datanosj; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_checkout">Tanggal CheckOUT</label>
                            <input type="date" name="tgl_checkout" class="form-control" id="tgl_checkout" placeholder="Tanggal Checkin">
                        </div>
                        <div class="form-group">
                            <label for="from">From</label>
                            <input type="text" name="from" class="form-control" id="from" value="WAREHOUSE" readonly placeholder="Nama Supplier">
                        </div>
                        <div class="form-group">
                            <label for="to_dept">TO Department</label>
                            <select class="form-control" name="to_dept" required>
                                <option value="">-- Send TO --</option>
                                <option value="CUTTING">CUTTING</option>
                                <option value="SEWING">SEWING</option>
                                <option value="SEMI WH">SEMI WH</option>
                                <option value="LASTING">LASTING</option>
                                <option value="FINISHING">FINISHING</option>
                                <option value="PACKING">PACKING</option>
                            </select>
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
<?php endforeach; ?>