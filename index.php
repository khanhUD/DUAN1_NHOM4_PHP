<?php
ob_start();
session_start();
require_once 'bootstrap.php';

$app = new App();
ob_end_flush();


