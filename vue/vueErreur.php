<?php
$ErrmsgS =
        [
            1 => "Erreur: Parametre Id Absent!",
            2 => "Erreur: identifiant de billet non valide!",
            3 => "Erreur: ce billet existe déjà!",
            4 => "Erreur: ce billet n'existe pas!"
        ];

$ErrCode = $_GET['errCode'];
$ErrMsg = $ErrmsgS[$ErrCode];

?>





<div class="alert alert-danger">
    <?=$ErrMsg?>
</div>


