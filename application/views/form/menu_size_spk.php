
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

        

        <div class="row">
            <div class="col-lg-12">

            <?= form_error('form/update_spk_size','<div class="alert alert-danger" role="alert">', '
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
                    <?php $id_spk = $sp['id_spk']; ?>
                    <?php foreach($all as $a): ?>
                        <?php if ($a['id_spk'] == $sp['id_spk']): ?>
                            <div class="box-body">
                                <div class="form-group" style="display:inline-block;">
                                    <label for="po_number" style="width:87%;margin-left: 0px;">Total Sizerun</label>
                                    <input type="text" name="total_qty" style="width: 90%;margin-right: 0px;margin-left: px;" class="form-control" id="total_qty" value="<?=$a['total_qty']?>" readonly placeholder="Total Sizerun">
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSpkSizeModal">Add New SPK Size</a>
                                    
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col-lg-1">36</th>
                        <th scope="col-lg-1">37</th>
                        <th scope="col-lg-1">38</th>
                        <th scope="col-lg-1">39</th>
                        <th scope="col-lg-1">40</th>
                        <th scope="col-lg-1">41</th>
                        <th scope="col-lg-1">42</th>
                        <th scope="col-lg-1">43</th>
                        <th scope="col-lg-1">44</th>
                        <th scope="col-lg-1">45</th>
                        <th scope="col-lg-1">46</th>
                        <th scope="col-lg-1">47</th>
                        <th scope="col-lg-1">48</th>
                        <th scope="col-lg-1">49</th>
                        <th scope="col-lg-1">50</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($spkall as $po) : ?>
                         <?php if ($po['id_spk'] == $sp['id_spk']) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $po['size_36']?></td>
                        <td><?= $po['size_37']?></td>
                        <td><?= $po['size_38']?></td>
                        <td><?= $po['size_39']?></td>
                        <td><?= $po['size_40']?></td>
                        <td><?= $po['size_41']?></td>
                        <td><?= $po['size_42']?></td>
                        <td><?= $po['size_43']?></td>
                        <td><?= $po['size_44']?></td>
                        <td><?= $po['size_45']?></td>
                        <td><?= $po['size_46']?></td>
                        <td><?= $po['size_47']?></td>
                        <td><?= $po['size_48']?></td>
                        <td><?= $po['size_49']?></td>
                        <td><?= $po['size_50']?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endif; ?>
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
 <?php foreach($spk as $sp) : ?>
<div class="modal fade" id="newSpkSizeModal" tabindex="-1" aria-labelledby="newSpkSizeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSpkSizeModalLabel">Add New SPK Size</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('form/update_spk_size/'.$sp['id_spk']);?>" method="post">
                <div class="modal-body">
                <input type="hidden" name="id_spk" value="<?= $sp['id_spk']; ?>">
                <input type="hidden" name="po_number" value="<?= $sp['po_number']; ?>">
                <input type="hidden" name="xfd" value="<?= $sp['xfd']; ?>">
                <input type="hidden" name="brand_name" value="<?= $sp['brand_name']; ?>">
                <input type="hidden" name="artcolor_name" value="<?= $sp['artcolor_name']; ?>">
                <div class="form-group">
                        <select name="size_name" id="size_name" class="form-control">
                            <option value="">Select Size</option>
                            <?php foreach($size as $s) : ?>
                                <option value="<?= $s['size_name'];?>"><?= $s['size_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="qty" name="qty" placeholder="QTY Size">
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

<?php foreach($spkall as $sall) : ?>
<div class="modal fade" id="deleteSpkSizeModal<?= $sall['id_sizerun']; ?>" tabindex="-1" aria-labelledby="deleteSpkSizeModalLabel<?= $sall['id_sizerun']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSpkSizeModalLabel<?= $sall['id_sizerun']; ?>">Delete Size Run</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('form/delete_spk_size/'.$sall['id_sizerun']);?>" method="post">
                <div class="modal-body">
                <input type="hidden" name="id_spk" value="<?= $sall['id_spk']; ?>">
                <input type="hidden" name="po_number" value="<?= $sall['po_number']; ?>">
                <input type="hidden" name="xfd" value="<?= $sall['xfd']; ?>">
                <input type="hidden" name="brand_name" value="<?= $sall['brand_name']; ?>">
                <input type="hidden" name="artcolor_name" value="<?= $sall['artcolor_name']; ?>">
                <div class="form-group">
                        <select name="size_name" id="size_name" class="form-control">
                            <option value="<?= $sall['size_name'];?>"><?= $sall['size_name'];?></option>
                            <?php foreach($size as $s) : ?>
                                <option value="<?= $s['size_name'];?>"><?= $s['size_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="qty" name="qty" value="<?= $sall['qty'];?>" placeholder="QTY Size">
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
     