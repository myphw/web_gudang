<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>



    <div class="row">
        <div class="col-lg-12">

            <?= form_error('form/update_sj_item', '<div class="alert alert-danger" role="alert">', '
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
                <a type="button" class="badge badge-warning mb-3" href="<?= base_url('warehouse/check_in_blackstone/' . $sp['id_spk']) ?>" name="btn_add" style="margin:auto;">BACK</a>
            <?php endforeach; ?>
            <a href="" class="badge badge-success mb-3" data-toggle="modal" data-target="#newSpkItemModal">INPUT SURAT JALAN</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col-lg-2">#</th>
                        <th scope="col-lg-2">NO. DO</th>
                        <th scope="col-lg-2">NO. SJ</th>
                        <th scope="col-lg-2">Tanggal Checkin</th>
                        <th scope="col-lg-2">Nama Suplier</th>
                        <th scope="col-lg-2">Nomor Plat</th>
                        <th scope="col-lg-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spkitem as $po) : ?>
                        <?php if ($po['id_spk'] == $sp['id_spk']): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $po['no_do'] ?></td>
                                <td><?= $po['no_sj'] ?></td>
                                <td><?= $po['tgl_checkin'] ?></td>
                                <td><?= $po['supplier_name'] ?></td>
                                <td><?= $po['no_plat'] ?></td>
                                <td>
                                    <a href="<?= base_url('warehouse/sj_detail_item/' . $po['id_spk'] . '/' . $po['id_sj']) ?>" class="badge badge-info">View</a>
                                    <!-- <a href="<?= base_url('warehouse/delete_sj/' . $po['id_sj']) ?>" name="btn-delete" class="badge badge-danger">delete</a> -->

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
                    <h5 class="modal-title" id="newSpkItemModalLabel">Add New SPK Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('warehouse/update_sj_item/' . $sp['id_spk']); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_spk" value="<?= $sp['id_spk']; ?>">
                        <input type="hidden" name="po_number" value="<?= $sp['po_number']; ?>">
                        <input type="hidden" name="xfd" value="<?= $sp['xfd']; ?>">
                        <input type="hidden" name="brand_name" value="<?= $sp['brand_name']; ?>">
                        <input type="hidden" name="artcolor_name" value="<?= $sp['artcolor_name']; ?>">
                        <div class="form-group">
                            <label for="no_sj">No. SJ From Supplier</label>
                            <input type="text" name="no_sj" class="form-control" id="no_sj" placeholder="NO SJ">
                        </div>
                        <div class="form-group">
                            <label for="no_do">NO. DO</label>
                            <input type="text" name="no_do" class="form-control" id="no_do" value="<?= $datanosj; ?>" readonly placeholder="No DO">
                        </div>
                        <div class="form-group">
                            <label for="tgl_checkin">Tanggal Checkin</label>
                            <input type="date" name="tgl_checkin" class="form-control" id="tgl_checkin" placeholder="Tanggal Checkin">
                        </div>
                        <div class="form-group">
                            <label for="supplier_name">Nama Suplier</label>
                            <input type="text" name="supplier_name" class="form-control" id="supplier_name" placeholder="Nama Supplier">
                        </div>
                        <div class="form-group">
                            <label for="no_plat">Nomor Plat</label>
                            <input type="text" name="no_plat" class="form-control" id="no_plat" placeholder="Nomor Plat">
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