<?php
session_start();
unset($_SESSION['nik']);
unset($_SESSION['user']);
session_destroy();
header("location:../../home.php");


?>