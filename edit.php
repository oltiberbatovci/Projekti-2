
<?php
include 'aplikimetRepository.php';
$id = $_GET['id'];//e merr id e studentit prej url

$strep = new aplikimetRepository();
$student = $strep->getAplikimetPunesById($id);
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="edit.css"> 
<body>
    <h3 id="h3">Perditeso te dhenat qe deshiron per Aplikuesin e Punes</h3>
    <form action="" method="post">
     <!-- nese nuk duam t'i ndryshojme te gjitha te dhenat, e perdorim kete pjesen tek value qe te na shfaqen vlerat aktuale, ashtu qe atributet qe nuk duam t'i ndryshojme mbesin te njejta pa pasur nevoje t'i shkruajme prape-->
     <p>Emri</p>  
     <input type="text" name="emri"  value="<?php echo $student['emri']?>"placeholder="Emri.."> <br> <br> <!-- Pjesa brenda [] eshte emri i sakte i atributit si ne Databaze-->
     <p>Mbiemri</p>    
     <input type="text" name="mbiemri"  value="<?php echo $student['mbiemri']?>"> <br> <br>
     <p>Email</p>    
     <input type="email" name="email"  value="<?php echo $student['email']?>"> <br> <br>
     <p>Nenshtetesia</p>     
     <input type="text" name="nenshtetsia"  value="<?php echo $student['nenshtetsia']?>"> <br> <br>
     <p>Qyteti</p>     
     <input type="text" name="qyteti"  value="<?php echo $student['qyteti']?>"> <br> <br>
     <p>Adresa</p>     
     <input type="text" name="adresa"  value="<?php echo $student['adresa']?>"> <br> <br>
    
        <input type="submit" name="submit" value="SAVE"> <br> <br>
    </form>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
   // var_dump($emri, $mbiemri, $email, $nenshtetsia, $qyteti, $adresa);
    $id = $student['id']; //merret nga studenti me siper
    $emri = $_POST['emri']; //merret nga formulari
    $mbiemri = $_POST['mbiemri'];
    $email = $_POST['email'];
    $nenshtetsia = $_POST['nenshtetsia'];
    $qyteti = $_POST['qyteti'];
    $adresa = $_POST['adresa'];


    $strep->editAplikimetPunes($id,$emri,$mbiemri,$email,$nenshtetsia,$qyteti, $adresa);
    header("location:dashboard.php");
}

?>