<?php
require './Admin/helpers/dbConnection.php';
require './Admin/helpers/functions.php';

$sql = 'select specializations.* from specializations';
$op = mysqli_query($con, $sql);

##########################################################

require '_layouts/header.php';
require '_layouts/slider.php';
?>

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard/Appointments/display</li>
                <?php
                echo '<br>';
                if (isset($_SESSION['Message'])) {
                    Messages($_SESSION['Message']);

                    # Unset Session ...
                    unset($_SESSION['Message']);
                }

                ?>
            </ol>

            <div class="card mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Specialize</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Specialize</th>
                                <th>Action</th>
                            </tfoot>
                            <tbody>

                            <?php
                            # Fetch Data ......
                            while ($data = mysqli_fetch_assoc($op)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['specialize']; ?></td>
                                    <td>
                                        <a href='availableAppointments.php?id=<?php echo $data['id']; ?>'
                                           class='btn btn-danger m-r-1em'>Show Available Appointments</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


<?php
require './_layouts/footer.php';
?>