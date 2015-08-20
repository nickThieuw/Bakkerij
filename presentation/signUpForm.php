<?php include 'banner.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
      
        <div class="col-md-6 cf neemPadCol">
            <div class="melding geefPad ">    
            <p class="message"><?php if (isset($_SESSION["message"])) { print($_SESSION["message"]);} ?>
              <?php if (isset($message)) { print($message);}?>
            </p>
        </div>
            <div class="formulierGebruiker content cf geefPad">
            <form autocomplete="off" action="signUp.php?action=signUp" method="post">
                  <div class="cf">
            <h3>Uw gegevens</h3>
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
                    }
                    ?>"><br>

            <label for="fnaam">Familienaam</label>
            <input type="text" name="familienaam" id="fnaam" value="<?php if (isset($fnaam)) {
                        echo $fnaam;
                    }
                    ?>"><br>


            <label for="tel">Adres</label>
            <input type="text" name="adres" id="tel" value="<?php if (isset($adres)) {
                        echo $adres;
                    }
                    ?>"><br>

            <label for="str">Postcode</label>
            <input type="text" name="postcode" id="str" value="<?php if (isset($postcode)) {
                        echo $postcode;
                    }
                    ?>"><br>

            <label for="num">Gemeente</label>
            <input type="text" name="gemeente" id="num" value="<?php if (isset($gemeente)) {
                        echo $gemeente;
                    }
                    ?>"><br>

                  </div>
        
                  <div class="geefTopMargin geefMargin cf">
       
            <h3>Inloggegevens</h3>
            <label class="foutmelding">
                
                    <?php
                    if (isset($messageInlog)) {
                        print "<span>" . $messageInlog . "</span>";
                    }
                    ?>
               
            </label> 

            <label for="mail">Email</label>
            <input type="text" name="email" id="mail" value="<?php if (isset($email)) {
                echo $email;
                    }
                    ?>"><br>

            <label for="pasw">Wachtwoord</label>
            <input type="password" name="paswoord" id="pasw"><br>

            <label for="pasw2">Bevestig Wachtwoord</label>
            <input type="password" name="paswoord2" id="pasw2"><br>

            <input type="submit" value="Maak Profiel" class="btn btn-success">
                  </div>
            
</form>
            </div>
    </div>
        <div class="col-md-3"></div>
        

 
</div>
</div>
<?php include 'footer.php'; ?>
