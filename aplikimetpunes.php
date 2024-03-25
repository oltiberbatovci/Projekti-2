<?php

class aplikimetpunes{

  private  $id;
  private $emri;
  private $mbiemri;
  private $email;
  private $nenshtetsia;
  private $qyteti;
  private $adresa;

    public function __construct($emri,$mbiemri,$email,$nenshtetsia,$qyteti,$adresa){
        $this->emri = $emri;
        $this->mbiemri = $mbiemri;
        $this->email = $email;
        $this->nenshtetsia = $nenshtetsia;
        $this->qyteti = $qyteti;
        $this->adresa = $adresa;
    }

    public function getEmri(){
        return $this->emri;
    }
    public function setEmri($e){
        $this->emri = $e;
    }
    public function getMbiemri(){
        return $this->mbiemri;
    }
    public function setMbiemri($mbiemri){
        $this->mbiemri = $mbiemri;
    }
    public function getEmail(){
        return $this->email;
    } 
    public function setEmaili($email){
        $this->emaili = $email;
    }
    public function getNenshtetsia(){
        return $this->nenshtetsia;
    } 
    public function setNenshtetsia($nenshtetsia){
        $this->nenshtetsia = $nenshtetsia;
    }
    public function getQyteti(){
        return $this->qyteti;
    }
    public function setQyteti($qyteti){
        $this->qyteti = $qyteti;
    }
    public function getAdresa(){
        return $this->adresa;
    }
    public function setAdresa($adresa){
        $this->adresa = $adresa;
    }
    public function __toString(){
        return" - perduruesi:".$this->$id ." : ".$this->$emri." : ".$this->$mbiemri." : ".$this->$email." : ".$this->$nenshtetsia." : ".$this->$qyteti." : ".$this->$adresa;
    }

}