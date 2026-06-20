<div id="content-wrapper" class="d-flex flex-column">

<div id="content">

    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">
            Report Per Sales Person
        </h1>

        <div class="card shadow mb-4">

            <div class="card-body">

                <form method="GET">

                    <div class="row">

                        <div class="col-md-4">

                            <label>Select Month</label>

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
                                Show
                            </button>

                        </div>

                        <?php if($this->input->get('periode')): ?>

                        <div class="col-md-2">

                            <label>&nbsp;</label>

                            <a href="<?= base_url('index.php/reports/printSales?periode='.$this->input->get('periode')); ?>"
                               target="_blank"
                               class="btn btn-success btn-block">

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
                            <th>Sales Person Name</th>
                            <th>Total Orders</th>
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

                                <td>
                                    <?= $row->sales_name; ?>
                                </td>

                                <td align="center">
                                    <?= $row->total_order; ?>
                                </td>

                                <td align="right">
                                    <?= number_format($row->total_penjualan); ?>
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

    </div>

</div>
```

</div>
