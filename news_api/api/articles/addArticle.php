<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: POST');
 
    include_once '../../config/DBConnection.php';
    include_once '../../models/Article.php';

    $database = new DBConnection();
    $db = $database->dbConnect();

    $article = new Article($db);

    $titre = $article->titre = isset($_POST['titre']) ? $_POST['titre'] : die();
    $description = $article->description = isset($_POST['description']) ? $_POST['description'] : die();
    $idCat = $article->idCat = isset($_POST['idCat']) ? $_POST['idCat'] : die();
    $idUser = $article->idUser = isset($_POST['idUser']) ? $_POST['idUser'] : die();
    $data = json_decode(file_get_contents('php://input'));

    // $article->titre = $data->titre;
    // $article->description = $data->description;
    // $article->idCata = $data->description;

    $result =  $article->addArticle($titre,$description,$idCat, $idUser);

    if($result)
    {
        echo json_encode(
            array('message' => 'Article ajouté')
        );
    }
    else
    {
        echo json_encode(
            array('message' => "Une erreur est survenu lors de l'ajout de l'article ! Veuillez ressayer")
        );
    }
