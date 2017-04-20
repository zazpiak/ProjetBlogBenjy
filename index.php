<?php

//connecter à la BDD

try {
   $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u645129542_pdade;charset=utf8','u645129542_benjy','Larochelle17');
}

catch (Exception $e)
{
    die('erreur : '.$e->getMessage());
}

//On récupère les 4 dernières news

$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_crea, \' %d/%m/%Y à %Hh%imin%ss\') AS date_ecriture FROM actus ORDER BY date_crea DESC LIMIT 0 , 4' );
//on quitte le PHP pour créer le début de page
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Les actus de la rochelle</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <h1>Les actus de la rochelle </h1>
        <p>Les dernières informations du blog de benjamin </p>

<?php

//Réouverture de php pour continuer

while ($donnees = $req->fetch()){ ?>

<div class="actu">
    <h3><?php echo htmlspecialchars($donnees['titre']); ?>
    <em> Le <?php echo ($donnees['date_ecriture']); ?> </em>
    </h3>

    <p><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>
    </br>
    <em><a href="commentaires.php?actu=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p> 
    </div>
<?php
//fin de la boucle while
 } 
 $req->closeCursor();
 
 ?>

