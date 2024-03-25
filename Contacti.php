<?php
class Contacti{
    private $Id; //e kemi shtu Id direkt ne db me AutoIncrement
    private $Emri;
    private $Mbiemri;
    private $Emaili;
    private $Ankesa;

    public function __construct($e, $m, $em, $d){
        $this->Emri=$e;
        $this->Mbiemri=$m;
        $this->Emaili=$em;
        $this->Ankesa=$d;
    }
    
    public function getEmri(){
        return $this->Emri;
    }
    public function setEmri($e){
        $this->Emri = $e;
    }

    public function getMbiemri(){
        return $this->Mbiemri;
    }
    public function setMbiemri($e){
        $this->Mbiemri = $e;
    }

    public function getEmaili(){
        return $this->Emaili;
    }
    public function setEmaili($e){
        $this->Emaili = $e;
    }

    public function getAnkesa(){
        return $this->Ankesa;
    }
    public function setAnkesa($e){
        $this->Ankesa = $e;
    }


    public function __toString(){
        return "Emri: ".$this->Emri." dhe mbiemri ".$this->Mbiemri."Emaili: ".$this->Emaili." dhe Ankesa ".$this->Ankesa;
    }
}
?>