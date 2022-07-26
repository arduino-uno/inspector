<?php
error_reporting(0);
// Calling functions library
require("../scripts/functions_lib.php");
// Call logout function
logout();
header('location: ../index.php');
die();
