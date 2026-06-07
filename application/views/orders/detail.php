<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Order Detail
            </h1>

            <div class="card shadow mb-4">
                <div class="card-body">

                    <p><strong>Customer :</strong> <?= $order->customer_name; ?></p>

                    <p><strong>Sales :</strong> <?= $order->sales_name; ?></p>

                    <p><strong>Date :</strong> <?= $order->order_date; ?></p>

                    <p><strong>Status :</strong> <?= ucfirst($order->status); ?></p>

                    <p><strong>Total :</strong> Rp <?= number_format($order->total_price); ?></p>

                </div>
            </div>

            <div class="card shadow">
                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>
                            <tr align="center">
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php foreach($details as $detail): ?>

                            <tr>

                                <td><?= $detail->product_name; ?></td>

                                <td align="center">
                                    <?= $detail->qty; ?>
                                </td>

                                <td align="right">
                                    <?= number_format($detail->price); ?>
                                </td>

                                <td align="right">
                                    <?= number_format($detail->subtotal); ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                    <a href="<?= base_url('index.php/orders'); ?>"
                       class="btn btn-secondary">

                        Back

                    </a>

                </div>
            </div>

        </div>

    </div>

</div>