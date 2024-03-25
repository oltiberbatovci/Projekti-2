<?php
include_once 'aplikimetpunes.php';
include_once 'aplikimetRepository.php';

if (isset($_POST['submit'])) {
    
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $email = $_POST['email'];
    $nenshtetesia = $_POST['nenshtetesia'];
    $qyteti = $_POST['qyteti'];//verejtje??
    $adresa = $_POST['address'];

    $errors = array();
    if(empty($emri) || empty($mbiemri) || empty($email) || empty($nenshtetesia)|| empty($qyteti) || empty($adresa)){
        $errors[] = "All fields are required!";
    }else{
    $Aplikimetpunes = new aplikimetpunes($emri, $mbiemri, $email,$nenshtetesia, $qyteti, $adresa);

    $AplikimetRepository = new aplikimetRepository();
    $AplikimetRepository->insertAplikimet($Aplikimetpunes);
    header("location:punesimi.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="punesimi.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>APLIKIM PUNE</title>
</head>
<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-logo" href="index.html">ThirreTaxin</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="index.html">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.html">ABOUT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="order.html">POROSIT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.html">CONTACT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="punesimi.html">PUNESOHU</a>
                  </li>
                </ul>
                <a href="login.html"><button id="login-btn">Login</button></a>
              </div>
            </div>
          </nav>
    </section>

    <main>

      <h1>APLIKO PER PUNE</h1>
      <p id="pozitat"><small>Ne rast aplikimi per shofer, leja e qarkullimit duhet te jete me e vjeter se 3 vjet!</small></p>

      <div class="Aplikimi">
          <select id="open-positions">
              <option value="" disabled selected>Pozitat aktive</option>
                      <option value="Shofer">Shofer/e</option>
                      <option value="Bazist">Bazist/e</option>
                      <option value="Autolarje">Autolarje</option>
          </select>
          <form method="post">
              <div class="input-field">
                  <p class="paragraph">Emri</p>
                  <input id="emri" name="emri" type="text" placeholder="Emri juaj">
              </div>
              <div class="error-message" id="emriError"></div>

              <div class="input-field">
                <p class="paragraph">Mbiemri</p>
                  <input id="mbiemri" name="mbiemri" type="text" placeholder="Mbiemri juaj">
              </div>
              <div class="error-message" id="mbiemriError"></div>

              <div class="input-field">
                <p class="paragraph">Email</p>
                  <input id="email" name="email" type="email" placeholder="Shkruaj email adresen tuaj:">
              </div>
              <div class="error-message" id="emailError"></div>

              <div class="input-field">
                <p class="paragraph">Nenshtetesia</p>
                  <input id="nenshtetesia" name="nenshtetesia" type="text" placeholder="Prejardhja juaj:">
              </div>
              <div class="error-message" id="nenshtetsiaError"></div>

              <div class="input-field">
                <p class="paragraph">Data e lindjes</p>
                  <input id="datalindjes" name="datalindjes" type="date" >
              </div>
              <div class="error-message" id="datalindjesError"></div>

               <div class="input-field">
                <p class="paragraph">Qyteti</p>       
                  <select id="qytetet" name="qyteti">
                      <option value="" disabled selected>Zgjidh një qytet</option>
                      <option value="Prishtine">Prishtine</option>
                      <option value="Peje">Peje</option>
                      <option value="GJilan">Gjilan</option>
                      <option value="Mitrovice">Mitrovice</option>
                      <option value="Ferizaj">Ferizaj</option>
                      <option value="Prizren">Prizren</option>
                      <option value="Podujeve">Podujeve</option>
                      <option value="Fushe Kosove">Fushe Kosove</option>
                  </select>
              </div>
              <div class="error-message" id="qytetiError"></div>

              <div id="input-field">
                <p class="paragraph">Adresa</p>
                  <textarea id="address" name="address" cols="70" rows="3"></textarea>
              </div>
              <div class="error-message" id="addressError"></div>


             
              
              <div class ="field button-field">
                  <button name="submit" class="porosia-butoni" type="submit" onclick=" return validateForm()">Dergo Aplikimin</button>
              </div>
              

          </form>
      </div>
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

  <script>

      function validateForm(){
          let emri=document.getElementById('emri').value;
          let emriError=document.getElementById('emriError');

          let mbiemri=document.getElementById('mbiemri').value;
          let mbiemriError=document.getElementById('mbiemriError');

          let email=document.getElementById('email').value;
          let emailError=document.getElementById('emailError');

          let nenshtetesia=document.getElementById('nenshtetesia').value;
          let nenshtetsiaError=document.getElementById('nenshtetsiaError');

          let datalindjes=document.getElementById('datalindjes').value;
          let datalindjesError=document.getElementById('datalindjesError');

         let qytetet=document.getElementById('qytetet').value;
         let qytetiError=document.getElementById('qytetiError');

          let address=document.getElementById('address').value;
          let addressError=document.getElementById('addressError');

          let allFieldsError = document.getElementById('allFieldsError');

          let hasErrors = false; 
          
          emriError.innerText='';
          mbiemriError.innerText='';
          emailError.innerText='';
          nenshtetsiaError.innerText='';
          datalindjesError.innerText='';
          addressError.innerText='';
          qytetiError.innerText='';

          allFieldsError.innerText = '';


          let regxname= /[a-zA-Z]/ ;

          if(emri.trim()=='' || !regxname.test(emri)){
              emriError.innerText='invalid emri';
      hasErrors = true;

              return false;
          }
          let LastnameRegex=/[a-zA-Z]/;
          if(mbiemri.trim()==''||! LastnameRegex.test(mbiemri)){
              mbiemriError.innerText="mbiemri invalid";
              hasErrors = true;
              return false;            
          }
          let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if(email.trim()==""||!emailRegex.test(email)){
              emailError.innerText="email invalid";
              hasErrors = true;
              return false;        
              }
          let NenshtetesiaRegex= /[a-zA-Z]/ ;
          if(nenshtetesia.trim()==""|| !NenshtetesiaRegex.test(nenshtetesia)){
              nenshtetsiaError.innerText="nenshtetsia invalid";
              hasErrors = true;
              return false;         
             }
          if(datalindjes.trim()==""){
           datalindjesError.innerText="dataLindjes invalid";
              hasErrors = true;
              return false;        
              }
          if(qytetet.trim()==''){
              qytetiError.innerText='qyteti invalid';
              hasErrors = true;
              return false;          
            }
          if(address.trim()==""){
              addressError.innerText="adresa invalid";
              hasErrors = true;
              return false;
                      }
         return true;             
      }
  </script>

</body>
</html>