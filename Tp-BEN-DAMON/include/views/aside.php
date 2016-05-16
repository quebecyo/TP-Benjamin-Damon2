<aside>
    <div id="wrapper_left">

      <h2>Type de Roman:</h2>
      <ul>
        <li class="aside_menu"><a href="#category1" data-smoothscroll="category1">Aventure</a></li>
        <li class="aside_menu"><a href="#category2" data-smoothscroll="category2">Science-fiction</a></li>
        <li class="aside_menu"><a href="#category3" data-smoothscroll="category3">Biographie</a></li>
        <li class="aside_menu"><a href="#category4" data-smoothscroll="category4">Policier</a></li>
        <li class="aside_menu"><a href="#category5" data-smoothscroll="category5">Fantastique</a></li>
      </ul>
    </div>

    <div id="wrapper_right">
      
      <span><?php echo $login_message; ?></span>
    <?php if ($user_is_loggedIn) { ?>
        <form method="post">
            <input type="submit" name="disconnect" id="se_deconnecter" value="Déconnexion"/>
        </form>
    <?php } else { ?>
        <form method="post">
            <input type="text" name="username" id="username" value="<?php echo isset($username) ? $username : ''; ?>"/><br>
            <input type="password" name="password" id="password" value="<?php echo isset($password) ? $password : ''; ?>"/><br>
            <input type="submit" name="connect" id="se_connecter" value="Connexion"/>
            <button type="button"><a href="include/inscription.php" title="">Inscription</a></button>
        </form>
    <?php } ?>
      <div id="panier_wrapper">
        <h2>Mon Panier:</h2>
      </div>

      <div id="livre_emprunte_wrapper">
        <h2>Mes livres Empruntés:</h2>
      </div>
      <div id="livre_acheter_wrapper">
        <h2>Mes livres Achetés:</h2>
      </div>
    </div>

    
  </aside>