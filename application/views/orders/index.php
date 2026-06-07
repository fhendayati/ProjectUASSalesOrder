<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Orders
            </h1>

            <div class="card shadow">

                <div class="card-body">

                    <a href="<?= base_url('index.php/orders/add'); ?>"
                       class="btn btn-primary mb-3">

                        <i class="fas fa-plus"></i>
                        Add Order

                    </a>

                    <table class="table table-bordered">

                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Sales Name</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th width="180">Action</th>
                                
                            </tr>
                        </thead>

                        <tbody>

                        <?php $no = 1; ?>

                        <?php foreach($orders as $order): ?>

                            <tr>
                                <td align="center"><?= $no++; ?></td>

                                <td align="center"><?= $order->order_date; ?></td>

                                <td><?= $order->customer_name; ?></td>

                                <td><?= $order->sales_name; ?></td>

                                <td align="right">
                                    <?= number_format($order->total_price); ?>
                                </td>

                                <td align="center">

                                <?php if($order->status == 'draft'): ?>

                                    <span class="badge badge-secondary">
                                        Draft
                                    </span>

                                <?php elseif($order->status == 'dikirim'): ?>

                                    <span class="badge badge-primary">
                                        Dikirim
                                    </span>

                                <?php elseif($order->status == 'selesai'): ?>

                                    <span class="badge badge-success">
                                        Selesai
                                    </span>

                                <?php elseif($order->status == 'dibatalkan'): ?>

                                    <span class="badge badge-danger">
                                        Dibatalkan
                                    </span>

                                <?php endif; ?>

                                </td>

                                <td align="center">
                                    
                                    <a href="<?= base_url('index.php/orders/detail/'.$order->id); ?>"
                                    class="btn btn-info btn-sm">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                <?php if($order->status == 'draft'): ?>

                                    <a href="#"
                                    class="btn btn-primary btn-sm btn-status"
                                    data-url="<?= base_url('index.php/orders/update_status/'.$order->id.'/dikirim'); ?>"
                                    data-title="Kirim Order?"
                                    data-text="Order akan diubah menjadi Dikirim">
                                    Kirim
                                    </a>

                                    <a href="#"
                                    class="btn btn-danger btn-sm btn-status"
                                    data-url="<?= base_url('index.php/orders/update_status/'.$order->id.'/dibatalkan'); ?>"
                                    data-title="Batalkan Order?"
                                    data-text="Order akan dibatalkan">
                                    Batal
                                    </a>

                                <?php elseif($order->status == 'dikirim'): ?>

                                <a href="#"
                                class="btn btn-success btn-sm btn-status"
                                data-url="<?= base_url('index.php/orders/update_status/'.$order->id.'/selesai'); ?>"
                                data-title="Selesaikan Order?"
                                data-text="Order akan ditandai selesai">
                                Selesai
                                </a>

                                <?php else: ?>

                                    -

                                <?php endif; ?>

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