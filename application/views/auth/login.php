<!DOCTYPE html>

<html>
<head>

<title>Login - Sales Order System</title>

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

    body{
        margin: 0;
        padding: 0;
        font-family: Georgia, "Times New Roman", serif;
        background: linear-gradient(
            135deg,
            #476dae,
            #5674a8
        );
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-box{
        width: 1000px;
    }

    .login-card{
        border: none;
        border-radius: 20px;
        overflow: hidden;
    }

    /* PANEL KIRI */

    .company-logo{

        width: 250px;;

        height:auto;

        margin-bottom:25px;

        filter:
        drop-shadow(
            0 10px 20px rgba(0,0,0,.15)
        );
    }

    .company-name{
        color:#1e3c72;
        font-size:30px;
        letter-spacing:1px;
    }

    .company-panel{
        background: linear-gradient(
            135deg,
            #1e3c72,
            #2a5298
        );
        color: white;
        min-height: 550px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 40px;
    }

    .company-panel i{
        animation:float 3s ease-in-out infinite;
    }

    @keyframes float{

        0%{
            transform:translateY(0);
        }

        50%{
            transform:translateY(-10px);
        }

        100%{
            transform:translateY(0);
        }
    }

    .company-panel h2{
        font-weight: bold;
        margin-bottom: 15px;
    }

    .company-panel p{
        margin-bottom: 5px;
        font-size: 18px;
    }

    .company-panel small{
        opacity: 0.9;
        font-style: italic;
    }

    /* PANEL KANAN */

    .login-panel{
        background: white;
        padding: 70px 80px;
    }

    .login-title{
        text-align: center;
        color: #1e3c72;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .system-subtitle{
        text-align: center;
        color: #777;
        margin-bottom: 30px;
        font-style: italic;
    }

    label{
        font-weight: bold;
        color: #444;
    }

    .form-control{
        border-radius: 8px;
        height: 55px;
        padding-left: 20px;
        padding-right: 20px;
        font-size: 18px;
        transition:.3s;
    }

    .form-control:focus{
        border-color:#1e3c72;
        box-shadow:
        0 0 15px rgba(30,60,114,.25);
    }

    .form-wrapper{
    margin-left: 50px;
    }


    .password-wrapper{
        position: relative;
    }

    .toggle-password{
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #666;
    }

    .btn-primary{
        background: #1e3c72;
        border: none;
        border-radius: 8px;
        height: 45px;
    }

    .btn-primary:hover{
        background: #16325c;
    }

    .footer-text{
        text-align: center;
        margin-top: 15px;
        color: white;
        font-size: 14px;
    }

    .login-card{
        animation:zoomIn .8s ease;
    }

    @keyframes zoomIn{
        from{
            opacity:0;
            transform:scale(.9);
        }

        to{
            opacity:1;
            transform:scale(1);
        }
    }

</style>

</head>

<body>

<div class="login-box">

<div class="card shadow-lg login-card">

    <div class="row no-gutters">

        <!-- KIRI -->

        <div class="col-md-4 company-panel">

            <img src="<?= base_url('assets/img/logo2.png'); ?>" class="company-logo">

            <h2>PT MAJU JAYA</h2>

            <p>
                Sales Order Management System
            </p>

            <small>
                Fast • Accurate • Reliable
            </small>

        </div>

        <!-- KANAN -->

        <div class="col-md-7 login-panel">

        <div class="form-wrapper">

            <h2 class="login-title">
                SALES ORDER SYSTEM
            </h2>

            <div class="system-subtitle">
                Login to continue
            </div>

            <form method="post">

                <div class="form-group">

                    <label>Username</label>

                    <input type="text"
                        name="username"
                        class="form-control"
                        placeholder="Input Username"
                        required>

                </div>

                <div class="form-group">

                    <label>Password</label>

                    <div class="password-wrapper">

                        <input type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Input Password"
                            required>

                        <span class="toggle-password"
                            onclick="togglePassword()">

                            <i id="eyeIcon"
                            class="fas fa-eye"></i>

                        </span>

                    </div>

                </div>

                <button type="submit"
                        class="btn btn-primary btn-block">

                    Login

                </button>

            </form>

        </div>

</div>

    </div>

</div>

<div class="footer-text">
    © 2026 Sales Order System - PT Maju Jaya
</div>

</div>

<script>

function togglePassword()
{
    let password =
        document.getElementById('password');

    let eye =
        document.getElementById('eyeIcon');

    if(password.type === 'password')
    {
        password.type = 'text';

        eye.classList.remove('fa-eye');
        eye.classList.add('fa-eye-slash');
    }
    else
    {
        password.type = 'password';

        eye.classList.remove('fa-eye-slash');
        eye.classList.add('fa-eye');
    }
}

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if($this->session->flashdata('error')): ?>

<script>

Swal.fire({
    icon: 'error',
    title: 'Login Failed',
    text: '<?= $this->session->flashdata('error'); ?>',
    confirmButtonText: 'OK',
    confirmButtonColor: '#1e3c72',
});

</script>

<?php endif; ?>

</body>
</html>
