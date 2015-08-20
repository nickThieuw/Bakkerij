<?php include 'banner.php';?>

<div class="container">
  
    <div class="row">
        
        <div class="col-md-3">
            
        </div>
        
        <div class="col-md-6 neemPadCol cf">
            <div class="melding geefPad">    
            <p class="message"><?php if (isset($_SESSION["message"])) { print($_SESSION["message"]);} ?>
              <?php if (isset($message)) { print($message);}?>
            </p>
        </div>
            <div class="content contact cf">
            <div class="geefPad cf">
    <h2>Contact</h2>

    <form action="contact.php?contact=zend" method="post" role="form" autocomplete="off">
        <div class="form-group">
            <label for="mail">Uw email</label>
            
            <input type="text" name="email" id="mail" 
                   
                   value="<?php if(isset($_SESSION["ingelogd"])){
                                            print($emailContact);}?>"               
                
                <?php if(!isset($_SESSION["ingelogd"])){
                print(" placeholder='Email'");}?>
                    class="form-control">
        </div>
        <div class="form-group">
            <label for="area">Uw vraag</label>
            <textarea rows="10" cols="80" name="textarea" class="form-control" id="area"
                      placeholder="Typ uw vraag of opmerking hier"></textarea>
        </div>
        
        <button type="submit" class="btn btn-success pull-right geefMargin">Verzenden</button>
          
    </form>
            </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    
</div>
<?php include 'footer.php';?>

