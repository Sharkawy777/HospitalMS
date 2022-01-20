<?php

session_start();
require './Admin/helpers/functions.php';

//require 'checkLogin.php';

session_destroy();

header("location: login.php");


?>

