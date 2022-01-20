<?php

require './Admin/helpers/dbConnection.php';
require './Admin/helpers/functions.php';
require './Admin/helpers/checkLogin.php';

$id = $_GET['id'];
//$sql = "select reservations.*, appointments_doctor.day from reservations, appointments_doctor where reservations.appoint_doctor_id=appointments_doctor.id and reservations.id=$id";
$sql = "select reservations.*, appointments_doctor.day from reservations join appointments_doctor on reservations.appoint_doctor_id=appointments_doctor.id and reservations.id=$id";
$op = mysqli_query($con, $sql);

# Check If Count
if (mysqli_num_rows($op) == 1) {

// delete code .....

    $data = mysqli_fetch_assoc($op);
//    print_r($data);
//    exit();
    $today = strtotime(date("Y-m-d"));
//    $expire = strtotime($data['day']);
//    echo $today . ' || ' . $expire;
//    exit();
//    $today_time = strtotime($today);
//    $expire_time = strtotime($expire);
//    $reserve_time = strtotime($data['day']);
    $reserve_time = $data['day'];
    if ($reserve_time == $today) {
//         echo  "you can not cancel your appointment now";
//         exit();
        $Message = ["Message" => "you can not cancel your appointment now"];
    } else {
//    $date = date('d');
//    $reserveDate = date('d',$data['day']);
//
//    if ($reserveDate==$date){
//        $errors['day'] = 'you can not cancel your appointment now';
//    }

        $sql = "delete from reservations where id = $id";
        $op = mysqli_query($con, $sql);

        if ($op) {
            $appoint_id = $_SESSION['appoint_id'];
            $sql = "update appointments_doctor set status = 0 where id = '$appoint_id'";
            $op = mysqli_query($con, $sql);
            if ($op) {
                $Message = ["Message" => "Raw Removed"];
            } else {
                $Message = ["Message" => "Error try Again on update status"];
            }
        } else {
            $Message = ["Message" => "Error try Again"];
        }
    }
} else {
    $Message = ["Message" => "Invalid Id "];
}

#   Set Session
$_SESSION['Message'] = $Message;

header("location: reservedAppointments.php");

?>