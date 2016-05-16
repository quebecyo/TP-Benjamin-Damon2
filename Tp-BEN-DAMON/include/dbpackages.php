<?php 
	$db = "db_tpphp";
	$table_user = "user";
	$table_book = "book";



	function creation_connexion($db){
	// on besoin d'une connexion 
	$connexion = mysqli_connect("localhost", "root", "", $db);
	if (mysqli_connect_errno())
  	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	
	return $connexion;
}
	// inspired by alexandre pinette teacher
	function read_data($db, $requete){
	

	$connexion = creation_connexion($db);


	// creation d'un tampon de donnees'
	$donnees = array();

	if ($result = mysqli_query($connexion, $requete)) {

		if(isset($result)){
			
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

	function get_user(){
	
		global $table_user;
		global $db;
		$query_get_user = "SELECT * FROM ". $table_user;	
		// lecture de tous les usagers de la db
		$user = read_data($db, $query_get_user);
		return $user;
	
	}
	function user_authenticate($username, $password) {
			global $table_user;
			global $db;
			$query_get_user = "SELECT * FROM ". $table_user;	
			// lecture de tous les usagers de la db
			$user = read_data($db, $query_get_user);
			return $user;

		    // $username = $mysqli->real_escape_string($username);
		    // $password = $mysqli->real_escape_string($password);
		    $queryStr = "SELECT * FROM " . $table_user . " WHERE username='$username'";
		//    var_dump($queryStr);
		    $res = $table_user->query($queryStr);
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
	function get_book(){
	
		global $table_book;
		global $db;
		$query_get_book = "SELECT * FROM ". $table_book;
		$requete = $query_get_book;	
		// lecture de tous les usagers de la db
		$book = read_data($db, $requete);
		
		return $book;
	
	}
?>