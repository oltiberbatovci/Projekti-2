<?php
include_once 'Contacti.php';
include_once 'ContactRepository.php';
$errors = array();
if (isset($_POST['submit'])) {
    $emri = $_POST['firstname'];    
    $mbiemri = $_POST['lastname'];
    $email = $_POST['email'];
    $ankesa = $_POST['subject'];

  
if(empty($emri) || empty($mbiemri) || empty($email) || empty($ankesa) ){
            $errors[] = "All fields are required!";

}else{

    $kontakti = new Contacti($emri, $mbiemri, $email,$ankesa);

    $contactRepository = new ContactRepository();
    $contactRepository->insertKontakti($kontakti);
    header("location:contact.php");
}
}
?>
<?php if (!empty($errors)) { ?>
        <div class="error-message" id="allFieldsError">
            <?php foreach ($errors as $error) {
                echo $error . "<br>";
            } ?>
        </div>
    <?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>CONTACT US</title>
</head>
<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-logo" href="index.php">ThirreTaxin</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">ABOUT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="order.php">POROSIT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">CONTACT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="punesimi.php">PUNESOHU</a>
                  </li>
                </ul>
                <a href="login.php"><button id="login-btn">Login</button></a>
              </div>
            </div>
          </nav>
    </section>
    

<main>

    <div class="h1">
        <h1 id="h1-main">CONTACT US</h1>
    </div>
    <div class="container">
        <form method="post">
      
          <label for="fname">Emri</label>
          <input type="text" id="fname" name="firstname" placeholder="Emri juaj..">
          <div class="error-message" id="fnameError"></div>

          <label for="lname">Mbiemri</label>
          <input type="text" id="lname" name="lastname" placeholder="Mbiemri..">
          <div class="error-message" id="lnameError"></div>

          <label for="lname">Email</label>
          <input type="text" id="Email" name="email" placeholder="Emaili juaj..">
          <div class="error-message" id="EmailError"></div>

          <label for="subject">Ne rast se keni ndonje ankese, ju lutem shkruani ne detaje ne rubriken e meposhtme</label>
          <textarea id="subject" name="subject" placeholder="Paraqit ankesen tende.." style="height:200px"></textarea>
          <div class="error-message" id="subjectError"></div>

        <div >
        <button name="submit" class="porosia-butoni" type="submit" onclick="return validateForm()">Submit</button>
        </div>
        </form>
      </div>

      <script>

        function validateForm(){
            let fname=document.getElementById('fname').value;
        let fnameError=document.getElementById('fnameError');

        let lname=document.getElementById('lname').value;
        let lnameError=document.getElementById('lnameError');

        let Email=document.getElementById('Email').value;
        let EmailError=document.getElementById('EmailError');

        let subject=document.getElementById('subject').value;
        let subjectError=document.getElementById('subjectError');
        let allFieldsError = document.getElementById('allFieldsError');

        let hasErrors = false; 


        fnameError.innerText='';
        lnameError.innerText='';
        EmailError.innerText='';
        subjectError.innerText='';  
        allFieldsError.innerText = '';

    
        let regxname= /[a-zA-Z]/ ;

        if( !regxname.test(fname)){
            fnameError.innerText='emri invalid ';
            hasErrors = true;

            return false;
        }
        let LastnameRegex=/[a-zA-Z]/;
        if(! LastnameRegex.test(lname)){
            lnameError.innerText="mbiemri invalid";
            hasErrors = true;

        return false;
        }
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!emailRegex.test(Email)){
            EmailError.innerText="email jo korrekt";
            hasErrors = true;

            return false ;
        }
        if (hasErrors) {
        allFieldsError.innerText = 'All fields are required ';
        return false;
    } else {
        if (document.getElementById('submit').clicked) {
            return true;
        } else {
            return false;
        }
    }     
}
      </script>
</main>
      <footer>
        <div class="footermain">
            <a class="footer-logo" href="index.html">ThirreTaxin</a>
            <p class="p2-description" style="width: 40%; padding: 20px;">Zgjedhja juaj sapo eshte bere me e lehte. Me ne do te keni mundesine te kurseni kohen tuaj. Shpejte, sigurt dhe efikas. Te gjitha ne nje vend!
            Platforma me e re ne treg e flotes se taksive me gjithsej 6 operatore nen sherbimin tuaj 24/7.</p>
        
    
        <div class="footer-center">
            <h4>Links</h4>
            <a href="https://www.facebook.com/">Facebook</a>
            <a href="https://www.instagram.com/">Instagram</a>
            <a href="https://www.google.com/">Google</a>
        </div>
    
        <div class="footer-right">
            <h4>Contact</h4>
                <p>044 123 123</p>
                <p>045 345 678</p>
                <p>0800 1111 55</p>
        </div>
        </div>
        <p class="paragrafi-footer">
            <small>All rights reserved &copy; Created By Olti</small>
        </p>
    </footer>
</body>
</html>