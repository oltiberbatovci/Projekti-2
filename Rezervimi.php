<?php
class Rezervimi{
    private $Id; //e kemi shtu Id direkt ne db me AutoIncrement
    private $emri;
    private $emaili;
    private $nrkontaktues;
    private $vendndodhja;

    public function __construct($e, $em, $d, $gj){
        $this->emri=$e;
        $this->emaili=$em;
        $this->nrkontaktues=$d;
        $this->vendndodhja=$gj;
      
    }
    
    public function getEmri(){
        return $this->emri;
    }
    public function setEmri($e){
        $this->emri = $e;
    }
    public function getEmaili(){
        return $this->emaili;
    }
    public function setEmaili($e){
        $this->emaili = $e;
    }

    public function getNrkontaktues(){
        return $this->nrkontaktues;
    }
    public function setNrkontaktues($e){
        $this->nrkontaktues = $e;
    }

    public function getVendndodhja(){
        return $this->vendndodhja;
    }
    public function setVendndodhja($e){
        $this->vendndodhja = $e;
    }

    public function __toString(){
        return "Emri: ".$this->emri." dhe emaili ".$this->emaili."nrkontaktues: ".$this->nrkontaktues." dhe vendndodhja ".$this->vendndodhja;
    }
}
?>