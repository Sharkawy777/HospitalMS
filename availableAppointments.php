<?php
require './Admin/helpers/dbConnection.php';
require './Admin/helpers/functions.php';
require './Admin/helpers/checkLogin.php';
################################################################
$id = $_GET['id'];

//$sql = "select appointments_doctor.*, users.name from users join `appointments_doctor` on appointments_doctor.doctor_id = users.id and appointments_doctor.status = 0 join `doctor-more-info` on `doctor-more-info`.`specialize_id`='$id'";
//$sql = "select appointments_doctor.*, users.name from users join `appointments_doctor` on appointments_doctor.doctor_id = users.id join `doctor-more-info` on `doctor-more-info`.`specialize_id`='$id'";
$sql = "select appointments_doctor.*, users.name from users join `appointments_doctor` on appointments_doctor.doctor_id = users.id and appointments_doctor.status = 0";

$op = mysqli_query($con, $sql);

##########################################################

require '_layouts/header.php';
require '_layouts/slider.php';
?>


    <main style="text-align: center">
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
                                <th>Doctor Name</th>
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Doctor Name</th>
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tfoot>
                            <tbody>

                            <?php
                            # Fetch Data ......
                            while ($data = mysqli_fetch_assoc($op)) {

                                ?>

                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo date('Y-m-d', $data['day']); ?></td>
                                    <td><?php echo $data['from_time']; ?></td>
                                    <td><?php echo $data['to_time']; ?></td>

                                    <td>
                                        <a href='reserved.php?id=<?php echo $data['id']; ?>'
                                           class='btn btn-danger m-r-1em'>Reserve</a>

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