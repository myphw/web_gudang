<!DOCTYPE html>
<?php
$sizes = ['3', '3t', '4', '4t', '5', '5t', '6', '6t', '7', '7t', '8', '8t', '9', '9t', '10', '10t', '11', '11t', '12', '13', '14', '15'];
// assign currently selected SJ
$current_sj = !empty($insj) ? $insj[0] : null;
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
            <?php $sj = $insj[0]; ?>
            <div><span class="label">Delivery Order:</span> <?= $sj['no_do'] ?></div>
            <div><span class="label">Surat Jalan:</span> <?= $sj['no_sj'] ?></div>
            <div><span class="label">Supplier Name:</span> <?= $sj['supplier_name'] ?></div>
            <div><span class="label">No Plat:</span> <?= $sj['no_plat'] ?></div>
            <div><span class="label">Tanggal Checkin:</span> <?= $sj['tgl_checkin'] ?></div>
        </td>
    </tr>
</table>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Item Name</th>
            <th>Unit</th>
            <th>QTY</th>
            <?php foreach ($sizes as $label): ?>
                <th><?= strtoupper($label) ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
            <?php $i = 1; foreach ($spkitem as $item): ?>
                <?php if ($item['id_sj'] == $current_sj['id_sj']): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $item['item_name'] ?></td>
                <td><?= $item['unit_name'] ?></td>
                <td><?= $item['qty'] ?></td>
                <?php foreach ($sizes as $label): ?>
                    <td><?= $po['size_' . $label] ?? '-' ?></td>
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
