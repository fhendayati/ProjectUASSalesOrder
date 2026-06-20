<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Data Products
            </h1>

            <div class="card shadow mb-4">

                <div class="card-body">

                <a href="<?= base_url('index.php/products/add'); ?>" class="btn btn-primary mb-3"> 
                    <i class="fas fa-plus"></i>
                    Add Product
                </a>

                    <table class="table table-bordered" id="dataTable">

                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Price (Rp)</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php $no = 1; ?>

                        <?php foreach($products as $product): ?>

                            <tr>
                                <td align="center"><?= $no++; ?></td>
                                <td align="center"><?= $product->product_code; ?></td>
                                <td><?= $product->product_name; ?></td>
                                <td align="right"><?= number_format($product->price); ?></td>
                                <td align="center"><?= $product->stock; ?></td>
                                <td align="center">
                                    <a href="<?= base_url('index.php/products/edit/'.$product->id); ?>"
                                    class="btn btn-warning btn-sm mr-1">
                                    <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#"
                                    class="btn btn-danger btn-sm btn-delete"
                                    data-url="<?= base_url('index.php/products/delete/'.$product->id); ?>">
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
