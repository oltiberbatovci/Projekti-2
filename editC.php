
<?php
include 'ContactRepository.php';
$id = $_GET['id'];//e merr id e studentit prej url

$strep = new ContactRepository();
$kontakt = $strep->getKontaktById($id);
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="edit.css"> 

<body>
    <h3 id="h3">Perditeso te dhenat e kontaktit</h3>
    <form action="" method="post">
     <!-- nese nuk duam t'i ndryshojme te gjitha te dhenat, e perdorim kete pjesen tek value qe te na shfaqen vlerat aktuale, ashtu qe atributet qe nuk duam t'i ndryshojme mbesin te njejta pa pasur nevoje t'i shkruajme prape-->
     <p>Emri</p>   
     <input type="text" name="fname"  value="<?php echo $kontakt['fname']?>"> <br> <br> <!-- Pjesa brenda [] eshte emri i sakte i atributit si ne Databaze-->
     <p>Mbiemri</p>   
     <input type="text" name="lname"  value="<?php echo $kontakt['lname']?>"> <br> <br>
     <p>Email</p>   
     <input type="text" name="email"  value="<?php echo $kontakt['email']?>"> <br> <br>
     <p>Ankesa</p>   
     <input type="text" name="subject"  value="<?php echo $kontakt['subject']?>"> <br> <br>

        <input type="submit" name="buton" value="SAVE"> <br> <br>
    </form>
</body>
</html>

<?php 

if(isset($_POST['buton'])){
    $id = $kontakt['id']; //merret nga studenti me siper
    $emri = $_POST['fname']; //merret nga formulari
    $mbiemri = $_POST['lname'];
    $email = $_POST['email'];
    $ankesa = $_POST['subject'];


    $strep->editKontakt($id,$emri,$mbiemri,$email,$ankesa);
    header("location:dashboard.php");
}

?>