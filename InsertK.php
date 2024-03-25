<?php
include 'Contacti.php';
include_once 'ContactRepository.php';

if (isset($_POST['submitbtn'])) {
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $email = $_POST['email'];
    $ankesa = $_POST['ankesa'];
    

    $aplikim = new Contacti($emri, $mbiemri, $email,$ankesa);

    $aplikimetrepository = new ContactRepository();
    $aplikimetrepository->insertKontakti($aplikim);
    header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="Insert.css"> 

    <head>
    </head>
    <body>
        <h3 id="h3">Jeni duke shtuar nje Aplikim te Punes</h3>
        <form action="" method="post">  
            <p>Emri:</p>
            <input type="text" name="emri" ><br>
            <p>Mbimeri:</p>
            <input type="text" name="mbiemri" ><br>
            <P>Email:</P>
            <input type="email" name="email" ><br>
            <p>Ankesa:</p>
            <input type="text" name="ankesa" ><br>
           
            <input type="submit" name="submitbtn" value="Submit">
        </form>
    </body>
</html>