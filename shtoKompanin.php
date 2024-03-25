<?php
session_start();

include 'DatabaseConnection.php';

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
   exit(); 
}




?>


<!DOCTYPE html>
<html>
<head>

	<title>Shto Kompanin</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
		h1{
			display: flex;
			justify-content: center;
			text-align: center;

		}
		#foto{
			display: block;
			justify-content: space-between;
			padding :5px;
			margin:50px;
		}
	</style>
</head>
<body>
	<h1>Shto Foton :</h1>
	<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
     <form action="upload.php"
           method="post"
           enctype="multipart/form-data">

           <input id="foto" type="file" 
                  name="my_image">

           <input id="foto" type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
</body>
</html>