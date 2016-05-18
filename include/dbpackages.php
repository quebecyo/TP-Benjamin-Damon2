<?php 
	$db = "db_tpphp";
	$table_user = "user";
	$table_book = "book";

	// Constantes rassemblant les infos de connexion et de schéma de la DB
	define('CONN_HOST', 'localhost');
	define('CONN_USER', 'root');
	define('CONN_PWD', '');



	function creation_connexion($db){
	// on besoin d'une connexion 
	$connexion = mysqli_connect("localhost", "root", "", $db);
	if (mysqli_connect_errno())
  	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	
	return $connexion;
	}


	function read_data($db, $requete){
	

	$connexion = creation_connexion($db);
	// try{
	// 	$result = 

	// }


	// creation d'un tampon de donnees'
	$donnees = array();

	if ($result = mysqli_query($connexion, $requete)) {

		if(isset($result)){
			// var_dump($result);
			// on va boucler sur tous les résultats de la req
			while($ligne = mysqli_fetch_row($result)){
				
				 // lire une seule ligne
				 $entite = array();
				 
				 foreach($ligne as $cle => $valeur){
				 	$entite[$cle] = $valeur;
				 }

					 $donnees[] = $entite;
			}	
		}
		mysqli_free_result($result);
	}
	// on ferme la connexion 
	mysqli_close($connexion);

	return($donnees);
}
		 
	
	// function get_user(){
	
	// 	global $table_user;
	// 	global $db;
	// 	$query_get_user = "SELECT * FROM ". $table_user;	
	// 	// lecture de tous les usagers de la db
	// 	$user = read_data($db, $query_get_user);
	// 	return $user;
	
	// }


	function passwd_check($password_user, $password_server) {
	    $bool = false;
	    if ($password_user == $password_server) {
	    	$bool = true;
	    }
	    return $bool;
	}
	function user_authenticate($username, $password) {
			global $table_user;
			global $db;


		    $queryStr = "SELECT * FROM " . $table_user . " WHERE username='$username'";
		    $res = read_data($db, $queryStr);
		    // var_dump($res);
		    if (!empty($res)) {
		    	if (passwd_check($password, $res[0][4])) {
	            // Retirer le hash des valeurs retournées
	            unset($res[0][4]);

				return true;
		        }
		        else{
		        	return false;
		        }
		    }
		    else{
		    	// var_dump('aucun usager');
		    }
	        
		    
		}
	function get_book(){
	
		global $table_book;
		global $db;
		$query_get_book = "SELECT * FROM ". $table_book;
		$requete = $query_get_book;	
		// lecture de tous les usagers de la db
		$book = read_data($db, $requete);
		
		return $book;
	
	}
	$mysqli = new mysqli(CONN_HOST, CONN_USER, CONN_PWD, $db);
	function get_article_list($cat_id=false) {
    global $mysqli;
	// Sélectionner tous les articles (toutes les colonnes)
	    $queryStr = 'SELECT * FROM article';
	    // Si la catégorie est précisée, on ajoute une clause WHERE dans la requête
	    if (false !== $cat_id) {
	        $queryStr .= " WHERE `category_id` = " . $mysqli->real_escape_string($cat_id);
	    }
	// Execution de la requête (un select)
	    $res = $mysqli->query($queryStr);
	// Récupération des données
	    $resultat = array();
	    if ($res && ($res->num_rows > 0)) {
	        while ($article = $res->fetch_assoc()) {
	            $resultat[$article['id']] = $article;
	        };
	    };
	    return $resultat;
	}
?>