<?php
require_once('model.php');


class Billet extends model
{


    public function getBillets(): array|false
    {
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


    function getBillet($idBillet)
    {
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

    function ajouterBillet($idBillet): bool
    {
        try {

            $db = $this->connectDb();
            $sql = 'INSERT INTO t_billet (idBillet, create_time) 
            VALUES (?,  NOW())';
            $stm = $db->prepare($sql);
            $stm->bindParam(1, $idBillet, PDO::PARAM_INT);
            return $stm->execute();


        } catch (\PDOException $th) {
            throw $th;
        }
    }

    function isIdBillet($idBillet): array|bool
    {
        try {
            $db = $this->connectDb();
            $sql = 'SELECT COUNT(*) AS cnt FROM t_billet WHERE idBillet = ?';
            $stm = $db->prepare($sql);
            $stm->bindParam(1, $idBillet, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $th) {
            throw $th;
        }

    }






}




$bilObj = new Billet();









?> 