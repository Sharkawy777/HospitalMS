<?php
require './Admin/helpers/dbConnection.php';
require './Admin/helpers/functions.php';
require './Admin/helpers/checkLogin.php';
################################################################
//$sql = 'select specializations.specialize from `users`,`specializations`,`doctor-more-info` as doctorInfo where doctorInfo.doctor_id = users.id and specializations.id = doctorInfo.specialize_id';

//$sql = 'select appointments_doctor.*, users.name, specializations.specialize from users join appointments_doctor on appointments_doctor.Doctors_id = users.id';
//$sql = 'select appointments_doctor.*, users.name from users join appointments_doctor on appointments_doctor.Doctors_id = users.id';
$sql = 'select specializations.* from specializations';
$op = mysqli_query($con, $sql);

####################################################33
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

# Fetch Id ....
    $id = $_GET['id'];

    $sql = "select * from appointments_doctor where id = $id";
    $op = mysqli_query($con, $sql);

# Check If Count == 1
    if (mysqli_num_rows($op) == 1) {
        // delete code .....
        $patientId = $_SESSION['user']['id'];
        $sql = "insert into reservations (`patient_id`,`appoint_doctor_id`) values ('$patientId','$id')";
        $op = mysqli_query($con, $sql);

        if ($op) {
            $Message = ["Message" => "Raw Removed"];
        } else {
            $Message = ["Message" => "Error try Again"];
        }


    } else {
        $Message = ["Message" => "Invalid Id "];
    }

#   Set Session
    $_SESSION['Message'] = $Message;

    header("location: index.php");

}
##########################################################
require './Admin/layouts/header.php';
require './Admin/layouts/nav.php';
require './Admin/layouts/sidNav.php';

?>


    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard/Specialization/display</li>
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
                                        <a href='availableAppointments1.php?id=<?php echo $data['id']; ?>'
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
require './Admin/layouts/footer.php';
?>