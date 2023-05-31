<?php
abstract class model {


    public function connectDb () {


            $db = new PDO('mysql:host=localhost;dbname=mvc1', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;

    }

}





?>