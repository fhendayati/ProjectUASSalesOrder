<div id="content-wrapper" class="d-flex flex-column">

<div id="content">

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Change Password
    </h1>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if($this->session->flashdata('success')): ?>

    <script>

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?= $this->session->flashdata('success'); ?>',
        confirmButtonText: 'OK',
        confirmButtonColor: '#1e3c72'
    });

    </script>

    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>

    <script>

    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '<?= $this->session->flashdata('error'); ?>',
        confirmButtonText: 'OK',
        confirmButtonColor: '#1e3c72'
    });

    </script>

    <?php endif; ?>

    <div class="card shadow">

        <div class="card-body">

            <form method="post">

                <div class="form-group">

                    <label>Old Password</label>

                    <div class="input-group">

                        <input type="password"
                            id="old_password"
                            name="old_password"
                            class="form-control"
                            required>

                        <div class="input-group-append">

                            <span class="input-group-text"
                                onclick="togglePassword('old_password', this)"
                                style="cursor:pointer;">

                                <i class="fas fa-eye"></i>

                            </span>

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label>New Password</label>

                    <div class="input-group">

                        <input type="password"
                            id="new_password"
                            name="new_password"
                            class="form-control"
                            required>

                        <div class="input-group-append">

                            <span class="input-group-text"
                                onclick="togglePassword('new_password', this)"
                                style="cursor:pointer;">

                                <i class="fas fa-eye"></i>

                            </span>

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label>Confirm Password</label>

                    <div class="input-group">

                        <input type="password"
                            id="confirm_password"
                            name="confirm_password"
                            class="form-control"
                            required>

                        <div class="input-group-append">

                            <span class="input-group-text"
                                onclick="togglePassword('confirm_password', this)"
                                style="cursor:pointer;">

                                <i class="fas fa-eye"></i>

                            </span>

                        </div>

                    </div>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Save Password

                </button>

                <a href="<?= base_url('index.php/dashboard'); ?>"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

</div>

<script>

function togglePassword(fieldId, element)
{
    let input =
        document.getElementById(fieldId);

    let icon =
        element.querySelector('i');

    if(input.type === 'password')
    {
        input.type = 'text';

        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
    else
    {
        input.type = 'password';

        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

</script>

</div>