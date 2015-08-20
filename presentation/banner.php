<?php include_once 'signIn.php';?>
<?php include_once 'signOut.php';?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php print($page);?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="presentation/css/bootstrap.min.css">
        <link rel="stylesheet" href="presentation/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="presentation/css/main.css">
        
        <script src="presentation/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!--eerste navigatiebar-->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
            <div class="container">
                    <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                     <a class="navbar-brand" href="index.php">Home</a>
                  
                    </div>
                
                    <?php if(!isset($_SESSION["ingelogd"])) { ?>
                    
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
                        <form action="<?php print($page);?>?action=signIn" method="post" class="navbar-form navbar-right" autocomplete="off" role="form">
                                <div class="form-group">
                                    <input type="text" 
                                          <?php if(isset($_COOKIE["user"]))
                                              { print(" value='".$_COOKIE['user']."'");
                                           }else{
                                               print(" placeholder='Email'");}?>
                                              
                                         class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" class="form-control" name="paswoord">
                                </div>
                                <button type="submit" class="btn btn-primary signIn">Sign in</button>
                            </form>
                    </div>
                
                    <?php } else { ?>
                  
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"> 
                                
                            <a href="#" class="dropdown-toggle"  data-toggle="dropdown" aria-expanded="true">
                                <span class="glyphicon glyphicon-user"></span>
                                <?php if (isset($_SESSION["vnaam"], $_SESSION["fnaam"])) {
                                            print ucfirst($_SESSION["vnaam"]) . ' ' . ucfirst($_SESSION["fnaam"]);
                                            }?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="update.php"><span class="glyphicon glyphicon-edit"></span> Wijzig mijn profiel</a></li>
                                    <li>
                                         <a href="<?php print($page);?>?action=signOut"><span class="glyphicon glyphicon-off"></span> Sign Out</a>                                            
                                     </li>
                            </ul>
                          </li>
                        </ul>                                            
                    </div>
                    <?php } ?>
                </div>
             </div>
                               
        <!--einde eerste navigatiebar-->

        <!--begin jumbotron-->
        <div class="afbeelding">  
            <div class="jumbotron">
                <div class="container">
                    <h1>'t baguetje</h1>
                  
                    <p><a href="signUp.php" class="btn btn-primary btn-lg <?php if(isset($_SESSION["ingelogd"])){ print('disabled');}?>" role="button">Sign up</a>
                        <a href="bestel.php" class="btn btn-primary btn-lg <?php if(isset($_SESSION["id_bestelling"])){ print('disabled');}?>">Bestel</a> 
                        <a href="mijnBestel.php" class="btn btn-primary btn-lg <?php if(!isset($_SESSION["ingelogd"])){ print('disabled');}?>">Mijn bestellingen</a> 
                        <a href="contact.php" class="btn btn-primary btn-lg">Contact</a> 
                    </p>
                    
                </div>
              
            </div>
        </div><!--einde jumbotron-->
       