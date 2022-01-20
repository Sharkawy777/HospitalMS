<?php
require '../helpers/dbConnection.php';
require '../helpers/functions.php';
################################################################
# Fetch Rows Data .......
//$sql = 'select reservations.id as reserved_id, users.name, appointments_doctor.* from appointments_doctor join users on appointments_doctor.doctor_id = users.id join reservations on appointments_doctor.id = reservations.appoint_doctor_id';
if ($_SESSION['user']['role_id'] == 1) {

//    $sql = "select appointments_doctor.* ,reservations.id as reserve_id,  users.name from reservations  join appointments_doctor on appointments_doctor.id = reservations.appoint_doctor_id join users on appointments_doctor.doctor_id= reservations.appoint_doctor_id";
    $sql = "select appointments_doctor.* ,reservations.id as reserve_id, users.name from appointments_doctor  join reservations on appointments_doctor.id = reservations.appoint_doctor_id join users on users.id = appointments_doctor.doctor_id";
//    $sql = "select appointments_doctor.* ,reservations.id as reserve_id from reservations  join appointments_doctor on appointments_doctor.id = reservations.appoint_doctor_id";

    $op = mysqli_query($con, $sql);
//    $data = mysqli_fetch_assoc($op);
//    print_r($data);
//    exit();

} else if ($_SESSION['user']['role_id'] == 2) {

    $id = $_SESSION['user']['id'];
    $sql = "select appointments_doctor.* ,reservations.id as reserve_id,  users.name from appointments_doctor join reservations on appointments_doctor.id = reservations.appoint_doctor_id join users on appointments_doctor.doctor_id= '$id'";
    $op = mysqli_query($con, $sql);

}
//$sql = "select appointments_doctor.* ,reservations.id as reserve_id,  users.name from appointments_doctor join reservations on appointments_doctor.id = reservations.appoint_doctor_id join users on appointments_doctor.doctor_id= users.id";
//$sql = "select appointments_doctor.*,reservations.id as reserve_id, users.name from users join `appointments_doctor` on appointments_doctor.doctor_id = users.id and appointments_doctor.status = 1";

//$op = mysqli_query($con, $sql);
################################################################

require '../layouts/header.php';
require '../layouts/nav.php';
require '../layouts/sidNav.php';
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
            <!--            <a href='create.php'-->
            <!--               class='btn btn-danger m-r-1em'>Create new appointment</a>-->

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
                                    <td><?php echo $data['reserve_id']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo date('Y-m-d', $data['day']); ?></td>
                                    <td><?php echo $data['from_time']; ?></td>
                                    <td><?php echo $data['to_time']; ?></td>
                                    <?php $_SESSION['appoint_id'] = $data['id']; ?>

                                    <td>
                                        <a href='./deleteReserve.php?id=<?php echo $data['reserve_id']; ?>'
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
require '../layouts/footer.php';
?>