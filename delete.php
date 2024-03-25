<?php
include_once 'aplikimetRepository.php';
$id = $_GET['id'];//e merr id prej url

$strep = new aplikimetRepository();
$strep->deleteAplikimetPunes($id);

header("location:dashboard.php");
?>