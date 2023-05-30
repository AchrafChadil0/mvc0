<?php
require_once('/wamp64/www/mvc0/commentaire.php');
$id = $_GET['id'];
$commentaire_s_ParId = $cmtrObj->getCommentaires($id);
?>




<table>
    
    <?php if ((count($cmtrObj->getCommentaires($id)) != 0)){ ?>
    <caption>Les commentaires</caption>
    <thead>
        <tr>
        <?php foreach($commentaire_s_ParId[0] as $keyHeader => $valueHeader):?>
            <th><?=$keyHeader?></th>
        <?php endforeach?>
        </tr>
    </thead>
    <tbody>
    <?php foreach($commentaire_s_ParId as $commentaireParId): ?>
        <tr>
            <td><?=$commentaireParId['idCommentaire']?></td>
            <td><?=$commentaireParId['auteur']?></td>
            <td><?=$commentaireParId['contenu']?></td>
            <td><?=$commentaireParId['idBillet']?></td>
            <td><?=$commentaireParId['create_time']?></td>
       
    <?php endforeach?>
    <tr>
    </tbody>
    <?php } else { ?>
        
        <p>il n'y a pas de commentaire associé à cet identifiant</p>


        <?php }  ?>
</table>
<form method="POST">
    <h4>Ajouter un commentaire </h4>
    <label for="auteur">Auteur : </label>
    <input type="text" name="auteur" > <br> <br>
    <label for="contenu">Contenu:</label>
    <input type="text" name="contenu" > <br> <br>
    
    <input type="submit" value="ajouterCommentaire" name="ajouterCommentaire"> 
    
</form>

