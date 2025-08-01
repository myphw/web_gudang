<?php
$sizesAriat = ['6d','6_5d','7d','7_5d','8d','8_5d','9d','9_5d','10d','10_5d','11d','11_5d','12d','13d','14d','15d','16d'];
$sizesRossi = ['3', '3t', '4', '4t', '5', '5t', '6', '6t', '7', '7t', '8', '8t', '9', '9t', '10', '10t', '11', '11t', '12', '13', '14', '15'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: center; }
        .info-table td { border: none; text-align: left; }
    </style>
</head>
<body>

<h3><?= $title ?></h3>

<table class="info-table">
    <tr><td><strong>PO Number:</strong> <?= $sp['po_number'] ?></td></tr>
    <tr><td><strong>Brand:</strong> <?= $sp['brand_name'] ?></td></tr>
    <tr><td><strong>Art & Color:</strong> <?= $sp['artcolor_name'] ?></td></tr>
    <tr><td><strong>Total QTY:</strong> <?= $sp['total_qty'] ?></td></tr>
    <tr><td><strong>XFD:</strong> <?= $sp['xfd'] ?></td></tr>
</table>

<?php if ($sp['brand_name'] == 'BLACK STONE'): ?>
    <h4>Size Run - BLACK STONE</h4>
    <table>
        <thead>
            <tr>
                <?php for ($s = 36; $s <= 50; $s++): ?>
                    <th><?= $s ?></th>
                <?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($size as $po): ?>
                <tr>
                    <?php for ($s = 36; $s <= 50; $s++): ?>
                        <td><?= $po['size_' . $s] ?? '-' ?></td>
                    <?php endfor; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Total Production</h4>
    <table>
        <thead>
            <tr>
                <th>#</th><th>QTY</th>
                <?php for ($s = 36; $s <= 50; $s++): ?>
                    <th><?= $s ?></th>
                <?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($spkitem as $po): ?>
                <?php if ($po['id_dept'] == $dept['id_dept']): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $po['qty'] ?></td>
                        <?php for ($s = 36; $s <= 50; $s++): ?>
                            <td><?= $po['size_' . $s] ?? 0 ?></td>
                        <?php endfor; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Production Record</h4>
    <table>
        <thead>
            <tr>
                <th>#</th><th>Date</th><th>QTY</th>
                <?php for ($s = 36; $s <= 50; $s++): ?>
                    <th><?= $s ?></th>
                <?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($item as $po): ?>
                <?php if ($po['id_dept'] == $dept['id_dept']): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $po['tgl_pr'] ?></td>
                        <td><?= $po['qty'] ?></td>
                        <?php for ($s = 36; $s <= 50; $s++): ?>
                            <td><?= $po['size_' . $s] ?? 0 ?></td>
                        <?php endfor; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php elseif ($sp['brand_name'] == 'ROSSI'): ?>
    <h4>Size Run - ROSSI</h4>
    <table>
        <thead>
            <tr>
                <?php foreach ($sizesRossi as $s): ?>
                    <th><?= strtoupper($s) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sizeRossi as $po): ?>
                <tr>
                    <?php foreach ($sizesRossi as $s): ?>
                        <td><?= $po['size_' . $s] ?? '-' ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Total Production</h4>
    <table>
        <thead>
            <tr>
                <th>#</th><th>QTY</th>
                <?php foreach ($sizesRossi as $s): ?>
                    <th><?= strtoupper($s) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($spkitemRossi as $po): ?>
                <?php if ($po['id_dept'] == $dept['id_dept']): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $po['qty'] ?></td>
                        <?php foreach ($sizesRossi as $s): ?>
                            <td><?= $po['size_' . $s] ?? '-' ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Production Record</h4>
    <table>
        <thead>
            <tr>
                <th>#</th><th>Date</th><th>QTY</th>
                <?php foreach ($sizesRossi as $s): ?>
                    <th><?= strtoupper($s) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($itemRossi as $po): ?>
                <?php if ($po['id_dept'] == $dept['id_dept']): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $po['tgl_pr'] ?></td>
                        <td><?= $po['qty'] ?></td>
                        <?php foreach ($sizesRossi as $s): ?>
                            <td><?= $po['size_' . $s] ?? '-' ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php elseif ($sp['brand_name'] == 'ARIAT'): ?>
    <h4>Size Run - ARIAT</h4>
    <table>
        <thead>
            <tr>
                <?php foreach ($sizesAriat as $s): ?>
                    <th><?= strtoupper(str_replace('_', '.', str_replace('d', 'D', $s))) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sizeAriat as $po): ?>
                <tr>
                    <?php foreach ($sizesAriat as $s): ?>
                        <td><?= $po['size_' . $s] ?? '-' ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Total Production</h4>
    <table>
        <thead>
            <tr>
                <th>#</th><th>QTY</th>
                <?php foreach ($sizesAriat as $s): ?>
                    <th><?= strtoupper(str_replace('_', '.', str_replace('d', 'D', $s))) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($spkitemAriat as $po): ?>
                <?php if ($po['id_dept'] == $dept['id_dept']): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $po['qty'] ?></td>
                        <?php foreach ($sizesAriat as $s): ?>
                            <td><?= $po['size_' . $s] ?? '-' ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Production Record</h4>
    <table>
        <thead>
            <tr>
                <th>#</th><th>Date</th><th>QTY</th>
                <?php foreach ($sizesAriat as $s): ?>
                    <th><?= strtoupper(str_replace('_', '.', str_replace('d', 'D', $s))) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($itemAriat as $po): ?>
                <?php if ($po['id_dept'] == $dept['id_dept']): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $po['tgl_pr'] ?></td>
                        <td><?= $po['qty'] ?></td>
                        <?php foreach ($sizesAriat as $s): ?>
                            <td><?= $po['size_' . $s] ?? '-' ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>
