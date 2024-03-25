<?php

session_start();

// Përfshij klasën e lidhjes me bazën e të dhënave
include_once 'DatabaseConnection.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   // Krijo një instancë të klasës së lidhjes me bazën e të dhënave
   $dbConnection = new DatabaseConnection();
   // Fillo lidhjen me bazën e të dhënave
   $conn = $dbConnection->startConnection();

   $select = " SELECT * FROM user_form WHERE email = :email && password = :password ";
   $stmt = $conn->prepare($select);
   $stmt->execute(['email' => $email, 'password' => $pass]);

   if($stmt->rowCount() > 0){

      $error[] = 'user already exist! ';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES(:name, :email, :password, :user_type)";
         $stmt = $conn->prepare($insert);
         $stmt->execute(['name' => $name, 'email' => $email, 'password' => $pass, 'user_type' => $user_type]);
         header('location:login.php');
      }
   }

};


?>
<?php
include_once 'Perdoruesit.php';
include_once 'PerdoruesitRepository.php';

if (isset($_POST['submit'])) {
    $emri = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
  

    $Perdorues = new Perdoruesit($emri,$email,$password, $user_type);

    $perdoruesitRepository = new PerdoruesitRepository();
    $perdoruesitRepository->insertPerdoruesit($Perdorues);
    header("location:dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="login.css">

</head>
<body>
   
<div class="form-container">



   <form  id="form" action="" method="post" onsubmit="return validateForm()">
      <h3>CREATE ACCOUNT</h3>

      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" id="name" name="name"  placeholder="Shkruaj emrin">
      <div class="error-message" id="nameError"></div>

      <input type="email" id="email" name="email"  placeholder="Shkruaj email">
      <div class="error-message" id="emailError"></div>

      <input type="password" id="password" name="password"  placeholder="Shkruaj password-in">
      <div class="error-message" id="passwordError"></div>

      <input type="password" id="cpassword"name="cpassword"  placeholder="Konfirmo password-in">
      <div class="error-message" id="cpasswordError"></div>


       <!-- <option value="admin">admin</option>  -->



      </select>
      <input type="submit" name="submit" value="register" class="form-btn"  >
      <p>Already have an account? <a href="login.php">Login</a></p>
   </form>

</div>
<script>
        function validateForm(){
         

            let name=document.getElementById('name').value;
            let nameError=document.getElementById('nameError');

            let email=document.getElementById('email').value;
            let emailError=document.getElementById('emailError');

            let password=document.getElementById('password').value;
            let passwordError=document.getElementById('passwordError');

            let cpassword=document.getElementById('cpassword').value;
            let cpasswordError=document.getElementById('cpasswordError'); 
        
            nameError.innerText='';
            emailError.innerText='';
            passwordError.innerText='';
            cpasswordError.innerText='';

            let regxname= /[a-zA-Z]/ ;
            if(name.trim()=='' || !regxname.test(name)){
                nameError.innerText='Emri eshte invalid';
                return false;
            }
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(email.trim()==""||!emailRegex.test(email)){
                emailError.innerText="Email eshte invalid";
                return false;
            }
            if(password.trim()==""){
                passwordError.innerText='Shkruani passwordin';
                return false;
            }
            if(cpassword!==password){
                cpasswordError.innerText='Password-i nuk perputhet';
                return false;
            }
            return true;
        }
</script>
</body>
</html>