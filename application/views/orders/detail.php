<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Order Detail
            </h1>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <table class="table table-borderless">

                                <tr>
                                    <td width="200"><strong>Order No</strong></td>
                                    <td width="20">:</td>
                                    <td>
                                        <?= 'SO-' . date('Ym', strtotime($order->order_date)) . '-' . str_pad($order->id, 4, '0', STR_PAD_LEFT); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>Customer</strong></td>
                                    <td>:</td>
                                    <td><?= $order->customer_name; ?></td>
                                </tr>

                                <tr>
                                    <td><strong>Sales Name</strong></td>
                                    <td>:</td>
                                    <td><?= $order->sales_name; ?></td>
                                </tr>

                            </table>
                        </div>

                        <div class="col-md-6">

                            <table class="table table-borderless">

                                <tr>
                                    <td><strong>Date</strong></td>
                                    <td>:</td>
                                    <td><?= date('d F Y', strtotime($order->order_date)); ?></td>
                                </tr>

                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td>:</td>
                                    <td><?= ucfirst($order->status); ?></td>
                                </tr>

                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td>:</td>
                                    <td>Rp <?= number_format($order->total_price); ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <div class="card shadow">
                        <div class="card-body">

                            <table class="table table-bordered">

                                <thead>
                                    <tr align="center">
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price (Rp)</th>
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

    </div>

</div>