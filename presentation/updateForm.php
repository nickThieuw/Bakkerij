<?php include 'banner.php'; ?>
<div class="container melding">    
            <p class="message"><?php if (isset($_SESSION["message"])) { print($_SESSION["message"]);} ?>
              <?php if (isset($message)) { print($message);}?>
            </p>
        </div>
<div class="container formulierGebruiker content">
    <div class="row">
        
        <div class="col-md-6 cf">
            <div class="onderwerp cf">
        
            <h3>Wijzig mijn gegevens</h3>
            <form autocomplete="off" action="update.php?action=wijzig&&wat=gegevens" method="post">
            <label class="foutmelding">
                    <?php
                    if (isset($messageUwGegevens)) {
                        print "<span>" . $messageUwGegevens . "</span>";
                    }
                    ?>
            </label>
            <label for="vnaam">Voornaam</label>
            <input type="text" name="voornaam" id="vnaam" value="<?php if (isset($vnaam)) {
                        echo $vnaam;
                    } else {
                        echo($gebruiker->getVoornaam());
                    }
                    ?>"><br>
            <label for="fnaam">Familienaam</label>
            <input type="text" name="familienaam" id="fnaam" value="<?php if (isset($fnaam)) {
                        echo $fnaam;
                    } else {
                         echo($gebruiker->getFamilienaam());
                    }
                    ?>"><br>
            <label for="adr">Adres</label>
            <input type="text" name="adres" id="adr" value="<?php if (isset($adres)) {
                        echo $adres;
                    } else {
                        echo($gebruiker->getAdres());
                    }
                    ?>"><br>
                       
            <label for="post">Postcode</label>
            <input type="text" name="postcode" id="post" value="<?php if (isset($postcode)) {
                        echo $postcode;
                    } else {
                           echo($gebruiker->getPostcode());
                    }
                    ?>"><br>
            <label for="gem">Gemeente</label>
            <input type="text" name="gemeente" id="gem" value="<?php if (isset($gemeente)) {
                        echo $gemeente;
                    } else {
                         echo($gebruiker->getGemeente());
                    }
                    ?>"><br>
            
            <input type="submit" value="Wijzig Gegevens" class="btn btn-success formulier">
            </form>
            </div>
            
        </div>

        <div class="col-md-6 cf">
            <div class="onderwerp cf">
            <h3>Wijzig mijn email</h3>
            <form autocomplete="off" action="update.php?action=wijzig&&wat=email" method="post">
            <label class="foutmelding">
                    <?php
                    if (isset($messageEmail)) {
                        print "<span>" . $messageEmail . "</span>";
                    }
                                        
                  
                    ?>
            </label>
                <label for="mail">Email</label>
            <input type="text" name="email" id="mail" value="<?php if (isset($email)){
                echo $email;
            } else {
                
                echo ($gebruikerS->getEmailGebruiker($_SESSION["id"]));
            }
            ?>"><br>
            <label for="mail2">Bevestig Email</label>
            <input type="text" name="email2" id="mail2" value="<?php if (isset($email2)){
                echo $email2;
            }
            ?>"><br>
            <input type="submit" value="Wijzig Email" class="btn btn-success formulier">
            </form>
            </div>
            <div class="onderwerp cf">  
            <h3>Wijzig mijn paswoord</h3>
            <form autocomplete="off" action="update.php?action=wijzig&&wat=paswoord" method="post">
                <label class="foutmelding">
                      <?php if (isset($messagePaswoord)) {
                        print "<span>" . $messagePaswoord . "</span>";
                    }?>
            </label>

            <label for="pasw">Nieuw Paswoord</label>
            <input type="password" name="paswoord" id="pasw"><br>
            <label for="pasw2">Bevestig Paswoord</label>
            <input type="password" name="paswoord2" id="pasw2"><br> 
            <input type="submit" value="Wijzig Paswoord" class="btn btn-success formulier">
            
            </form>
            </div>
            <div class="onderwerp cf">
            <h3>Wis mijn profiel</h3>
            <a href="wissen.php?action=signOut&&wijzig=delete"><span class="glyphicon glyphicon-trash"></span> Delete</a>
            </div>
              
        </div>
        
</div>
</div>
<?php include 'footer.php'; ?>
