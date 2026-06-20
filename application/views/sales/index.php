<div id="content-wrapper" class="d-flex flex-column">

<div id="content">

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Data Sales Person
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered" id="dataTable">

                <thead>

                    <tr align="center">

                        <th>No</th>
                        <th>ID Sales Person</th>
                        <th>Sales Name</th>
                        <!-- <th>Username</th>
                        <th>Last Login</th> -->

                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>

                    <?php foreach($sales as $row): ?>

                    <tr>

                        <td align="center">
                            <?= $no++; ?>
                        </td>

                        <td align="center">
                            SP-<?= str_pad(
                                $row->id,
                                3,
                                '0',
                                STR_PAD_LEFT
                            ); ?>
                        </td>

                        <td>
                            <?= $row->name; ?>
                        </td>

                        <!-- <td>
                            <?= $row->username; ?>
                        </td>

                        <td align="center">

                            <?php
                            if(!empty($row->last_login))
                            {
                                echo date(
                                    'd-m-Y H:i',
                                    strtotime(
                                        $row->last_login
                                    )
                                );
                            }
                            else
                            {
                                echo '-';
                            }
                            ?>

                        </td> -->

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>

</div>