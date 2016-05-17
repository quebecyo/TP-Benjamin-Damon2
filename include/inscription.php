<?php


$receiving = ('POST' === $_SERVER['REQUEST_METHOD']);


////////////////
// Validation //
////////////////

//validation du nom
$lastname = "";
$lastname_valide = true;
if ($receiving && array_key_exists('lastname', $_POST)) {
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $lastname_valide = (1 === preg_match('/\w{2,}/', $lastname));
        $lastname = $_POST['lastname'];
        if ( ! $lastname_valide) {
            $lastname_msg_validation = "**Le lastname doit comporter au moins deux lettres";
        }
}
// validation prenom
$firstname = "";
$firstname_valide = true;
if ($receiving && array_key_exists('firstname', $_POST)) {
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $firstname_valide = (1 === preg_match('/\w{2,}/', $firstname));
    $firstname = $_POST['firstname'];
    if ( ! $firstname_valide) {
        $firstname_msg_validation = "**Le firstname doit comporter au moins deux lettres";
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
$username = "";
$username_valide = true;
if ($receiving && array_key_exists('username', $_POST)) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $username_valide = (1 === preg_match('/\w{4,}/', $username));
    $username = $_POST['username'];
    if ( ! $username_valide) {
        $user_msg_validation = "**Le nom dutilisateur doit comporter au moins quatre characteres";
    }
}
$pass = "";
$pass_valide = true;
if($receiving && array_key_exists('pass',$_POST)){
    $pass_valide= (1 === preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $_POST['pass']));
    $pass = $_POST['pass'];
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
$adresse = "";
if(array_key_exists('adresse',$_POST) && !empty(trim($_POST['adresse']))){
    $adresse = $_POST['adresse'];
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

include('dbpackages.php');

$msg_erreur = "";
if(isset($_POST['soumettre'])){
    if($lastname && $firstname_valide && $email_valide && $pass_valide && $repass_valide && $username_valide) {
        $con = mysqli_connect("localhost", "root", "", "db_tpphp");
        $queryString = "INSERT INTO user (id,firstname,lastname,username,password,email,adresse,city,province,postalcode) VALUES (NULL,'$firstname','$lastname','$username','$pass','$email','$adresse','$ville','$province','$postal')";
        $res = $con->query($queryString);
        // header("location:http://livre-awesome.projetisi.com/");
        header('location: ../index.php');
    } else {
        $msg_erreur = "Veuiller complete les cases requises";
    }
}
?>
<!DOCTYPE html>
<html>
<?php 
  require_once('head_html_inscription.php');
 ?>
<body>
  <?php 
    require('views/top-page/menu.php');
 ?>
<div class="inscription_section">
    <?php echo "<p><span class='msgvalidation'>$msg_erreur<span></p></br> "; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php if ( ! $username_valide) { echo "<p><span class='msgvalidation'>$user_msg_validation<span></p>"; } ?>
        <input type="text" name="username" id="username" value="<?= $username ?>" placeholder="Username" />

        <?php if ( ! $pass_valide) { echo "<p><span class='msgvalidation'>$pass_msg_validation<span></p>"; } ?>
        <?php if ( ! $repass_valide) { echo "<p><span class='msgvalidation'>$repass_msg_validation<span></p>"; } ?>
        <input type="password" name="pass" id="pass" value="<?= $pass ?>" placeholder="Enter a password"/>

        <input type="password" name="repass" id="repass" value="<?= $repass ?>" placeholder="password again"/>

        <?php if ( ! $lastname_valide) { echo "<p><span class='msgvalidation'>$lastname_msg_validation<span></p>"; } ?>

        <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>" placeholder="Lastname"/>

        <?php if ( ! $firstname_valide) { echo "<p><span class='msgvalidation'>$firstname_msg_validation<span></p>"; } ?>
        <input type="text" name="firstname" id="firstname" value="<?= $firstname ?>" placeholder="Firstname"/>

        <?php if ( ! $email_valide) { echo "<p><span class='msgvalidation'>$email_msg_validation<span></p>"; } ?>

        <input type="text" name="email" id="email" value="<?= $email ?>" placeholder="Email"/>

        <input type="text" name="adresse" id="adresse" value="<?= $adresse ?>" placeholder="Adress"/>

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


        <input type="text" name="postal" id="postal" value="<?= $postal ?>" placeholder="Postal Code"/>


        <input type="text" name="ville" id="ville" value="<?= $ville ?>" placeholder="City"/>


        <input type="submit" name="soumettre" value="Soumettre"/>

    </form>
</div>
</body>
</html>