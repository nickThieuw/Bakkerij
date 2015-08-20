<?php include 'banner.php'?>
<div class="container melding">    
            <p class="message"><?php if (isset($_SESSION["message"])) { print($_SESSION["message"]);} ?>
              <?php if (isset($message)) { print($message);}?>
            </p>
        </div>
<div class="container content bestelling">
   <div class="geefMargin cf">
    <h2><?php if (isset($_SESSION["id_bestelling"])){
    print("Wijzig uw produkten</h2><p>Bestelling referentie: ".$_SESSION["id_bestelling"])."</p>";}else{print("Kies uw produkten</h2>");}?>
       
      
    </h2>
       <form action="afrekening.php?af=afreken" method="post" autocomplete="off">
       <ul class="list-group">
           <li class="list-group-item cf">
                         
                <div class="afbeeld pull-left">
                    <a href="presentation/img/big_ZOUTARM fijn volkorenbrood.jpg" class="thumbnail" target="_blank">
                <img src="presentation/img/big_ZOUTARM fijn volkorenbrood.jpg" alt="volkorenbrood">
                    </a>
                </div>
               <div class="pull-right aantal">
                <h3>Volkorenbrood</h3>
               
                <label for="volkoren">Aantal:</label>
                <select name="volkoren">
                    <?php 
                    $j=0;
                    for($i=0; $i<=100; $i++){?>
                    <option <?php if(isset($_SESSION["volkoren"])&& $j==$_SESSION["volkoren"]){
                    print("selected");}
                    elseif(isset($bestelling)){
                        if($j==$bestelling->getVolkoren()){
                                        print("selected");
                        }                    
                        }
                        ?>><?php print($j++); ?></option>
                    <?php } ?>
                </select>
                <div>
            
           </li>
            <li class="list-group-item cf">
                 
                <div class="afbeeld pull-left">
                    <a href="presentation/img/echte bakker witbrood_600_450.jpg" class="thumbnail" target="_blank">
                <img src="presentation/img/echte bakker witbrood_600_450.jpg" alt="wit brood">
                    </a>
                </div>
                 <div class="pull-right aantal">
                <h3>Wit brood</h3>
                     <label for="witbrood">Aantal:</label>
                <select name="witbrood">
                    <?php 
                    $j=0;
                    for($i=0; $i<=100; $i++){?>
                    <option <?php if(isset($_SESSION["witbrood"])&& $j==$_SESSION["witbrood"]){
                    print("selected");}
                    elseif(isset($bestelling)){
                        if($j==$bestelling->getWitbrood()){
                                print("selected");
                        }
                        }
                        ?>><?php print($j++); ?></option>
                    <?php } ?>
                </select>
                 </div>     
            </li>
        
   
        <li class="list-group-item cf">
                        <div class="afbeeld pull-left">
                            <a href="presentation/img/20101021-croissants-15.jpg" class="thumbnail" target="_blank">
                    <img src="presentation/img/20101021-croissants-15.jpg" alt="croissant">
                            </a>
                </div>
               <div class="pull-right aantal">
                <h3>Croissant</h3>
         
                   <label for="croissant">Aantal:</label>
                <select name="croissant">
                   <?php 
                    $j=0;
                    for($i=0; $i<=100; $i++){?>
                    <option <?php if(isset($_SESSION["croissant"])&& $j==$_SESSION["croissant"]){
                    print("selected");}
                    elseif(isset($bestelling)){
                        if($j==$bestelling->getCroissant()){
                                print("selected");
                        }
                    }
                    ?>><?php print($j++); ?></option>
                    <?php } ?>
                </select>
               </div>     
        </li>
        <li class="list-group-item cf">
                  <div class="afbeeld pull-left">
                      <a href="presentation/img/boterkoeken.jpg" class="thumbnail" target="_blank">
                    <img src="presentation/img/boterkoeken.jpg" alt="boterkoek">
                      </a>
                </div>
              <div class="pull-right aantal">
              <h3>Boterkoek</h3>
            
                  <label for="boterkoek">Aantal:</label>
                <select name="boterkoek">
                    <?php 
                    $j=0;
                    for($i=0; $i<=100; $i++){?>
                    <option <?php if(isset($_SESSION["boterkoek"])&& $j==$_SESSION["boterkoek"]){
                    print("selected");}
                    elseif(isset($bestelling)){
                        if($j==$bestelling->getBoterkoek()){
                                print("selected");                
                        }
                        }
                        ?>><?php print($j++); ?></option>
                    <?php } ?>
                </select>
              </div>
        </li>
        <li class="list-group-item cf">
                <div class="afbeeld pull-left">
                    <a href="presentation/img/frangipane.jpg" class="thumbnail" target="_blank">
                    <img src="presentation/img/frangipane.jpg" alt="frangipane">
                    </a>
                </div>
              <div class="pull-right aantal">
                <h3>Frangipane</h3>
                <label for="frangipane">Aantal:</label>
                <select name="frangipane">
                   <?php 
                    $j=0;
                    for($i=0; $i<=100; $i++){?>
                    <option <?php if(isset($_SESSION["frangi"])&& $j==$_SESSION["frangi"]){
                    print("selected");}
                    elseif(isset($bestelling)){
                            if($j==$bestelling->getFrangipane()){
                                print("selected");
                            }
                    }
                    ?>><?php print($j++); ?></option>
                    <?php } ?>
                </select>
              </div>        
        </li>
        <li class="list-group-item cf">
                <div class="afbeeld pull-left">
                    <a href="presentation/img/eclairs.jpg" class="thumbnail" target="_blank">
                    <img src="presentation/img/eclairs.jpg" alt="eclair">
                    </a>
                </div>
               <div class="pull-right aantal">
                <h3>Eclair</h3>
                   <label for="eclair">Aantal:</label>
                
                <select name="eclair">
                   <?php 
                    $j=0;
                    for($i=0; $i<=100; $i++){?>
                    <option <?php if(isset($_SESSION["eclair"])&& $j==$_SESSION["eclair"]){
                    print("selected");}
                    elseif(isset($bestelling)){
                        if($j==$bestelling->getEclair()){
                            print("selected");
                        }
                    }
                    ?>><?php print($j++); ?></option>
                    <?php } ?>
                </select>
               </div>    
        </li>
       </ul>
        <div class="button_bestelling pull-right">
        <?php  if(isset($_SESSION["id_bestelling"])){
            print("<a href='mijnBestel.php?annuleer=annuleer&&update=update' class='btn btn-success'>Annuleer Wijzigen</a>");
            
        }
        ?>
       
        <input type="submit" value="<?php if (isset($_SESSION["id_bestelling"])){
    print("Wijzig produkten");}else{print("Maak Bestelling");}?>" class="btn btn-success" id="afrek">
        </div>       
    </form>
</div>
</div>
    

    <?php include 'footer.php';?>