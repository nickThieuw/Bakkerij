<?php include 'banner.php';?>
<div class="container melding">    
            <p class="message"><?php if (isset($_SESSION["message"])) { print($_SESSION["message"]);} ?>
              <?php if (isset($message)) { print($message);}?>
            </p>
        </div>
 <div class="container content home">
     
            <div class="row">

                <div class="col-md-6">
                    <h2>Bakkershistoriek</h2>
                    <p>

                        Reeds 20 jaar levert het 't Baguetje u dagelijks brood van top kwaliteit,
                        u kunt terecht in 17 winkels en tal van extra productpunten verspreid over West Vlaanderen.
                        Zo heeft u de ruimste keuze en het grootste en lekkerste assortiment altijd in de buurt.
                        Ontdek de Baguetjes winkels in uw buurt. U kan er steeds terecht voor een volledig brood assortiment,
                        taarten, koeken, verse belegde broodjes, enz...</p>
                    
                </div>
                <div class="col-md-6">
                    <h2>Uitgebreid assortiment</h2>
                    <p>Kom langs en ontdek ons uitgebreid assortiment. Ook voor taarten (eventueel met foto)
                        kan je bij ons terecht. Neem contact en we helpen je graag verder. Zie verder op de
                        website om een contactformulier in te vullen.
                        
                    </p>
                </div>
            </div>
     <div class="row">
                <div class="col-md-4">
                    
                    <div class="bakkerij">
                        <div class="bakkerijAfb"><a href="presentation/img/klaar-om-te-rijzen.jpg" class="thumbnail" target="_blank">
                        <img src="presentation/img/klaar-om-te-rijzen_klein.jpg" alt="rijzen" class="img-responsive img-rounded">
                            </a> 
                        </div>
                        <div class="bakkerijText">
                        <h2>Bakkerij</h2>
                        <p>Onze goed uitgeruste bakkerij is gelegen in Zwevegem, hier worden iedere dag verse producten gebakken.
                    </p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                    
                    <div class="bakkerij">
                        <div class="bakkerijAfb"><a href="presentation/img/opbollen-van-brood.jpg" class="thumbnail" target="_blank">
                        <img src="presentation/img/opbollen-van-brood_klein.jpg" alt="opbollen" class="img-responsive img-rounded">
                            </a>
                        </div>
                        <div class="bakkerijText">
                        <h2>Opbollen van brood</h2>
                        <p>Het deegstuk de gewenste vorm te geven waarin het gebakken zal worden, waardoor de overgang van deeg
                        naar brood geleidelijker wordt</p>
                        </div>
                    </div>
                    
                </div>

                <div class="col-md-4">
                    
                    <div class="bakkerij">
                        <div class="bakkerijAfb"><a href="presentation/img/oven.jpg" class="thumbnail" target="_blank">
                        <img src="presentation/img/oven_klein.jpg" alt="oven" class="img-responsive img-rounded">
                             </a> 
                        </div>
                        <div class="bakkerijText">
                        <h2>Klaar voor de oven</h2> 
                        <p>t Baguetje beschikt over een heel moderne bakkerij,
                        waar iedere dag weer tal van verse producten worden bereid</p> 
                        </div>
                    </div>
                      
                </div>

            </div>
        </div><!--einde content-->
<?php include 'footer.php';?>


