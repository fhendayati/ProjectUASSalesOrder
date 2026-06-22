<div id="content-wrapper" class="d-flex flex-column">

<div id="content">

    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">
            Product Report
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

                            <a href="<?= base_url('index.php/reports/printProduct?periode='.$this->input->get('periode')); ?>"
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
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Qty Sold</th>
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
                                    <?= $row->product_code; ?>
                                </td>

                                <td>
                                    <?= $row->product_name; ?>
                                </td>

                                <td align="center">
                                    <?= $row->total_qty; ?>
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

        <?php if($this->input->get('periode') && $best_product): ?>

        <div class="card border-left-warning shadow mt-3">

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col">

                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">

                            Best Selling Product

                        </div>

                        <div class="h5 mb-1 font-weight-bold text-gray-800">

                            <?= $best_product->product_name; ?>

                        </div>

                        <div class="text-muted">

                            <?= $best_product->total_qty; ?> Units Sold

                        </div>

                        <div class="mt-2 font-weight-bold text-success">

                            Rp <?= number_format(
                                $best_product->total_penjualan
                            ); ?>

                        </div>

                    </div>

                    <div class="col-auto">

                        <i class="fas fa-award fa-3x text-warning"></i>

                    </div>

                </div>

            </div>

        </div>

        <?php endif; ?>

    </div>

</div>

</div>
