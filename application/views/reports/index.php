<div id="content-wrapper" class="d-flex flex-column">

<div id="content">

    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">
            Monthly Sales Report
        </h1>

        <div class="card shadow mb-4">

            <div class="card-body">

                <form method="GET">

                    <div class="row">

                        <div class="col-md-4">

                            <label>Select Period</label>

                            <input type="month"
                                   name="periode"
                                   class="form-control"
                                   value="<?= $this->input->get('periode'); ?>"
                                   required>

                        </div>

                        <div class="col-md-2">

                            <label>&nbsp;</label>

                            <button type="submit"
                                    class="btn btn-primary btn-block">
                                Show Report
                            </button>

                        </div>

                        <?php if($this->input->get('periode')): ?>

                        <div class="col-md-2">

                            <label>&nbsp;</label>

                            <a href="<?= base_url('index.php/reports/print?periode='.$this->input->get('periode')); ?>"
                                target="_blank"
                                class="btn btn-success btn-block">

                                <i class="fas fa-print"></i>

                                Print PDF

                            </a>

                        </div>

                        <?php endif; ?>

                    </div>

                </form>

            </div>

        </div>

        <div class="card shadow">

            <div class="card-body">

                <table class="table table-bordered" id="dataTable">

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

                    <?php if(!empty($reports)): ?>

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
                                    <?= number_format($row->total_price); ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="5" align="center">

                                No data.

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

        <?php if($this->input->get('periode')): ?>

        <div class="card border-left-success shadow mt-3">

        <div class="card-body">

            <div class="row no-gutters align-items-center">

                <div class="col mr-2">

                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">

                        Total Sales -
                        <?= date('F Y', strtotime($this->input->get('periode').'-01')); ?>

                    </div>

                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                        Rp <?= number_format($total_sales, 0, ',', '.'); ?>

                    </div>

                </div>

                <div class="col-auto">

                    <i class="fas fa-money-bill-wave fa-2x text-success"></i>

                </div>

            </div>

        </div>

        </div>

        <?php endif; ?>

    </div>

</div>

</div>
