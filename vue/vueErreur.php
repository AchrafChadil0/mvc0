<?php
$ErrmsgS =
        [
            1 => "Parametre Id Absent",
            2 => "identifiant de billet non valide",
            3 => "ce billet existe déjà",
            4 => "ce billet n'existe pas!"
        ];

$ErrCode = $_GET['errCode'];
$ErrMsg = $ErrmsgS[$ErrCode];

?>





<h3><?=$ErrMsg?></h3>
