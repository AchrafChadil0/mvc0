


<?php



class Vue {

    public function renderVueAccueil(){
        require_once('gabarit.php');
        require_once('vueAccueil.php');
    }


    public function renderVueBillet(){
        
        
        require_once('gabarit.php');
        require_once('vueBillet.php');

    }

    public function renderVueErreur($ErrCode){
        /*$ErrMsg = "";
        if ($ErrCode == 1) {
            $_GET['errCode']  = "Parametre Id Absent";
        }
        else if ($ErrCode == 2){
            $ErrMsg  = "identifiant de billet non valide";
        }
        else if ($ErrCode == 3){
            $ErrMsg = "ce billet existe déjà";
        }


        else if ($ErrCode == 4){
            $ErrMsg = "ce billet n'existe déjà";
        }*/

        $_GET['errCode'] = $ErrCode;
        require_once('gabarit.php');
        require_once('vueErreur.php');
        
    }


    
}



require_once('gabarit.php');
$Vue = new Vue();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    


    if (isset($_GET['renderVueAccueil'])) {
        
        $Vue->renderVueAccueil();
        exit;
        
    }




    

    if (isset($_GET['renderVueBillet'])) {
        
        // err 
        $idErr = intval(@$_GET['id']);

        if (  isset($_GET['id']) == false  )  {
            $Vue->renderVueErreur(1);
            exit;
        }

        else if ($idErr == 0){
            $Vue->renderVueErreur(2);
            exit;
        }

        // end err




        else{
            $Vue->renderVueBillet();
            exit;
        }

        
        
    }

    
}
require_once('/wamp64/www/mvc0/commentaire.php');
require_once('/wamp64/www/mvc0/billet.php');
//$cmtrObj = new Commentaire();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouterCommentaire'])) {

        $id = $_GET['id'];
        $billetCnt = $bilObj->isIdBillet($id)['cnt'];
        if ($billetCnt == 0){
            $Vue->renderVueErreur(4);
            exit;
        }
        $cmtrObj->ajouterCommentaire($_POST['auteur'],$_POST['contenu'], $id);
        header("Location: index.php?renderVueBillet&id=$id");
        

    }

    if (isset($_POST['ajouterBillet'])) {

        $id = $_POST['id'];
        $billetCnt = $bilObj->isIdBillet($id)['cnt'];
        if (intval($id) == 0){
            $Vue->renderVueErreur(2);
        }
        else if ($billetCnt == 1){
            $Vue->renderVueErreur(3);
            exit;
        }

        $bilObj->ajouterBillet($id);
        header("Location: index.php");


    }

}

require_once('vueAccueil.php');



?>

