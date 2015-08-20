<?php include 'banner.php'?>
<?php //prijzen
                $volkorenPRIJS=$_SESSION["volkorenPRIJS"];
                $witbroodPRIJS=$_SESSION["witbroodPRIJS"];
                $croissantPRIJS=$_SESSION["croissantPRIJS"];
                $boterkoekPRIJS=$_SESSION["boterkoekPRIJS"];
                $frangiPRIJS=$_SESSION["frangiPRIJS"];
                $eclairPRIJS=$_SESSION["eclairPRIJS"];
                ?>
<div class="container melding">    
            <p class="message"><?php if (isset($_SESSION["message"])) { print($_SESSION["message"]);} ?>
              <?php if (isset($message)) { print($message);}?>
            </p>
        </div>

<div class="container content afrekenen">
    <div class="row">
        
        <div class="col-md-6  cf">
            <h2>Mijn bestelling</h2>
         <?php if(isset($_SESSION["id_bestelling"])){
                print("<p>Referentie: ".$_SESSION["id_bestelling"]."</p>");}?>
  
    <ul class="list-unstyled">
        <li class=""><span class="glyphicon glyphicon-pushpin"></span> Volkorenbrood <span class="pull-right"><?php 
        if(isset($_SESSION["volkoren"])){
            print($_SESSION["volkoren"]);
        }else {
            print("0");
        }
        ?> X 2.10 &euro;</span>
        </li>
        <li class=""><span class="glyphicon glyphicon-pushpin"></span> Wit brood <span class="pull-right"><?php
        if(isset($_SESSION["witbrood"])){
        print($_SESSION["witbrood"]);
        }else{
            print("0");
        }
        ?> X <?php print($witbroodPRIJS);?> &euro;</span>
        </li>
        <li class=""><span class="glyphicon glyphicon-pushpin"></span> Croissant <span class="pull-right"><?php
        if(isset($_SESSION["croissant"])){
        print($_SESSION["croissant"]);
        }else{
            print("0");
        }
        ?> X <?php print($croissantPRIJS);?> &euro;</span>
        </li>
        <li class=""><span class="glyphicon glyphicon-pushpin"></span> Boterkoek <span class="pull-right"><?php
        if(isset($_SESSION["boterkoek"])){
        print($_SESSION["boterkoek"]);
        }else{
            print("0");
        }
        ?> X <?php print($boterkoekPRIJS);?> &euro;</span>
        </li>
        <li class=""><span class="glyphicon glyphicon-pushpin"></span> Frangipane <span class="pull-right"><?php
        if(isset($_SESSION["frangi"])){
        print($_SESSION["frangi"]);
        }else{
            print("0");
        }
        ?> X <?php print($frangiPRIJS);?> &euro;
        </li>
        <li class=""><span class="glyphicon glyphicon-pushpin"></span> Eclair <span class="pull-right"><?php
        if(isset($_SESSION["eclair"])){
        print($_SESSION["eclair"]);
        }else{
            print("0");
        }
        ?> X <?php print($eclairPRIJS);?> &euro;</span>
        </li>
    </ul>
            <hr>
            <ul class="list-unstyled">    
        <li class="">
            <span class="glyphicon glyphicon-credit-card"></span> Totaal: <span class="pull-right"><?php print($_SESSION["totaal"]);?> &euro;
        </li>
    </ul>
        
        </div>
    <div class="col-md-6 cf">
        <h2>Kies een ophaaldatum en <?php if(isset($_SESSION["id_bestelling"])){
    print("wijzig");}else{print("bestel");}?></h2>
            <form autocomplete="off" action="mijnBestel.php?opslaan=wanneer" method="post">
            <div class="input_afrekenen pull-left">    
                <input type="text" id="datepicker" name="datum" placeholder="datum">
            </div>
            <div class="button_afrekenen pull-left geefMargin">
            <input type="submit" value="<?php if(isset($_SESSION["id_bestelling"])){
                print('Wijzig bestelling');
            }else{
                print('Bestel');
            }?>" class="btn btn-success">
            </form>
            
        <a href="bestel.php" class="btn btn-success">Terug naar keuzemenu</a>
        
        <?php if(isset($_SESSION["id_bestelling"])){
            
        print("<a href='mijnBestel.php?annuleer=annuleer&&update=update' class='btn btn-success'>Annuleer wijzigen</a>");
        }else{
        print("<a href='mijnBestel.php?annuleer=annuleer' class='btn btn-success'>Annuleer bestelling</a>");    
        }
?>
            
    

    </div>
        </div>
          
    </div>
</div>
    

<?php include 'footer.php'?>;