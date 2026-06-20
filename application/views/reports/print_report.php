<!DOCTYPE html>

<html>
<head>
    <title>Print Report Per Period</title>

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
<h4>SALES REPORTS PER PERIOD</h4>

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
            <th>Date</th>
            <th>Customer</th>
            <th>Total (Rp)</th>
        </tr>
    </thead>

    <tbody>

    <?php if(!empty($reports)): ?>

        <?php $no = 1; ?>

        <?php foreach($reports as $row): ?>

            <tr>

                <td align="center"><?= $no++; ?></td>

                <td align="center"><?= $row->order_date; ?></td>

                <td><?= $row->customer_name; ?></td>

                <td align="right">
                    <?= number_format($row->total_price); ?>
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
