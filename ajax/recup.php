<?php
    include '../functions/main-function.php';
    $user = $_SESSION['user'];
    $membre = $_SESSION['source'];

    $req = $db->query("SELECT * FROM messages WHERE (sender= '$membre' AND receiver='$user') OR (receiver= '$membre' AND sender='$user')");
    $result = array();

    while($row = $req->fetchObject()){
        $result[] = $row;
    }

    foreach($result as $message){
        ?>
            <div class="message <?php echo($message->sender == $membre) ? 'message-membre' : 'message-user' ?>">
                <?= $message->message ?>
                
            </div>
            <br><br>
        <?php

    }
?>