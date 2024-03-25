<?php
    include_once('DatabaseConnection.php');

    class RezervimiRepository{
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
        


        public function insertRezervimet($Rezervimi){
            $conn = $this->connection;

            $emri = $Rezervimi->getEmri();
           
            $emaili = $Rezervimi->getEmaili();
            $nrkontaktues = $Rezervimi->getNrkontaktues();
            $vendndodhja = $Rezervimi->getVendndodhja();
           

            $sql = "INSERT INTO rezervimi_taksit(emri, email , nrkontaktues,vendndodhja) VALUES (?,?,?,?)";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri, $emaili, $nrkontaktues,$vendndodhja]);

            echo "<script>alert('U shtua me sukses!')</script>";
        }

        public function getAllRezervimiet(){
            $conn = $this->connection;

            $sql = "SELECT * FROM rezervimi_taksit";
            $statement = $conn->query($sql);

            $rezervimi = $statement->fetchAll();
            return $rezervimi;
        }


        //Pjesa tjeter e funksioneve CRUD: update 
        //dergohet parametri ne baze te cilit e identifikojme studentin (ne kete rast id, por mund te jete edhe ndonje atribut tjeter) dhe parametrat e tjere qe mund t'i ndryshojme (emri, mbiemri, etj...)
        public function editRezervimi( $id,$emri, $email, $nrkontaktues, $vendndodhja){
            $conn = $this->connection;
            $sql = "UPDATE rezervimi_taksit SET emri=?, email=?, nrkontaktues=?,vendndodhja=? WHERE id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri, $email, $nrkontaktues,$vendndodhja,$id]);

            echo "<script>alert('U ndryshua me sukses!')</script>";

        }

        //delete

        function deleteRezervimin($id){
            $conn = $this->connection;

            $sql = "DELETE FROM rezervimi_taksit WHERE id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
        }

        //shtese per update: merr studentin ne baze te Id

        function getRezerviminById($id){
            $conn = $this->connection;

            $sql = "SELECT * FROM rezervimi_taksit WHERE id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
            $rezervimi=$statement->fetch();

            return $rezervimi;
        }

    }

?>