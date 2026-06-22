<div id="content-wrapper" class="d-flex flex-column">

<div id="content">

<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Overall Sales Report
</h1>

<a href="<?= base_url('index.php/reports/printOverall'); ?>"
   target="_blank"
   class="btn btn-success mb-3">

    <i class="fas fa-print"></i>

    Print PDF

</a>

<div class="row">

    <div class="col-md-3">

        <div class="card border-left-primary shadow">

            <div class="card-body">

                <h5 class="font-weight-bold text-primary mb-1">Total Orders</h5>

                <h4>
                    <?= $summary['total_orders']; ?>
                </h4>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card border-left-success shadow">

            <div class="card-body">

                <h5 class="font-weight-bold text-success mb-1">Total Revenue</h5>

                <h4>

                    Rp
                    <?= number_format($summary['total_sales']); ?>

                </h4>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card border-left-info shadow">

            <div class="card-body">

                <h5 class="font-weight-bold text-info mb-1">Total Customers</h5>

                <h4>

                    <?= $summary['total_customers']; ?>

                </h4>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card border-left-warning shadow">

            <div class="card-body">

                <h5 class="font-weight-bold text-warning mb-1">Total Sales Person</h5>

                <h4>

                    <?= $summary['total_sales_person']; ?>

                </h4>

            </div>

        </div>

    </div>

</div>

<br>

<div class="card shadow">

    <div class="card-body">

        <table
            class="table table-bordered"
            id="dataTable">

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

            <?php $no = 1; ?>

                <?php foreach($reports as $row): ?>

                    <tr>

                        <td align="center">
                            <?= $no++; ?>
                        </td>

                        <td align="center">
                            <?= $row->order_date; ?>
                        </td>

                        <td>
                            <?= $row->customer_name; ?>
                        </td>

                        <td>
                            <?= $row->sales_name; ?>
                        </td>

                        <td align="right">

                            <?= number_format(
                                $row->total_price
                            ); ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

</div>

</div>

</div>