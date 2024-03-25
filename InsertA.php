<?php
include 'aplikimetpunes.php';
include_once 'aplikimetRepository.php';

if (isset($_POST['submitbtn'])) {
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $email = $_POST['email'];
    $nenshtetsia = $_POST['nenshtetsia'];
    $adresa = $_POST['adresa'];
    

    $aplikim = new aplikimetpunes($emri, $mbiemri, $email,$nenshtetsia, $adresa,);

    $aplikimetrepository = new aplikimetRepository();
    $aplikimetrepository->insertAplikimet($aplikim);
    header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h3 id="h3">Shtoni nje aplikim te punes</h3>
        <form action="" method="post">  
            <p>Emri:</p>
            <input type="text" name="emri" ><br>
            <p>Mbimeri:</p>
            <input type="text" name="mbiemri" ><br>
            <P>Email:</P>
            <input type="email" name="email" ><br>
            <p>Nenshtetesia:</p>
            <input type="text" name="nenshtetsia" ><br>
            <p>Adresa:</p>
            <input type="text" name="adresa" ><br>
           
            <input type="submit" name="submitbtn" value="Submit">
        </form>
    </body>
</html>