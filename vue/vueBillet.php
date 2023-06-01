<?php
require_once('/wamp64/www/mvc0/commentaire.php');
$id = $_GET['id'];
$commentaire_s_ParId = $cmtrObj->getCommentaires($id);
$requestedUri = $_SERVER['REQUEST_URI'];
?>




<table class="table table-bordered table-striped table-hover">
    
    <?php if ((count($cmtrObj->getCommentaires($id)) != 0)){ ?>
    <caption>Les commentaires</caption>
    <thead class="table-dark">
        <tr>
        <?php foreach($commentaire_s_ParId[0] as $keyHeader => $valueHeader):?>
            <th><?=$keyHeader?></th>

        <?php endforeach?>
            <th>Action</th>
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
            <td>
                <a class="btn btn-danger" href="index.php?supprimerCommentaire&id=<?=$commentaireParId['idBillet']?>&idCommentaire=<?=$commentaireParId['idCommentaire']?>">Supprimer</a>
            </td>
       
    <?php endforeach?>
    <tr>
    </tbody>
    <tfoot>
    <tr>
        <td>
            <a class="btn btn-danger" href="index.php?supprimerCommentaires&id=<?=$commentaireParId['idBillet']?>"> Supprimer tous les commentaires</a>
        </td>

    </tr>
    </tfoot>
</table>
    <?php  } else { ?>
        
        <div class="alert alert-warning">il n'y a pas de commentaire associé à cet identifiant</div>

        <?php }  ?>




<form  class="container " method="POST">
    <h4>Ajouter un commentaire </h4>

    <div class="form-group">
        <label for="auteur">auteur:</label>
        <input type="text" name="auteur" class="form-control" id="auteur" required>
    </div>

    <div class="form-group" >
        <label for="contenu">contenu:</label>
        <input type="text" name="contenu" class="form-control" id="contenu" required>
    </div>
    <br>
    <input type="submit" value="Ajouter commentaire" name="ajouterCommentaire" class="btn btn-primary">

</form>



