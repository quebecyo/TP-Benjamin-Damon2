<?php

function user_authenticate($username, $password) {

    global read_data();
    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);
    $queryStr = "SELECT * FROM user WHERE username='$username'";
//    var_dump($queryStr);
    $res = $mysqli->query($queryStr);
    $resultat = false;
    if ($res && ($res->num_rows > 0)) {
        $user_data = $res->fetch_assoc();
//        var_dump($user_data);
        if (passwd_check($password, $user_data['password_hash'])) {
            // Retirer le hash des valeurs retournées
            unset($user_data['password_hash']);
            $resultat = $user_data;
        }
    }
    return $resultat;
}

?>