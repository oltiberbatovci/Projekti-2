<?php



class Perdoruesit{

  private $id;
  private $emri;
  private $email;
  private $password;
  private $confirmpassword;

    public function __construct($id,$emri,$email,$password,$confirmpassword){
        $this->emri = $emri;
        $this->email = $email;
        $this->password = $password;
        $this->confirmpassword = $confirmpassword;
    }

    public function getEmri(){
        return $this->emri;
    }
    public function setEmri($e){
        $this->Emri = $e;
    }
    public function getEmail(){
        return $this->email;
    } 
    public function setEmaili($e){
        $this->Emaili = $e;
    }
    public function getPassword(){
        return $this->password;
    } 
    public function setPassword($password){
        $this->password = $password;
    }
    public function getConfirmpassword(){
        return $this->confirmpassword;
    }
    public function setConfirmpassword($Cpassword){
        $this->confirmpassword = $Cpassword;
    }
    public function __toString(){
        return" - perduruesi:".$this->$id ." : ".$this->$emri." : ".$this->$email." : ".$this->$password." : ".$this->$confirmpassword;
    }

}


?>