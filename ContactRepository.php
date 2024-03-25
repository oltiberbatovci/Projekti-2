<?php
    include_once('DatabaseConnection.php');

    class ContactRepository{
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
        


        public function insertKontakti($studenti){
            $conn = $this->connection;

            $emri = $studenti->getEmri();
            $mbiemri = $studenti->getMbiemri();
            $email = $studenti->getEmaili();
            $ankesa = $studenti->getAnkesa();
          

            $sql = "INSERT INTO kontakti(fname, lname, email, subject) VALUES (?,?,?,?)";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri, $mbiemri, $email, $ankesa]);

            echo "<script>alert('U shtua me sukses!')</script>";
        }

        public function getAllKontakti(){
            $conn = $this->connection;

            $sql = "SELECT * FROM kontakti";
            $statement = $conn->query($sql);

            $kontaktat = $statement->fetchAll();
            return $kontaktat;
        }


        //Pjesa tjeter e funksioneve CRUD: update 
        //dergohet parametri ne baze te cilit e identifikojme studentin (ne kete rast id, por mund te jete edhe ndonje atribut tjeter) dhe parametrat e tjere qe mund t'i ndryshojme (emri, mbiemri, etj...)
        public function editKontakt($id, $emri, $mbiemri,$email, $ankesa){
            $conn = $this->connection;
            $sql = "UPDATE kontakti SET fname=?,lname=?, email=?, subject=? WHERE id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri, $mbiemri,$email, $ankesa,$id    ]);

            echo "<script>alert('U ndryshua me sukses!')</script>";

        }

        //delete

        function deleteKontakt($id){
            $conn = $this->connection;

            $sql = "DELETE FROM kontakti WHERE Id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
        }

        //shtese per update: merr studentin ne baze te Id

        function getKontaktById($id){
            $conn = $this->connection;

            $sql = "SELECT * FROM kontakti WHERE Id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
            $kontaktat=$statement->fetch();

            return $kontaktat;
        }

    }

?>