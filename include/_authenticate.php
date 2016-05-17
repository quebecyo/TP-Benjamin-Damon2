<?php


function passwd_encrypt($password) {
    if (version_compare(PHP_VERSION, '5.5.0') >= 0) {
        // La version est supérieure ou égale à 5.5 : On peut utiliser password_hash() et password_verify()
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $salt = '$2y$07$' . strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $password_hash = crypt($password, $salt);
    }
    return $password_hash;
}

function passwd_check($password, $password_hash) {
    if (version_compare(PHP_VERSION, '5.5.0') >= 0) {
        // La version est supérieure ou égale à 5.5 : On peut utiliser password_hash() et password_verify()
        $result = password_verify($password, $password_hash);
    } else {
        $result = ( $password_hash === crypt($password, $password_hash) );
    }
    return $result;
}
function user_authenticate($username, $password) {

    // global read_data();
    $username = read_data()->real_escape_string($username);
    $password = read_data()->real_escape_string($password);
    $queryStr = "SELECT * FROM user WHERE username='$username'";
//    var_dump($queryStr);
    $res = read_data()->query($queryStr);
    $resultat = false;
    if ($res && ($res->num_rows > 0)) {
        $user_data = $res->fetch_assoc();
       var_dump($user_data);
        if (passwd_check($password, $user_data['password_hash'])) {
            // Retirer le hash des valeurs retournées
            unset($user_data['password_hash']);
            $resultat = $user_data;
        }
    }
    return $resultat;
}

?>