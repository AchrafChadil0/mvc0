


<?php



class Vue {

    public function renderVueAccueil() :void {
        require_once('gabarit.php');
        require_once('vueAccueil.php');

    }


    public function renderVueBillet() :void {
        
        
        require_once('gabarit.php');
        require_once('vueBillet.php');

    }

    public function renderVueErreur($ErrCode): void{

        $_GET['errCode'] = $ErrCode;
        require_once('gabarit.php');
        require_once('vueErreur.php');
        
    }


    
}


require_once('/wamp64/www/mvc0/billet.php');
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

        if ( isset($_GET['id']) == false )  {
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
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if (isset($_GET['supprimerCommentaire'])){
        $id = $_GET['id'];
        $idCommentaire = $_GET['idCommentaire'];
        $cmtrObj->supprimmerCommentaire($idCommentaire, 3);
        header("Location: index.php?renderVueBillet&id=$id");
    }

    if (isset($_GET['supprimerCommentaires'])){
        $id = $_GET['id'];
        $cmtrObj->supprimmerCommentaire($id, 2);
        header("Location: index.php?renderVueBillet&id=$id");
    }

}

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

