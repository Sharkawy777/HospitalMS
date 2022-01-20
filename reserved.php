<?php

require './Admin/helpers/dbConnection.php';
require './Admin/helpers/functions.php';
require './Admin/helpers/checkLogin.php';

$id = $_GET['id'];

$sql = "select * from appointments_doctor where id = $id";
$op = mysqli_query($con, $sql);

# Check If Count == 1 
if (mysqli_num_rows($op) == 1) {
    // delete code .....
    $patientId = $_SESSION['user']['id'];
//    $date = date_timestamp_get();
    $sql = "insert into reservations (`patient_id`,`appoint_doctor_id`) values ('$patientId','$id')";
    $op = mysqli_query($con, $sql);

    if ($op) {
        $sql = "update appointments_doctor set status = 1 where id = '$id'";
        $status = mysqli_query($con, $sql);
        if ($status) {
            $Message = ["Message" => "Reservation Complete"];

        } else {
            $Message = ["Message" => "Error try Again"];

        }
    } else {
        $Message = ["Message" => "Error try Again"];
    }


} else {
    $Message = ["Message" => "Invalid Id "];
}

#   Set Session
$_SESSION['Message'] = $Message;

header("location: reservedAppointments.php");

?>
