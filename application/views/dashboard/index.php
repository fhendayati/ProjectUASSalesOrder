<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Dashboard
            </h1>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4>
                        Selamat Datang,
                        <?= $this->session->userdata('name'); ?>
                    </h4>

                    <p>
                        Sales Order System siap digunakan.
                    </p>
                </div>
            </div>

            <div class="row">

                <!-- Products -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <h6 class="font-weight-bold text-primary text-uppercase mb-1">
                                Total Products
                            </h6>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                <?= $total_products; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customers -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <h6 class="font-weight-bold text-success text-uppercase mb-1">
                                Total Customers
                            </h6>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                <?= $total_customers; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <h6 class="font-weight-bold text-warning text-uppercase mb-1">
                                Total Orders
                            </h6>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                <?= $total_orders; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>