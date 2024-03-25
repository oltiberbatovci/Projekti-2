<?php
include_once 'Rezervimirepository.php';
$id = $_GET['id'];//e merr id prej url

$strep = new Rezervimirepository();
$strep->deleteRezervimin($id);

header("location:dashboard.php");
?>