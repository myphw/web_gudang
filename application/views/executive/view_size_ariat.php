
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

    <div class="row">
        <div class="col-lg-12">

            <?= form_error('form/view_report_ariat','<div class="alert alert-danger" role="alert">', '
                </div>'); ?>

                <?= $this->session->flashdata('message'); ?>

                <?php foreach($spk as $sp): ?>
                    <div class="box-body">
                        <div class="form-group" style="display:inline-block;">
                            <input type="hidden" name="id_spk" value="<?=$sp['id_spk']?>">
                            <label for="po_number" style="width:87%;margin-left: 0px;">PO number</label>
                            <input type="text" name="po_number" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="po_number" value="<?=$sp['po_number']?>" readonly placeholder="PO Number">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="xfd" style="width:73%;">XFD</label>
                            <input type="date" name="xfd" style="width:90%;margin-right: px;" class="form-control" id="xfd" value="<?=$sp['xfd']?>" readonly placeholder="XFD">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="brand_name" style="width:87%;margin-left: 0px;">Brand</label>
                            <input type="text" name="brand_name" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="brand_name" value="<?=$sp['brand_name']?>" readonly placeholder="Brand">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="artcolor_name" style="width:87%;margin-left: 0px;">Art & Color</label>
                            <input type="text" name="artcolor_name" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="artcolor_name" value="<?=$sp['artcolor_name']?>" readonly placeholder="Art & Color">
                        </div>
                        <div class="form-group" style="display:inline-block;">
                            <label for="qty_total" style="width:87%;margin-left: 0px;">Total QTY</label>
                            <input type="text" name="total_qty" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="total_qty" value="<?=$sp['total_qty']?>" readonly placeholder="">
                        </div>
                    </div>  
                <?php endforeach; ?>
                <a type="button" class="badge badge-warning mb-3"  href="<?=base_url('executive')?>" name="btn_add" style="margin:auto;">BACK TO SPK</a>                   
                <a href="<?= base_url('executive/export_ariat_pdf/' . $spk[0]['id_spk']) ?>" class="badge badge-danger mb-3" target="_blank">PDF</a>
                <!-- SIZE TABLE -->
                <div class="table-responsive mb-5">
                    <table class="table table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <?php
                                $sizes = ['6d','6_5d','7d','7_5d','8d','8_5d','9d','9_5d','10d','10_5d','11d','11_5d','12d','13d','14d','15d','16d'];
                                foreach ($sizes as $s) {
                                    echo "<th>" . strtoupper(str_replace('_', '.', str_replace('_d', 'D', $s))) . "</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($spkall as $po) : ?>
                                <?php if ($po['id_spk'] == $sp['id_spk']) : ?>
                                    <tr>
                                        <?php foreach ($sizes as $s): ?>
                                            <td><?= $po['size_' . $s] ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
</div>
            </div>

            <!-- ITEM TABLE -->
        <div class="col-lg-12">
            <table class="table table-bordered mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Part</th>
                        <th>Descriptions</th>
                        <th>Colour</th>
                        <th>Ukuran MTRL</th>
                        <th>Unit</th>
                        <th>Cons Rate</th>
                        <th>Total Cons Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spkitem as $po): ?>
                        <?php if ($po['id_spk'] == $sp['id_spk']): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $po['part_name'] ?></td>
                                <td><?= $po['item_name'] ?></td>
                                <td><?= $po['color_name'] ?></td>
                                <td><?= $po['mtrl_name'] ?></td>
                                <td><?= $po['unit_name'] ?></td>
                                <td><?= $po['cons_rate'] ?></td>
                                <td><?= $po['total_consrate'] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->




     