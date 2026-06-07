<div id="content-wrapper" class="d-flex flex-column">

<div id="content">

<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Add Order
</h1>

<div class="card shadow">

<div class="card-body">

<?php if($this->session->flashdata('error')): ?>

<div class="alert alert-danger">

    <?= $this->session->flashdata('error'); ?>

</div>

<?php endif; ?>

<form method="post">

<div class="form-group">
    <label>Order Date</label>

    <input type="date"
           name="order_date"
           class="form-control"
           value="<?= date('Y-m-d'); ?>">
</div>

<div class="form-group">
    <label>Customer</label>

    <select name="customer_id"
            class="form-control">

        <?php foreach($customers as $customer): ?>

            <option value="<?= $customer->id; ?>">
                <?= $customer->customer_name; ?>
            </option>

        <?php endforeach; ?>

    </select>
</div>

<div class="form-group">
    <label>Product</label>

    <select name="product_id"
            class="form-control">

        <?php foreach($products as $product): ?>

            <option value="<?= $product->id; ?>">

                <?= $product->product_name; ?>

            </option>

        <?php endforeach; ?>

    </select>
</div>

<div class="form-group">
    <label>Qty</label>

    <input type="number"
           name="qty"
           class="form-control"
           min="1"
           required>
</div>

<div class="mt-3">

    <button type="submit"
            class="btn btn-success">

        Save

    </button>

    <a href="<?= base_url('index.php/orders'); ?>"
       class="btn btn-secondary">

        Cancel

    </a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>