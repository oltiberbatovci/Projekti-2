<?php
    include_once('DatabaseConnection.php');
    include_once('aplikimetpunes.php');

    class aplikimetRepository{
        private $connection;

        public function __construct()
        {
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection ();
        }

        //kur kemi parametra kryesisht e pergatisim sql per marrjen e parametrave me prepare
        //dhe e bejme lidhjen e parametrave permes metodes execute
        //Pikepyetjet neper queries (?) zevendesohen nga parametrat te metoda execute
        //kurse pa parametra, vazhdojme direkt me metoden query
        //metodat fetch/fetchAll perdoren kur duam te kthejme/marrim ndonje vlere
        


        public function insertAplikimet($aplikimetpunes){
            $conn = $this->connection;

            $emri = $aplikimetpunes->getEmri();
            $mbiemri = $aplikimetpunes->getMbiemri();
            $email = $aplikimetpunes->getEmail();
            $nenshtetsia = $aplikimetpunes->getNenshtetsia();
            $qyteti=$aplikimetpunes->getQyteti();
            $adresa = $aplikimetpunes->getAdresa();
          

            $sql = "INSERT INTO aplikimetpunes(emri,mbiemri,email, nenshtetsia,qyteti,adresa) VALUES (?,?,?,?,?,?)";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri, $mbiemri, $email, $nenshtetsia,$qyteti, $adresa]);

            echo "<script>alert('U shtua me sukses!')</script>";
        }

        public function getAllAplikimetPunes(){
            $conn = $this->connection;

            $sql = "SELECT * FROM aplikimetpunes";
            $statement = $conn->query($sql);

            $students = $statement->fetchAll();
            return $students;
        }


        //Pjesa tjeter e funksioneve CRUD: update 
        //dergohet parametri ne baze te cilit e identifikojme studentin (ne kete rast id, por mund te jete edhe ndonje atribut tjeter) dhe parametrat e tjere qe mund t'i ndryshojme (emri, mbiemri, etj...)
        public function editAplikimetPunes($id, $emri, $mbiemri, $email, $nenshtetsia,$qyteti, $adresa){
            $conn = $this->connection;
            $sql = "UPDATE aplikimetpunes SET emri=?,mbiemri=?, email=?, nenshtetsia=?,qyteti=?,adresa=? WHERE Id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri,$mbiemri, $email, $nenshtetsia,$qyteti, $adresa,$id]);

            echo "<script>alert('U ndryshua me sukses!')</script>";

        }

        //delete

        function deleteAplikimetPunes($id){
            $conn = $this->connection;

            $sql = "DELETE FROM aplikimetpunes WHERE Id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
        }

        //shtese per update: merr studentin ne baze te Id

        function getAplikimetPunesById($id){
            $conn = $this->connection;

            $sql = "SELECT * FROM aplikimetpunes WHERE Id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
            $student=$statement->fetch();

            return $student;
        }

    }

?>