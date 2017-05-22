<?php
require 'condb.php';
session_start();
session_unset("Status");
header('Refresh:0,index.php');

?>