<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Dashboard
            </h1>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <?php if($this->session->flashdata('login_success')): ?>

            <script>

            Swal.fire({
                icon: 'success',
                title: 'Login Success',
                text: '<?= $this->session->flashdata('login_success'); ?>',
                confirmButtonText: 'OK',
                confirmButtonColor: '#1e3c72',
                showCloseButton: true
            });

            </script>

            <?php endif; ?>

            <div class="card shadow mb-4">
                <div class="card-body">

                    <h4>
                        Welcome,
                            <?= $this->session->userdata('name'); ?>!
                    </h4>
                    

                        <?php if($this->session->userdata('role_id') == 1): ?>
                            <p>
                                You are logged in as an Admin. Manage product data, customers, and all sales orders.
                            </p>

                        <?php elseif($this->session->userdata('role_id') == 2): ?>

                            <p>
                                You are logged in as a Sales Person. Create and monitor your sales orders.
                            </p>

                        <?php elseif($this->session->userdata('role_id') == 3): ?>

                            <p>
                                You are logged in as a Manager. Monitor sales reports and sales performance.
                            </p>

                        <?php endif; ?>

                </div>
            </div>

            <!-- ADMIN -->
            <?php if($this->session->userdata('role_id') == 1): ?>

            <div class="row">

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/products'); ?>">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-primary text-uppercase mb-1">
                                        Total Products
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $total_products; ?>
                                    </div>

                                </div>

                                <i class="fas fa-box fa-2x text-primary"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/customers'); ?>">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-success text-uppercase mb-1">
                                        Total Customers
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $total_customers; ?>
                                    </div>

                                </div>

                                <i class="fas fa-users fa-2x text-success"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/orders'); ?>">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-warning text-uppercase mb-1">
                                        Total Orders
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $total_orders; ?>
                                    </div>

                                </div>

                                <i class="fas fa-shopping-cart fa-2x text-warning"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/sales'); ?>">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-info text-uppercase mb-1">
                                        Total Sales Person
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $total_sales; ?>
                                    </div>

                                </div>

                                <i class="fas fa-user-tie fa-2x text-info"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

            </div>

            <div class="row">

                <!-- Recent Orders -->

                <div class="col-lg-8">

                    <div class="card shadow mb-4">

                        <div class="card-body">

                            <h5 class="mb-3">

                                <i class="fas fa-clock"></i>
                                Recent Orders

                            </h5>

                            <table class="table table-hover">

                                <thead>

                                    <tr align="center">
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Sales Name</th>
                                        <th>Total (Rp)</th>
                                        <th>Status</th>
                                    </tr>

                                </thead>

                                <tbody>

                                <?php foreach($recent_orders as $row): ?>

                                    <tr>

                                        <td align="center"><?= $row->order_date; ?></td>

                                        <td><?= $row->customer_name; ?></td>

                                        <td><?= $row->sales_name; ?></td>

                                        <td align="right">
                                            <?= number_format($row->total_price, 0, ',', '.'); ?>
                                        </td>

                                        <td align="center">

                                            <?php if($row->status == 'draft'): ?>
                                                <span class="badge badge-secondary">Draft</span>

                                            <?php elseif($row->status == 'dikirim'): ?>
                                                <span class="badge badge-primary">Dikirim</span>

                                            <?php elseif($row->status == 'selesai'): ?>
                                                <span class="badge badge-success">Selesai</span>

                                            <?php else: ?>
                                                <span class="badge badge-danger">Dibatalkan</span>
                                            <?php endif; ?>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <!-- Low Stock -->

                <div class="col-lg-4">

                    <div class="card shadow mb-4">

                        <div class="card-body">

                            <h5 class="mb-3">

                                <i class="fas fa-exclamation-triangle text-warning"></i>
                                Low Stock Product

                            </h5>

                            <?php foreach($low_stock as $product): ?>

                                <div class="mb-3">

                                    <strong>
                                        <?= $product->product_name; ?>
                                    </strong>

                                    <br>

                                    Stock :
                                    <span class="badge badge-danger">

                                        <?= $product->stock; ?>

                                    </span>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    </div>

                </div>

            </div>

            <?php endif; ?>


            <!-- SALES -->
            <?php if($this->session->userdata('role_id') == 2): ?>

            <div class="row">

                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/orders'); ?>">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-primary text-uppercase mb-1">
                                        My Orders
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $my_orders; ?>
                                    </div>

                                </div>

                                <i class="fas fa-shopping-cart fa-2x text-primary"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/orders?status=draft'); ?>">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-secondary text-uppercase mb-1">
                                       Drafts
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $draft; ?>
                                    </div>

                                </div>

                                <i class="fas fa-file-alt fa-2x text-secondary"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/orders?status=dikirim'); ?>">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-info text-uppercase mb-1">
                                        Sent
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $dikirim; ?>
                                    </div>

                                </div>

                                <i class="fas fa-truck fa-2x text-info"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/orders?status=selesai'); ?>">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-success text-uppercase mb-1">
                                        Completed
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $selesai; ?>
                                    </div>

                                </div>

                                <i class="fas fa-check-circle fa-2x text-success"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/orders?status=dibatalkan'); ?>">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-danger text-uppercase mb-1">
                                        Canceled
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $dibatalkan; ?>
                                    </div>

                                </div>

                                <i class="fas fa-times-circle fa-2x text-danger"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>
                
            </div>

            <div class="card shadow mb-4">

                <div class="card-body">

                    <h5 class="mb-3">

                        <i class="fas fa-history"></i>

                        My Recent Orders

                    </h5>

                    <?php if(empty($recent_orders)): ?>

                        <div class="alert alert-info">

                            No sales orders have been created yet.

                        </div>

                    <?php else: ?>

                    <table class="table table-hover">

                        <thead>

                            <tr align="center">

                                <th>Date</th>
                                <th>Customer</th>
                                <th>Total (Rp)</th>
                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php foreach($recent_orders as $row): ?>

                            <tr>

                                <td align="center">
                                    <?= $row->order_date; ?>
                                </td>

                                <td>
                                    <?= $row->customer_name; ?>
                                </td>

                                <td align="right">
                                    <?= number_format($row->total_price); ?>
                                </td>

                                <td align="center">

                                    <?php if($row->status == 'draft'): ?>

                                        <span class="badge badge-secondary">
                                            Draft
                                        </span>

                                    <?php elseif($row->status == 'dikirim'): ?>

                                        <span class="badge badge-primary">
                                            Dikirim
                                        </span>

                                    <?php elseif($row->status == 'selesai'): ?>

                                        <span class="badge badge-success">
                                            Selesai
                                        </span>

                                    <?php else: ?>

                                        <span class="badge badge-danger">
                                            Dibatalkan
                                        </span>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                    <?php endif; ?>

                </div>

            </div>
            <?php endif; ?>


            <!-- MANAGER -->
            <?php if($this->session->userdata('role_id') == 3): ?>

            <div class="row">

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/orders'); ?>">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-primary text-uppercase mb-1">
                                        Total Orders
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $total_orders; ?>
                                    </div>

                                </div>

                                <i class="fas fa-shopping-cart fa-2x text-primary"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/orders?status=selesai'); ?>">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-success text-uppercase mb-1">
                                        Order Completed
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $selesai; ?>
                                    </div>

                                </div>

                                <i class="fas fa-check-circle fa-2x text-success"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/orders?status=dibatalkan'); ?>">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-danger text-uppercase mb-1">
                                        Order Cancelled
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        <?= $dibatalkan; ?>
                                    </div>

                                </div>

                                <i class="fas fa-times-circle fa-2x text-danger"></i>

                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= base_url('index.php/reports/overall'); ?>">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h6 class="font-weight-bold text-warning text-uppercase mb-1">
                                        Total Revenue
                                    </h6>

                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        Rp <?= number_format($total_sales_value); ?>
                                    </div>

                                </div>

                                <i class="fas fa-money-bill-wave fa-2x text-warning"></i>

                            </div>

                        </div>
                    </div>
                    </a>
                </div>

            </div>

            <div class="card shadow mb-4">

                <div class="card-body">

                    <h5 class="mb-4 font-weight-bold text-primary mb-1">

                        <i class="fas fa-chart-line text-primary mr-2"></i>

                        Monthly Sales Graph

                    </h5>

                    <canvas id="salesChart"></canvas>

                </div>

            </div>

            <div class="card shadow mb-4">

                <div class="card-body">

                    <h5 class="mb-4 font-weight-bold text-primary mb-1">

                        <i class="fas fa-chart-bar text-primary mr-2"></i>

                        Sales Performance by Sales Person

                    </h5>

                    <canvas id="salesPerformanceChart"></canvas>

                </div>

            </div>

            <?php endif; ?>

        </div>

    </div>

</div>