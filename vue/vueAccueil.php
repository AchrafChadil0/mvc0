<?php

require_once('/wamp64/www/mvc0/billet.php');

$billetObj = new Billet();
$billlets = $billetObj->getBillets();

?>


<table>
    <caption>Les Billets</caption>
    <thead>
            <tr>
                <?php foreach($billlets[0] as $keyHeader => $valueHeader):?>
                <th><?=$keyHeader?></th>
                <?php endforeach?>
                <th>Commentaires</th>
                
            </tr>
    </thead>

    <tbody>
            <?php foreach($billlets as $billet):?>
                <tr>
                    <td><?=$billet['idBillet']?></td>
                    <td><?=$billet['create_time']?></td>
                    <td><a href="index.php?renderVueBillet&id=<?=$billet['idBillet']?>">Voir Les commentaires</a></td>
                </tr>
                
            <?php endforeach?>
            
                
    </tbody>

</table>
