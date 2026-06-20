<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">
                Profile
            </h1>

            <a href="<?= base_url('index.php/dashboard'); ?>"
               class="btn btn-primary mb-3">

                Back to Dashboard

            </a>

            <div class="card shadow">

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-3 text-center">

                            <?php

                            $photo = !empty($user->photo)
                                ? $user->photo
                                : 'default_profile.jpg';

                            ?>

                            <img
                                src="<?= base_url('uploads/profile/'.$photo); ?>"
                                class="profile-large">

                            <form
                                action="<?= base_url('index.php/profile/uploadPhoto'); ?>"
                                method="post"
                                enctype="multipart/form-data"
                                class="mt-3">

                                <input
                                    type="file"
                                    name="photo"
                                    class="form-control-file mb-2"
                                    required>

                                <button
                                    type="submit"
                                    class="btn btn-primary btn-sm">

                                    <i class="fas fa-camera mr-1"></i>
                                    Upload Photo

                                </button>

                            </form>

                        </div>

                        <div class="col-md-9">

                            <table class="table table-borderless">

                                <tr>
                                    <th width="180">Name</th>
                                    <td>
                                        <?= $user->name; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Username</th>
                                    <td>
                                        <?= $user->username; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Role</th>
                                    <td>

                                        <?php

                                        if($user->role_id == 1)
                                        {
                                            echo 'Administrator';
                                        }
                                        elseif($user->role_id == 2)
                                        {
                                            echo 'Sales Person';
                                        }
                                        else
                                        {
                                            echo 'Manager';
                                        }

                                        ?>

                                    </td>
                                </tr>

                                <tr>
                                    <th>Last Login</th>
                                    <td>

                                        <?php

                                        if($user->last_login)
                                        {
                                            echo date(
                                                'd-m-Y H:i',
                                                strtotime($user->last_login)
                                            );
                                        }
                                        else
                                        {
                                            echo '-';
                                        }

                                        ?>

                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>