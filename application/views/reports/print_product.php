<!DOCTYPE html>

<html>
<head>
    <title>Print Report Per Product</title>

<style>
    body{
        font-family: Georgia, "Times New Roman", serif;
    }

    h3, h4{
        text-align: center;
        margin: 5px;
    }

    p{
        margin: 5px 0;
    }

    table{
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    table, th, td{
        border: 1px solid black;
    }

    th, td{
        padding: 8px;
    }

    .total{
        margin-top: 15px;
        font-weight: bold;
        font-size: 16px;
    }

    @media print{
        button{
            display: none;
        }
    }
</style>

</head>

<body>

<h3>PT MAJU JAYA</h3>
<h4>SALES REPORTS PER PRODUCT</h4>

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

<p>
    Period :
    <?= $periode; ?>
</p>

<table>

    <thead>
        <tr>
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
                <td><?= $row->product_code; ?></td>
                <td><?= $row->product_name; ?></td>
                <td align="center"><?= $row->total_qty; ?></td>
                <td align="right">
                    <?= number_format($row->total_penjualan); ?>
                </td>


            </tr>

        <?php endforeach; ?>

    <?php else: ?>

        <tr>
            <td colspan="6">
                No data.
            </td>
        </tr>

    <?php endif; ?>

    </tbody>

</table>

<div class="total">
    Total Sales :
    Rp <?= number_format($total_sales); ?>
</div>

<div class="total">
    Total Produk Sold : 
    <?= $total_qty; ?> Item 
</div>

<br><br><br>

<p style="text-align:right;">
    Tangerang,
    <?= date('d-m-Y'); ?>
    <br><br><br><br>

    <?= $this->session->userdata('name'); ?>
</p>

<script>
    window.print();
</script>

</body>
</html>
