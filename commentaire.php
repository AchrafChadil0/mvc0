<?php
require_once('model.php');



class Commentaire extends model {
    
    public function getCommentaires($idBillet){
        try {

            $db = $this->connectDb();
            $sql = 'SELECT * FROM comments where idBillet = ?';
            $stm = $db->prepare($sql);
            $stm->bindParam(1, $idBillet, PDO::PARAM_INT);
            $stm->execute();
            $commentaires = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $commentaires;


        } catch (\PDOException $th) {
            throw $th;
        }
    }

    public function ajouterCommentaire($auteur, $contenu, $idBillet){
        try {

            $db = $this->connectDb();
            $sql = 'INSERT INTO comments (auteur, contenu, idBillet, create_time) 
            VALUES (?, ?, ?, NOW())';
            $stm = $db->prepare($sql);
            
            $params = [
                0 => $auteur,
                1 => $contenu,
                2 => $idBillet
            ];
            
            
            return $stm-> execute($params);


        } catch (\PDOException $th) {
            throw $th;
        }
    }

}








?>
