<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Add Customer
            </h1>

            <div class="card shadow">

                <div class="card-body">

                    <form method="post">

                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text"
                                   name="customer_name"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address"
                                    class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text"
                                   name="phone"
                                   class="form-control">
                        </div>

                        <div class="mt-3">

                            <button type="submit"
                                    class="btn btn-success">
                                Save
                            </button>

                            <a href="<?= base_url('index.php/products'); ?>"
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