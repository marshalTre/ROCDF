<?php
if(!isset($_SESSION)) { session_start(); }
require_once './logueo.php';
$obj=new login();
$obj->logueo();

