<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        h2.title {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }
        .box-table td {
            border: none;
            text-align: left;
            padding: 2px 5px;
        }
        .signature-table td {
            border: 1px solid #000;
            text-align: center;
        }
    </style>
</head>
<body>

<h2 class="title"><?= $title ?></h2>

<!-- PO Info on the left, no border -->
<table class="box-table" style="width: 100%; margin-bottom: 20px;">
    <tr>
        <td style="width: 50%;">
            <div><strong>PO Number:</strong> <?= $spk['po_number'] ?></div>
            <div><strong>No Tanda Terima:</strong> <?= $spk['no_pr'] ?></div>
            <div><strong>Brand:</strong> <?= $spk['brand_name'] ?></div>
            <div><strong>Total QTY:</strong> <?= $spk['total_qty'] ?></div>
            <div><strong>From Departement:</strong> <?= $spk['dept_name1'] ?></div>
            <div><strong>To Departement:</strong> <?= $spk['dept_name2'] ?></div>
            <div><strong>Tanggal Dibuat:</strong> <?= date('d-m-Y H:i', strtotime($spk['created_at'])) ?></div>
        </td>
    </tr>
</table>

<!-- Size Table -->
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>QTY</th>
            <?php for ($s = 36; $s <= 50; $s++): ?>
                <th><?= $s ?></th>
            <?php endfor; ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><?= $in['qty'] ?></td>
            <?php for ($s = 36; $s <= 50; $s++): ?>
                <td><?= $in['size_' . $s] ?? 0 ?></td>
            <?php endfor; ?>
        </tr>
    </tbody>
</table>

<!-- Signature Table -->
<table class="signature-table" style="width: 100%; margin-top: 50px;">
    <tr>
        <td><strong>Diserahkan oleh</strong><br><?= $spk['dept_name1'] ?></td>
        <td><strong>Diterima oleh</strong><br><?= $spk['dept_name2'] ?></td>
        <td><strong>Mengetahui</strong></td>
        <td><strong>Checker</strong><br><?= $spk['dept_name1'] ?></td>
        <td><strong>Checker</strong><br><?= $spk['dept_name2'] ?></td>
    </tr>
    <tr style="height: 100px;">
        <td style="height: 50px;" colspan="1"></td>
        <td style="height: 50px;" colspan="1"></td>
        <td style="height: 50px;" colspan="1"></td>
        <td style="height: 50px;" colspan="1"></td>
        <td style="height: 50px;" colspan="1"></td>
    </tr>
    <tr>
        <td>(........................)</td>
        <td>(........................)</td>
        <td>(........................)</td>
        <td>(........................)</td>
        <td>(........................)</td>
    </tr>
</table>

</body>
</html>
