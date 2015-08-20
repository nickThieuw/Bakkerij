<?php
////////////uitlog
if(isset($_GET["action"])&&$_GET["action"] == "signOut"){
   
    $_SESSION=array();
    session_destroy();
    //delete de cookie van de session -- uit veiligheid-- 
    //When deleting a cookie you should assure that the expiration date is in the past
    //"/" will be available for the entire domain
    setcookie("PHPSESSID","",time()-3600,"/");
    //log je uit blijf dan ook niet op de pagina om je profiel te wijzigen
    if($page==="update.php" || $page==="afrekening.php" || $page==="bestel.php" || $page==="mijnBestel.php"){
    header('location: index.php');
    exit(0);
    }
   
    
}