<?php
var_dump($_POST);
$receiving = ('POST' === $_SERVER['REQUEST_METHOD']);

//validation du nom
$nom = "";
$nom_valide = true;
if ($receiving && array_key_exists('nom', $_POST)) {
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $nom_valide = (1 === preg_match('/\w{2,}/', $nom));
        if ( ! $nom_valide) {
            $nom_msg_validation = "**Le nom doit comporter au moins deux lettres";
        }
}
// validation prenom
$prenom = "";
$prenom_valide = true;
if ($receiving && array_key_exists('prenom', $_POST)) {
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $prenom_valide = (1 === preg_match('/\w{2,}/', $prenom));
    if ( ! $prenom_valide) {
        $prenom_msg_validation = "**Le prenom doit comporter au moins deux lettres";
    }
}
// validation email
$email = "";
$email_valide = true;
if($receiving && array_key_exists('email',$_POST)){
    $email = $_POST['email'];
    $email_valide = ($email === filter_var($email, FILTER_VALIDATE_EMAIL));
    if (!$email_valide){
        $email_msg_validation = "**Ceci nest pas un courielle valide.";
    }
}
$user = "";
$user_valide = true;
if ($receiving && array_key_exists('user', $_POST)) {
    $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
    $user_valide = (1 === preg_match('/\w{8,}/', $user));
    if ( ! $user_valide) {
        $user_msg_validation = "**Le nom dutilisateur doit comporter au moins huit charactere";
    }
}
$pass = "";
$pass_valide = true;
if($receiving && array_key_exists('pass',$_POST)){
    $pass_valide= (1 === preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $_POST['pass']));
    if (!$pass_valide){
    $pass_msg_validation = '**Le mot de pass ne remplis pas les demandes!';
    }
}
$repass = "";
$repass_valide = true;
if($receiving && array_key_exists('repass',$_POST)){
    $repass_valide = ($_POST['repass'] == $_POST['pass']);
    if(!$repass_valide) {
    $repass_msg_validation = "**Les mots de pass ne sont pas identique";
    }
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
    $postal = $_POST['ville'];
}
$province = "";
if(array_key_exists("province",$_POST) && !empty(trim($_POST['province']))){
    $province = $_POST["province"];
}
?>
<style>
    .msgvalidation {
        color: red;
    }
</style>

<div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php if ( ! $user_valide) { echo "<p><span class='msgvalidation'>$user_msg_validation<span></p>"; } ?>
        <p><label for="user">Pseudo : </label>
            <input type="text" name="user" id="user" value="<?= $user ?>" />
        </p>
        <?php if ( ! $pass_valide) { echo "<p><span class='msgvalidation'>$pass_msg_validation<span></p>"; } ?>
        <?php if ( ! $repass_valide) { echo "<p><span class='msgvalidation'>$repass_msg_validation<span></p>"; } ?>
        <p><label for="pass">Mot de passe : </label>
            <input type="password" name="pass" id="pass" value="<?= $pass ?>" />
        </p>
        <p><label for="repass">Refaire Mot de passe : </label>
            <input type="password" name="repass" id="repass" value="<?= $repass ?>" />
        </p>
        <p>Information personelle :</p>
        <?php if ( ! $nom_valide) { echo "<p><span class='msgvalidation'>$nom_msg_validation<span></p>"; } ?>
        <p><label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" value="<?= $nom ?>"/>
        </p>
        <?php if ( ! $prenom_valide) { echo "<p><span class='msgvalidation'>$prenom_msg_validation<span></p>"; } ?>
        <p><label for="prenom">Prenom : </label>
        <input type="text" name="prenom" id="prenom" value="<?= $prenom ?>"/>
        </p>
        <?php if ( ! $email_valide) { echo "<p><span class='msgvalidation'>$email_msg_validation<span></p>"; } ?>
        <p><label for="email">Addresse Courielle : </label>
        <input type="text" name="email" id="email" value="<?= $email ?>"/>
        </p>
        <p><label for="addresse">Addresse Civile: </label>
        <input type="text" name="addresse" id="addresse" value="<?= $addresse ?>" />
        </p>
        <p><label for="province">Province : </label>
        <select id="province" name="province">
            <option value="nothing" <?= 'nada' == $province ? 'selected="selected"' : "" ?>>Choisir une province</option>
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
        </p>
        <p><label for="postal">Code Postal : </label>
        <input type="text" name="postal" id="postal" value="<?= $postal ?>" />
        </p>
        <p><label for="ville">ville : </label>
        <input type="text" name="ville" id="ville" value="<?= $ville ?>" />
        </p>

        <input type="submit" name="soumettre" value="Soumettre"/>

    </form>
</div>
