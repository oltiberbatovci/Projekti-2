<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "DatabaseConnection.php";

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 1250000000) {
			$em = "Imazhi është shumë i madh";
		    header("Location: shtoKompanin.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				
				$conn = new DatabaseConnection();
				$db_conn = $conn->startConnection(); 
				if ($db_conn) {
					$sql = "INSERT INTO images(image_url) 
					        VALUES('$new_img_name')";
					$db_conn->query($sql);
					header("Location: homeAdmin.php");
				} else {
					$em = "Gabim në lidhjen me bazën e të dhënave!";
					header("Location: shtoKompanin.php?error=$em");
				}
			}else {
				$em = "Ju nuk mund të ngarkoni skedarë të këtij lloji";
		        header("Location: shtoKompanin.php?error=$em");
			}
		}
	}else {
		$em = "Gabim i panjohur ka ndodhur!";
		header("Location: shtoKompanin.php?error=$em");
	}

}else {
	header("Location: shtoKompanin.php");
}
?>
