<div id="content-wrapper" class="d-flex flex-column">

<div id="content">

<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Update Order
</h1>

<div class="card shadow">

<div class="card-body">

<form method="post">

<div class="form-group">
    <label>Order Date</label>

    <input type="date"
        name="order_date"
        class="form-control"
        value="<?= $order->order_date; ?>">
</div>

<div class="form-group">
    <label>Customer</label>

    <select name="customer_id"
            class="form-control">

    <?php foreach($customers as $customer): ?>

    <option
    value="<?= $customer->id; ?>"

    <?= ($customer->id == $order->customer_id)
    ? 'selected'
    : ''; ?>>

    <?= $customer->customer_name; ?>

    </option>

    <?php endforeach; ?>

    </select>
</div>

<label>Products</label>

<div id="product-area">

<?php foreach($details as $detail): ?>

    <div class="row product-row mb-3">

        <div class="col-md-8">

            <select
                name="product_id[]"
                class="form-control">

                <?php foreach($products as $product): ?>

                <option
                    value="<?= $product->id; ?>"
                    <?= ($product->id == $detail->product_id)
                        ? 'selected'
                        : ''; ?>>

                    <?= $product->product_name; ?>

                </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="col-md-3">

            <input
                type="number"
                name="qty[]"
                class="form-control"
                value="<?= $detail->qty; ?>"
                min="1"
                required>

        </div>

        <div class="col-md-1">

            <button
                type="button"
                class="btn btn-danger remove-row">

                ×

            </button>

        </div>

    </div>

<?php endforeach; ?>

</div>

<button
    type="button"
    id="add-product"
    class="btn btn-info mb-3">

    <i class="fas fa-plus"></i>

    Add Product

</button>

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