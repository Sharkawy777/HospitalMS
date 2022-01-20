<?php

require './Admin/helpers/dbConnection.php';
require './Admin/helpers/functions.php';
require './Admin/helpers/checkLogin.php';

# Fetch Id .... 
$id = $_SESSION['user']['id'];

//$sql = "select appointments_doctor.* , users.name from appointments_doctor join reservations on appointments_doctor.id = reservations.appoint_doctor_id and reservations.patient_id='$id' join users on appointments_doctor.doctor_id= users.id";
$sql = "select appointments_doctor.* ,reservations.id as reserve_id,  users.name from appointments_doctor join reservations on appointments_doctor.id = reservations.appoint_doctor_id and reservations.patient_id='$id' join users on appointments_doctor.doctor_id= users.id";
$op = mysqli_query($con, $sql);

require '_layouts/header.php';
require '_layouts/slider.php';

?>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard/Reservations/display</li>
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
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Doctor Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Doctor Name</th>
                                <th>Action</th>
                            </tfoot>
                            <tbody>

                            <?php
                            # Fetch Data ......
                            while ($data = mysqli_fetch_assoc($op)) {

                                ?>

                                <tr>
                                    <td><?php echo $data['reserve_id']; ?></td>
                                    <td><?php echo date('Y-m-d', $data['day']); ?></td>
                                    <td><?php echo $data['from_time']; ?></td>
                                    <td><?php echo $data['to_time']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td>
                                        <?php $_SESSION['appoint_id'] = $data['id']; ?>
                                        <a href='deleteReserve.php?id=<?php echo $data['reserve_id']; ?>'
                                           class='btn btn-danger m-r-1em'>Cancel</a>
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
require './Admin/layouts/footer.php';
?>