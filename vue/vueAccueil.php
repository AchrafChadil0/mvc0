<?php

require_once('/wamp64/www/mvc0/billet.php');

$billetObj = new Billet();
$billlets = $billetObj->getBillets();

?>


<table class="table table-bordered table-striped table-hover">
    <caption>Les Billets</caption>
    <thead class="table-dark">
            <tr>
                <?php foreach($billlets[0] as $keyHeader => $valueHeader):?>
                <th><?=$keyHeader?></th>
                <?php endforeach?>
                <th>Actions</th>
                
            </tr>
    </thead>

    <tbody>
            <?php foreach($billlets as $billet):?>
                <tr>
                    <td><?=$billet['idBillet']?></td>
                    <td><?=$billet['create_time']?></td>
                    <td>
                        <a class="btn btn-primary" href="index.php?renderVueBillet&id=<?=$billet['idBillet']?>">Voir Les commentaires</a>
                        <a class="btn btn-danger" href="index.php?supprimerBillet&id=<?=$billet['idBillet']?>">Supprimer</a>
                    </td>
                </tr>
                
            <?php endforeach?>
            
                
    </tbody>

</table >

<form method="POST">
    <h4>Ajouter un billet</h4>
    <label>Id Billet : </label>
    <input type="text" name="id" > <br> <br>

    <input type="submit" value="ajouter Billet" name="ajouterBillet">

</form>
