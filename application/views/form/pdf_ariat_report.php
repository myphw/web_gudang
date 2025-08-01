<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; font-size: 10px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 3px; text-align: center; }
        .header-table td { border: none; }
        .section-title { font-weight: bold; margin-top: 20px; }
        .no-border { border: none !important; }
        .center { text-align: center; }
        .right { text-align: right; }
        .left { text-align: left; }
        .justify { text-align: justify; }
    </style>
</head>
<body>

    <h3 class="center">MATERIAL CONSUMPTION SHEET<br>PT. AERROSTAR INDONESIA</h3>

    <table class="header-table">
        <tr>
            <td style="text-align: justify;"><strong>DESCRIPTION</strong></td>
            <td style="text-align: justify;"><?= $spk[0]['artcolor_name'] ?></td>  
            <td style="text-align: justify;"><strong>ORDER NUMBER</strong></td>
            <td style="text-align: justify;"><?= $spk[0]['po_number'] ?></td>
        </tr>
        <tr>
            <td style="text-align: justify;"><strong>BUYER</strong></td>
            <td style="text-align: justify;"><?= $spk[0]['brand_name'] ?></td>
            <td style="text-align: justify;"><strong>DATE OF ORDER</strong></td>
            <td style="text-align: justify;"><?= $spk[0]['xfd'] ?></td>
        </tr>
        <tr>
            <td style="text-align: justify;"><strong>LAST NO</strong></td>
            <td style="text-align: justify;"><?= $spk[0]['id_spk'] ?></td>
            <td style="text-align: justify;"><strong>QUANTITY</strong></td>
            <td style="text-align: justify;"><?= $spk[0]['total_qty'] ?></td>
        </tr>
    </table>

    <div class="section-title">Material Details</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
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
            <?php $i = 1; foreach ($spkitem as $item): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td style="text-align: justify;"><?= $item['item_code'] ?? '' ?></td>
                <td style="text-align: justify;"><?= $item['part_name'] ?></td>
                <td style="text-align: justify;"><?= $item['item_name'] ?></td>
                <td style="text-align: justify;"><?= $item['color_name'] ?></td>
                <td><?= $item['mtrl_name'] ?></td>
                <td><?= $item['unit_name'] ?></td>
                <td><?= $item['cons_rate'] ?></td>
                <td><?= $item['total_consrate'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="section-title">SIZE RUN</div>
    <table>
        <thead>
            <tr>
                <?php
                $size_labels = [
                    '6D', '6.5D', '7D', '7.5D', '8D', '8.5D',
                    '9D', '9.5D', '10D', '10.5D', '11D', '11.5D',
                    '12D', '13D', '14D', '15D', '16D'
                ];
                foreach ($size_labels as $label) {
                    echo "<th>$label</th>";
                }
                ?>
                <th>Total Qty</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $size_fields = [
                '6_d', '6_5_d', '7_d', '7_5_d', '8_d', '8_5_d',
                '9_d', '9_5_d', '10_d', '10_5_d', '11_d', '11_5_d',
                '12_d', '13_d', '14_d', '15_d', '16_d'
            ];
            foreach ($spkall as $row): ?>
                <tr>
                    <?php foreach ($size_fields as $field): ?>
                        <td><?= $row['size_' . $field] ?? 0 ?></td>
                    <?php endforeach; ?>
                    <td><?= $row['total_qty'] ?? 0 ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="section-title">Keterangan</div>
    <table>
        <tr>
            <td class="no-border" style="width:33%;">
                <strong>1. LACE</strong><br>
                SHOE LACE 130 CM utk size 39 - 45<br>
                SHOE LACE 135 CM utk size 46<br>
                SHOE LACE 140 CM utk size 47 - 50
            </td>
            <td class="no-border" style="width:33%;">
                <strong>2. OUTSOLE</strong><br>
                <?php for ($i = 39; $i <= 50; $i++): ?>
                    OUTSOLE S7 utk size <?= $i ?><br>
                <?php endfor; ?>
            </td>
            <td class="no-border" style="width:33%;">
                <strong>3. EVA INSOLE</strong><br>
                <?php for ($i = 39; $i <= 50; $i++): ?>
                    EVA Insole Blackstone Men Black Size: <?= $i ?><br>
                <?php endfor; ?>
            </td>
        </tr>
    </table>

</body>
</html>
