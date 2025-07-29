<!DOCTYPE html>
<?php
// assign currently selected SJ
$current_sj = !empty($outsj) ? $outsj[0] : null;
?>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            padding: 6px;
            text-align: center; /* Keep headers centered */
        }
        td {
            padding: 6px;
            text-align: left; /* Align table content to the left */
        }

        /* Signature section */
        .signature-block {
            margin-top: 60px;
            width: 100%;
        }
        .signature-cell {
            text-align: center;
            width: 25%;
        }
        .signature-name {
            margin-top: 60px;
            border-top: 1px solid #000;
            display: inline-block;
            padding-top: 5px;
            width: 80%;
        }
        table.borderless, table.borderless td {
            border: none !important;
        }
    </style>
</head>
<body>

<h2><?= $title ?></h2>

<div class="row">
    <div class="col-md-6">

    <table class="borderless" style="width: 100%; margin-bottom: 20px; border: none;" border="0">
    <tr>
        <td style="vertical-align: top; width: 50%;">
            <?php foreach ($spk as $sp): ?>
                <div><span class="label">PO Number:</span> <?= $sp['po_number'] ?></div>
                <div><span class="label">XFD:</span> <?= $sp['xfd'] ?></div>
                <div><span class="label">Brand:</span> <?= $sp['brand_name'] ?></div>
                <div><span class="label">Art & Color:</span> <?= $sp['artcolor_name'] ?></div>
                <div><span class="label">Total QTY:</span> <?= $sp['total_qty'] ?></div>
            <?php endforeach; ?>
        </td>
        <td style="vertical-align: top; width: 50%;">
            <?php foreach ($outsj as $sj): ?>
            <div><span class="label">Surat Pengeluaran:</span> <?= $sj['no_sj'] ?></div>
            <div><span class="label">From:</span> <?= $sj['from'] ?></div>
            <div><span class="label">TO Department:</span> <?= $sj['to_dept'] ?></div>
            <div><span class="label">Tanggal Checkout:</span> <?= $sj['tgl_checkout'] ?></div>
            <?php endforeach; ?>
        </td>
    </tr>
</table>

<?php
$sizes = ['6D', '6,5D', '7D', '7,5D', '8D', '8,5D', '9D', '9,5D', '10D', '10,5D', '11D', '11,5D', '12D', '13D', '14D', '15D'];
?>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Item Name</th>
            <th>Unit</th>
            <th>QTY</th>
            <?php foreach ($sizes as $size): ?>
                <th><?= $size ?></th>
            <?php endforeach; ?>
            
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($spkitem as $po): ?>
            <?php if ($po['id_sj'] == $current_sj['id_sj']): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $po['item_name'] ?></td>
                <td><?= $po['unit_name'] ?></td>
                <td><?= $po['qty'] ?></td>
                <?php foreach ($sizes as $size): ?>
                    <td><?= $po[$size] ?? '' ?></td>
                <?php endforeach; ?>

            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Signature Block -->
<div class="signature-block">
    <table style="width: 100%; margin-top: 80px;">
        <tr>
            <td class="signature-cell">Dibuat Oleh</td>
            <td class="signature-cell">Diperiksa Oleh</td>
            <td class="signature-cell">Disetujui Oleh</td>
            <td class="signature-cell">Penerima</td>
        </tr>
        <tr>
            <td class="signature-cell">
                <div class="signature-name">&nbsp;</div>
            </td>
            <td class="signature-cell">
                <div class="signature-name">&nbsp;</div>
            </td>
            <td class="signature-cell">
                <div class="signature-name">&nbsp;</div>
            </td>
            <td class="signature-cell">
                <div class="signature-name">&nbsp;</div>
            </td>
        </tr>
    </table>
</div>


</body>
</html>
