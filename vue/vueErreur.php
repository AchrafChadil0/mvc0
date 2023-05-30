<?php
$ErrMsg="";
if ($_GET['errCode'] == 1) {
    $ErrMsg  = "Parametre Id Absent";
}
else if ($_GET['errCode'] == 2){
    $ErrMsg  = "identifiant de billet non valide";
}
else if ($_GET['errCode'] == 3){
    $ErrMsg = "ce billet existe déjà";
}

else if ($_GET['errCode'] == 4){
    $ErrMsg = "ce billet n'existe pas!";
}


?>





<h3><?=$ErrMsg?></h3>
