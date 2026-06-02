<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">
            Sales Order
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('index.php/dashboard'); ?>">
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Products -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/products'); ?>">
            <span>Products</span>
        </a>
    </li>

    <!-- Customers -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <span>Customers</span>
        </a>
    </li>

    <!-- Orders -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <span>Orders</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/auth/logout'); ?>">
            <span>Logout</span>
        </a>
    </li>

</ul>