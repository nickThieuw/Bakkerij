<?php
//we kunnen die in het opslaan steken van businessservice gebruiker try catch thrown ah yeah
class Paswoord { 

    
public function __construct(){
    
}
public function kontroleerPaswoord($paswoord){
   
            $arr=array();
            $arr=  str_split($paswoord);
            $length= count($arr);
            for($i = 0; $i < $length; $i++){
                    $arr[$i]=ord($arr[$i]);

            }
            foreach($arr as $value){
                if (65 <= $value && $value >= 90){
                    //65 en met 90 = hoofdletter
                    $hoofdletters=true;
                }

                if (48 <= $value && $value >= 57){
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
?>