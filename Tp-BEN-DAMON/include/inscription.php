<?php


$firstname = "";
if (array_key_exists('firstname',$_POST) && !empty(trim($_POST['firstname']))) {
    $firstname = $_POST['firstname'];
}
$lastname = "";
if (array_key_exists('lastname',$_POST) && !empty(trim($_POST['lastname']))) {
    $lastname = $_POST['lastname'];
}
$email = "";
if(array_key_exists('email',$_POST) && !empty(trim($_POST['email']))){
    $email = $_POST['email'];
}
$username = "";
if(array_key_exists('username',$_POST) && !empty(trim($_POST['username']))){
    $username = $_POST['username'];
}
$pass = "";
if(array_key_exists('pass',$_POST) && !empty(trim($_POST['pass']))){
    $pass = $_POST['pass'];
}
$addresse = "";
if(array_key_exists('addresse',$_POST) && !empty(trim($_POST['addresse']))){
    $addresse = $_POST['addresse'];
}
$postal = "";
if(array_key_exists('postal',$_POST) && !empty(trim($_POST['postal']))){
    $postal = $_POST['postal'];
}
$ville = "";
if(array_key_exists('ville',$_POST) && !empty(trim($_POST['ville']))){
    $ville = $_POST['ville'];
}
$province = "";
if(array_key_exists("province",$_POST) && !empty(trim($_POST['province']))){
    $province = $_POST["province"];
}



?>


<div>
    <form method="post" action="create.php">
        <p><label for="firstname">Prenom : </label>
            <input type="text" name="firstname" id="firstname" value="<?= $firstname ?>"/>
        </p>
        <p><label for="lastname">lastname : </label>
            <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>"/>
        </p>
        <p><label for="username">username : </label>
            <input type="text" name="username" id="username" value="<?= $username ?>" />
        </p>
        <p><label for="pass">Mot de passe : </label>
            <input type="password" name="pass" id="pass" value="<?= $pass ?>" />
        </p>
        <p><label for="email">Addresse Courielle : </label>
        <input type="text" name="email" id="email" value="<?= $email ?>"/>
        </p>
        <p><label for="addresse">Addresse Civile: </label>
        <input type="text" name="addresse" id="addresse" value="<?= $addresse ?>" />
        </p>
        <select id="province" name="province">
            <option value="ab" <?= 'ab' == $province ? 'selected="selected"' : "" ?>>Alberta</option>
            <option value="cb"<?= 'cb' == $province ? 'selected="selected"' : "" ?>>Colombrie-Britannique</option>
            <option value="ipe"<?= 'ipe' == $province ? 'selected="selected"' : "" ?>>Île-du-Prince-Édouard</option>
            <option value="mb"<?= 'mb' == $province ? 'selected="selected"' : "" ?>>Manitoba</option>
            <option value="nb"<?= 'nb' == $province ? 'selected="selected"' : "" ?>>Nouveau-Brunswick</option>
            <option value="ne"<?= 'ne' == $province ? 'selected="selected"' : "" ?>>Nouvelle-Écosse</option>
            <option value="on"<?= 'on' == $province ? 'selected="selected"' : "" ?>>Ontario</option>
            <option value="qc"<?= 'qc' == $province ? 'selected="selected"' : "" ?>>Québec</option>
            <option value="sk"<?= 'sk' == $province ? 'selected="selected"' : "" ?>>Saskatchewan</option>
            <option value="nl"<?= 'nl' == $province ? 'selected="selected"' : "" ?>>Terre-Neuve-et-Labrador</option>
            <option value="nu"<?= 'nu' == $province ? 'selected="selected"' : "" ?>>Nunavut</option>
            <option value="nt"<?= 'nt' == $province ? 'selected="selected"' : "" ?>>Territoires du Nord-Ouest</option>
            <option value="yt"<?= 'yt' == $province ? 'selected="selected"' : "" ?>>Yukon</option>
        </select>
        <p><label for="postal">Code Postal : </label>
        <input type="text" name="postal" id="postal" value="<?= $postal ?>" />
        </p>
        <p><label for="ville">ville : </label>
        <input type="text" name="ville" id="ville" value="<?= $ville ?>" />
        </p>

        <input type="submit" name="submit" value="Soumettre"/>

    </form>
</div>
