<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Customers
            </h1>

            <div class="card shadow mb-4">

                <div class="card-body">

                    <a href="<?= base_url('index.php/customers/add'); ?>"
                       class="btn btn-primary mb-3">

                        <i class="fas fa-plus"></i>
                        Add Customer

                    </a>

                    <table class="table table-bordered">

                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php $no = 1; ?>

                        <?php foreach($customers as $customer): ?>

                            <tr>

                                <td align="center">
                                    <?= $no++; ?></td>
                                </td>

                                <td>
                                    <?= $customer->customer_name; ?>
                                </td>

                                <td>
                                    <?= $customer->address; ?>
                                </td>

                                <td align="center">
                                    <?= $customer->phone; ?>
                                </td>

                                <td align="center">

                                    <a href="<?= base_url('index.php/customers/edit/'.$customer->id); ?>"
                                       class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <a href="#"
                                        class="btn btn-danger btn-sm btn-delete"
                                        data-url="<?= base_url('index.php/customers/delete/'.$customer->id); ?>">

                                        <i class="fas fa-trash"></i>

                                    </a>

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