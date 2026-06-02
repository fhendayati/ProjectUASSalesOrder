<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Products
            </h1>

            <div class="card shadow mb-4">

                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Code</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php foreach($products as $product): ?>

                            <tr>
                                <td align="center"><?= $product->id; ?></td>
                                <td align="center"><?= $product->product_code; ?></td>
                                <td><?= $product->product_name; ?></td>
                                <td align="right"><?= number_format($product->price); ?></td>
                                <td align="center"><?= $product->stock; ?></td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>