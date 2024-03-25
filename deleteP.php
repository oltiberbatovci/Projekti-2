<?php
include ("PerdoruesitRepository.php");
$id = $_GET['id'];//e merr id prej url

$strep = new PerdoruesitRepository();
$strep->deletePerdoruesi($id);

header("location:dashboard.php");
?>