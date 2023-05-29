<?php
require_once('model.php');


class Billet extends model{
  
    
    
    public function getBillets(){
        try {

            $db = $this->connectDb();
            $sql = 'SELECT * FROM t_billet';
            $stm = $db->prepare($sql);
            $stm->execute();
            $billets = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $billets;
            

        } catch (\PDOException $th) {
            throw $th;
        }
        

    }


    function getBillet($idBillet){
        try {

            $db = $this->connectDb();
            $sql = 'SELECT * FROM t_billet where idBillet = ?';
            $stm = $db->prepare($sql);
            $stm->bindParam(1, $idBillet, PDO::PARAM_INT);
            $stm->execute();
            $billet = $stm->fetchAll(PDO::FETCH_ASSOC);
            
            return $billet;

        } catch (\PDOException $th) {

            throw $th;

        }

        
    }

    
}














?> 