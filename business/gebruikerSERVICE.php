<?php
require_once 'data/gebruikerDAO.php';
require_once 'exceptions/checkSignUp.php';
require_once 'exceptions/checkSignIn.php';
class GebruikerService {
    //in gebruik
    public function getGebruiker($id) {
        $gebruikerDAO = new GebruikerDAO();
        return $gebruikerDAO->getById($id);;
    }
    //in gebruik
    public function getEmailGebruiker($id){
        $gebruikerDAO = new GebruikerDAO();
        return $gebruikerDAO->getEmailById($id);
    }
    //in gebruik
    public function checkGebruiker($email){
        $gebruikerDAO = new GebruikerDAO();
        return $gebruikerDAO->checkGebruiker($email);
    }
    public function checkGebruikerE($email, $id){
        $gebruikerDAO = new GebruikerDAO;
        return $gebruikerDAO->checkGebruikerE($email,$id);
    }
    //in gebruik
    public function checkGebruikerInlog($email, $paswoord){
        $gebruikerDAO = new GebruikerDAO();
        return $gebruikerDAO->checkGebruikerInlog($email, $paswoord);
    }
    public function checkPostcodeGemeente($postcode, $gemeente){
        $gebruikerDAO = new GebruikerDAO();
        $bool=false;
        $arr=array();
        $arr=$gebruikerDAO->checkPostcode($postcode);//eigenlijk get gemeentes met die postcode
        //format beide spaties en hoofdletters verwijderen om te kunnen vgl
        $formatGemeente= trim(strtolower($gemeente));
        $formatGemeenteArr=array();
        foreach($arr as $value){
            array_push($formatGemeenteArr, trim(strtolower($value["naam"])));
        }
        foreach($formatGemeenteArr as $value){
            if($value === $formatGemeente){
                $bool=true;
            }
        }
        return $bool;
        
    }
    
    //in gebruik
    public function insertGebruiker($vnaam, $fnaam, $adres, $postcode, $gemeente, $email, $wachtw1, $wachtw2) {
            //bestaat deze email al
            if($this->checkGebruiker($email)){
            throw new CheckSignUpExtension("Dit emailadres komt al voor");
            }
            if(strlen($wachtw1) < 6){
            throw new CheckSignUpExtension("Een paswoord moet minstens 6 tekens zijn");    
            }
             
            if(!$this->kontroleerPaswoord($wachtw1)){
            throw new CheckSignUpExtension("Een paswoord moet hoofdletters en cijfers bevatten");
            }
           //zijn de paswoorden overeenkomstig?
            if($wachtw1!=$wachtw2){ 
            throw new CheckSignUpExtension("uw paswoorden komen niet overeen");
            }
            
            $gebruikerDAO = new GebruikerDAO();
            return $gebruikerDAO->insert($vnaam, $fnaam, $adres, $postcode,
                    $gemeente, $email, password_hash($wachtw1, PASSWORD_BCRYPT));
            }
    //in gebruik        
    public function updateGebruiker($gebruiker){
        $gebruikerDAO= new GebruikerDAO();
        $gebruikerDAO->update($gebruiker);
    }
    //in gebruik
    public function updateGebruikerEmail($gebruiker, $email){
        $gebruikerDAO= new GebruikerDAO();
        $gebruikerDAO->updateEmail($gebruiker, $email);
    }
    //in gebruik
    public function updateGebruikerPaswoord($gebruiker, $wachtw1, $wachtw2) {
            
            if(strlen($wachtw1) < 6){
            throw new CheckSignInExtension("Een paswoord moet minstens 6 tekens zijn");    
            }
             
            if(!$this->kontroleerPaswoord($wachtw1)){
            throw new CheckSignInExtension("Een paswoord moet hoofdletters en cijfers bevatten");
            
            }
           //zijn de paswoorden overeenkomstig?
            if($wachtw1!=$wachtw2){ 
            throw new CheckSignInExtension("Uw paswoorden komen niet overeen");
            }
            
            $gebruikerDAO = new GebruikerDAO();
            $gebruikerDAO->updatePaswoord($gebruiker, $wachtw1);
    }
    public function deleteGebruiker($id){
        $gebruikerDAO = new GebruikerDAO();
        $gebruikerDAO->delete($id);
    }
    public function kontroleerPaswoord($paswoord){
            $hoofdletters=false;
            $cijfers=false;
            $arr=array();
            $arr=  str_split($paswoord);
            $length= count($arr);
            for($i = 0; $i < $length; $i++){
                    $arr[$i]=ord($arr[$i]);
            }
            foreach($arr as $value){
                if (65 <= $value && $value <= 90){
                    //65 en met 90 = hoofdletter
                    $hoofdletters=true;
                }
                if (48 <= $value && $value <= 57){
                    //48 en 57 cijfers
                    $cijfers=true;
                }
                }
            if($hoofdletters === true && $cijfers === true ){
                return true;             
            }else{
                return false;
            }            
}
}

