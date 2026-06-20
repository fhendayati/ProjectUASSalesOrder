<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-text mx-3">
        Sales Order
    </div>
</a>

<hr class="sidebar-divider my-0">

<!-- Dashboard -->
<li class="nav-item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
    <a class="nav-link" href="<?= base_url('index.php/dashboard'); ?>">
        <i class="fas fa-chart-line"></i>
        <span>Dashboard</span>
    </a>
</li>

<hr class="sidebar-divider">

<?php if($this->session->userdata('role_id') == 1): ?>
    <!-- ADMIN -->

    <li class="nav-item <?= $this->uri->segment(1) == 'products' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('index.php/products'); ?>">
            <i class="fas fa-box"></i>
            <span>Products</span>
        </a>
    </li>

    <li class="nav-item <?= $this->uri->segment(1) == 'customers' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('index.php/customers'); ?>">
            <i class="fas fa-users"></i>
            <span>Customers</span>
        </a>
    </li>

    <li class="nav-item <?= $this->uri->segment(1) == 'sales' ? 'active' : ''; ?>">
        <a class="nav-link"
        href="<?= base_url('index.php/sales'); ?>">
            <i class="fas fa-user-tie"></i>
            <span>Sales Person</span>
        </a>
    </li>

    <li class="nav-item <?= $this->uri->segment(1) == 'orders' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('index.php/orders'); ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Orders</span>
        </a>
    </li>


<?php elseif($this->session->userdata('role_id') == 2): ?>
    <!-- SALES -->

    <li class="nav-item <?= $this->uri->segment(1) == 'orders' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('index.php/orders'); ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Orders</span>
        </a>
    </li>

<?php elseif($this->session->userdata('role_id') == 3): ?>
    <!-- MANAGER -->

    <li class="nav-item <?= $this->uri->segment(1) == 'reports' ? 'active' : ''; ?>">

        <a class="nav-link collapsed"
           href="#"
           data-toggle="collapse"
           data-target="#collapseReports"
           aria-expanded="true"
           aria-controls="collapseReports">

            <i class="fas fa-chart-bar"></i>
            <span>Reports</span>

        </a>

        <div id="collapseReports"
             class="collapse"
             data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item"
                href="<?= base_url('index.php/reports'); ?>">

                    <i class="fas fa-calendar-alt mr-2"></i>
                    Report Per Period

                </a>

                <a class="collapse-item"
                href="<?= base_url('index.php/reports/sales'); ?>">

                    <i class="fas fa-user-tie mr-2"></i>
                    Report Per Sales Person

                </a>

                <a class="collapse-item"
                href="<?= base_url('index.php/reports/product'); ?>">

                    <i class="fas fa-box-open mr-2"></i>
                    Report Per Product

                </a>

            </div>

        </div>

    </li>

<?php endif; ?>

<hr class="sidebar-divider">

<!-- Logout -->

<li class="nav-item">
    <a class="nav-link logout-btn" href="#">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</li>

</ul>
