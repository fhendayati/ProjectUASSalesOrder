<!DOCTYPE html>

<html>
<head>
    <title>Print Product Report</title>

<style>

*{
    -webkit-print-color-adjust: exact !important;
    print-color-adjust: exact !important;
}

body{
    font-family: Georgia, "Times New Roman", serif;
    font-size: 12px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table,
th,
td{
    border:1px solid #000;
}

th{
    background:#1e3c72;
    color:white;
}

th,
td{
    padding:8px;
}

.total-row td{
    background:#1e3c72;
    color:white;
    font-weight:bold;
}

.text-right{
    text-align:right;
}

.text-center{
    text-align:center;
}

</style>

</head>

<body>

<h2 align="center">PT MAJU JAYA</h2>
<h3 align="center">PRODUCT REPORT</h3>

                <?php if(!empty($reports)): ?>

                        <?php

                        $periode = date(
                            'F Y',
                            strtotime(
                                $this->input->get('periode').'-01'
                            )
                        );

                        ?>

                <?php endif; ?>

<hr>

<p>
    Period :
    <?= $periode; ?>
</p>

<table>

    <thead>
        <tr style="font-weight:bold; background:#1e3c72; color:white;">
            <th>No</th>
            <th>Product Code</th>
            <th>Produk Name</th>
            <th>Qty Sold</th>
            <th>Total (Rp)</th>
        </tr>
    </thead>

    <tbody>

    <?php if(!empty($reports)): ?>

        <?php $no = 1; ?>

        <?php foreach($reports as $row): ?>

            <tr>

                <td align="center"><?= $no++; ?></td>
                <td align="center"><?= $row->product_code; ?></td>
                <td><?= $row->product_name; ?></td>
                <td align="center"><?= $row->total_qty; ?></td>
                <td align="right">
                    <?= number_format($row->total_penjualan); ?>
                </td>


            </tr>

        <?php endforeach; ?>

        <tr style="font-weight:bold; background:#1e3c72; color:white;">

            <td colspan="3" align="center">

                TOTAL

            </td>

            <td align="center">

                <?= number_format($total_qty); ?>

            </td>

            <td align="right">

                Rp <?= number_format($total_sales); ?>

            </td>

        </tr>

    <?php else: ?>

        <tr>
            <td colspan="6">
                No data.
            </td>
        </tr>

    <?php endif; ?>

    </tbody>

</table>

<br><br><br>

<p style="text-align:right;">
    Tangerang,
    <?= date('d-m-Y'); ?>
    <br><br><br><br>

    <?= $this->session->userdata('name'); ?>
</p>

<hr>

<script>
    window.print();
</script>

</body>
</html>
