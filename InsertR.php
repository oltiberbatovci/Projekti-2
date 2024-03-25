<?php
include 'Rezervimi.php';
include_once 'RezervimiRepository.php';

if (isset($_POST['submitbtn'])) {
    $emri = $_POST['emri'];
  
    $email = $_POST['email'];
    $nrkontaktues = $_POST['nrkontaktues'];
    $Lokacioni = $_POST['Lokacioni'];
    

    $aplikim = new Rezervimi($emri, $email,$nrkontaktues, $Lokacioni,);

    $aplikimetrepository = new RezervimiRepository();
    $aplikimetrepository->insertRezervimet($aplikim);
    header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="Insert.css"> 

    <head>
    </head>
    <body>
        <h3 id="h3">Jeni duke shtuar nje Rezervim te TAKSIT</h3>
        <form action="" method="post">  
            <p>Emri:</p>
            <input type="text" name="emri" ><br>
     
            <P>Email:</P>
            <input type="email" name="email" ><br>
            <p>NrKontaktues:</p>
            <input type="text" name="nrkontaktues" ><br>
            <p>Lokacioni:</p>
            <input type="text" name="Lokacioni" ><br>
           
            <input type="submit" name="submitbtn" value="Submit">
        </form>
    </body>
</html>