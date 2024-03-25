<?php 
include_once '../database/databaseConnection.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }


    function insertUser($user){

        $conn = $this->connection;

        $id = $user_form->getId();
        $name = $user_form->getEmri();
        $email = $user_form->getEmail();
        $password = $user_form->getPassword();

        $sql = "INSERT INTO user_form (id,name,email,password) VALUES (?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$id,$name,$email,$password]);

        echo "<script> alert('User-i eshte loguar me sukses!'); </script>";

    }

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM user_form";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM user_form WHERE id='$id'";

        $statement = $conn->query($sql);
        $user = $statement->fetch();

        return $user;
    }

    function updateUser($id,$name,$email,$password){
         $conn = $this->connection;

         $sql = "UPDATE user_form SET name=?, email=?, password=? WHERE id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$name,$email,$password,$id]);

         echo "<script>alert('Update me sukses'); </script>";
    } 

    function deleteUser($id){
        $conn = $this->connection;

        $sql = "DELETE FROM user_form WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        echo "<script>alert('U fshi me sukses'); </script>";
   } 
}

//  $userRepo = new UserRepository;

//  $userRepo->updateUser('1111','SSS','SSS','SSS','SSS','SSS');

?>