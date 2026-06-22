<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<title>
    Overall Sales Report
</title>

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

<h2 align="center">
    PT MAJU JAYA
</h2>

<h3 align="center">
    OVERALL SALES REPORT
</h3>

<hr>

<table style="margin-bottom:20px;">

<tr>
    <td>Total Orders</td>
    <td><?= $summary['total_orders']; ?></td>
</tr>

<tr>
    <td>Total Customers</td>
    <td><?= $summary['total_customers']; ?></td>
</tr>

<tr>
    <td>Total Sales Person</td>
    <td><?= $summary['total_sales_person']; ?></td>
</tr>

<tr>
    <td>Total Revenue</td>
    <td>

        Rp
        <?= number_format($summary['total_sales']); ?>

    </td>
</tr>

</table>

<table>

<thead>

<tr align="center">

    <th>No</th>
    <th>Date</th>
    <th>Customer</th>
    <th>Sales Name</th>
    <th>Total (Rp)</th>

</tr>

</thead>

<tbody>

<?php $no=1; ?>

<?php foreach($reports as $row): ?>

<tr>

    <td class="text-center">
        <?= $no++; ?>
    </td>

    <td class="text-center">
        <?= $row->order_date; ?>
    </td>

    <td>
        <?= $row->customer_name; ?>
    </td>

    <td>
        <?= $row->sales_name; ?>
    </td>

    <td class="text-right">

        <?= number_format(
            $row->total_price
        ); ?>

    </td>

</tr>

<?php endforeach; ?>

<tr class="total-row">

    <td colspan="4" align="center">

        TOTAL

    </td>

    <td align="right">

        Rp <?= number_format($summary['total_sales']); ?>

    </td>

</tr>

</tbody>

</table>

<br><br>

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