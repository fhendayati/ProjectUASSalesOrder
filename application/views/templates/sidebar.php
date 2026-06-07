<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">
            Sales Order
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/dashboard'); ?>">
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <?php if($this->session->userdata('role_id') == 1): ?>
        <!-- ADMIN -->

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('index.php/products'); ?>">
                <span>Products</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('index.php/customers'); ?>">
                <span>Customers</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('index.php/orders'); ?>">
                <span>Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <span>Reports</span>
            </a>
        </li>

    <?php elseif($this->session->userdata('role_id') == 2): ?>
        <!-- SALES -->

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('index.php/orders'); ?>">
                <span>Orders</span>
            </a>
        </li>

    <?php elseif($this->session->userdata('role_id') == 3): ?>
        <!-- MANAGER -->

        <li class="nav-item">
            <a class="nav-link" href="#">
                <span>Reports</span>
            </a>
        </li>

    <?php endif; ?>

    <hr class="sidebar-divider">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/auth/logout'); ?>">
            <span>Logout</span>
        </a>
    </li>

</ul>