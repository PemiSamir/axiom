<?php
// verifie si l'email est déjà enregistrée
    function email_taken($email){
        global $db;
        $e=array('email' => $email);
        $sql = 'SELECT * FROM user WHERE email = :email';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }

    //insère un nouvel utilisateur dans la bd
    function signup($name, $email, $password){
        global $db;
        $r=array(
            'name'=>$name,
            'email'=>$email,
            'password'=>$password
        );
        $sql="INSERT INTO user(name,email,password) VALUES(:name,:email,:password)";
        $req= $db->prepare($sql);
        $req->execute($r);
    }
?>