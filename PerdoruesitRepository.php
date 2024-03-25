<?php
    include_once('DatabaseConnection.php');

    class PerdoruesitRepository{
        private $connection;

        public function __construct()
        {
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        //kur kemi parametra kryesisht e pergatisim sql per marrjen e parametrave me prepare
        //dhe e bejme lidhjen e parametrave permes metodes execute
        //Pikepyetjet neper queries (?) zevendesohen nga parametrat te metoda execute
        //kurse pa parametra, vazhdojme direkt me metoden query
        //metodat fetch/fetchAll perdoren kur duam te kthejme/marrim ndonje vlere
        


        public function insertPerdoruesit($Perdurusi){
            $conn = $this->connection;

            $emri = $Perdurusi->getEmri();
            $emaili = $Perdurusi->getEmail();
            $password = $Perdurusi->getPassword();
            $confirmpassword = $Perdurusi->getConfirmpassword();
           

            $sql = "INSERT INTO user_form(name, email , password,user_type) VALUES (?,?,?,?)";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri, $emaili, $password,$confirmpassword]);

            echo "<script>alert('U shtua me sukses!')</script>";
        }

        public function getAllPerdurusit(){
            $conn = $this->connection;

            $sql = "SELECT * FROM user_form";
            $statement = $conn->query($sql);

            $Perdurusi = $statement->fetchAll();
            return $Perdurusi;
        }


        //Pjesa tjeter e funksioneve CRUD: update 
        //dergohet parametri ne baze te cilit e identifikojme studentin (ne kete rast id, por mund te jete edhe ndonje atribut tjeter) dhe parametrat e tjere qe mund t'i ndryshojme (emri, mbiemri, etj...)
        public function editPerdoruesi( $id,$name, $email, $password, $user_type){
            $conn = $this->connection;
            $sql = "UPDATE user_form SET name=?, email=?, password=?,user_type=? WHERE id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$name, $email, $password,$user_type,$id]);

            echo "<script>alert('U ndryshua me sukses!')</script>";

        }

        //delete

        function deletePerdoruesi($id){
            $conn = $this->connection;

            $sql = "DELETE FROM user_form WHERE id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
        }

        //shtese per update: merr studentin ne baze te Id

        function getPerdoruesiById($id){
            $conn = $this->connection;

            $sql = "SELECT * FROM user_form WHERE id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
            $Perdurusi=$statement->fetch();

            return $Perdurusi;
        }

    }

?>