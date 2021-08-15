<?php
session_start();
unset($_SESSION['auth']);
unset($_SESSION['user']);

session_destroy();

header("location:../../index.php");
