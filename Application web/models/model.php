<?php session_start();

	function dbConnect()
	{
		try
		{
			$user = 'newsuser';
			$password = 'newsuser';
			$server = 'localhost';
			$bdd = new PDO('mysql:host='.$server.';dbname=news_db;charset=utf8', $user, $password);
			return $bdd;
		}
		catch (Exception $e) 
		{
			return null;
		}
	}

	function getAllArticles($begin)
	{
		$curl = curl_init("http://localhost/news_api/article/getAllArticles/".$begin);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $decoded = json_decode($curl_response, true);
        // $sql = "SELECT idArticle, titre, LEFT(description,250) as description, DATE_FORMAT(datePub, '%d %M, %Y') as datePub, image, nom FROM article, categorie WHERE article.idCat = categorie.idCat ORDER BY idArticle DESC LIMIT 3, 11";
        // return $this->createQuery($sql);
        return $decoded;

	}

	
	function getList($table='Article')
	{
        $bdd = dbConnect();
		$reponse = $bdd->query('SELECT * FROM '.$table);
		if ($table === 'categorie') 
		{
			$table .= ' ORDER BY length(libelle)';
		}
		$articles = $reponse->fetchAll(PDO::FETCH_OBJ);
		$reponse->closeCursor();
		return $articles;
	}

	function login($login, $password)
	{
		$client = new SoapClient('http://localhost:5500/UserService?wsdl'); 
		$param=new stdClass(); 
		$param->login = $login; 
		$param->password = $password; 
		$res=$client->__soapCall("UserLogin",array($param)); //var_dump($res); 
		if(!empty($res->return)){
			$_SESSION['id'] = $res->return->id;
			$_SESSION['nom'] = $res->return->nom;
			$_SESSION['profil'] = $res->return->typeUser;
			return true;
		}
		else{
			return false;
		}
	}

	function getUsers()
	{
		$bdd = dbConnect();
		$query = $bdd->query("SELECT * FROM users WHERE type_user = 1");
		
		return $query;
	}
	
	function getUser($id)
	{
		$bdd = dbConnect();
		$query = $bdd->query("SELECT * FROM users WHERE iduser= ".$id);
		
		return $query->fetch();
	}

	function getUserArticle()
	{
		$id = $_SESSION['id'];
		echo $id;
		$bdd = dbConnect();
		$query = $bdd->query("SELECT idArticle, titre, LEFT(description,250) as description, DATE_FORMAT(datePub, '%d %M, %Y') as datePub, image, nom FROM article, categorie WHERE article.idCat = categorie.idCat and idUser = $id ORDER BY idArticle DESC ");
		
		return $query;
	}

	function deleteUser($id)
	{
		$bdd = dbConnect();
		$query = $bdd->query("DELETE FROM users WHERE iduser= ".$id);
		
		return $query;
	}

	function editUser($nom, $prenom, $login, $id)
	{
		$bdd = dbConnect();
		$query = $bdd->query("UPDATE users SET nom = '$nom', prenom = '$prenom', login = '$login' WHERE iduser= $id");
		
		return $query;
	}

	function getItem($id)
	{
        $curl = curl_init("http://localhost/news_api/article/".$id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $decoded = json_decode($curl_response, true);
        // $sql = "SELECT idArticle, titre, LEFT(description,250) as description, DATE_FORMAT(datePub, '%d %M, %Y') as datePub, image, nom FROM article, categorie WHERE article.idCat = categorie.idCat ORDER BY idArticle DESC LIMIT 3, 11";
        // return $this->createQuery($sql);
        return $decoded;
	}

	function getItemByCategorie($idCat)
	{
        $curl = curl_init("http://localhost/news_api/article/categorie/".$idCat);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $decoded = json_decode($curl_response, true);
        // $sql = "SELECT idArticle, titre, LEFT(description,250) as description, DATE_FORMAT(datePub, '%d %M, %Y') as datePub, image, nom FROM article, categorie WHERE article.idCat = categorie.idCat ORDER BY idArticle DESC LIMIT 3, 11";
        // return $this->createQuery($sql);
        return $decoded;
	}

	function addArticle($titre, $description, $idCat, $idUser)
    {
		$bdd = dbConnect();
        $sql = 'INSERT INTO article (titre, description, idCat, idUser) VALUES (?, ?, ?, ?)';
		$result = $bdd->prepare($sql);
		$result->execute([$titre, $description, $idCat, $idUser]);
		return $result;
    }
?>