<?php

// recuperation des membres
    function get_membres(){
        global $db;
        $req=$db->query("SELECT * FROM user");
        $results = array();

        while($row = $req->fetchObject()){
            $results[] = $row;
        }
        return $results;
    }
?>