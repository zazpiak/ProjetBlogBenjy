<?php

//connecter à la BDD

try {
   $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u645129542_pdade;charset=utf8','u645129542_benjy','Larochelle17');
}

catch (Exception $e)
{
    die('erreur : '.$e->getMessage());
}

//recupérer la New

$req = $bdd->prepare('SELECT id, titre, contenu DATE_FORMAT(date_crea, \' %d/%m/%Y à %Hh%imin%ss\') AS date_ecriture FROM actus WHERE id=?');
$req ->execute(array($_GET['actu']));
$donnees = $req ->fetch();

//fermeture du PHP pour entete html
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Commentaires </title>
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
        <h1>Les actus de la rochelle </h1>
        <p><a href="index.php">Retour aux infos</a></p>
        <div class="actu">
            <h3><?php echo htmlspecialchars($donnee['titre']); ?>
            <em> Le <?php echo htmlspecialchars($donnee['date_ecriture']); ?></em></h3>
            <p><?php 
            echo nl2br(htmlspecialchars($donnee['contenu']));
            $req ->closeCursor();
            // très important !! Libère le pointeur pour pouvoir effectuer une nouvelle requete.
            ?>
            </p></div>
            <h2> Commentaires </h2>