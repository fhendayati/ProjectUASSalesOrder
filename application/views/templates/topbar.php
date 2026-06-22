<nav class="navbar navbar-expand navbar-light bg-white topbar mb-0 static-top shadow">

    <!-- Nama Sistem -->

    <div class="d-flex align-items-center">

        <img src="<?= base_url('assets/img/logo2.png'); ?>"
            class="topbar-logo">

        <div class="ml-3">

            <h5 class="mb-0 company-name">
                PT MAJU JAYA
            </h5>

            <small class="system-name">
                Sales Order Management System
            </small>

        </div>

    </div>

    <div class="mx-auto">

        <div class="topbar-date">

            <i class="fas fa-calendar-alt mr-2"></i>

            <?= date('l, d F Y'); ?>

            <span class="mx-2">|</span>

            <i class="fas fa-clock mr-2"></i>

            <span id="liveClock"></span>

        </div>

    </div>

    <!-- User Login -->

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle"
            href="#"
            id="userDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">

                <?php

                $photo = $this->session->userdata('photo');

                if(empty($photo))
                {
                    $photo = 'default_profile.jpg';
                }

                ?>

                <div class="d-flex align-items-center">

                    <img
                        src="<?= base_url('uploads/profile/'.$photo); ?>"
                        class="profile-avatar">

                    <div class="ml-0">

                        <div class="profile-name">
                            <?= $this->session->userdata('name'); ?>
                        </div>

                        <div class="profile-role">

                            <?php

                            if($this->session->userdata('role_id') == 1)
                            {
                                echo 'Administrator';
                            }
                            elseif($this->session->userdata('role_id') == 2)
                            {
                                echo 'Sales Person';
                            }
                            else
                            {
                                echo 'Manager';
                            }

                            ?>

                        </div>

                    </div>

                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">

                <a class="dropdown-item"
                href="<?= base_url('index.php/profile'); ?>">

                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                    Profile

                </a>

                <a class="dropdown-item"
                href="<?= base_url('index.php/profile/changePassword'); ?>">

                    <i class="fas fa-key mr-2"></i>
                    Change Password

                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item logout-btn"
                href="<?= base_url('index.php/profile'); ?>">

                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                    Logout

                </a>

            </div>

        </li>

    </ul>

</nav>