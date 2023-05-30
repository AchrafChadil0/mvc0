<?php
abstract class model {


    public function connectDb () {
        $db = new PDO('mysql:host=localhost;dbname=mvc1', 'root', '');
        return $db;
    }




}





?>