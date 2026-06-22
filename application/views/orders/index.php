<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Data Orders
            </h1>

            <div class="card shadow">

                <div class="card-body">

                    <div class="d-flex align-items-center mb-3">

                        <?php if($this->session->userdata('role_id') == 2): ?>

                        <a href="<?= base_url('index.php/orders/add'); ?>"
                        class="btn btn-primary mr-2">

                            <i class="fas fa-plus"></i>
                            Add Order

                        </a>

                        <?php endif; ?>

                        <form method="GET" class="mb-0">

                            <select
                                name="status"
                                class="form-control filter-status"
                                onchange="this.form.submit()">

                                <option value="">All Status</option>

                                <option value="draft"
                                    <?= ($status=='draft') ? 'selected' : ''; ?>>
                                    Draft
                                </option>

                                <option value="dikirim"
                                    <?= ($status=='dikirim') ? 'selected' : ''; ?>>
                                    Dikirim
                                </option>

                                <option value="selesai"
                                    <?= ($status=='selesai') ? 'selected' : ''; ?>>
                                    Selesai
                                </option>

                                <option value="dibatalkan"
                                    <?= ($status=='dibatalkan') ? 'selected' : ''; ?>>
                                    Dibatalkan
                                </option>

                            </select>

                        </form>

                    </div>

                    <table class="table table-bordered" id="dataTable">

                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Sales Name</th>
                                <th>Total (Rp)</th>
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

                                    <?php if(
                                        $this->session->userdata('role_id') == 2
                                        &&
                                        $order->status == 'draft'
                                    ): ?>

                                    <a href="<?= base_url('index.php/orders/edit/'.$order->id); ?>"
                                    class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <?php endif; ?>

                                    <?php if($this->session->userdata('role_id') == 1): ?>

                                        <?php if($order->status == 'draft'): ?>

                                            <a href="#"
                                            class="btn btn-primary btn-sm btn-status"
                                            data-url="<?= base_url('index.php/orders/update_status/'.$order->id.'/dikirim'); ?>"
                                            data-title="Send Order?"
                                            data-text="Order will be changed to Dikirim">

                                                Kirim

                                            </a>

                                            <a href="#"
                                            class="btn btn-danger btn-sm btn-status"
                                            data-url="<?= base_url('index.php/orders/update_status/'.$order->id.'/dibatalkan'); ?>"
                                            data-title="Cancel Order?"
                                            data-text="Order will be changed to Dibatalkan">

                                                Batal

                                            </a>

                                        <?php elseif($order->status == 'dikirim'): ?>

                                            <a href="#"
                                            class="btn btn-success btn-sm btn-status"
                                            data-url="<?= base_url('index.php/orders/update_status/'.$order->id.'/selesai'); ?>"
                                            data-title="Complete the Order?"
                                            data-text="Order will be changed to Selesai">

                                                Selesai

                                            </a>

                                        <?php endif; ?>

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