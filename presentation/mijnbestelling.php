<?php include 'banner.php';?>
<div class="container melding">    
            <p class="message"><?php if (isset($_SESSION["message"])) { print($_SESSION["message"]);} ?>
              <?php if (isset($message)) { print($message);}?>
            </p>
        </div>
<div class="container content">
    <h2>Mijn bestellingen</h2>
    <ul class="list-group">
    <?php if (isset($lijst)){
     date_default_timezone_set('Europe/Brussels');
//     om te testen 
//     $d=strtotime("tomorrow");
//     $currentDate= date("Y-m-d", $d);
     $currentDate= date("Y-m-d");
     foreach ($lijst as $value) {
         $date = date_create_from_format('Y-m-d', $value['datum']);
        print("<li class='list-group-item'>"."Referentie: ". $value['id_bestelling']." / Datum: ". date_format($date, 'd-m-Y')." "
            ."<span class='pull-right'><a href='bestel.php?id_bestelling=".$value['id_bestelling']."'><span class='glyphicon glyphicon-pencil'></span></a>"." ");
        if ($value["datum"] != $currentDate){    
        print("<a href='deleteBestelling.php?id_bestelling=".$value['id_bestelling']."'><span class='glyphicon glyphicon-remove'></span></a>"
            ."</li>");
        }else{
         print("<span class='glyphicon glyphicon-ban-circle'></span></span>");
        }
    }
     }
     ?>
    </ul>
</div>
<?php include 'footer.php';?>

