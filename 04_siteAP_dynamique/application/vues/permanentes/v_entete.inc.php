<!DOCTYPE html>
<!-- TITRE ET MENUS -->
<html lang="fr">
    <head>        
        <title>L'Oso</title>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="<?php echo Chemins::STYLES . 'style.css'; ?> " rel="stylesheet" type="text/css">
        <link href="<?php echo Chemins::STYLES . 'styleform.css'; ?> " rel="stylesheet" type="text/css">


        <link rel="shortcut icon" type="image/jpeg" href="<?php echo Chemins::IMAGES . 'Oso.png'; ?>">
        <!--[if lt IE 9]>
       <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
       <![endif]-->     
    </head>
    <body>
        <header>

            <!-- Images En-tête -->
            <a href="index.php"><img src="<?php echo Chemins::IMAGES.'Oso.png'; ?>" alt="ZiKnCo" title="Revenir à l'accueil"/></a>

            <!--  Menu haut-->
            <nav id="menu_haut">
                <ul>
                    <li><a href="index.php"> Accueil </a></li>
                    <li><a href="index.php?controleur=Panier&action=afficherProduitduPanier"> Voir le panier </a></li>                
                    <li><a href="#"> Nous contacter </a></li>
                </ul>
            </nav>
        </header>
        