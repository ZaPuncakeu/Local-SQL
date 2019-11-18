<?php
session_start();

$_SESSION["Hi"] = "Sup";

if(!isset($_SESSION["theme"]))
{
    $_SESSION["theme"] = "dark";
    $_SESSION["titles"] = "white";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/animation.js"></script>
    <script src="../js/request.js"></script>
    <title>Accueil</title>
</head>
<body>
    <nav class="navbar is-<?php echo $_SESSION["theme"];?>">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.html">
                <h1 class="title has-text-<?php echo $_SESSION["titles"];?>"><b>LocalSQL</b></h1>
            </a>
            <div class="navbar-burger burger" data-target="navmen">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        
        <div class="navbar-menu" id="navmen">
            <div class="navbar-start">
                <a class="navbar-item">
                    <i class="fa fa-file-code-o"></i> &nbsp; Documentation
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">    
                        <i class="fa fa-adjust"></i> &nbsp; Thème
                    </a>
                    <div class="navbar-dropdown is-boxed">
                        <a class="navbar-item" href="profile.html">
                            Lumineux
                        </a>
                        <a class="navbar-item" href="panier.html">
                            Sombre     
                        </a>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <a class="navbar-item">
                    <i class="fa fa-home"></i> &nbsp; Accueil
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">    
                        <i class="fa fa-language"></i> &nbsp; Français
                    </a>
                    <div class="navbar-dropdown is-boxed">
                        <a class="navbar-item" href="profile.html">
                            English
                        </a>
                        <a class="navbar-item" href="panier.html">
                            عربية     
                        </a>
                    </div>
                </div>

                <a class="navbar-item" href="index.html">
                    <i class="fa fa-question-circle"></i> &nbsp; A propos
                </a>
            </div>
        </div>
    </nav>


    <form action="test.php" method="POST">
        <input type="text" name="nom">
        <input type="submit">
    </form>

    <div class="hero is-fullheight is-<?php echo $_SESSION["theme"];?>">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-full">
                        <h1 class="title">Ecrivez votre code SQL ici...</h1>
                        <div class="textarea" id="ide">
                            
                        </div>

                        <textarea id="code" spellcheck='false' autocorrect='off' autocomplete="off" class="textarea mtxt is-4">
                            
                        </textarea>
                        <br>
                        <a class="button is-success" onclick="getRequest()">Exécuter le code</a>
                    </div>
                </div>

                <div class="columns is-centered">
                    <div class="column is-full has-text-centered">
                        <h1 class="title">Le résultat s'affichera ici:</h1>
                        <div class="result is-centered">
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" id="hiddensyntax">
        </div>
    </div>
</body>
</html>