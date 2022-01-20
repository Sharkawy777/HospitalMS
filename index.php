<?php
echo '<br>';
if (isset($_SESSION['Message'])) {
    Messages($_SESSION['Message']);

    # Unset Session ...
    unset($_SESSION['Message']);
}


require '_layouts/header.php';
require '_layouts/slider.php';
require '_layouts/features.php';
require '_layouts/doctorsMessage.php';
require '_layouts/team.php';
require '_layouts/blog.php';
require '_layouts/footer.php';
require './Admin/helpers/dbConnection.php'
?>